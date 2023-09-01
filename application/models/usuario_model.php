<?php 

class Usuario_model extends CI_Model
{


	 public function validarLogin($username,$pwd)
    {

		
		$this->db->select('*');
		$this->db->from('usuario U');
		$this->db->join('tipoUsuario T','T.id=U.idTipoUsuario');

		$this->db->where('nombreUsuario',$username);
		$this->db->where('password',$pwd);
		$this->db->where('estado',1);

		return $this->db->get();
    }






	public function listarUsuarios()
	{
		$this->db->select('*');
		$this->db->from('usuario U');
		$this->db->join('tipoUsuario T','T.id=U.idTipoUsuario');

		$this->db->where('estado',1);
		return $this->db->get();
      
	}



	public function tipoRol()//importnte 
	{
		$this->db->select('*');
		$this->db->from('tipoUsuario');
		return $this->db->get();
	}





public function agregarActiviadadBD($data)
{
	
		$this->db->trans_start(); //incioo transaccion
		$this->db->insert('actividades',$data);
		$id=$this->db->insert_id();
		$data['foto']=$id.'.jpg';
		$this->db->where('id',$id);
		$this->db->update('actividades',$data);
		$this->db->trans_complete(); //fin transaccion

		if($this->db->trans_status()===FALSE)
		{
			return false;
		}
		return $id;
}

	public function mostraActividadBd()
	{
		$this->db->select('*');
		$this->db->from('actividades');
		 $this->db->order_by('id', 'DESC');
		return $this->db->get();
	}

	



	
	public function agregarUsuario($data1,$data2,$nombreUsuario)
	{

		$this->db->trans_start(); //incioo transaccion

		$this->db->insert('empleados',$data1);
		$idEmpleado=$this->db->insert_id();
		$data2['idEmpleado']=$idEmpleado;
		$data2['nombreUsuario']=generarUsuario($nombreUsuario.$idEmpleado);
		$this->db->insert('usuario',$data2);

		$this->db->trans_complete(); //fin transaccion

		return generarUsuario($nombreUsuario.$idEmpleado);
		if($this->db->trans_status()===FALSE)
		{
			return false;
		}
		
	}
  


  public function datosUsuario($estado)// gestion usuairo
  {
  	$this->db->select('E.id,E.nombre,E.primerApellido,E.segundoApellido,E.ci,E.fechaNacimiento,E.sexo,E.salario,E.celular,E.telefono, E.idCargo,C.nombreCargo,U.nombreUsuario,U.email,T.rol');
		$this->db->from('empleados E');
		$this->db->join('cargo C','C.id=E.idCargo');
		$this->db->join('usuario U','U.idEmpleado=E.id');
		$this->db->join('tipoUsuario T','T.id=U.idTipoUsuario');
		$this->db->where('U.estado',$estado);
		$this->db->where('E.estado',$estado);

		return $this->db->get();
  }

  public function datosUsuarioID($id)// gestion usuairo
  {
  	$this->db->select('E.id,E.nombre,E.primerApellido,E.segundoApellido,E.ci,E.fechaNacimiento,E.sexo,E.salario,E.celular,E.telefono, E.idCargo,C.nombreCargo,U.nombreUsuario,U.email,T.rol');
		$this->db->from('empleados E');
		$this->db->join('cargo C','C.id=E.idCargo');
		$this->db->join('usuario U','U.idEmpleado=E.id');
		$this->db->join('tipoUsuario T','T.id=U.idTipoUsuario');
		$this->db->where('E.id',$id);


		return $this->db->get();
  }

  	public function elimnarHabiltarDatosUsuariodb($id,$estado)//eliminar gestion usurios
    {
    	$this->db->where('idEmpleado',$id);
    	$data['estado']=$estado;
		 $this->db->update('usuario',$data);
    }



}
 
