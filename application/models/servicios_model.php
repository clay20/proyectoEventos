<?php 

class Servicios_model extends CI_Model
{




	public function listaServiciosdb($estado)
	{
		$this->db->select('S.id,S.nombre ,S.descriccion,S.unidadMedida AS medida, S.precio,P.denominacion AS proveedor');

		$this->db->from('servicios S');
		$this->db->join( 'proveedores P ',' P.id=S.idProveedores');
		$this->db->where('S.estado',$estado);
		return $this->db->get();
	}

	public function datoServiciosdb($estado,$id)
	{
		$this->db->select('S.id,S.nombre ,S.descriccion,S.unidadMedida AS medida, S.precio,P.denominacion AS proveedor');

		$this->db->from('servicios S');
		$this->db->join( 'proveedores P ',' P.id=S.idProveedores');
		$this->db->where('S.estado',$estado);
		$this->db->where('S.id',$id);
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

	
  	

}
 
