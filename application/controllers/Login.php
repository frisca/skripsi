<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	var $API="";

    public function __construct() {
        parent::__construct();
        $this->API="http://localhost/api_trust";
    }

	public function index()
	{
		$this->load->view('login');
    }
    
    public function processLogin(){
        $req = array(
            'username' => $this->input->post('username'),
            'password' => $this->input->post('password')
        );

        $result =  json_decode($this->curl->simple_post($this->API.'/login', $req, array(CURLOPT_BUFFERSIZE => 10))); 
        if ($result->status == true) {
            $data = array(
                "username" => $result->data->username,
                "user_id"  => $result->data->user_id,
                "nama_lengkap" => $result->data->nama_lengkap,
                "jenis_kelamin" => $result->data->jenis_kelamin,
                "alamat"    => $result->data->alamat,
                "role"      => $result->data->role,
                "status"    => "login"
            );
			$this->session->set_userdata($data);
			redirect(base_url("home"));
        }else{
            redirect(base_url("login"));
        }
    }

    function logout(){
        $this->session->sess_destroy();
        redirect(base_url('login'));
    }
}
