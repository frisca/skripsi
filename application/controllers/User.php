<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	var $API="";

    public function __construct() {
        parent::__construct();

        if($this->session->userdata('status') != "login"){
			redirect(base_url("login"));
        }
        $this->API="http://localhost/api_trust";
    }

    public function index(){
        $data['user'] = json_decode($this->curl->simple_get($this->API.'/user'));
        $this->load->view('user/list',$data);
    }

    public function add(){
        $this->load->view("user/add");
    }

    public function processAdd(){
        $req = array(
            "role" => $this->input->post("role"),
            "nama_lengkap" => $this->input->post("nama_lengkap"),
            "username" => $this->input->post("username"),
            "password" => md5($this->input->post("password")),
            "jenis_kelamin" => $this->input->post("jenis_kelamin"),
            "no_tlp_1"  => $this->input->post("no_tlp_1"),
            "no_tlp_2"  => "",
            "alamat"  => $this->input->post("alamat"),
            "status" => "Active",
            "profil_pic" => "",
            "ktp" => $this->input->post("ktp")
        );

        $result =  json_decode($this->curl->simple_post($this->API.'/user', $req, array(CURLOPT_BUFFERSIZE => 10))); 
        echo $result->status;
    }

    public function edit($id){
        $data['user'] = json_decode($this->curl->simple_get($this->API.'/user/'.$id));
        $this->load->view('user/edit',$data);
    }

    public function processEdit(){
        $req = array(
            "user_id" => $this->input->post("user_id"),
            "role" => $this->input->post("role"),
            "nama_lengkap" => $this->input->post("nama_lengkap"),
            "username" => $this->input->post("username"),
            "jenis_kelamin" => $this->input->post("jenis_kelamin"),
            "no_tlp_1"  => $this->input->post("no_tlp_1"),
            "alamat"  => $this->input->post("alamat"),
            "ktp" => $this->input->post("ktp")
        );

        $result =  json_decode($this->curl->simple_put($this->API.'/user', $req, array(CURLOPT_BUFFERSIZE => 10))); 
        echo $result->status;
    }

    public function delete($id){
        $result = json_decode($this->curl->simple_delete($this->API.'/user/' . $id, array(CURLOPT_BUFFERSIZE => 10))); 
        echo $result->status;
    }

    public function get_user_result(){
        $output = '';
        $user = json_decode($this->curl->simple_get($this->API.'/user/'.$this->input->post('userData')));
        $output .= '      
        <table class="table"> 
            <tr>
                <td style="border:none">Nama Lengkap</td>
                <td style="border:none">:</td>
                <td style="border:none">'.$user->data->nama_lengkap.'</td>
            </tr>
            <tr>
                <td>Username</td>
                <td>:</td>
                <td>'.$user->data->username.'</td>
            </tr>
            <tr>
                <td>Jenis Kelamin</td>
                <td>:</td>
                <td>'.$user->data->jenis_kelamin.'</td>
            </tr>
            <tr>
                <td>Alamat</td>
                <td>:</td>
                <td>'.$user->data->alamat.'</td>
            </tr>
            <tr>
                <td>Handphone</td>
                <td>:</td>
                <td>'.$user->data->no_tlp_1.'</td>
            </tr>
            <tr>
                <td>KTP</td>
                <td>:</td>
                <td>'.$user->data->ktp.'</td>
            </tr>
            <tr>
                <td>Alamat</td>
                <td>:</td>
                <td>'.$user->data->alamat.'</td>
            </tr>
        </table>';
        echo $output;
    }
}