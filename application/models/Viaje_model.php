<?php
/* 
 * Generated by CRUDigniter v3.2 
 * www.crudigniter.com
 */
 
class Viaje_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    /*
     * Get viaje by idViaje
     */
    function get_viaje($idViaje)
    {
        $this->db->where('idciudadorigen', $idViaje);
        $this->db->join('ciudad', 'ciudad.idCiudad = viaje.idciudadestino');
        return $this->db->get('viaje')->result_object();
    }

    function buscarPasajes($idOrigen, $idDestino, $dia)
    {
       return $this->db
                 ->where('idciudadorigen=', $idOrigen)
                 ->where('idciudadestino=', $idDestino)
                 ->where('dia', $dia)
                 ->join('frecuencia', 'frecuencia.idViaje = viaje.idViaje', 'inner')
                 ->join('ciudad', 'ciudad.idCiudad = viaje.idciudadorigen', 'inner')
                 ->join('ciudad as nombreDestino', 'nombreDestino.idCiudad = viaje.idciudadestino', 'inner')
                 ->get('viaje')->result_object();
    }

    function obtenerFechaViajes($idOrigen, $idDestino)
    {
        return $this->db
                    ->distinct()
                    ->select('dia')
                    ->where('idciudadorigen=', $idOrigen)
                    ->where('idciudadestino=', $idDestino)
                    ->join('frecuencia', 'frecuencia.idViaje = viaje.idViaje', 'inner')
                    ->get('viaje')->result_object();
    }

    function obtenerViaje($idViaje, $idFrecuencia){
        $this->db->select('viaje.idViaje,
                           viaje.idciudadorigen,
                           viaje.idciudadestino,
                           viaje.idcolectivo,
                           viaje.tarifa,
                           frecuencia.dia,
                           frecuencia.hora,
                           frecuencia.idFrecuencia,
                           colectivo.capacidadInferior,
                           colectivo.capacidadSuperior,
                           ciudadorigen.nombreCiudad as origen, 
                           ciudaddestino.nombreCiudad as destino');
        $this->db->join('frecuencia ', 'frecuencia.idViaje = viaje.idViaje', 'inner');
        $this->db->join('colectivo ', 'viaje.idcolectivo = colectivo.idColectivo', 'inner');
        $this->db->join('ciudad as ciudadorigen', 'viaje.idciudadorigen = ciudadorigen.idCiudad', 'inner');
        $this->db->join('ciudad as ciudaddestino', 'viaje.idciudadestino = ciudaddestino.idCiudad', 'inner');
        $this->db->where('frecuencia.idFrecuencia', $idFrecuencia);
        $this->db->where('viaje.idViaje', $idViaje);
        return $this->db->get('viaje')->result_object();

    }
    
    
    /*
     * Get all viajes count
     */
    function get_all_viajes_count()
    {
        $this->db->from('viaje');
        return $this->db->count_all_results();
    }
        
    /*
     * Get all viajes
     */
    function get_all_viajes($params = array())
    {
        $this->db->order_by('idViaje', 'desc');
        if(isset($params) && !empty($params))
        {
            $this->db->limit($params['limit'], $params['offset']);
        }
        return $this->db->get('viaje')->result_array();
    }
        
    /*
     * function to add new viaje
     */
    function add_viaje($params)
    {
        $this->db->insert('viaje',$params);
        return $this->db->insert_id();
    }
    
    /*
     * function to update viaje
     */
    function update_viaje($idViaje,$params)
    {
        $this->db->where('idViaje',$idViaje);
        return $this->db->update('viaje',$params);
    }
    
    /*
     * function to delete viaje
     */
    function delete_viaje($idViaje)
    {
        return $this->db->delete('viaje',array('idViaje'=>$idViaje));
    }
}
