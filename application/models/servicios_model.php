<?php 

class Servicios_model extends CI_Model
{




	public function listaServiciosdb($estado)
	{
		$this->db->select('S.id,S.nombre ,S.descriccion,S.unidadMedida AS medida, S.precio,S.maximo');

		$this->db->from('servicios S');
		$this->db->where('S.estado',$estado);
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


	public function agregarServiciosdb($data){
	$this->db->insert('servicios',$data);
	 return $this->db->affected_rows();

	}

	public function eliminardb($id,$data)
	{
		$this->db->where('id',$id);
		$this->db->update('servicios',$data);
        return $this->db->affected_rows();
	}



  	// 

}
 
