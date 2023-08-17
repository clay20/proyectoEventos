<?php
defined('BASEPATH') OR exit('No direct script access allowed');



class Cliente extends CI_Controller {

  public function index()
 {

 		
		$lista2=$this->cliente_model->listaCliente();
		$data['cliente']=$lista2;
		$lista3=$this->cliente_model->listClienteDisabilitados();
		$data['desabilitados']=$lista3;

 		$this->load->view('inc/cabezeraLti');
		$this->load->view('inc/navLti');
		$this->load->view('inc/asidebarLti');
		$this->load->view('admind/cliente/listaCliente',$data);
		$this->load->view('inc/footerLti');
 }
 
	public function agregarCliente()

	{
			
			

			$data['nombre']=$_POST['nombre'];
			$data['primerApellido']=$_POST['primerApellido'];
			$data['segundoApellido']=$_POST['segundoApellido'];
			$data['ci']=$_POST['ci'];
			$data['celular']=$_POST['celular'];
			$data['telefono']=$_POST['telefono'];			

			$this->cliente_model->agregarCliente($data);
     	redirect('cliente/index','refresh');


			}
		 public function modificar()
 		{

 		
			$id=$_POST['idCliente'];
			$lista=$this->cliente_model->obtenerCliente($id);
			$data['empleado']=$lista;

 		$this->load->view('inc/cabezeraLti');
		$this->load->view('inc/navLti');
		$this->load->view('inc/asidebarLti');
		$this->load->view('admind/cliente/modificarV',$data);
		$this->load->view('inc/footerLti');
	}

	public function guardarCambios()
	{
		  $id=$_POST['id'];
			$data['nombre']=$_POST['nombre'];
			$data['primerApellido']=$_POST['primerApellido'];
			$data['segundoApellido']=$_POST['segundoApellido'];
			$data['ci']=$_POST['ci'];
			$data['celular']=$_POST['celular'];
			$data['telefono']=$_POST['telefono'];
			$data['fechaActualizacion']="CURRENT_TIMESTAMP()";

			$this->cliente_model->guardarCambios($data,$id);
     	redirect('cliente/index','refresh');

	}
	public function eliminar()
	{
		$id=$_POST['idCliente'];
		$data['estado']='0';
		$data['fechaActualizacion']="CURRENT_TIMESTAMP()";

		$this->cliente_model->eliminarCliente($id,$data);
     redirect('cliente/index','refresh');
	}
	public function abilitar()
	{
		$id=$_POST['idCliente'];
		$data['estado']='1';
		$data['fechaActualizacion']="CURRENT_TIMESTAMP()";

		$this->cliente_model->eliminarCliente($id,$data);
     redirect('cliente/index','refresh');
	}

}
