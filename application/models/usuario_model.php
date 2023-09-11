<?php 

class Usuario_model extends CI_Model
{


	 public function validarLogin($username,$pwd)
    {

		
		$this->db->select('U.id AS idUsuario, U.nombreUsuario,U.email,T.rol');
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

	public function mostraActividadBd()//solo clientes
	{
		$this->db->select('*');
		$this->db->from('actividades');
		 $this->db->order_by('id', 'DESC');
		return $this->db->get();
	}

	



	
	public function agregarUsuariodb($data1,$data2,$nombreUsuario)//agregar usuario
	{

		$this->db->trans_start(); //incioo transaccion

		$this->db->insert('persona',$data1);
		$idPersona=$this->db->insert_id();
		$data2['id']=$idPersona;
		$data2['nombreUsuario']=generarUsuario($nombreUsuario.$idPersona);
		$this->db->insert('usuario',$data2);
		$this->db->trans_complete(); //fin transaccion
		return generarUsuario($nombreUsuario.$idPersona);
		if($this->db->trans_status()===FALSE)
		{
			return false;
		}
		
	}
  


  public function datosUsuariodb($estado,$idSession)// gestion usuarios
  {
  	$this->db->select('P.id, P.nombre,P.primerApellido,IFNULL(P.segundoApellido,"") AS segundoApellido,P.ci,P.fechaNacimiento,P.sexo ,U.nombreUsuario,U.email,T.id AS idRol, T.rol ');
		$this->db->from('persona P');
		$this->db->join('usuario U','P.id= U.id');
		$this->db->join('tipoUsuario T','T.id=U.idTipoUsuario');
		$this->db->where('U.estado',$estado);
		$this->db->where('U.id !=',$idSession);

		return $this->db->get();
  }

  public function usuarioDatosBuscardb($estado,$idSession,$valor)
  {
  	$this->db->select('P.id, P.nombre,P.primerApellido,IFNULL(P.segundoApellido,"") AS segundoApellido,P.ci,P.fechaNacimiento,P.sexo ,U.nombreUsuario,U.email,T.id AS idRol, T.rol ');
		$this->db->from('persona P');
		$this->db->join('usuario U','P.id= U.id');
		$this->db->join('tipoUsuario T','T.id=U.idTipoUsuario');
		$this->db->where('U.estado',$estado);
		$this->db->where('U.id !=',$idSession);
		 $this->db->where("U.nombreUsuario like %".$valor."%");
		
		return $this->db->get();
  }
  public function datosUsuarioID($id,$estado)// gestion usuairo
  {
  	$this->db->select('P.id, P.nombre,P.primerApellido,IFNULL(P.segundoApellido,"") AS segundoApellido,P.ci,P.fechaNacimiento,P.sexo ,U.nombreUsuario,U.email,T.id AS idRol, T.rol ');
		$this->db->from('persona P');
		$this->db->join('usuario U','P.id= U.id');
		$this->db->join('tipoUsuario T','T.id=U.idTipoUsuario');
		$this->db->where('U.estado',$estado);
		$this->db->where('P.id',$id);

		return $this->db->get();
  }


  	public function elimnarHabiltarDatosUsuariodb($id,$estado)//eliminar gestion usurios
    {
    	$this->db->where('id',$id);
    	$data['estado']=$estado;
    	$this->db->set('fechaActualizacion', 'CURRENT_TIMESTAMP', false); 
		 $this->db->update('usuario',$data);
    }
	public function modificarUsuariodb($data1,$data2,$id)//agregar usuario
	{

		$this->db->trans_start(); //incioo transaccion

    	$this->db->set('fechaActualizacion', 'CURRENT_TIMESTAMP', false); 
    	$this->db->where('id',$id);
		$this->db->update('persona',$data1);
    	$this->db->set('fechaActualizacion', 'CURRENT_TIMESTAMP', false); 

		$this->db->where('id',$id);
		$this->db->update('usuario',$data2);
		$this->db->trans_complete(); //fin transaccion
		
		if($this->db->trans_status()===FALSE)
		{
			return false;
		}
		return true;
	}

	public function cambiarpwddb($pwd,$id){

			$this->db->where('id',$id);
			$data['password']=$pwd;
			$this->db->update('usuario',$data);
				

	}
  

}
 
