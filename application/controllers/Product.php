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
            // Giriş yapılan yerin zaman dilimini ayarlar
           echo date_default_timezone_set('Etc/GMT-3');

           // Formdan gelen verileri modeli de kullanarak veritabanına gönderir
           $insert = $this->product_model->add(
                array(
                    "title" => $this->input->post("title"),
                    "description" => $this->input->post("description"),
                    // tools helper'inden convertToSeo fonksiyonunu çağırıyor ve başlığı seo şekline dönüştürüyor
                    "url" => convertToSeo($this->input->post("title")),
                    "isActive" => 1,
                    "rank" => 0,
                    "createdAt" => date('Y-m-d H:i:s')
                )
            );
            // TODO alert sistemi eklenecek...
           if ($insert){

               redirect(base_url("product"));

            }else {
               redirect(base_url("product"));
           }

        } else {
            /** view'e gönderilecek değişkenlerin set edilmesi */
            $viewData = new stdClass();
            $viewData->viewFolder = $this->viewFolder;
            $viewData->subviewFolder = "add";
            $viewData->form_hata = true;

            $this->load->view("{$this->viewFolder}/{$viewData->subviewFolder}/index", $viewData);
        }



    }
    public function update_form($id){

        $viewData = new stdClass();

        /* Tablodan verilerin alınması */

        $item = $this->product_model->get(
            array(
                   "id" => $id,
            )
        );

        /** view'e gönderilecek değişkenlerin set edilmesi */
        $viewData->viewFolder = $this->viewFolder;
        $viewData->subviewFolder = "update";
        $viewData->item = $item;

        $this->load->view("{$this->viewFolder}/{$viewData->subviewFolder}/index", $viewData);

    }
    public function update($id){
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
            // Giriş yapılan yerin zaman dilimini ayarlar
            echo date_default_timezone_set('Etc/GMT-3');

            // Formdan gelen verileri modeli de kullanarak veritabanına gönderir
            $update = $this->product_model->update(
                array(
                    "id" => $id
                ),
                array(
                    "title" => $this->input->post("title"),
                    "description" => $this->input->post("description"),
                    // tools helper'inden convertToSeo fonksiyonunu çağırıyor ve başlığı seo şekline dönüştürüyor
                    "url" => convertToSeo($this->input->post("title")),
                )
            );
            // TODO alert sistemi eklenecek...
            if ($update){

                redirect(base_url("product"));

            }else {
                redirect(base_url("product"));
            }

        } else {
            /** view'e gönderilecek değişkenlerin set edilmesi */
            $viewData = new stdClass();
            // tablodan verilerin alınması
            $item = $this->product_model->get(
                array(
                    "id" => $id,
                )
            );
            $viewData->viewFolder = $this->viewFolder;
            $viewData->subviewFolder = "update";
            $viewData->item = $item;
            $viewData->form_hata = true;

            $this->load->view("{$this->viewFolder}/{$viewData->subviewFolder}/index", $viewData);
        }



    }
}