<?php
defined('BASEPATH') OR exit('No direct script access allowed');



class Empleado extends CI_Controller {

  public function index()
 {

 		$lista=$this->empleado_model->cargo();
		$data['cargo']=$lista;
		$lista2=$this->empleado_model->listEmpleado();
		$data['empleado']=$lista2;
		$lista3=$this->empleado_model->listEmpleadoDisabilitadosdb();
		$data['desabilitados']=$lista3;

 		$this->load->view('inc/cabezeraLti');
		$this->load->view('inc/navLti');
		$this->load->view('inc/asidebarLti');
		$this->load->view('admind/empleado/listaEmpleado',$data);
		$this->load->view('inc/footerLti');
 }
 

 public function listaEmpleados()
 {
 			$lista=$this->empleado_model->listEmpleado();
			$listaArray = $lista->result_array();
	// $listaArray = $lista->row_array();
			echo json_encode($listaArray);
 }

 public function usuarioDatosBuscar()
 {
 	$valor=$_POST['valor'];
 		$lista=$this->empleado_model->buscarEmpleadoBud($valor);
			$listaArray = $lista->result_array();
	// $listaArray = $lista->row_array();
			echo json_encode($listaArray);

 	}
  public function datoEmpleado()
 {
			$id=$_POST['id'];

 			$lista=$this->empleado_model->datoEmpleadodb($id);
			// $listaArray = $lista->result_array();
			$listaArray = $lista->row_array();
			echo json_encode($listaArray);
 }
 


 public function listaEmpleadosDesabilitados() //lista de usuario desabilitados
 {
 	$lista=$this->empleado_model->listEmpleadoDisabilitadosdb();
			$listaArray = $lista->result_array();
	// $listaArray = $lista->row_array();
			echo json_encode($listaArray);
 }
	public function agregarEmpleado()

	{
			

			$data1['nombre']=$_POST['nombre'];
			$data1['primerApellido']=$_POST['primerApellido'];
			$data1['segundoApellido']=$_POST['segundoApellido'];
			$data1['ci']=$_POST['ci'];
			$data1['fechaNacimiento']=$_POST['fechaNacimiento'];
			$data1['sexo']=$_POST['genero'];
			$data1['idUsuario']=$this->session->userdata('idUsuario');
			$data2['salario']=$_POST['salario'];
			$data2['telefono']=$_POST['telefono'];
			$data2['fechaInicio']=$_POST['fechaInicio'];
			$data2['idCargo']=$_POST['cargo'];
			$data2['idUsuario']=$this->session->userdata('idUsuario');
			

		
			if($this->empleado_model->agregarEmpleadodb($data1,$data2)){
				$url=base_url();
				echo json_encode(array('msg'=>'guardado',
																'url'=>$url.'index.php/empleado/index'));
			}
			else
			{
				echo json_encode(array('msg'=>'fallo en registro'));
			}
     	
		
			}
		

	public function empleadoModificar()
	{
		  $id=$_POST['id'];
			$data1['nombre']=$_POST['nombre'];
			$data1['primerApellido']=$_POST['primerApellido'];
			$data1['segundoApellido']=$_POST['segundoApellido'];
			$data1['ci']=$_POST['ci'];
			$data1['fechaNacimiento']=$_POST['fechaNacimiento'];
			$data1['sexo']=$_POST['genero'];
			$data1['idUsuario']=$this->session->userdata('idUsuario');


			$data2['salario']=$_POST['salario'];
			$data2['telefono']=$_POST['telefono'];
			$data2['fechaInicio']=$_POST['fechaInicio'];
			$data2['idCargo']=$_POST['cargo'];
			$data2['idUsuario']=$this->session->userdata('idUsuario');
			$ban=$this->empleado_model->guardarCambios($data1,$data2,$id);
			if($ban){
				$url=base_url();
				echo json_encode(array('msg'=>'modificion correcta',
																'uri'=>1	,
																'url'=>$url.'index.php/empleado/index'));

			}
			else{
				echo json_encode(array('msg'=>'erro en la modificacion'));

			}

     

	}
	public function eliminarAbilitar()
	{
		$id=$_POST['id'];
		$data['estado']=$_POST['estado'];
		$this->empleado_model->eliminarEmpleado($id,$data);
     redirect('empleado/index','refresh');
	}


}
