<?php 

class reporte_model extends CI_Model
{




	public function listaServiciosdb($fechaIn,$fechaFn)
	{
		 $this->db->select('R.id, R.fechaInicio, CONCAT(C.ci, " ", C.nombre, " ", C.primerApellido, " ", IFNULL(C.segundoApellido, "")) AS nombreCompleto, R.total');
        $this->db->from('reservas R');
        $this->db->join('clientes C', 'C.id = R.idCliente');
        $this->db->where('R.estado', 1);
        $this->db->where('R.fechaInicio<=', $fechaIn);
        $this->db->where('R.fechaInicio>=', $fechaFn);


        return  $this->db->get();
         
	}





}

