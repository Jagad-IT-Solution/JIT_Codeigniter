<?php
defined('BASEPATH') OR exit('No direct script access allowed');
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\IOFactory;


class CI_Excel
{
	protected $ci;
	protected $writer;

	public $spreadsheet;
	public $sheet;
	public $worksheet;
	public $file_name = 'jit_excel';
	public $format_file = 'xlsx';
	public $dir = './';

	public function __construct($config = [])
	{
        $this->ci =& get_instance();

        $this->spreadsheet = new Spreadsheet();

        $this->spreadsheet->setActiveSheetIndex(0);

        $this->sheet = $this->spreadsheet->getActiveSheet();

        $this->worksheet = $this->spreadsheet->getActiveSheet();

        $this->filename = $this->file_name.'.'.$this->format_file;


        log_message('info', 'Excel Class Initialized');
	}

	public function setCell($key,$value)
	{
		$this->sheet->setCellValue($key, $value);
		
	}

	public function Color($key, $borders = 'C0C0C0', $fill = '808080')
	{
		$styleArray = [
            'borders' => [
                'outline' => [
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                    'color' => ['rgb' => 'C0C0C0'],
                ],
            ],
            'fill' => [
                'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID,
                'startColor' => ['rgb' => '808080']
            ]
        ];
		$this->worksheet->getStyle($key)->applyFromArray($styleArray);
	}


	public function AutoSize($start,$end)
	{
		foreach(range($start,$end) as $columnID) {
		   $this->worksheet->getColumnDimension($columnID)
		        ->setAutoSize(true);
		}
	}

	public function setFormula($key, $value)
	{
		$this->spreadsheet->addNamedFormula( new \PhpOffice\PhpSpreadsheet\NamedFormula($key, $this->worksheet, $value));
	}

	public function Save()
	{
		$this->writer = new Xlsx($this->spreadsheet);
		$this->writer->save($this->filename);
		return $this;
	}

	public function Read()
	{
		$inputFileType = 'Xlsx';
		$inputFileName = './'.$this->filename;
		return IOFactory::createReader($inputFileType);
		 
	}

	public function Download()
	{
		header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		header('Content-Disposition: attachment;filename="myfile.xlsx"');
		header('Content-Disposition: attachment;filename="'.$this->filename.'"');
		header('Cache-Control: max-age=0');
		$this->writer = \PhpOffice\PhpSpreadsheet\IOFactory::createWriter($this->spreadsheet, 'Xlsx');
		$this->writer->save('php://output');
		return $this;
	}	

}

/* End of file Excel.php */
/* Location: .//F/GITHUB/JagadIT/JIT_Codeigniter/system/libraries/Excel.php */
