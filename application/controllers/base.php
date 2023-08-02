<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Base extends CI_Controller {

	
	
	
	function index()
	{
		$this->load->view('inc/default/header');
		$this->load->view('inc/default/menu');
		$this->load->view('default/inicio');
		$this->load->view('inc/default/footer');
		
		
	}
	
	function resumen()
	{
	
		$this->load->view('inc/default/header');
		$this->load->view('inc/default/menu');
		$this->load->view('default/resumen');
		$this->load->view('inc/default/footer');
		
	}
	
	
	function objetivos()
	{
		$this->load->view('inc/default/header');
		$this->load->view('inc/default/menu');
		$this->load->view('default/objetivos');
		$this->load->view('inc/default/footer');
	}

	function GestionarUsuario()
	{
		$this->load->view('inc/default/header');
		$this->load->view('inc/default/menu');
		$this->load->view('default/usuarioV');
		$this->load->view('inc/default/footer');
	}
	
	function login()
    {
		$this->load->view('inc/default/header');
		$this->load->view('inc/default/menu');
		$this->load->view('login');
		$this->load->view('inc/default/footer');
	}
	
	
}
