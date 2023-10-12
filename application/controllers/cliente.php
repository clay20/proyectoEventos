<?php
defined('BASEPATH') OR exit('No direct script access allowed');



class Cliente extends CI_Controller {

  public function index()
 {

 		$this->load->view('inc/cabezeraLti');
		$this->load->view('inc/navLti');
		$this->load->view('inc/asidebarLti');
		$this->load->view('admind/cliente/listaCliente');
		$this->load->view('inc/footerLti');
 }
 

public function listacliente()
{
	 $lista=$this->cliente_model->listaClientedb(1);
 	  	$listaArray = $lista->result_array();
	// $listaArray = $lista->row_array();
			echo json_encode($listaArray);
}




	public function agregarCliente() //agreagr ciente desde gestion de clientes

	{
			
			

			$data['nombre']=letraCapital(trim($_POST['nombre']));
			$data['primerApellido']=letraCapital(trim($_POST['primerApellido']));
			$data['segundoApellido']=letraCapital(trim($_POST['segundoApellido']));
			$data['ci']=$_POST['ci'];
			$data['celular']=$_POST['celular'];
			$data['telefono']=$_POST['telefono'];	
			$data['idUsuario']=$this->session->userdata('idUsuario');			


			$ban= $this->cliente_model->nuevocliente($data);

			if($ban){

			echo json_encode(array('uri'=>1));
		}else
		{
			echo json_encode(array('uri'=>0));

		}

		}
		public function nuevoCliente()//agregar cliente desde reservas

	{
			
			$data['nombre']=letraCapital(trim($_POST['nombre']));
			$data['primerApellido']=letraCapital(trim($_POST['primerApellido']));
			$data['segundoApellido']=letraCapital(trim($_POST['segundoApellido']));
			$data['ci']=$_POST['ci'];
			$data['celular']=$_POST['celular'];
			$data['telefono']=$_POST['telefono'];			

			$id= $this->cliente_model->nuevocliente($data);
			if($id!=0){


			$lista=$this->cliente_model->obtenerCliente($id);
			// $listaArray = $lista->result_array();
			$listaArray = $lista->row_array();
			echo json_encode($listaArray);
							
			}else
			{
						echo json_encode(array('id'=>0));	
			}

		}

public function datoCliente()//obenet los datos cliente a modificar su datos perosnales
{
	$id=$_POST['id'];
	$lista=$this->cliente_model->datoClientedb($id);
	$listaArray = $lista->row_array();
			echo json_encode($listaArray);
	
}



	public function guardarCambios()
	{
		  $id=$_POST['id'];
			$data['nombre']=letraCapital(trim($_POST['nombre']));
			$data['primerApellido']=letraCapital(trim($_POST['primerApellido']));
			$data['segundoApellido']=letraCapital(trim($_POST['segundoApellido']));
			$data['ci']=$_POST['ci'];
			$data['celular']=$_POST['celular'];
			$data['telefono']=$_POST['telefono'];
			$data['fechaActualizacion']="CURRENT_TIMESTAMP()";

			$fila =$this->cliente_model->guardarCambiosdb($data,$id);
    
    if($fila>0)
    {
    	echo json_encode(array('uri'=>1,'row'=>$fila));
    }else
    {
    	echo json_encode(array('uri'=>0,'row'=>0));

    }
	}
	public function eliminar()
	{
		$id=$_POST['id'];
		$data['estado']=$_POST['estado'];
		$data['fechaActualizacion']="CURRENT_TIMESTAMP()";

	 if($this->cliente_model->eliminarCliente($id,$data))
	 {
	 		echo json_encode(array('uri'=>1));
	 }
	 else
	 {
	 		echo json_encode(array('uri'=>0));

	 }
   
	}

	public function buscarClientedatos()
	{
	  	 	$valor=$_POST['valor'];
 				$lista=$this->cliente_model->buscarClientedb($valor);
				$listaArray = $lista->result_array();
	// $listaArray = $lista->row_array();
				echo json_encode($listaArray);
	
	}



}
