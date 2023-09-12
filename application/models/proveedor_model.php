<?php 

class Proveedor_model extends CI_Model
{

	public function agregarProveedordb($data){

	$this->db->insert('proveedores',$data);
	 return $this->db->affected_rows();


	}

	public function listaProveedordb($estado)
	{
		$this->db->select('*');
		$this->db->from('proveedores');
		$this->db->where('estado',$estado);
		return $this->db->get();
	}
	public function datoProveedordb($id)
	{
		$this->db->select('*');
		$this->db->from('proveedores');
		$this->db->where('estado',1);
		$this->db->where('id',$id);

		return $this->db->get();
	}
	
	public function modificarProveedordb($data,$id)
	{
		$this->db->where('id',$id);
		$this->db->update('proveedores',$data);
		
        return $this->db->affected_rows();
		 
	
	}

	public function eliminarAbilitardb($id,$estado)
	{
		$this->db->where('id',$id);
		$data['estado']=$estado;
		$this->db->update('proveedores',$data);
        return $this->db->affected_rows();
		
	}
  	

}
 
