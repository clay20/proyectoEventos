<?php
defined('BASEPATH') OR exit('No direct script access allowed');



class Proveedor extends CI_Controller {

  public function index()
 {
 		$this->load->view('inc/cabezeraLti');
		$this->load->view('inc/navLti');
		$this->load->view('inc/asidebarLti');
		$this->load->view('admind/proveedor/listaProveedor');
		$this->load->view('inc/footerLti');
 }
 
 public function listaProveedor()
 {
 	  $lista=$this->proveedor_model->listaProveedordb(1);
 	  	$listaArray = $lista->result_array();
	// $listaArray = $lista->row_array();
			echo json_encode($listaArray);
 }
 public function datoProveedor()
 {
 			$id=$_POST['id'];
 			 $lista=$this->proveedor_model->datoProveedordb($id);
 	  	// $listaArray = $lista->result_array();
		$listaArray = $lista->row_array();
			echo json_encode($listaArray);
 }



 public function agregarProveedor()
 {
 	  
		if($this->session->userdata('rolUsuario') =='admin'){
				$data['denominacion']=$_POST['denominacion'];
				$data['celular']=$_POST['telefono'];
				$data['direccion']=$_POST['direccion'];
				$data['latitud']=$_POST['latitud'];
				$data['longitud']=$_POST['longitud'];
				$data['idUsuario']=$this->session->userdata('idUsuario');
			
				$ban=$this->proveedor_model->agregarProveedordb($data);
				if ($ban>0) {
					$url=base_url();
					echo json_encode(array('url'=>$url.'index.php/proveedor/index',
																	'msg'=>'Se Registro exito',
																	'uri'=>1));
				}
				else
					{
							echo json_encode(array('msg'=>'No se registro ningun dato'	));
					}
	}
		else
		{
					echo json_encode(array('msg'=>'No no tienes privilegios para agregar'	));
		}
 }
  public function proveedorModificar()
 {
 	  
		if($this->session->userdata('rolUsuario') =='admin'){

				$id=$_POST['idM'];
				$data['denominacion']=$_POST['denominacionM'];
				$data['direccion']=$_POST['direccionM'];
				$data['celular']=$_POST['telefonoM'];
				$data['latitud']=$_POST['latitudM'];
				$data['longitud']=$_POST['longitudM'];
				// $data['idUsuario']=$this->session->userdata('idUsuario');
			
				$nro=$this->proveedor_model->modificarProveedordb($data,$id);
				if ($nro>0) {
					
					echo json_encode(array('msg'=>'Modificaion con Exito',
																		'uri'=>1,
																			'campos'=>$nro));

				}

		else
		{
					echo json_encode(array('msg'=>'Ningun Dato Modificado'));

		}
	}
		else
		{
					echo json_encode(array('msg'=>'No tiens privilegios'));

		}
 }
 
 	public function eliminarAbilitar()
 	{
 		  $id=$_POST['id'];
 		  $estado=$_POST['estado'];
 		  	$nro=$this->proveedor_model->eliminarAbilitardb($id,$estado);
 	}
 	public function listaProveedoresDesabilitados()
 	{
 		$lista=$this->proveedor_model->listaProveedordb(0);
 	  	$listaArray = $lista->result_array();
	// $listaArray = $lista->row_array();
			echo json_encode($listaArray);
 	}
}
