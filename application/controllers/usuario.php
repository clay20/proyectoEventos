<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario extends CI_Controller {
 
    
//manejo de secciones con mvc
	 function login()
	 {
//nivel de seguridad esto se puede aplicar en todo los campo acceso a la vistas
	        
	    if($this->session->userdata('login'))
		{
			redirect('usuario/panel','refresh');
		}
		 else
		 {
		 	$data['msg']=$this->uri->segment(3);
		 	$this->load->view('inc/default/header');
		 	$this->load->view('inc/default/menu');
		 	$this->load->view('login',$data);
			$this->load->view('inc/default/footer');
		}

	 }


	function validarUsuario()
	{

		$login=$_POST['usuario'];
		$password=md5($_POST['password']);
		$consulta=$this->usuario_model->validarLogin($login,$password);

		if($consulta->num_rows()>0)
		{
			foreach ($consulta->result() as $row) {
				$this->session->set_userdata('idUsuario',$row->id);
				$this->session->set_userdata('nombreUsuario',$row->nombreUsuario);
				$this->session->set_userdata('rolUsuario',$row->rol);
				redirect('usuario/panel','refresh');
			}
		}
		else
		{
			redirect('usuario/login/1','refresh');
		}	
	}
    
 

	function panel()
	{
		if($this->session->userdata('rolUsuario') =='admind')
		{
	   		redirect('usuario/homeAdmind','refresh');
	   		//session de usaurio admin
		}
		elseif($this->session->userdata('rolUsuario') =='invitado')
		{
			//session de usaurio usuario invitado
			$lista=$this->usuario_model->listarUsuarios();
			$data['infoUsuario']=$lista;

			$this->load->view('inc/cabezeraLti');
			$this->load->view('inc/navLti');
			$this->load->view('inc/asidebarLti');
			$this->load->view('usuariovLti',$data);
			$this->load->view('inc/footerLti');
		}
		elseif($this->session->userdata('rolUsuario') =='cliente')
		{
			//session de usaurio usuario cliente

			$this->load->view('inc/cabezeraLti');
			$this->load->view('inc/navLti');
			$this->load->view('clienteV');
			$this->load->view('inc/asidebarLti');
			
			$this->load->view('inc/footerLti');
		}
		else
		{
			redirect('usuario/login/2','refresh');
		}

	}
	public function logout()
	{
		$this->session->sess_destroy();
		redirect('base/index/3','refresh');
	}
 
public function registrarUsuario()///registro de se lado cliente
{
		$usuario=$_POST['usuario'];
		$email=$_POST['email'];

		$password=md5($_POST['password']);
		$password=md5($_POST['passwordRepeat']);

		$consulta=$this->usuario_model->validarLogin($usuario,$email);//crearu un FUNCTION EN MODELOuSURIO

		if($consulta->num_rows()>0)
		{
			foreach ($consulta->result() as $row) {
				$this->session->set_userdata('idUsuario',$row->id);
				$this->session->set_userdata('nombreUsuario',$row->nombreUsuario);
				$this->session->set_userdata('rolUsuario',$row->rol);
				redirect('usuario/panel','refresh');
			}
		}
		else
		{
			redirect('usuario/login/1','refresh');
		}	
}
public function agregarView()//metod donde agreaga usuario admini o usuario invitado
{
			

		if($this->session->userdata('rolUsuario') =='admind')
		{
			$lista=$this->usuario_model->tipoRol();
			$data['rol']=$lista;

	   		$this->load->view('inc/cabezeraLti');
			$this->load->view('inc/navLti');
			$this->load->view('inc/asidebarLti');
			// $this->load->view('usuariovLti',$data);
			$this->load->view('admind/usuario/agregarUsuarioV',$data);

			$this->load->view('inc/footerLti');
		}else
		{
			$this->load->view('inc/cabezeraLti');
			
			$this->load->view('error/404');

			$this->load->view('inc/footerLti');
		}
}
public function agregarUsuario()//metod donde agreaga usuario admini o usuario invitado
{
			

		if($this->session->userdata('rolUsuario') =='admind')
		{
			

			$data1['nombre']=$_POST['nombre'];
			$data1['primerApellido']=$_POST['primerApellido'];
			$data1['segundoApellido']=$_POST['segundoApellido'];
			$data1['ci']=$_POST['ci'];
			$data1['fechaNacimiento']=$_POST['fechaNacimiento'];
			$data1['sexo']=$_POST['genero'];
			$data1['celular']=$_POST['celular'];
			$data1['telefono']=$_POST['telefono'];

			$data2['nombreUsuario']='falta';
			$data2['password']='ci';
			$data2['email']=$_POST['email'];
			$data2['idTipoUsuario']=$_POST['rol'];	
			

			$this->usuario_model->agregarUsuario($data1,$data2);
     		redirect('usuario/agregarView','refresh');


	   		
		}else
		{
			$this->load->view('inc/cabezeraLti');
			
			$this->load->view('error/404');

			$this->load->view('inc/footerLti');
		}
}



public function datosUsuario()//lista los dao s de usaurio administado funcio soo vista falta pasar losd atos
{
			// $lista=$this->usuario_model->listarUsuarios();
			// $data['infoUsuario']=$lista;

			$this->load->view('inc/cabezeraLti');
			$this->load->view('inc/navLti');
			$this->load->view('inc/asidebarLti');
			// $this->load->view('usuariovLti',$data);
			$this->load->view('admind/perfil/datosUsuario');

			$this->load->view('inc/footerLti');
}


public function calendario()
{
			$this->load->view('inc/cabezeraLti');
			$this->load->view('inc/navLti');
			$this->load->view('inc/asidebarLti');
			// $this->load->view('usuariovLti',$data);
			$this->load->view('admind/calendario/calendario');

			$this->load->view('inc/footerLti');
}

public function calAnual()
{
			$this->load->view('inc/cabezeraLti');
			$this->load->view('inc/navLti');
			$this->load->view('inc/asidebarLti');
			// $this->load->view('usuariovLti',$data);
			$this->load->view('admind/calendario/anual');

			$this->load->view('inc/footerLti');
}



	// function index()
	// {
  

	// 	/*$query =$this->db->get('usuarios');
	// 	$exeCon=$query->result();
	// 	print_r($exeCon);
	// 	prueba deconexion*/

	// 	$lista=$this->usuario_model->listarUsuarios();
	// 	$data['infoUsuario']=$lista;


	// 	$this->load->view('inc/cabezera');
	// 	$this->load->view('inc/menu');
	// 	$this->load->view('usuarioV',$data);
	// 	$this->load->view('inc/pie');
		
	// }
	
	function index()
	{
  

		$lista=$this->usuario_model->listarUsuarios();
		$data['infoUsuario']=$lista;



		$this->load->view('inc/default/header');
		$this->load->view('inc/default/menu');
		$this->load->view('default/usuario',$data);
		$this->load->view('inc/default/footer');
		
	}
	




	function agregar()
	{
		$this->load->view('inc/cabezera');
		$this->load->view('inc/menu');
		$this->load->view('agregarV');
		$this->load->view('inc/pie');
	}
	
	function agregardb()
	{
     $data['nombre']=$_POST['nombre'];
     $data['primerApellido']=$_POST['apellido1'];
     $data['segundoApellido']=$_POST['apellido2'];
     $data['ci']=$_POST['ci'];
     $data['fechaNacimiento']='1996-03-06';
     $data['sexo']=$_POST['sexo'];
     $data['login']=$_POST['nombre'];
     $data['claveUsuario']='1';
     $data['rolUsuario']=$_POST['rol'];

    $this->usuario_model->agregarUsuario($data);
     redirect('usuario/index','refresh');
	}
	function buscardb()
	{
     $id=$_POST['id'];
    $data['usuarioEncontrado']= $this->usuario_model->buscarIdDB($id);

		$this->load->view('inc/cabezera');
		$this->load->view('inc/menu');
		$this->load->view('modificarV',$data);
		$this->load->view('inc/pie');

 	}

 	function modificardb()
 	{
 	$id=$_POST['id'];	
 	 $data['nombre']=$_POST['nombre'];
     $data['primerApellido']=$_POST['apellido1'];
     $data['segundoApellido']=$_POST['apellido2'];
     $data['ci']=$_POST['ci'];
     $data['fechaNacimiento']='1996-03-06';
     $data['sexo']=$_POST['sexo'];
     $data['login']=$_POST['nombre'];
     $data['claveUsuario']='1';
     $data['rolUsuario']=$_POST['rol'];

	$this->usuario_model->modificarUsuariodb($id,$data);
     redirect('usuario/index','refresh');


 	}

 	function eliminar()
 	{
 		$id=$_POST['id'];	
 		$this->usuario_model->eliminarUsuariodb($id);
     redirect('usuario/index','refresh');
 	}

	 function usuariovLti()
 	{
		
		$lista=$this->usuario_model->listarUsuarios();
		$data['infoUsuario']=$lista;

		$this->load->view('inc/cabezeraLti');
		$this->load->view('inc/navLti');
		$this->load->view('inc/asidebarLti');
		$this->load->view('usuarioAdminLti',$data);
		$this->load->view('inc/footerLti');
 	}
 	 function homeAdmind()
 	{
		
		// $lista=$this->usuario_model->listarUsuarios();
		// $data['infoUsuario']=$lista;

		$this->load->view('inc/cabezeraLti');
		$this->load->view('inc/navLti');
		$this->load->view('inc/asidebarLti');
		$this->load->view('admind/home');
		$this->load->view('inc/footerLti');
 	}
     
     
// subri fot

function subiFoto()
	{
     $id=$_POST['id'];

    $data['idUsuario']= $this->usuario_model->buscarIdDB($id);

		$this->load->view('inc/cabezeraLti');
		$this->load->view('inc/navLti');
		$this->load->view('inc/asidebarLti');
		$this->load->view('subirfotoV',$data);
		$this->load->view('inc/footerLti');

 	}

 	public function subir()
 	{
 			
			$idUsuario=$_POST['idUsuario'];
			$nombreArchivo=$idUsuario.'.jpg';
			$config['upload_path']='./uploads/usuario/';
			$config['file_name']=$nombreArchivo;
			$direccion='./uploads/usuario/'.$nombreArchivo;
			if(file_exists($direccion))
			{
				unlink($direccion);
			}
			$config['allowed_types']='jpg';
			$this->load->library('upload',$config);
			if(!$this->upload->do_upload())
			{
				$data['error']=$this->upload->display_errors();
			}
			else
			{
				$data['foto']=$nombreArchivo;
				$this->usuario_model->modificarUsuariodb($idUsuario,$data);
				$this->upload->data();
			}
		//  if($this->session->userdata('login'))
		// {
		
		// }
		//  else
		//  {
		//  	$data['msg']=$this->uri->segment(3);
		//  	$this->load->view('inc/cabezera');
		//  	$this->load->view('loginV',$data);
		// }
		redirect('usuario/panel/','refresh');
 	}
	 




	 // function de crear reportesss

 	function functionPdf()
 	{
        //  if($this->session->userdata('login'))
		// {
			
			// $lista=$this->usuario_model->listarUsuarios();
			// $lista=$lista->result();
			

			$this->pdf = new pdf();
			$this->pdf->AddPage();
			$this->pdf->AliasNbPages();
			$this->pdf->SetTitle('Lista de Usuario');
			$this->pdf->SetLeftMargin(15);
			$this->pdf->SetRightMargin(15);
			$this->pdf->SetFillColor(110,110,210);


			$this->pdf->SetFont('Arial','B','11');
			//italic I. B Bold
			$this->pdf->Ln(5);
			$this->pdf->Cell(30);
			$this->pdf->Cell(120,10,'Lista de Usuario',0,0,'C',1);
			//ancho ,alto,'Texto,borde,Generacion de la siguiente borde,
			//0 = derecha. 1 = siguiente linia 2 =debajo

			$this->pdf->Ln(10);
			$this->pdf->SetTextColor(110,0,0);
			$this->pdf->Cell(50,10,'nombre',1,0,'C',0);
			$this->pdf->Cell(50,10,'Primer Apellido',1,0,'C',1);
			$this->pdf->Cell(50,10,'Segundo Apellido',1,0,'C',0);
			$this->pdf->Cell(30,10,'Edad',1,0,'C',0);
			
				for ($i=0; $i <10 ; $i++) { 
					// code...

			$this->pdf->SetTextColor(0,200,0);

			$this->pdf->Ln(10);
			$this->pdf->Cell(50,10,'nombre','LB',0,'C',0);
			$this->pdf->Cell(50,10,'Primer Apellido','B',0,'c',0);
			$this->pdf->Cell(50,10,'Segundo Apellido','B',0,'C',0);
			$this->pdf->Cell(30,10,$i,"BR",0,'C',0);


			}
			$this->pdf->Ln(10);
			$this->pdf->SetTextColor(0,00,150);


				$this->pdf->Cell(50,10,'Segundo Apellido','B',0,'C',0);
			$this->pdf->Cell(30,10,'ss',"BR",2,'C',0);


			// foreach ($lista as  $row) {
			// 	$usuario=$row->nombre;

			// 	$this->pdf->Cell(120,10,$usuario,'TBLR',0,'L',2);
			// 	$this->pdf->Ln(10);
				
			// }


			$this->pdf->Output('ListaUsuario.pdf','I');

		// }
		//  else
		//  {
		//  	$data['msg']=$this->uri->segment(3);
		//  	$this->load->view('inc/cabezera');
		//  	$this->load->view('loginV',$data);
		// }
 	}
}
