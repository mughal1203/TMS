<?php

/**
 * Created by PhpStorm.
 * User: Mughal
 * Date: 7/20/2017
 * Time: 1:46 PM
 */
class My_Model extends CI_Model
{
    protected $table;
    protected $prefix;
    function __construct()
    {
        parent::__construct();
    }

    /**
     * @param null $table_name
     * @param null $prefix
     * @param null $id
     * @param bool $single
     * @return mixed
     */
    public function get($id = null, $single = false){

        if(!empty($id)){
            $this->db->where($this->prefix."_id",$id);
            $method = 'row_array';
        }elseif ($single == true){
            $method = 'row_array';
        }
        else{
            $method = 'result_array';
        }

        return $this->db->get($this->table)->$method();
    }

    /**
     * @param $table_name
     * @param $where
     * @param bool $single
     * @return array
     */
    public function get_by($where, $single = false){
        return $this->db->get_where($this->table, $where, $single)->result_array();
    }

    /**
     * @param $table_name
     * @param null $where
     * @param $data
     * @param null $id
     * @return null
     */
    public function save($data, $where=null, $id = null){

        if(empty($id)){
            $timestamp = ['created_at'=>date("Y-m-d H:i:s"),'updated_at'=>date("Y-m-d H:i:s")];
            $this->db->set($timestamp);
            $result= $this->db->insert($this->table,$data);
            $id = $this->db->insert_id();
        }else{
            $this->db->update($this->table, $data, $where);
        }
        return $id;
    }

    /**
     * @param $table_name
     * @param $where
     * @return bool|mixed
     */
    public function delete($where){
        if(empty($where)){
            return false;
        }
        else {
            return $this->db->delete($this->table, $where, 'limit = 1');
        }
    }
}