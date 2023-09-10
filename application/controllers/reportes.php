<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

require FCPATH.'vendor/autoload.php';
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
		//las tres linias superio solo para el uso de reporte en excel    

class Reportes extends CI_Controller {

	public function reporteExcel()
 	{
 		// $lista=$this->estudiante_model->listaestudiantes();
		//  $lista=$lista->result();

		 header('Content-Type: application/vnd.ms-excel');
		 header('Content-Disposition: attachment;filename="estudiantes.xlsx"');
		 $spreadsheet = new Spreadsheet();
		 $sheet = $spreadsheet->getActiveSheet();
		 $sheet->setCellValue('A1', 'ID');
		 $sheet->setCellValue('B1', 'Nombre');
		 $sheet->setCellValue('C1', 'Primer apellido');
		 $sheet->setCellValue('D1', 'Segundo apellido');
		 $sheet->setCellValue('E1', 'nota');
		 $sn=2;
		 // foreach ($lista as $row) {
		 // $sheet->setCellValue('A'.$sn,$row->idEstudiante);
		 // $sheet->setCellValue('B'.$sn,$row->nombre);
		 // $sheet->setCellValue('C'.$sn,$row->primerApellido);
		 // $sheet->setCellValue('D'.$sn,$row->segundoApellido);
		 // $sheet->setCellValue('E'.$sn,$row->nota);
		 // $sn++;


		 $writer = new Xlsx($spreadsheet);
 		$writer->save("hola.xlsx");			
		
	}


}

 ?>