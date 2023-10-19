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
 public function agregar()
 {

 	//datao para registra en reserva
 	 	$dias=$_POST['dias']-1;
   
 	$data['cantidadPersonas']=$_POST['numInvitados'];
 	$data['fechaInicio']=$_POST['fechaInici'];
	$data['fechaFin']=
	$data['plazoConfirmacion']=2;//ojo
	$data['fechaFin'}=$_POST['fechaFin'];

 $nombreEvento=$_POST['nombreEvento'];//estoo necesitamos quse del id


 $data['idCliente']=$_POST['idCliente'];
  // $totalSinDescuento=$_POST['totalSinDescuento']; ojo
 	// $totalDescuento=$_POST['totalDescuento'];   ojo

 	$data['adelantoReserva']=$_POST['adelandto'];
 	$data['saldo']=$_POST['saldoPagar'];
 	$data{totalPagar=$_POST['totalPagar'];

 	//




 	$ids=$_POST['ids'];
 	$fechaHoraInicio=$_POST['fechaHoraInicio'];
 	$fechaHoraFin=$_POST['fechaHoraFin'];

 	$cants=$_POST['cants'];
 	$precios=$_POST['precios'];

 	$importes=$_POST['importes'];
 	$descuentos=$_POST['descuentos'];




 	  echo $fecha.$nombreEvento.$numInvi;
 	  echo $dias.$idCliente.$idCliente;


 	  if()

 }





    
    public function save(){

		$subtotal = $this->input->post("subtotal");
		$igv = $this->input->post("igv");
		$discount = $this->input->post("discount");
		$total = $this->input->post("total");
		$userId	= $this->session->userdata("id");;
		$clientId = $this->input->post("clientId");
		$voucherId	= $this->input->post("voucherId");
		
		$ids = $this->input->post("ids");
		$prices	= $this->input->post("prices");
		$cants	= $this->input->post("cants");

		if($total <= 0){
			$resp= array('type' => "error", 'message' => "Para realizar la ventssdffa agregue productos");
			echo json_encode($resp);
		} else if($clientId == null){
			$resp= array('type' => "error", 'message' => "Antes de finalizar la venta seleccsdfhsdfdgdfsgfgsione un cliente");
			echo json_encode($resp);
		} else {
			$data  = array(
				'subtotal' => $subtotal,
				'igv' => $igv,
				'discount'=>$discount,
				'total' => $total,
				'user_id' => $userId,
				'client_id' => $clientId,
				'voucher_id' => $voucherId,
			);
			
			$this->Sale_model->save($data);
			$idSale = $this->Sale_model->getId();
			$this->detail($idSale,$ids,$cants,$prices,$discount);
		}
		
	}

	private function detail($idSale,$ids,$cants,$prices,$discount){
		for ($i=0; $i < count($ids); $i++) { 
			$data  = array(
				'sale_id' => $idSale,
				'product_id' => $ids[$i],
				'cant'=> $cants[$i],
				'price' => $prices[$i],
				'discount' => $discount[$i]
			);
			$this->Sale_model->saveDetail($data);
			$this->updateStock($ids[$i],$cants[$i]);
		}
	}




}