<?php
defined('BASEPATH') or exit('No direct script access allowed');

Class Varrest {

    /**
     * This defines the rest format
     * Must be overridden it in a controller so that it is set.
     *
     * @var string|null
     */
    protected $rest_format = null;

    /**
     * Defines the list of method properties such as limit, log and level.
     *
     * @var array
     */
    protected $methods = [];

    /**
     * List of allowed HTTP methods.
     *
     * @var array
     */
    protected $allowed_http_methods = ['get', 'delete', 'post', 'put', 'options', 'patch', 'head'];

    /**
     * Contains details about the request
     * Fields: body, format, method, ssl
     * Note: This is a dynamic object (stdClass).
     *
     * @var object
     */
    protected $request = null;

    /**
     * Contains details about the response
     * Fields: format, lang
     * Note: This is a dynamic object (stdClass).
     *
     * @var object
     */
    protected $response = null;

    /**
     * Contains details about the REST API
     * Fields: db, ignore_limits, key, level, user_id
     * Note: This is a dynamic object (stdClass).
     *
     * @var object
     */
    protected $rest = null;

    /**
     * The arguments for the GET request method.
     *
     * @var array
     */
    protected $_get_args = [];

    /**
     * The arguments for the POST request method.
     *
     * @var array
     */
    protected $_post_args = [];

    /**
     * The arguments for the PUT request method.
     *
     * @var array
     */
    protected $_put_args = [];

    /**
     * The arguments for the DELETE request method.
     *
     * @var array
     */
    protected $_delete_args = [];

    /**
     * The arguments for the PATCH request method.
     *
     * @var array
     */
    protected $_patch_args = [];

    /**
     * The arguments for the HEAD request method.
     *
     * @var array
     */
    protected $_head_args = [];

    /**
     * The arguments for the OPTIONS request method.
     *
     * @var array
     */
    protected $_options_args = [];

    /**
     * The arguments for the query parameters.
     *
     * @var array
     */
    protected $_query_args = [];

    /**
     * The arguments from GET, POST, PUT, DELETE, PATCH, HEAD and OPTIONS request methods combined.
     *
     * @var array
     */
    protected $_args = [];

    /**
     * The insert_id of the log entry (if we have one).
     *
     * @var string
     */
    protected $_insert_id = '';

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

    private $is_valid_request = true;

    public $http_status;

    /**
     * Common HTTP status codes and their respective description.
     *
     * @link http://www.restapitutorial.com/httpstatuscodes.html
     */
    // const HTTP_OK = 200;
    // const HTTP_CREATED = 201;
    // const HTTP_NOT_MODIFIED = 304;
    // const HTTP_BAD_REQUEST = 400;
    // const HTTP_UNAUTHORIZED = 401;
    // const HTTP_FORBIDDEN = 403;
    // const HTTP_NOT_FOUND = 404;
    // const HTTP_NOT_ACCEPTABLE = 406;
    // const HTTP_INTERNAL_ERROR = 500;

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
     * @var Format
     */
    private $format;

    /**
     * @var bool
     */
    protected $auth_override;

    /**
     * Extend this function to apply additional checking early on in the process.
     *
     * @return void
     */
    protected function early_checks()
    {
    }
}