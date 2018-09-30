<?php

class Product_model extends CI_Model{

    public $tablename = "products";

    public function __construct()
    {
        parent::__construct();
    }
    public function get_all($where = array()){

        return $this->db->where($where)->get($this->tablename)->result();

    }
    public function get($where = array()){

        return $this->db->where($where)->get($this->tablename)->row();

    }

    public function add($data = array()) {

        return $this->db->insert($this->tablename, $data);

    }

    public function update($where = array(),$data = array()){
        return $this->db->where($where)->update($this->tablename, $data);
    }

}