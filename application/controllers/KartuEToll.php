<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class KartuEToll extends CI_Controller {

	var $API="";

    public function __construct() {
        parent::__construct();

        if($this->session->userdata('status') != "login"){
			redirect(base_url("login"));
        }
        $this->API="http://localhost/api_trust";
    }

    public function index(){
        $data['kartuetoll'] = json_decode($this->curl->simple_get($this->API.'/kartuetoll'));
        $this->load->view('kartuetoll/list',$data);
    }

    public function add(){
        $this->load->view("kartuetoll/add");
    }

    public function processAdd(){
        $req = array(
            "e_card_jenis" => $this->input->post("e_card_jenis"),
            "e_card_code" => $this->input->post("e_card_code"),
            "status"      => "Active"
        );

        $result =  json_decode($this->curl->simple_post($this->API.'/kartuetoll', $req, array(CURLOPT_BUFFERSIZE => 10))); 
        echo $result->status;
    }

    public function edit($id){
        $data['kartuetoll'] = json_decode($this->curl->simple_get($this->API.'/kartuetoll/'.$id));
        $this->load->view('kartuetoll/edit',$data);
    }

    public function processEdit(){
        $req = array(
            "e_card_no" => $this->input->post("e_card_no"),
            "e_card_jenis" => $this->input->post("e_card_jenis"),
            "e_card_code" => $this->input->post("e_card_code"),
            "status" => "Active"
        );

        $result =  json_decode($this->curl->simple_put($this->API.'/kartuetoll', $req, array(CURLOPT_BUFFERSIZE => 10))); 
        echo $result->status;
    }

    public function delete($id){
        $result = json_decode($this->curl->simple_delete($this->API.'/kartuetoll/' . $id, array(CURLOPT_BUFFERSIZE => 10))); 
        echo $result->status;
    }

    public function get_kartu_result(){
        $output = '';
        $kartuetoll = json_decode($this->curl->simple_get($this->API.'/kartuetoll/'.$this->input->post('kartuData')));
        $output .= '      
        <table class="table"> 
            <tr>
                <td style="border:none">Jenis Kartu</td>
                <td style="border:none">:</td>
                <td style="border:none">'.$kartuetoll->data->e_card_jenis.'</td>
            </tr>
            <tr>
                <td>Kode Kartu</td>
                <td>:</td>
                <td>'.$kartuetoll->data->e_card_code.'</td>
            </tr>
        </table>';
        echo $output;
    }
}