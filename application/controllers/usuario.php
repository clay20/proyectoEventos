<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require FCPATH.'vendor/autoload.php';
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
		//las tres linias superio solo para el uso de reporte en excel    

class Usuario extends CI_Controller {

//manejo de secciones con mvc


	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->helper(array('rules'));
		// $this->load->helper(array('rules'));

	}

	
	function formLogin()
   	 {
		$this->load->view('inc/default/header');
		// $this->load->view('inc/default/menu');
		$this->load->view('login');
		$this->load->view('inc/default/footer');

		
	}

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
		 	// $this->load->view('inc/default/menu');
		 	$this->load->view('login',$data);
			$this->load->view('inc/default/footer');
		}

	 }

	
	 


	function validarPrueba()
	{
		$this->form_validation->set_error_delimiters('', '');
		$rules=getLoginRules();
		$login=$_POST['usuario'];
		$password=md5($_POST['password']);

		$this->form_validation->set_rules($rules);
		if($this->form_validation->run()===FALSE)
		{			
			$this->output->set_status_header(400); 
			$error=array(
				'usuario'=> form_error('usuario'),
				'password'=> form_error('password')
			   );
			echo json_encode($error);
		}

		else{	
			
			$consulta=$this->usuario_model->validarLogin($login,$password);
			$col=$consulta->num_rows();
			
			if($consulta->num_rows()==0)
			{ 
				$this->output->set_status_header(401);
				echo json_encode(array('msg'=>'Verifique tus credecciales'));
				exit();
			}

			 if($consulta->num_rows()>0)
			{
				// echo json_encode(array('msg'=>'Bienvenido'));
				$url= base_url();

				echo json_encode(array('url'=>$url.'index.php/usuario/panel'));

			
				foreach ($consulta->result() as $row) {
					$this->session->set_userdata('idUsuario',$row->id);
					$this->session->set_userdata('nombreUsuario',$row->nombreUsuario);
					$this->session->set_userdata('rolUsuario',$row->rol);
					redirect('usuario/panel','refresh');

				}
				// $this->output->set_status_header(200);
				

			}
			// else
			// {
			// 	redirect('usuario/login/1','refresh');
			// }

			
		}	
	}
    

	// function validarUsuario()
	// {

	// 	$login=$_POST['usuario'];
	// 	$password=md5($_POST['password']);
	// 	$consulta=$this->usuario_model->validarLogin($login,$password);

	// 	if($consulta->num_rows()>0)
	// 	{
	// 		foreach ($consulta->result() as $row) {
	// 			$this->session->set_userdata('idUsuario',$row->id);
	// 			$this->session->set_userdata('nombreUsuario',$row->nombreUsuario);
	// 			$this->session->set_userdata('rolUsuario',$row->rol);
	// 			redirect('usuario/panel','refresh');
	// 		}
	// 	}
	// 	else
	// 	{
	// 		redirect('usuario/login/1','refresh');
	// 	}	
	// }



 

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
			redirect('usuarioInvitado/homeInvitado','refresh');
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
 	function homeInvitado()
{

// $lista=$this->usuario_model->listarUsuarios();
// $data['infoUsuario']=$lista;

		$this->load->view('inc/cabezeraLti');
		$this->load->view('inc/navLti');
		$this->load->view('invitado/asideInv');
		$this->load->view('admind/home');
		$this->load->view('inc/footerLti');
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
public function agregarView()//metod donde agreaga usuario admini o usuario invitado y una consulta al db
{
			

		if($this->session->userdata('rolUsuario') =='admind')
		{
			$lista=$this->usuario_model->tipoRol();
			$data['rol']=$lista;
			$lista=$this->empleado_model->cargo();
			$data['cargo']=$lista;
			$lista=$this->usuario_model->datosUsuario(1);
			$data['usuarios']=$lista;
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
     	$this->load->library('phpmailer_lib');
     			
   

		if($this->session->userdata('rolUsuario') =='admind')
		{
			$nombre=letraCapital($_POST['nombre']);
			$data1['nombre']=$nombre;
			$data1['primerApellido']=letraCapital($_POST['primerApellido']);
			$data1['segundoApellido']=letraCapital($_POST['segundoApellido']);
			$data1['ci']=$_POST['ci'];
			$data1['fechaNacimiento']=$_POST['fechaNacimiento'];
			$data1['sexo']=$_POST['genero'];
			$data1['salario']=$_POST['salario'];
			$data1['celular']=$_POST['celular'];
			$data1['telefono']=$_POST['telefono'];
			$data1['idCargo']=$_POST['cargo'];
			$data1['idUsuario']=$this->session->userdata('idUsuario');


			$pwd=generarPwd($_POST['primerApellido']);
			
			$data2['password']=md5($pwd);
			$data2['email']=$_POST['email'];
			$data2['idTipoUsuario']=$_POST['rol'];	
			$data2['idUsuario']=$this->session->userdata('idUsuario');
			$correo =$_POST['email'];
			$nombre=letraCapital($_POST['nombre']);

			$nameUsuario=$this->usuario_model->agregarUsuario($data1,$data2,$nombre);
			if(is_string($nameUsuario)){
				//reistro de dsto con exitos

				if($this->phpmailer_lib->load($correo,$nombre,$nameUsuario,$pwd)){
					//reistro de email exit
					$url= base_url();

					echo json_encode(array('msg'=>'Envio de datos correcto'));

				}
				else
				{
					echo json_encode(array('msg'=>'fallo de envio de datos'));

				}
				echo json_encode(array('msg'=>'Registro en vace de datos correcto'));
			}else
			{
				echo json_encode(array('msg'=>'fallo de envio de y registros'));
				//no se completo la transaccions
			}

			$url=base_url();

     			 echo json_encode(array('url'=>$url.'index.php/usuario/agregarUsuarioV'));

	   		
		}else
		{
			$this->load->view('inc/cabezeraLti');
			
			$this->load->view('error/404');

			$this->load->view('inc/footerLti');
		}
}

public function modifiaDatosUsuarioa()//modifcar gestion Usuarios
{
	
	$id=$_POST['id'];

	$lista=$this->usuario_model->datosUsuarioID($id);
	$listaArray = $lista->row_array();
	// $listaArray = $lista->result_array();
	echo json_encode($listaArray);
}
public function modifiaDatosUsuarioaFUll()//modifcar gestion Usuarios
{
	
	
	$lista=$this->usuario_model->datosUsuario(1);	
	$listaArray = $lista->result_array();
	// $listaArray = $lista->row_array();
	echo json_encode($listaArray);
}

public function usuarioDatosDesabilitadosFUll(){
	$lista=$this->usuario_model->datosUsuario(0);	
	$listaArray = $lista->result_array();
	// $listaArray = $lista->row_array();
	echo json_encode($listaArray);
}


public function eliminarDatosUsuarioa()//modifcar gestion Usuarios
{
	if(isset($_POST['id'])){
		$id =$_POST['id'];
	
	$this->usuario_model->elimnarHabiltarDatosUsuariodb($id,0);
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


	
	function index()
	{
  

		$lista=$this->usuario_model->listarUsuarios();
		$data['infoUsuario']=$lista;

		$this->load->view('inc/default/header');
		$this->load->view('inc/default/menu');
		$this->load->view('default/usuario',$data);
		$this->load->view('inc/default/footer');
		
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
	 


public function agregarActividad()
{
			// $foto='name';
			$data['nombre']=$_POST['nombre'];
			$data['descripcion']=$_POST['descripcion'];
			$data['idUsuario']=1;//recupera usuario desde datos de sessciones 




			$nombreArchivo=$this->usuario_model->agregarActiviadadBD($data).'.jpg';;
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
				echo $this->upload->display_errors();
			}
			else
			{
				
				
				
				$this->upload->data();
				
			}

			 redirect('usuario/datosUsuario/','refresh');
		// 
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


function reporteTare()
 	{
        //  if($this->session->userdata('login'))
		// {
			
			// $lista=$this->usuario_model->listarUsuarios();
			// $lista=$lista->result();
			

			$this->pdf = new pdf();
			$this->pdf->AddPage();

			$this->pdf->AliasNbPages();
			//$this->pdf->SetTitle('MENDEZ PEREZ LUIS ALBERTO');
			$this->pdf->SetLeftMargin(15);
			$this->pdf->SetRightMargin(15);
			$this->pdf->SetFillColor(110,110,210);


			$this->pdf->SetFont('Arial','B','11');
			//italic I. B Bold
			$this->pdf->Ln(5);
			$this->pdf->Cell(1);
			$this->pdf->SetFillColor(239,209,39);
			$this->pdf->Cell(70,10,'MENDEZ PEREZ LUIS ALBERTO',0,0,'L',1);
			$this->pdf->Ln(10);
			
			//ancho ,alto,'Texto,borde,Generacion de la siguiente borde,
			//0 = derecha. 1 = siguiente linia 2 =debajo








			$this->pdf->Ln(10);
			$this->pdf->SetTextColor(255,255,255);
			$this->pdf->SetFillColor(7,4,66);
			$this->pdf->Cell(40,10,'Periodo del estado',1,0,'C',1);
			$this->pdf->Cell(20);
			$this->pdf->Cell(30,10,'Saldo final',1,0,'C',1);
			$this->pdf->Cell(20);

			$this->pdf->SetTextColor(7,4,66);

			$this->pdf->Cell(25,10,'Saldo Prom','LTR',0,'C',0);
			
			$this->pdf->Cell(25,10,'3501,44','LTR',0,'C',0);
			$this->pdf->Ln(10);



			$this->pdf->SetFillColor(7,4,66);
			$this->pdf->SetFillColor(7,4,66);
			$this->pdf->Cell(40,10,'Periodo del estado',1,0,'C',0);
			$this->pdf->Cell(20);
			$this->pdf->Cell(30,10,'Saldo final',1,0,'C',0);
			$this->pdf->Cell(20);

			$this->pdf->SetTextColor(7,4,66);

			$this->pdf->Cell(25,10,'*TEP:','LBR',0,'C',0);
			
			$this->pdf->Cell(25,10,'0,0000','LBR',0,'C',0);


$this->pdf->Ln(15);
$this->pdf->SetFont('Arial','B','8');
			$this->pdf->SetFillColor(239,209,39);
			// $this->pdf->SetFillColor(7,4,66);
			$this->pdf->Cell(30,10,'Saldo Inicial',1,0,'C',1);
			$this->pdf->Cell(30,10,'Deposito/Creditos',1,0,'C',1);
			$this->pdf->Cell(30,10,'Retiros/Debitos','1',0,'C',1);
			$this->pdf->Cell(30,10,'Cargos por Servicios','1',0,'C',1);
			$this->pdf->Cell(30,10,'Interes Pagados','1',0,'C',1);
			$this->pdf->Cell(30,10,'Interes Cobrado','1',0,'C',1);
			$this->pdf->SetFillColor(239,209,39);
			$this->pdf->Ln(10);

			// $this->pdf->SetFillColor(7,4,66);
			$this->pdf->Cell(30,10,'4.322,81',1,0,'C',0);
			$this->pdf->Cell(30,10,'1.269,07',1,0,'C',0);
			$this->pdf->Cell(30,10,'59,14','1',0,'C',0);
			$this->pdf->Cell(30,10,'1,04','1',0,'C',0);
			$this->pdf->Cell(30,10,'8,00','1',0,'C',0);
			$this->pdf->Cell(30,10,'0,00','1',0,'C',0);




			
			// 	for ($i=0; $i <10 ; $i++) { 
			// 		// code...

			// $this->pdf->SetTextColor(0,200,0);

			// $this->pdf->Ln(10);
			// $this->pdf->Cell(50,10,'nombre','LB',0,'C',0);
			// $this->pdf->Cell(50,10,'Primer Apellido','B',0,'c',0);
			// $this->pdf->Cell(50,10,'Segundo Apellido','B',0,'C',0);
			// $this->pdf->Cell(30,10,$i,"BR",0,'C',0);


			// }
			// $this->pdf->Ln(10);
			// $this->pdf->SetTextColor(0,00,150);


			// $this->pdf->Cell(50,10,'Segundo Apellido','B',0,'C',0);
			// $this->pdf->Cell(30,10,'ss',"BR",2,'C',0);


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
 		$writer->save("php://output");



 		
			
		
	}
	public function reporteExcel2()
 	{
 		// $lista=$this->estudiante_model->listaestudiantes();
		//  $lista=$lista->result();

		 header('Content-Type: application/vnd.ms-excel');
		 header('Content-Disposition: attachment;filename="estudiantes.xlsx"');
		 $spreadsheet = new Spreadsheet();

// Metadatos

 		$spreadsheet
			->getProperties()
			->setCreator("Nombre del autor")
			->setLastModifiedBy("Juan Perez")
			->setTitle('Excel creado en el sistema')
			->setSubject('Excel de prueba')
			->setDescription('Descripcion del excel')
			->setKeywords('Lista estudiantes')
			->setCategory('Categoria de prueba');

		 $sheet = $spreadsheet->getActiveSheet();
		$sheet->setTitle("Reporte de excel 2");//titulo de  hoja

		$sheet->getStyle('A1:E1')->getFont()->getColor()->setARGB(\PhpOffice\PhpSpreadsheet\Style\Color::COLOR_RED);
		$sheet->getStyle('A1:E1')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('ffff00');

		 $sheet->setCellValue('A1', 'ID');
		 $sheet->setCellValue('B1', 'Nombre');
		 $sheet->setCellValue('C1', 'Primer apellido');
		 $sheet->setCellValue('D1', 'Segundo apellido');
		 $sheet->setCellValue('E1', 'nota');
		 $sn=2;
		 for ($i=2; $i <12 ; $i++) { 
		 	 $sheet->setCellValue('A.$i', 'ID');
			 $sheet->setCellValue('B.$i', 'Nombre');
			 $sheet->setCellValue('C.$i', 'Primer apellido');
			 $sheet->setCellValue('D.$i', 'Segundo apellido');
			 $sheet->setCellValue('E.$i', 'nota');
		 }


		 $writer = new Xlsx($spreadsheet);
 		$writer->save("php://output");



 		$spreadsheet
			->getProperties()
			->setCreator("Nombre del autor")
			->setLastModifiedBy("Juan Perez")
			->setTitle('Excel creado en el sistema')
			->setSubject('Excel de prueba')
			->setDescription('Descripcion del excel')
			->setKeywords('Lista estudiantes')
			->setCategory('Categoria de prueba');
	}
 	
}
