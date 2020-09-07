# JIT_CodeIgniter - Custome System Core


## Usage REST_API

```php
	public function __construct()
	{
		parent::__construct();
		$this->allowed_http_methods = ['GET']; #Default ['GET',POST]
	}

	public function index()
	{
		$this->response([
		'hello' => ':)'
		]);
	}
```


## Usage PDF

```php
	public function __construct()
	{
		parent::__construct();
		$this->load->library('pdf');
		#OR $autoload['libraries'] = array('pdf'); in config/autoload.php
	}

	public function index()
	{
		$data['data'] = "Jagad IT Solutions";
		$this->pdf->setPaper('A4', 'potrait');
    		$this->pdf->filename = "Jagad-IT-Solutions.pdf";
    		$this->pdf->load_pdf('test_pdf', $data); # views/test_pdf.php
	}
```
