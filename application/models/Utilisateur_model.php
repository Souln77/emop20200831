<?php
/* 
 * Generated by CRUDigniter v3.2 
 * www.crudigniter.com
 */
 
class Utilisateur_model extends CI_Model
{
    public $table = 'utilisateur';
    public $id = 'id';

    function __construct()
    {
        parent::__construct();
        
    }
    
    /*
     * Get by id
     */
    function get($id)
    {
        return $this->db->get_where($this->table,array($this->id=>$id))->row_array();
    }
    
    /*
     * Get all count
     */
    function get_all_count()
    {
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }
        
    /*
     * Get all
     */
    function get_all($params = array())
    {
        $this->db->order_by($this->id, 'desc');
        if(isset($params) && !empty($params))
        {
            $this->db->limit($params['limit'], $params['offset']);
        }
        return $this->db->get($this->table)->result_array();
    }
        
    /*
     * function to add new 
     */
    function add($params)
    {
        $this->db->insert($this->table,$params);
        return $this->db->insert_id();
    }
    
    /*
     * function to update 
     */
    function update($id,$params)
    {
        $this->db->where($this->id,$id);
        return $this->db->update($this->table,$params);
    }
    
    /*
     * function to delete 
     */
    function delete($id)
    {
        return $this->db->delete($this->table,array($this->id=>$id));
    }
}