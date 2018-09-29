<?php

class Product_model extends CI_Model{

    public $tablename = "products";

    public function __construct()
    {
        parent::__construct();
    }
    public function get_all(){

        return $this->db->get($this->tablename)->result();

    }

    public function add($data = array()) {

        return $this->db->insert($this->tablename, $data);

    }

}