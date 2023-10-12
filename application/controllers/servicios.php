<?php
defined('BASEPATH') OR exit('No direct script access allowed');



class Servicios extends CI_Controller {

  public function index()
 {
 		$this->load->view('inc/cabezeraLti');
		$this->load->view('inc/navLti');
		$this->load->view('inc/asidebarLti');
		$this->load->view('admind/servicio/listaServicio');
		$this->load->view('inc/footerLti');
 }
 public function listaServicios()
 {
 		$estado=1;
 		$lista=$this->servicios_model->listaServiciosdb($estado);
 		$listaArray = $lista->result_array();
	// $listaArray = $lista->row_array();
		echo json_encode($listaArray);
 
 }
  public function agregarServicio()
 {
 			$data['nombre']=$_POST['nombreServicio'];
 			$data['descriccion']=$_POST['descripcion'];
 			$data['unidadMedida']=$_POST['medida'];
 			$data['precio']=$_POST['precio'];
 			$data['maximo']=$_POST['maximo'];

 			$data['idUsuario']=$this->session->userdata('idUsuario');

						
 		if($this->servicios_model->agregarServiciosdb($data)>0){

						echo json_encode(array('msg'=>'Ok',
																			
																				'uri'=>1));	

 		}
 		else
 		{
						echo json_encode(array('msg'=>'fallo',
																			'uri'=>1));	

 		}
 		
			
 
 }
 public function eliminar()
 {
 	    		
 			$id=$_POST['id'];
 			$data['estado']=$_POST['estado'];
 			$row=$this->servicios_model->eliminardb($id,$data);
 		if($row>0){

						echo json_encode(array('msg'=>'Ok'));	
 		}
 		else
 		{
						echo json_encode(array('msg'=>'fallo'.$row.$id.$data));	

 		}
 }

 public function datoServicio()
 {
 			
 		$estado=1;
 		$id=$_POST['id'];
 		$lista=$this->servicios_model->datoServiciosdb($estado,$id);
 		$listaArray = $lista->result_array();
	// $listaArray = $lista->row_array();
		echo json_encode($listaArray);

 }

}