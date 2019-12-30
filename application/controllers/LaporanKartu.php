<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LaporanKartu extends CI_Controller {

	var $API="";

    public function __construct() {
        parent::__construct();

        if($this->session->userdata('status') != "login"){
			redirect(base_url("login"));
        }
        $this->API="http://localhost/api_trust";
    }

    public function index(){
        $data['laporan'] = json_decode($this->curl->simple_get($this->API.'/laporankartu'));
        $this->load->view('laporan/kartu',$data);
    }

    // public function mobil(){
    //     $data['laporan'] = json_decode($this->curl->simple_get($this->API.'/laporanmobil'));
    //     $this->load->view('laporan/mobil',$data);
    // }
}