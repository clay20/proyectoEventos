<?php 

defined('BASEPATH') OR exit('No direct script access allowed');


class Reportes extends CI_Controller {


		function index()
		{
			
		    $this->load->view('inc/cabezeraLti');
		$this->load->view('inc/navLti');
		$this->load->view('inc/asidebarLti');
		$this->load->view('admind/reportes/reportesV');
		$this->load->view('inc/footerLti');
 }
		
  public function ingresoEnfechas()
  {
  	 
	$fechaIncio=$_POST['fechaInicio'];
	$fechaFin=$_POST['fechaFin'];

	$lista=$this->reporte_model->listaServiciosdb($fechaIncio,$fechaFin);
	$listaArray = $lista->result_array();
	// $listaArray = $lista->row_array();
	echo json_encode($listaArray);
	// echo $fechaIncio;
  }




}
?>