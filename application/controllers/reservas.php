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
}