<?php 

class Cliente_model extends CI_Model
{


    public function agregarCliente($data)
    {
    	$this->db->insert('clientes',$data);

    }
    public function listaCliente()
    {
    	$this->db->select('*');
		$this->db->from('clientes');
		$this->db->where('estado',1);
		return $this->db->get();
    }    
    public function obtenerCliente($id)
    {
    	$this->db->select('*');
		$this->db->from('clientes');
		$this->db->where('estado',1);
		$this->db->where('id',$id);

		return $this->db->get();
    }


    public function guardarCambios($data,$id)
    {
    	$this->db->where("id",$id);
        $this->db->update("clientes",$data);
    }

    public function eliminarCliente($id ,$data)
    {
    	$this->db->where("id",$id);
        $this->db->update("clientes",$data);
    }
    public function listClienteDisabilitados()
    {
    	$this->db->select('*');
		$this->db->from('clientes');
		$this->db->where('estado',0);
		return $this->db->get();
    }
}
 
