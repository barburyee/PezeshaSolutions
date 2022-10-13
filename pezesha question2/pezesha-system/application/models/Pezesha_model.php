<?php
/**
 * Created by Job Kimeli
 * Date: 10/13/2022
 * Time: 12:21 PM
 */

class Pezesha_model extends CI_Model
{
    public function get_all_records()
    {
        $query = $this->db->get('pezesha_data')->result();

        return $query;
    }
    public function get_few_records()
    {
        $where = array('status'=>1);
        $query = $this->db
        ->where($where)
        ->order_by('id', 'ASC')
        ->get('pezesha_data', 10)
        ->result();

        // $query = $this->db->
        // order_by id desc limit
        // get('pezesha_data')->
        // result();

        return $query;
    }
}