<?php
/* 
 * Generated by CRUDigniter v3.2 
 * www.crudigniter.com
 */
 
class Passage_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    /*
     * Get passage by id
     */
    function get_passage($id)
    {
        return $this->db->get_where('PASSAGE',array('id'=>$id))->row_array();
    }
    
    /*
     * Get all passage count
     */
    function get_all_passage_count()
    {
        $this->db->from('PASSAGE');
        return $this->db->count_all_results();
    }
        
    /*
     * Get all passage
     */
    function get_all_passage($params = array())
    {
        $this->db->order_by('annee', 'desc');
        $this->db->order_by('passage', 'desc');
        if(isset($params) && !empty($params))
        {
            $this->db->limit($params['limit'], $params['offset']);
        }
        return $this->db->get('PASSAGE')->result_array();
    }
        
    /*
     * function to add new passage
     */
    function add_passage($params)
    {
        $this->db->insert('PASSAGE',$params);
        return $this->db->insert_id();
    }
    
    /*
     * function to update passage
     */
    function update_passage($id,$params)
    {
        $this->db->where('id',$id);
        return $this->db->update('PASSAGE',$params);
    }
    
    /*
     * function to delete passage
     */
    function delete_passage($id)
    {
        return $this->db->delete('PASSAGE',array('id'=>$id));
    }
}
