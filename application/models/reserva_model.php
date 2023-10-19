<?php 

class Reserva_model extends CI_Model
{

	public function agregarReservadb($data,$ids,$horaInicios,$horaFines,$duracion,$invitado,$fechas,$cants,$precios,$chebox,$des,$pu,$dias){
		  $this->db->trans_start(); // Inicio de la transacción

    $this->db->insert('reservas', $data);
    $idReserva = $this->db->insert_id();
   
	   for ($i=0; $i <count($invitado) ; $i++) { 
	      $data2=array(
	         'idReservas'=>$idReserva,
	         'fecha'=>$fechas[$i],
	         'horaInicio'=>$horaInicios[$i],
	         'horaFin'=>$horaFines[$i],
	         'cantidadPersona'=>$invitado[$i]
	      );
	      $this->db->insert('horarioevento',$data2);
	   }
	   for ($i=0; $i <count($ids) ; $i++) { 
	   	for ($j=0; $j <$dias ; $j++) { 
	   		 $data3=array(
	   		   'cantidad'=>$cants[$i][$j],
	   		   'precio'=>$pu[$i],
	   		   'subTotal'=>$precios[$i][$j],
	   		   'descuento'=>$des[$i][$j],
	   		   'fechaHoraInicio'=>$fechas[$j].' ' .$horaInicios[$j],
	   		   'fechaHoraFin'=>$fechas[$j].' '.$horaFines[$j],
	   		   'idServicios'=>$ids[$j],
	   		   'idReservas'=>$idReserva,
	   		  );
	      $this->db->insert('detalle',$data3);

	   	}
	   }




     $this->db->trans_complete(); // Fin de la transacción

    if ($this->db->trans_status() === FALSE) {
        return false;
    }
    else{
    	return true;
    }
   

	}























	public function listaServiciosdb($estado)
	{
		$this->db->select('S.id,S.nombre ,S.descriccion,S.unidadMedida AS medida, S.precio,S.maximo');

		$this->db->from('servicios S');
		$this->db->where('S.estado',$estado);
		$this->db->order_by('S.nombre', 'asc'); 
		
		return $this->db->get();
	}



	
	public function listaServiciosNOAgregadosdb($estado,$ids)
	{
		$this->db->select('S.id,S.nombre ,S.descriccion,S.unidadMedida AS medida, S.precio,S.maximo');

		$this->db->from('servicios S');
		$this->db->where('S.estado', $estado);
		$this->db->where_not_in('S.id', $ids);
		$this->db->order_by('S.nombre', 'asc');

		return $this->db->get();
	}

	public function datoServiciosdb($estado,$id)
	{
		$this->db->select('S.id, S.nombre, S.descriccion, S.unidadMedida AS medida, S.precio, S.maximo');
		$this->db->from('servicios S');
		$this->db->where('S.estado', $estado);
		$this->db->where('S.id', $id);
		$this->db->order_by('S.nombre', 'asc'); 
		return $this->db->get();
	}




	public function eliminardb($id,$data)
	{
		$this->db->where('id',$id);
		$this->db->update('servicios',$data);
		return $this->db->affected_rows();
	}



  	// 

}

