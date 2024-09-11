<?php

namespace Model;

defined('ROOTPATH') or exit('Access Denied!');

include '../vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\IOFactory;

/**
 * Excel class
 */

class Excel
{

	public $errors = [];

	public function read_data($upload, $data)
	{
		$file = $upload['import_excel'];
		$filePath = $file['tmp_name'];
		$fileExtension = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));

		/** Determine the file reader based on the file extension **/
		$reader = null;
		switch ($fileExtension) {
			case 'csv':
				$reader = \PhpOffice\PhpSpreadsheet\IOFactory::createReader('Csv');
				break;
			case 'xls':
				$reader = \PhpOffice\PhpSpreadsheet\IOFactory::createReader('Xls');
				break;
			case 'xlsx':
				$reader = \PhpOffice\PhpSpreadsheet\IOFactory::createReader('Xlsx');
				break;
			default:
				message("Unsupported file format.");
				redirect('admin/users');
				return;
		}

		/** Load the spreadsheet **/
		$spreadsheet = $reader->load($filePath);
		$worksheet = $spreadsheet->getActiveSheet();
		$rows = $worksheet->toArray();

		return $rows;

	}

}
