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
	public function tipoRol()
	{
		$this->db->select('*');
		$this->db->from('tipoUsuario');
		return $this->db->get();
	}
















	

	
	public function agregarUsuario($data1,$data2)
	{
		$this->db->trans_start(); //incioo transaccion

		$this->db->insert('empleados',$data1);
		$idEmpleado=$this->db->insert_id();
		$data2['idEmpleado']=$idEmpleado;
		$this->db->insert('usuario',$data2);


		$this->db->trans_complete(); //fin transaccion

		if($this->db->trans_status()===FALSE)
		{
			return false;
		}


		
	}

	public function buscarIdDB($id)
	{
		$this->db->select('*');
		$this->db->from('usuarios');
		$this->db->where('id',$id);
		return $this->db->get();

	}

	public function modificarUsuariodb($id,$data)
	{
		$this->db->where('id',$id);
		 $this->db->update('usuarios',$data);
	}
 	public function eliminarUsuariodb($id)
    {
    	$this->db->where('id',$id);
		 $this->db->delete('usuarios');
    }


   

}
 
