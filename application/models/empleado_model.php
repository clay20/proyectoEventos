<?php 

class Empleado_model extends CI_Model
{


	
	public function cargo()//listadmo cargo en conbox
	{
		$this->db->select('*');
		$this->db->from('cargo');
		return $this->db->get();
	}

    public function agregarEmpleado($data)
    {
    	$this->db->insert('empleados',$data);

    }
    public function listEmpleado()
    {
    	$this->db->select('E.id,E.nombre,E.primerApellido,E.segundoApellido,E.ci,E.fechaNacimiento,
E.sexo,E.salario,E.celular,E.telefono, E.idCargo,C.nombreCargo');
		$this->db->from('empleados E');
		$this->db->join('cargo C','C.id=E.idCargo');

		$this->db->where('estado',1);
		return $this->db->get();
    }    
    public function obtenerEmpleado($id)
    {
    	$this->db->select('*');
		$this->db->from('empleados');
		$this->db->where('estado',1);
		$this->db->where('id',$id);

		return $this->db->get();
    }


    public function guardarCambios($data,$id)
    {
    	$this->db->where("id",$id);
        $this->db->update("empleados",$data);
    }

    public function eliminarEmpleado($id ,$data)
    {
    	$this->db->where("id",$id);
        $this->db->update("empleados",$data);
    }
    public function listEmpleadoDisabilitados()
    {
    	$this->db->select('E.id,E.nombre,E.primerApellido,E.segundoApellido,E.ci,E.fechaNacimiento,
E.sexo,E.salario,E.celular,E.telefono, E.idCargo,C.nombreCargo');
		$this->db->from('empleados E');
		$this->db->join('cargo C','C.id=E.idCargo');

		$this->db->where('estado',0);
		return $this->db->get();
    }
}
 
