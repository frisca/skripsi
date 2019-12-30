<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kendaraan extends CI_Controller {

	var $API="";

    public function __construct() {
        parent::__construct();

        if($this->session->userdata('status') != "login"){
			redirect(base_url("login"));
        }
        $this->API="http://localhost/api_trust";
    }

    public function index(){
        $data['kendaraan'] = json_decode($this->curl->simple_get($this->API.'/kendaraan'));
        $this->load->view('kendaraan/list',$data);
    }

    public function add(){
        $this->load->view("kendaraan/add");
    }

    public function get_kendaraan_result(){
        $output = '';
        $kendaraan = json_decode($this->curl->simple_get($this->API.'/kendaraan/'.$this->input->post('kendaraanData')));
        $output .= '      
        <table class="table"> 
            <tr>
                <td style="border:none">Nomor Plat</td>
                <td style="border:none">:</td>
                <td style="border:none">'.$kendaraan->data->no_plat.'</td>
            </tr>
            <tr>
                <td>Merk</td>
                <td>:</td>
                <td>'.$kendaraan->data->merk.'</td>
            </tr>
            <tr>
                <td>Model</td>
                <td>:</td>
                <td>'.$kendaraan->data->model.'</td>
            </tr>
            <tr>
                <td>Type</td>
                <td>:</td>
                <td>'.$kendaraan->data->type.'</td>
            </tr>
            <tr>
                <td>Warna</td>
                <td>:</td>
                <td>'.$kendaraan->data->warna.'</td>
            </tr>
            <tr>
                <td>Tahun</td>
                <td>:</td>
                <td>'.$kendaraan->data->tahun.'</td>
            </tr>
            <tr>
                <td>Nomor Rangka</td>
                <td>:</td>
                <td>'.$kendaraan->data->no_rangka.'</td>
            </tr>
            <tr>
                <td>Nomor Mesin</td>
                <td>:</td>
                <td>'.$kendaraan->data->no_mesin.'</td>
            </tr>
            <tr>
                <td>Nomor BPKB</td>
                <td>:</td>
                <td>'.$kendaraan->data->no_bpkb.'</td>
            </tr>
            <tr>
                <td>Nama Pemilik</td>
                <td>:</td>
                <td>'.$kendaraan->data->nama_pemilik.'</td>
            </tr>
            <tr>
                <td>Alamat</td>
                <td>:</td>
                <td>'.$kendaraan->data->alamat.'</td>
            </tr>
            <tr>
                <td>Status Mobil</td>
                <td>:</td>
                <td>'.$kendaraan->data->status_mobil.'</td>
            </tr>
        </table>';
        echo $output;
    }

    public function processAdd(){
        $req = array(
            "no_plat" => $this->input->post("no_plat"),
            "nama_pemilik" => $this->input->post("nama_pemilik"),
            "alamat" => $this->input->post("alamat"),
            "merk" => $this->input->post("merk"),
            "type" => $this->input->post("type"),
            "jenis"  => $this->input->post("jenis"),
            "model"  => $this->input->post("model"),
            "tahun"  => $this->input->post("tahun"),
            "warna"  => $this->input->post("warna"),
            "no_rangka"  => $this->input->post("no_rangka"),
            "no_mesin"  => $this->input->post("no_mesin"),
            "no_bpkb"  => $this->input->post("no_bpkb"),
            "status_mobil"  => "Ready",
            "status" => "Active"
        );

        $result =  json_decode($this->curl->simple_post($this->API.'/kendaraan', $req, array(CURLOPT_BUFFERSIZE => 10))); 
        echo $result->status;
    }

    public function delete($id){
        $result = json_decode($this->curl->simple_delete($this->API.'/kendaraan/' . $id, array(CURLOPT_BUFFERSIZE => 10))); 
        echo $result->status;
    }

    public function edit($id){
        $data['kendaraan'] = json_decode($this->curl->simple_get($this->API.'/kendaraan/'.$id));
        $this->load->view('kendaraan/edit',$data);
    }

    public function processEdit(){
        $req = array(
            "car_no" => $this->input->post("car_no"),
            "no_plat" => $this->input->post("no_plat"),
            "nama_pemilik" => $this->input->post("nama_pemilik"),
            "alamat" => $this->input->post("alamat"),
            "merk" => $this->input->post("merk"),
            "type" => $this->input->post("type"),
            "jenis"  => $this->input->post("jenis"),
            "model"  => $this->input->post("model"),
            "tahun"  => $this->input->post("tahun"),
            "warna"  => $this->input->post("warna"),
            "no_rangka"  => $this->input->post("no_rangka"),
            "no_mesin"  => $this->input->post("no_mesin"),
            "no_bpkb"  => $this->input->post("no_bpkb")
        );
        
        $result =  json_decode($this->curl->simple_put($this->API.'/kendaraan', $req, array(CURLOPT_BUFFERSIZE => 10))); 
        echo $result->status;
    }
}