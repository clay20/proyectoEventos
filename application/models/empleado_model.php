<?php 

class Empleado_model extends CI_Model
{


	
	public function cargo()//listadmo cargo en conbox
	{
		$this->db->select('*');
		$this->db->from('cargo');
		return $this->db->get();
	}

    public function agregarEmpleadodb($data1,$data2)
    {


		$this->db->trans_start(); //incioo transaccion

		$this->db->insert('persona',$data1);

		$idPersona=$this->db->insert_id();
		$data2['id']=$idPersona;
		$this->db->insert('empleados',$data2);
		$this->db->trans_complete(); //fin transaccion
		
		if($this->db->trans_status()===FALSE)
		{
			return false;
		}
		return true;

    }
   public function listEmpleado()
{
    $this->db->select("P.id, CONCAT(P.nombre, ' ', P.primerApellido, ' ', IFNULL(P.segundoApellido, '')) AS nombreCompleto, P.ci, P.fechaNacimiento, IF(P.sexo='f', 'Femenino', 'Masculino') AS sexo, E.fechaInicio, E.salario, E.telefono, C.nombreCargo");
    $this->db->from('persona P');
    $this->db->join('empleados E', 'E.id = P.id');
    $this->db->join('cargo C', 'C.id = E.idCargo');
    $this->db->where('E.estado', 1);

    return $this->db->get();
}
   public function buscarEmpleadoBud($valor)
{
    $this->db->select("P.id, CONCAT(P.nombre, ' ', P.primerApellido, ' ', IFNULL(P.segundoApellido, '')) AS nombreCompleto, P.ci, P.fechaNacimiento, IF(P.sexo='f', 'Femenino', 'Masculino') AS sexo, E.fechaInicio, E.salario, E.telefono, C.nombreCargo");
    $this->db->from('persona P');
    $this->db->join('empleados E', 'E.id = P.id');
    $this->db->join('cargo C', 'C.id = E.idCargo');
    $this->db->where('E.estado', 1);
     $this->db->like('P.nombre',$valor);
    $this->db->or_like('P.primerApellido', $valor);
    $this->db->or_like('P.ci', $valor);


  
    return $this->db->get();
}
  public function buscarEmpleadodbUsuario($valor)// buscados para converitir en  usuarios para sistemas muy importantes
{


$this->db->select('P.id, P.nombre, P.primerApellido, IFNULL(P.segundoApellido, "") AS segundoApellido, P.ci, P.fechaNacimiento, IF(P.sexo="f", "Femenino", "Masculino") AS sexo, E.fechaInicio, E.salario, E.telefono');
$this->db->from('empleados E');
$this->db->join('persona P', 'P.id = E.id');
$this->db->where('E.estado', 1);
 $this->db->like('P.ci',$valor);

$this->db->where("NOT EXISTS (
    SELECT *
    FROM persona P2
    INNER JOIN usuario U ON P2.id = U.id
    WHERE P2.id = P.id
)");

return $this->db->get();


}

   public function datoEmpleadodb($id)
{
    $this->db->select("P.id , P.nombre,' ',P.primerApellido,'', IFNULL(P.segundoApellido,'') As segundoApellido ,P.ci,P.fechaNacimiento,
IF(P.sexo='f','Femenino','Masculino') AS sexo,
E.fechaInicio,E.salario,E.telefono,C.nombreCargo ");
    $this->db->from('persona P');
    $this->db->join('empleados E', 'E.id = P.id');
    $this->db->join('cargo C', 'C.id = E.idCargo');
    $this->db->where('E.estado', 1);
    $this->db->where('E.id', $id);
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


    public function guardarCambios($data1,$data2,$id)
    {



        $this->db->trans_start(); //incioo transaccion
		$this->db->where("id",$id);
    	$this->db->set('fechaActualizacion', 'CURRENT_TIMESTAMP', false); 
        $this->db->update("persona",$data1);
        $this->db->where("id",$id);
    	$this->db->set('fechaActualizacion', 'CURRENT_TIMESTAMP', false); 
        $this->db->update("empleados",$data2);
		$this->db->trans_complete(); //fin transaccion

		if($this->db->trans_status()===FALSE)
		{
			return false;
		}
		return true;
    }

    public function eliminarEmpleado($id ,$data)
    {
    	$this->db->where("id",$id);
    	$this->db->set('fechaActualizacion', 'CURRENT_TIMESTAMP', false); 
        $this->db->update("empleados",$data);
    }
    public function listEmpleadoDisabilitadosdb()
    {
    	 $this->db->select("P.id, CONCAT(P.nombre, ' ', P.primerApellido, ' ', IFNULL(P.segundoApellido, '')) AS nombreCompleto, P.ci, P.fechaNacimiento, IF(P.sexo='f', 'Femenino', 'Masculino') AS sexo, E.fechaInicio, E.salario, E.telefono, C.nombreCargo");
    $this->db->from('persona P');
    $this->db->join('empleados E', 'E.id = P.id');
    $this->db->join('cargo C', 'C.id = E.idCargo');
    $this->db->where('E.estado', 0);
    return $this->db->get();

    }
}
 
