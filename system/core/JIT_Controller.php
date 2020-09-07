<?php
defined('BASEPATH') or exit('No direct script access allowed');
require 'Format.php';
class JIT_Controller
{
    /**
     * Reference to the CI singleton
     *
     * @var object
     */
    private static $instance;

    /**
     * CI_Loader
     *
     * @var CI_Loader
     */
    public  $load;
    // public  $allowed_http_methods = ['GET', 'DELETE', 'POST', 'PUT', 'OPTIONS', 'PATCH', 'HEAD'];
    public  $allowed_http_methods = ['GET','POST'];

    /**
    * Contains details about the response
    * Fields: format, lang
    * Note: This is a dynamic object (stdClass).
    *
    * @var object
    */
    protected   $rest_format = null,
                $methods = [],
                $request = null,
                $response = null,
                $rest = null;

    /**
    * The arguments from GET, POST, PUT, DELETE, PATCH, HEAD and OPTIONS request methods combined.
    *
    * @var array
    */
    protected   $_get_args = [],
                $_post_args = [],
                $_put_args = [],
                $_delete_args = [],
                $_patch_args = [],
                $_head_args = [],
                $_options_args = [],
                $_query_args = [],
                $_args = [];

    /**
     * The insert_id of the log entry (if we have one).
     *
     * @var string
     */
    protected $_insert_id = '';

    protected $api_key = '';

    /**
     * If the request is allowed based on the API key provided.
     *
     * @var bool
     */
    protected $_allow = true;

    /**
     * The LDAP Distinguished Name of the User post authentication.
     *
     * @var string
     */
    protected $_user_ldap_dn = '';

    /**
     * The start of the response time from the server.
     *
     * @var number
     */
    protected $_start_rtime;

    /**
     * The end of the response time from the server.
     *
     * @var number
     */
    protected $_end_rtime;

    /**
     * List all supported methods, the first will be the default format.
     *
     * @var array
     */
    protected $_supported_formats = [
        'json'       => 'application/json',
        'array'      => 'application/json',
        'csv'        => 'application/csv',
        'html'       => 'text/html',
        'jsonp'      => 'application/javascript',
        'php'        => 'text/plain',
        'serialized' => 'application/vnd.php.serialized',
        'xml'        => 'application/xml',
    ];

    /**
     * Information about the current API user.
     *
     * @var object
     */
    protected $_apiuser;

    /**
     * Whether or not to perform a CORS check and apply CORS headers to the request.
     *
     * @var bool
     */
    protected $check_cors = null;

    /**
     * Enable XSS flag
     * Determines whether the XSS filter is always active when
     * GET, OPTIONS, HEAD, POST, PUT, DELETE and PATCH data is encountered
     * Set automatically based on config setting.
     *
     * @var bool
     */
    protected $_enable_xss = false;
    /**
     * @var Format
     */
    private $format;

    /**
     * @var bool
     */
    protected $auth_override;

    private $is_valid_request = true;

    public $http_status; 

    protected   $HTTP_OK = 200,
                $HTTP_CREATED = 201,
                $HTTP_NOT_MODIFIED = 304,
                $HTTP_BAD_REQUEST = 400,
                $HTTP_UNAUTHORIZED = 401,
                $HTTP_FORBIDDEN = 403,
                $HTTP_NOT_FOUND = 404,
                $HTTP_NOT_ACCEPTABLE = 406,
                $HTTP_INTERNAL_ERROR = 500;

    public $HTTP_RESPONSE,
            $message,
            $status = false;
    /**
     * Extend this function to apply additional checking early on in the process.
     *
     * @return void
     */
    protected function early_checks()
    {
        $this->create_key();
    }

    public function __construct()
    {
        self::$instance =& $this;
        foreach (is_loaded() as $var => $class){
            $this->$var =& load_class($class);
        }
        $this->load =& load_class('Loader', 'core');
        $this->load->initialize();
        $this->config->load('rest');

        $this->_enable_xss = ($this->config->item('global_xss_filtering') === true);
        $this->checkmethod = $this->config->item('check_method');
        $this->output->parse_exec_vars = false;

        if ($this->config->item('rest_enable_logging') === true) {
            $this->_start_rtime = microtime(true);
        }
        $this->get_local_config();

        $supported_formats = $this->config->item('rest_supported_formats');

        if (empty($supported_formats)) {
            $supported_formats = [];
        }
        if (!is_array($supported_formats)) {
            $supported_formats = [$supported_formats];
        }

        $default_format = $this->_get_default_output_format();
        if (!in_array($default_format, $supported_formats)) {
            $supported_formats[] = $default_format;
        }

        $default_format = $this->_get_default_output_format();
        if (!in_array($default_format, $supported_formats)) {
            $supported_formats[] = $default_format;
        }

        $this->_supported_formats = array_intersect_key($this->_supported_formats, array_flip($supported_formats));

        $language = $this->config->item('rest_language');
        if ($language === null) {
            $language = 'english';
        }
        $this->lang->load('rest_controller', $language, false, true, __DIR__.'/../');

        $this->request = new stdClass();
        $this->response = new stdClass();
        $this->rest = new stdClass();

        if ($this->config->item('rest_ip_blacklist_enabled') === true) {
            $this->_check_blacklist_auth();
        }

        $this->request->ssl = is_https();

        $this->request->method = $this->input->method();

        if (isset($this->{'_'.$this->request->method.'_args'}) === false) {
            $this->{'_'.$this->request->method.'_args'} = [];
        }

        $this->request->format = $this->_detect_input_format();

        $this->request->body = null;

         $this->rest->key = null;

        $this->{'_parse_'.$this->request->method}();

        if ($this->{'_'.$this->request->method.'_args'} === null) {
            $this->{'_'.$this->request->method.'_args'} = [];
        }

        $this->response->format = $this->_detect_output_format();

        $this->response->lang = $this->_detect_lang();

        $this->_parse_query();

        $this->_get_args = array_merge($this->_get_args, $this->uri->ruri_to_assoc());

        if ($this->request->format && $this->request->body) {
            $this->request->body = Format::factory($this->request->body, $this->request->format)->to_array();
            $this->{'_'.$this->request->method.'_args'} = $this->request->body;
        }

        $this->_head_args = $this->input->request_headers();

        $this->_args = array_merge(
            $this->_get_args,
            $this->_options_args,
            $this->_patch_args,
            $this->_head_args,
            $this->_put_args,
            $this->_post_args,
            $this->_delete_args,
            $this->{'_'.$this->request->method.'_args'}
        );

        $this->early_checks();
    }

    public static function &get_instance()
    {
        return self::$instance;
    }

    public function create_key()
    {
        $files = '.key';
        if (!file_exists($files)) {
            file_put_contents($files, password_hash(rand(), PASSWORD_DEFAULT));
        }
        $this->api_key =  file_get_contents('./.key');
    }

    public function _remap($method, $params = [])
    {
        $method = preg_replace('/^(.*)\.(?:'.implode('|', array_keys($this->_supported_formats)).')$/', '$1', $method);
        if(!in_array(strtoupper($this->request->method),$this->allowed_http_methods)){
            $this->response([
                'status'    => false,
                'method'    => strtoupper($this->request->method),
                'message'   => 'Sorry the '.strtoupper($this->request->method).' method is not allowed',
            ],$this->http_status['METHOD_NOT_ALLOWED']);
        }

        if ($this->config->item('check_api_key') && $this->auth_override !== true) {
            $this->_allow = $this->_detect_api_key();
        }

        $use_key = !(isset($this->methods[$method]['key']) && $this->methods[$method]['key'] === false);

        if ($this->config->item('check_api_key') && $use_key && $this->_allow === false) {

            if ($this->request->method == 'options') { exit; }
            
            $this->response([
                $this->config->item('rest_status_field_name')  => false,
                $this->config->item('rest_message_field_name') => sprintf($this->lang->line('text_rest_invalid_api_key'), $this->rest->key)
            ], $this->HTTP_FORBIDDEN);
        }


        try {
            if ($this->is_valid_request) {
                call_user_func_array([$this, $method], $params);
            }
        } catch (Exception $ex) {
            if ($this->config->item('rest_handle_exceptions') === false) {
                throw $ex;
            }

            $_error = &load_class('Exceptions', 'core');
            $_error->show_exception($ex);
        }
    }

    protected function _detect_api_key()
    {
        $api_key_variable = $this->config->item('rest_key_name');
        $key_name = 'HTTP_'.strtoupper(str_replace('-', '_', $api_key_variable));
        if (($this->rest->key = isset($this->_args[$api_key_variable]) ? $this->_args[$api_key_variable] : $this->input->server($key_name))) {
            return $this->api_key === $this->rest->key;
        }
        return false;
    }

    public function get($key = null, $xss_clean = null)
    {
        if ($key === null) {
            return $this->_get_args;
        }

        return isset($this->_get_args[$key]) ? $this->_xss_clean($this->_get_args[$key], $xss_clean) : null;
    }

    public function options($key = null, $xss_clean = null)
    {
        if ($key === null) {
            return $this->_options_args;
        }

        return isset($this->_options_args[$key]) ? $this->_xss_clean($this->_options_args[$key], $xss_clean) : null;
    }

    public function head($key = null, $xss_clean = null)
    {
        if ($key === null) {
            return $this->_head_args;
        }

        return isset($this->_head_args[$key]) ? $this->_xss_clean($this->_head_args[$key], $xss_clean) : null;
    }

    public function post($key = null, $xss_clean = null)
    {
        if ($key === null) {
            return $this->_post_args;
        }

        return isset($this->_post_args[$key]) ? $this->_xss_clean($this->_post_args[$key], $xss_clean) : null;
    }

    public function put($key = null, $xss_clean = null)
    {
        if ($key === null) {
            return $this->_put_args;
        }

        return isset($this->_put_args[$key]) ? $this->_xss_clean($this->_put_args[$key], $xss_clean) : null;
    }

    public function delete($key = null, $xss_clean = null)
    {
        if ($key === null) {
            return $this->_delete_args;
        }

        return isset($this->_delete_args[$key]) ? $this->_xss_clean($this->_delete_args[$key], $xss_clean) : null;
    }

    public function patch($key = null, $xss_clean = null)
    {
        if ($key === null) {
            return $this->_patch_args;
        }

        return isset($this->_patch_args[$key]) ? $this->_xss_clean($this->_patch_args[$key], $xss_clean) : null;
    }

    public function query($key = null, $xss_clean = null)
    {
        if ($key === null) {
            return $this->_query_args;
        }

        return isset($this->_query_args[$key]) ? $this->_xss_clean($this->_query_args[$key], $xss_clean) : null;
    }

    protected function _parse_get()
    {
        // Merge both the URI segments and query parameters
        $this->_get_args = array_merge($this->_get_args, $this->_query_args);
    }

    protected function _parse_post()
    {
        $this->_post_args = $_POST;

        if ($this->request->format) {
            $this->request->body = $this->input->raw_input_stream;
        }
    }

    protected function _parse_put()
    {
        if ($this->request->format) {
            $this->request->body = $this->input->raw_input_stream;
            if ($this->request->format === 'json') {
                $this->_put_args = json_decode($this->input->raw_input_stream);
            }
        } elseif ($this->input->method() === 'put') {
            // If no file type is provided, then there are probably just arguments
            $this->_put_args = $this->input->input_stream();
        }
    }

    protected function _parse_head()
    {
        // Parse the HEAD variables
        parse_str(parse_url($this->input->server('REQUEST_URI'), PHP_URL_QUERY), $head);

        // Merge both the URI segments and HEAD params
        $this->_head_args = array_merge($this->_head_args, $head);
    }

    protected function _parse_options()
    {
        // Parse the OPTIONS variables
        parse_str(parse_url($this->input->server('REQUEST_URI'), PHP_URL_QUERY), $options);

        // Merge both the URI segments and OPTIONS params
        $this->_options_args = array_merge($this->_options_args, $options);
    }

    protected function _parse_patch()
    {
        // It might be a HTTP body
        if ($this->request->format) {
            $this->request->body = $this->input->raw_input_stream;
        } elseif ($this->input->method() === 'patch') {
            // If no file type is provided, then there are probably just arguments
            $this->_patch_args = $this->input->input_stream();
        }
    }

    protected function _parse_delete()
    {
        // These should exist if a DELETE request
        if ($this->input->method() === 'delete') {
            $this->_delete_args = $this->input->input_stream();
        }
    }

    protected function _parse_query()
    {
        $this->_query_args = $this->input->get();
    }

    protected function _xss_clean($value, $xss_clean)
    {
        is_bool($xss_clean) || $xss_clean = $this->_enable_xss;

        return $xss_clean === true ? $this->security->xss_clean($value) : $value;
    }

    public function get_local_config($config_file = 'rest')
    {
        if (!$this->load->config($config_file, false)) {
            $config = [];
            include __DIR__.'/'.$config_file.'.php';
            foreach ($config as $key => $value) {
                $this->config->set_item($key, $value);
            }
        }
    }

    protected function _detect_lang()
    {
        $lang = $this->input->server('HTTP_ACCEPT_LANGUAGE');
        if ($lang === null) {
            return;
        }

        // It appears more than one language has been sent using a comma delimiter
        if (strpos($lang, ',') !== false) {
            $langs = explode(',', $lang);

            $return_langs = [];
            foreach ($langs as $lang) {
                // Remove weight and trim leading and trailing whitespace
                list($lang) = explode(';', $lang);
                $return_langs[] = trim($lang);
            }

            return $return_langs;
        }

        // Otherwise simply return as a string
        return $lang;
    }

    protected function _check_blacklist_auth()
    {
        $pattern = sprintf('/(?:,\s*|^)\Q%s\E(?=,\s*|$)/m', $this->input->ip_address());
        if (preg_match($pattern, $this->config->item('rest_ip_blacklist'))) {
            $this->response([
                $this->config->item('rest_status_field_name')  => false,
                $this->config->item('rest_message_field_name') => $this->lang->line('text_rest_ip_denied'),
            ], $this->http_status['UNAUTHORIZED']);
        }
    }

    public function response($data = null, $http_code = null, $continue = false)
    {
        //if profiling enabled then print profiling data
        $isProfilingEnabled = $this->config->item('enable_profiling');
        if (!$isProfilingEnabled) {
            ob_start();
            // If the HTTP status is not NULL, then cast as an integer
            if ($http_code !== null) {
                // So as to be safe later on in the process
                $http_code = (int) $http_code;
            }

            // Set the output as NULL by default
            $output = null;

            // If data is NULL and no HTTP status code provided, then display, error and exit
            if ($data === null && $http_code === null) {
                $http_code = $this->HTTP_NOT_FOUND;
            }

            // If data is not NULL and a HTTP status code provided, then continue
            elseif ($data !== null) {
                // If the format method exists, call and return the output in that format
                if (method_exists(Format::class, 'to_'.$this->response->format)) {
                    // CORB protection
                    // First, get the output content.
                    $output = Format::factory($data)->{'to_'.$this->response->format}();

                    // Set the format header
                    // Then, check if the client asked for a callback, and if the output contains this callback :
                    if (isset($this->_get_args['callback']) && $this->response->format == 'json' && preg_match('/^'.$this->_get_args['callback'].'/', $output)) {
                        $this->output->set_content_type($this->_supported_formats['jsonp'], strtolower($this->config->item('charset')));
                    } else {
                        $this->output->set_content_type($this->_supported_formats[$this->response->format], strtolower($this->config->item('charset')));
                    }

                    // An array must be parsed as a string, so as not to cause an array to string error
                    // Json is the most appropriate form for such a data type
                    if ($this->response->format === 'array') {
                        $output = Format::factory($output)->{'to_json'}();
                    }
                } else {
                    // If an array or object, then parse as a json, so as to be a 'string'
                    if (is_array($data) || is_object($data)) {
                        $data = Format::factory($data)->{'to_json'}();
                    }

                    // Format is not supported, so output the raw data as a string
                    $output = $data;
                }
            }

            // If not greater than zero, then set the HTTP status code as 200 by default
            // Though perhaps 500 should be set instead, for the developer not passing a
            // correct HTTP status code
            $http_code > 0 || $http_code = $this->HTTP_OK;

            $this->output->set_status_header($http_code);

            // JC: Log response code only if rest logging enabled
            if ($this->config->item('rest_enable_logging') === true) {
                $this->_log_response_code($http_code);
            }

            // Output the data
            $this->output->set_output($output);

            if ($continue === false) {
                // Display the data and exit execution
                $this->output->_display();
                exit;
            } else {
                if (is_callable('fastcgi_finish_request')) {
                    // Terminates connection and returns response to client on PHP-FPM.
                    $this->output->_display();
                    ob_end_flush();
                    fastcgi_finish_request();
                    ignore_user_abort(true);
                } else {
                    // Legacy compatibility.
                    ob_end_flush();
                }
            }
            ob_end_flush();
        // Otherwise dump the output automatically
        } else {
            echo json_encode($data);
        }
    }

    protected function _log_response_code($http_code)
    {
        if ($this->_insert_id == '') {
            return false;
        }

        $payload['response_code'] = $http_code;

        return $this->rest->db->update(
            $this->config->item('rest_logs_table'), $payload, [
            'id' => $this->_insert_id,
        ]);
    }

    protected function _log_request($authorized = false)
    {
        // Insert the request into the log table
        $is_inserted = $this->rest->db
            ->insert(
                $this->config->item('rest_logs_table'), [
                'uri'        => $this->uri->uri_string(),
                'method'     => $this->request->method,
                'params'     => $this->_args ? ($this->config->item('rest_logs_json_params') === true ? json_encode($this->_args) : serialize($this->_args)) : null,
                'api_key'    => isset($this->rest->key) ? $this->rest->key : '',
                'ip_address' => $this->input->ip_address(),
                'time'       => time(),
                'authorized' => $authorized,
            ]);

        // Get the last insert id to update at a later stage of the request
        $this->_insert_id = $this->rest->db->insert_id();

        return $is_inserted;
    }

    protected function _get_default_output_format()
    {
        $default_format = (string) $this->config->item('rest_default_format');

        return $default_format === '' ? 'json' : $default_format;
    }

    protected function _detect_input_format()
    {
        // Get the CONTENT-TYPE value from the SERVER variable
        $content_type = $this->input->server('CONTENT_TYPE');

        if (empty($content_type) === false) {
            // If a semi-colon exists in the string, then explode by ; and get the value of where
            // the current array pointer resides. This will generally be the first element of the array
            $content_type = (strpos($content_type, ';') !== false ? current(explode(';', $content_type)) : $content_type);

            // Check all formats against the CONTENT-TYPE header
            foreach ($this->_supported_formats as $type => $mime) {
                // $type = format e.g. csv
                // $mime = mime type e.g. application/csv

                // If both the mime types match, then return the format
                if ($content_type === $mime) {
                    return $type;
                }
            }
        }
    }

    protected function _detect_output_format()
    {
        // Concatenate formats to a regex pattern e.g. \.(csv|json|xml)
        $pattern = '/\.('.implode('|', array_keys($this->_supported_formats)).')($|\/)/';
        $matches = [];

        // Check if a file extension is used e.g. http://example.com/api/index.json?param1=param2
        if (preg_match($pattern, $this->uri->uri_string(), $matches)) {
            return $matches[1];
        }

        // Get the format parameter named as 'format'
        if (isset($this->_get_args['format'])) {
            $format = strtolower($this->_get_args['format']);

            if (isset($this->_supported_formats[$format]) === true) {
                return $format;
            }
        }

        // Get the HTTP_ACCEPT server variable
        $http_accept = $this->input->server('HTTP_ACCEPT');

        // Otherwise, check the HTTP_ACCEPT server variable
        if ($this->config->item('rest_ignore_http_accept') === false && $http_accept !== null) {
            // Check all formats against the HTTP_ACCEPT header
            foreach (array_keys($this->_supported_formats) as $format) {
                // Has this format been requested?
                if (strpos($http_accept, $format) !== false) {
                    if ($format !== 'html' && $format !== 'xml') {
                        // If not HTML or XML assume it's correct
                        return $format;
                    } elseif ($format === 'html' && strpos($http_accept, 'xml') === false) {
                        // HTML or XML have shown up as a match
                        // If it is truly HTML, it wont want any XML
                        return $format;
                    } elseif ($format === 'xml' && strpos($http_accept, 'html') === false) {
                        // If it is truly XML, it wont want any HTML
                        return $format;
                    }
                }
            }
        }
        if (empty($this->rest_format) === false) {
            return $this->rest_format;
        }
        return $this->_get_default_output_format();
    }

    public function addMethod($method)
    {
        $default = $this->allowed_http_methods;
        if (is_array($method)) {
            $default = array_merge($default,$method);
        }else{
            array_push($default,$method);
        }
        $this->allowed_http_methods = $default;
    }

    public function deleteMethod($method)
    {
        $default = $this->allowed_http_methods;
        if (!is_array($method)) {
            $method = explode(',', $method);
        }
        $default = \array_diff($default, $method);
        $this->allowed_http_methods = $default;
    }

    public function __destruct()
    {
        if ($this->config->item('rest_enable_logging') === true) {
            $this->_end_rtime = microtime(true);
            $this->_log_access_time();
        }
    }
}