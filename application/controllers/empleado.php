<?php
defined('BASEPATH') OR exit('No direct script access allowed');



class Empleado extends CI_Controller {

  public function index()
 {

 		$lista=$this->empleado_model->cargo();
		$data['cargo']=$lista;
		$lista2=$this->empleado_model->listEmpleado();
		$data['empleado']=$lista2;
		$lista3=$this->empleado_model->listEmpleadoDisabilitados();
		$data['desabilitados']=$lista3;

 		$this->load->view('inc/cabezeraLti');
		$this->load->view('inc/navLti');
		$this->load->view('inc/asidebarLti');
		$this->load->view('admind/empleado/listaEmpleado',$data);
		$this->load->view('inc/footerLti');
 }
 
	public function agregarEmpleado()

	{
			if($this->session->userdata('rolUsuario') =='admind' )
		{
			

			$data['nombre']=$_POST['nombre'];
			$data['primerApellido']=$_POST['primerApellido'];
			$data['segundoApellido']=$_POST['segundoApellido'];
			$data['ci']=$_POST['ci'];
			$data['fechaNacimiento']=$_POST['fechaNacimiento'];
			$data['sexo']=$_POST['genero'];
			$data['salario']=$_POST['salario'];
			$data['celular']=$_POST['celular'];
			$data['telefono']=$_POST['telefono'];
			$data['idCargo']=$_POST['cargo'];


			

			$this->empleado_model->agregarEmpleado($data);
     	redirect('empleado/index','refresh');


	   		
		}else
		{
			$this->load->view('inc/cabezeraLti');
			
			$this->load->view('error/404');

			$this->load->view('inc/footerLti');
		}
			}
		 public function modificar()
 		{

 		$lista=$this->empleado_model->cargo();
		$data['cargo']=$lista;
		$id=$_POST['idEmpleado'];
		$lista2=$this->empleado_model->obtenerEmpleado($id);
		$data['empleado']=$lista2;

 		$this->load->view('inc/cabezeraLti');
		$this->load->view('inc/navLti');
		$this->load->view('inc/asidebarLti');
		$this->load->view('admind/empleado/modificarV',$data);
		$this->load->view('inc/footerLti');
	}

	public function guardarCambios()
	{
		  $id=$_POST['id'];
			$data['nombre']=$_POST['nombre'];
			$data['primerApellido']=$_POST['primerApellido'];
			$data['segundoApellido']=$_POST['segundoApellido'];
			$data['ci']=$_POST['ci'];
			$data['fechaNacimiento']=$_POST['fechaNacimiento'];
			$data['sexo']=$_POST['genero'];
			$data['salario']=$_POST['salario'];
			$data['celular']=$_POST['celular'];
			$data['telefono']=$_POST['telefono'];
			$data['idCargo']=$_POST['cargo'];
			$data['fechaActualizacion']="CURRENT_TIMESTAMP()";

			$this->empleado_model->guardarCambios($data,$id);
     	redirect('empleado/index','refresh');

	}
	public function eliminar()
	{
		$id=$_POST['idEmpleado'];
		$data['estado']='0';
		$data['fechaActualizacion']="CURRENT_TIMESTAMP()";

		$this->empleado_model->eliminarEmpleado($id,$data);
     redirect('empleado/index','refresh');
	}
	public function abilitar()
	{
		$id=$_POST['idEmpleado'];
		$data['estado']='1';
		$data['fechaActualizacion']="CURRENT_TIMESTAMP()";

		$this->empleado_model->eliminarEmpleado($id,$data);
     redirect('empleado/index','refresh');
	}

}
