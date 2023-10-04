<?php 

class Cliente_model extends CI_Model
{


    public function agregarCliente($data)
    {
    	$this->db->insert('clientes',$data);

    }
    public function nuevocliente($data) //nuevo cliente desde calendario de reservas
    {
       

        $ban = $this->db->insert('clientes', $data);


        if ($ban) {
   
            $ultimoid = $this->db->insert_id();
           return $ultimoid;
        } else {
            return 0;
        }
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


      public function buscarCliente($valor)// buscados para converitir en  usuarios para sistemas muy importantes
      {

        $this->db->select('id,nombre,primerApellido,ifnull(segundoApellido,"") as segundoApellido,ci,celular,telefono');
        $this->db->from('clientes');
        $this->db->where('estado', 1);
        $this->db->like('nombre',$valor);
        $this->db->or_like('primerApellido',$valor);
        $this->db->limit(5);
        return $this->db->get();
    }

}

