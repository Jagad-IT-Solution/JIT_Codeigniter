# JIT_CodeIgniter - Custome System Core


## Usage PDF

```php
	public function __construct()
	{
		parent::__construct();
		$this->load->library('pdf');
	}

	public function index()
	{
		$data['data'] = "Jagad IT Solutions";
		$this->pdf->setPaper('A4', 'potrait');
    		$this->pdf->filename = "Jagad-IT-Solutions.pdf";
    		$this->pdf->load_pdf('test_pdf', $data); # views/test_pdf.php
	}
```
