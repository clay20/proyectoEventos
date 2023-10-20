<?php
defined('BASEPATH') OR exit('No direct script access allowed');



class Reservas extends CI_Controller {

  public function index()
 {
 		$this->load->view('inc/cabezeraLti');
		$this->load->view('inc/navLti');
		$this->load->view('inc/asidebarLti');
		$this->load->view('admind/reservas/reservasV');
		$this->load->view('inc/footerLti');
 }
 public function agregar()
 {

 	//datao para registra en reserva
 	 	$dias=$_POST['dias'];
   
 	$data['cantidadPersonas']=200;//hojo
 	$data['fechaInicio']=$_POST['fechaInici'];
	$data['fechaFin']=$_POST['fechaFin'];
	$data['plazoConfirmacion']=2;//ojo


 $nombreEvento=$_POST['nombreEvento'];//estoo necesitamos quse del id
 	$data['adelantoReserva']=$_POST['adelandto'];
 	$data['saldo']=$_POST['saldoPagar'];
 	$data['total']=$_POST['totalPagar'];
 $data['idUsuario']=$this->session->userdata('idUsuario');
 $data['idTipoEvento']=1;
 $data['idCliente']=$_POST['idCliente'];




  $totalSinDescuento=$_POST['totalSinDescuento'];// ojo
 	$totalDescuento=$_POST['totalDescuento'];   //ojo


 	//unidimension

  $horaInicios=$_POST["horaInicios"];
  $horaFines=$_POST["horaFines"];
  $duracion=$_POST["duraciones"];
  $invitado=$_POST["invitados"];
  $fechas=$_POST["fechas"];
 	$ids=$_POST['ids'];
 	$pu =$_POST['pu'];
//bidiminesionales
 	$cants=$_POST['cantidades'];
 	$precios=$_POST['importes'];
 	$chebox=$_POST['cbxDia'];
 	$des=$_POST['descuento'];
  


 // print_r($dias."---dias: ".count($ids));
 	  
  $db= $this->reserva_model->agregarReservadb($data,$ids,$horaInicios,$horaFines,$duracion,$invitado,$fechas,$cants,$precios,$chebox,$des,$pu,$dias);
 	 echo json_encode(array('msg'=>$db));
  
 }

 function listaFechasReservar()
 {
 	$lista=$this->reserva_model->reservasdb();

	$listaArray = $lista->result_array();
	// $listaArray = $lista->row_array();
	echo json_encode($listaArray);
	
 }
 

}

