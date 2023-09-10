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
  public function modificar()
 {
 		$this->load->view('inc/cabezeraLti');
		$this->load->view('inc/navLti');
		$this->load->view('inc/asidebarLti');
		$this->load->view('admind/proveedor/modificarV');
		$this->load->view('inc/footerLti');
 }
 public function FunctionName($value='')
 {
 	// code...
 }
 
 	
}
