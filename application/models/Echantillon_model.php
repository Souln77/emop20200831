<?php
/* 
 * Generated by CRUDigniter v3.2 
 * www.crudigniter.com
 */
 
class Echantillon_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    /*
     * Get echantillon by GRAPPE
     */
    function get_echantillon($GRAPPE)
    {
        return $this->db->get_where('ECHANTILLON',array('GRAPPE'=>$GRAPPE))->row_array();
    }
    
    /*
     * Get all echantillon count
     */
    function get_all_echantillon_count()
    {
        $this->db->from('ECHANTILLON');
        return $this->db->count_all_results();
    }
        
    /*
     * Get all echantillon
     */
    function get_all_echantillon($params = array())
    {
        $this->db->order_by('GRAPPE', 'desc');
        if(isset($params) && !empty($params))
        {
            $this->db->limit($params['limit'], $params['offset']);
        }
        return $this->db->get('ECHANTILLON')->result_array();
    }
        
    /*
     * function to add new echantillon
     */
    function add_echantillon($params)
    {
        $this->db->insert('ECHANTILLON',$params);
        return $this->db->insert_id();
    }
    
    /*
     * function to update echantillon
     */
    function update_echantillon($GRAPPE,$params)
    {
        $this->db->where('GRAPPE',$GRAPPE);
        return $this->db->update('ECHANTILLON',$params);
    }
    
    /*
     * function to delete echantillon
     */
    function delete_echantillon($GRAPPE)
    {
        return $this->db->delete('ECHANTILLON',array('GRAPPE'=>$GRAPPE));
    }
}
