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
        $this->load->model("product_image_model");
    }
    public function index()
    {


    /** tablodan verilerin getirilmesi */

    $items = $this->product_model->get_all(
        // sıralama işlemini rank sütununa göre yapar
        array(), "rank ASC"
    );

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
    public function delete($id){
        $delete = $this->product_model->delete(
            array(
                "id" => $id
            )
        );
        // TODO alert sistemi eklenecek...
        if ($delete){

            redirect(base_url("product"));

        }else {
            redirect(base_url("product"));
        }
    }
    public function isActiveSetter($id){
        if($id){
            $isActive = ($this->input->post("data") === "true") ? 1:0;

            $this->product_model->update(
                array(
                    "id" => $id
                ),
                array(
                    "isActive" => $isActive
                )
            );
        }
    }
    public function rankSetter(){
        $data = $this->input->post("data");
        parse_Str($data, $order);
        $items = $order["ord"];
        foreach ($items as $rank => $id){
            $this->product_model->update(
                array(
                    "id" => $id,
                    "rank !=" => $rank
                     ),
                array(
                    "rank" => $rank
                     )
            );
        }
    }
    public function image_form($id){

        $viewData = new stdClass();

        /** view'e gönderilecek değişkenlerin set edilmesi */
        $viewData->viewFolder = $this->viewFolder;
        $viewData->subviewFolder = "image";
        $viewData->item = $this->product_model->get(
            array(
                "id" => $id
            )
        );

        $viewData->item_images = $this->product_image_model->get_all(
            array(
                "product_id" => $id
            )
        );

        $this->load->view("{$this->viewFolder}/{$viewData->subviewFolder}/index", $viewData);

    }
    public function image_upload($id){
        // Giriş yapılan yerin zaman dilimini ayarlar
        echo date_default_timezone_set('Etc/GMT-3');
        $config["allowed_types"] = "jpg|jpeg|png";
        $config["upload_path"] = "uploads/$this->viewFolder/";

        $this->load->library("upload", $config);

        $upload = $this->upload->do_upload("file");

        if($upload){
            $uploaded_file = $this->upload->data("file_name");

            $this->product_image_model->add(
                array (
                    "img_url"     => $uploaded_file,
                    "rank"        => 0,
                    "isActive"    => 1,
                    "isCover"     => 0,
                    "createdAt"   => date("Y-m-d H:i:s"),
                    "product_id"  => $id
                )
            );

        }else{

            echo "işlem başarısız";

        }
    }
}