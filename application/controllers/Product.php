<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product extends CI_Controller
{

    public $viewFolder = "";

    public function __construct()
    {
        parent::__construct();
        $this->viewFolder = "product_v";
        $this->load->model("product_model");
    }
    public function index()
    {


    /** tablodan verilerin getirilmesi */

    $items = $this->product_model->get_all();

    /** view'e gönderilecek değişkenlerin set edilmesi */

        $viewData = new stdClass();
        $viewData->viewFolder = $this->viewFolder;
        $viewData->subviewFolder = "list";
        $viewData->items = $items;

        $this->load->view("{$this->viewFolder}/{$viewData->subviewFolder}/index", $viewData);
    }
    public function add(){
        $viewData = new stdClass();

        /** view'e gönderilecek değişkenlerin set edilmesi */
        $viewData->viewFolder = $this->viewFolder;
        $viewData->subviewFolder = "add";

        $this->load->view("{$this->viewFolder}/{$viewData->subviewFolder}/index", $viewData);

    }

    public function save(){
    $this->load->library("form_validation");
    // Kurallar yazılır
        $this->form_validation->set_rules("title","Ürün Adı","required|trim");
        $this->form_validation->set_message(
            array(
                  "required" =>  "<b>{field}</b> boş olamaz"
            )
        );

    // Formvalidation çalıştırılır  // True ->False

        $validate = $this->form_validation->run();

        if ($validate){

        } else {
            /** view'e gönderilecek değişkenlerin set edilmesi */
            $viewData = new stdClass();
            $viewData->viewFolder = $this->viewFolder;
            $viewData->subviewFolder = "add";
            $viewData->form_hata = true;

            $this->load->view("{$this->viewFolder}/{$viewData->subviewFolder}/index", $viewData);
        }



    }
}