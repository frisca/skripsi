<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MobilKembali extends CI_Controller {

	var $API="";

    public function __construct() {
        parent::__construct();

        if($this->session->userdata('status') != "login"){
			redirect(base_url("login"));
        }
        $this->API="http://localhost/api_trust";
    }

    public function index(){
        $data['mobilkembali'] = json_decode($this->curl->simple_get($this->API.'/mobilkembali'));
        $data['mobilkeluar'] = json_decode($this->curl->simple_get($this->API.'/mobilkeluar'));
        $data['cars'] = json_decode($this->curl->simple_get($this->API.'/kendaraan'));
        $data['users'] = json_decode($this->curl->simple_get($this->API.'/user'));
        $this->load->view('mobilkembali/list',$data);
    }

    public function add(){
        $data['mobilkeluar'] = json_decode($this->curl->simple_get($this->API.'/mobilkeluar'));
        $data['cars'] = json_decode($this->curl->simple_get($this->API.'/kendaraan'));
        $data['cards'] = json_decode($this->curl->simple_get($this->API.'/kartuetoll'));
        $this->load->view('mobilkembali/add', $data);
    }

    public function processAdd(){
        $out_no = null;
        $km_awal = null;
        $tanggal_keluar = "";

        $out = json_decode($this->curl->simple_get($this->API.'/mobilkeluar'));

        if ($this->session->userdata("role") == "Admin"){
            foreach($out->data as $value){
                if($value->car_no == $this->input->post("car_no") && $value->status == "In Use" && $value->user_id == $this->session->userdata("user_id")){
                    $out_no  = $value->out_no;
                    $km_awal = $value->km_awal;
                    $tanggal_keluar = date("Y-m-d",strtotime($value->out_dt));
                }
            }

            $req_in_car = array(
                'in_dt'                     => date('Y-m-d', strtotime($this->input->post("in_dt"))),
                'out_no'                    => $out_no,
                'km_akhir'                  => $this->input->post("km_akhir"),
                'car_no'                    => $this->input->post("car_no"),
                'model'                     => '',
                'user_id'                   => $this->session->userdata('user_id'),
                'status'                    => 'Done',
                'keterangan'                => '',
                'km_awal'                   => $km_awal,
                'total_jarak_tempuh'        => (int)$km_awal + (int)$this->input->post('km_akhir'),
                'e_card_code'               => $this->input->post('e_card_code'),
                'sisa_etol'                 => $this->input->post('sisa_etol')
            );
            
        }else{
            foreach($out->data as $value){
                if($value->car_no == $this->input->post("car_no") && $value->status == "In Use" && $value->user_id == $this->session->userdata("user_id")){
                    $out_no  = $value->out_no;
                    $km_awal = $value->km_awal;
                    $tanggal_keluar = date("Y-m-d",strtotime($value->out_dt));
                }
            }

            $req_in_car = array(
                'in_dt'                     => date('Y-m-d', strtotime($this->input->post("in_dt"))),
                'out_no'                    => $out_no,
                'km_akhir'                  => $this->input->post("km_akhir"),
                'car_no'                    => $this->input->post("car_no"),
                'model'                     => '',
                'user_id'                   => $this->session->userdata('user_id'),
                'status'                    => 'Done',
                'keterangan'                => '',
                'km_awal'                   => $km_awal,
                'total_jarak_tempuh'        => (int)$km_awal + (int)$this->input->post('km_akhir'),
                'e_card_code'               => $this->input->post('e_card_code'),
                'sisa_etol'                 => $this->input->post('sisa_etol')
            );
        }
        
        $r_in = json_decode($this->curl->simple_post($this->API.'/mobilkembali', $req_in_car, array(CURLOPT_BUFFERSIZE => 10)));
        echo $r_in->status;
    }


    public function edit($id){
        $data['mobilkeluar'] = json_decode($this->curl->simple_get($this->API.'/mobilkeluar'));
        $data['cars'] = json_decode($this->curl->simple_get($this->API.'/kendaraan'));
        $data['cards'] = json_decode($this->curl->simple_get($this->API.'/kartuetoll'));
        $data['mobilkembali'] = json_decode($this->curl->simple_get($this->API.'/mobilkembali/'.$id));
        $data['cards_detail'] = json_decode($this->curl->simple_get($this->API.'/kartudetail'));
        $this->load->view('mobilkembali/edit', $data);
    }


    public function processEdit(){
        if ($this->session->userdata("role") == "Admin"){
            $req = array(
                "in_no"  => $this->input->post("in_no"),
                "in_dt"  => date('Y-m-d', strtotime($this->input->post("in_dt"))),
                "km_akhir" => $this->input->post("km_akhir")
            );
        }else{
            $req = array(
                "in_no"  => $this->input->post("in_no"),
                "in_dt"  => date('Y-m-d', strtotime($this->input->post("in_dt"))),
                "km_akhir" => $this->input->post("km_akhir")
            );
        }
        
        $result =  json_decode($this->curl->simple_put($this->API.'/mobilkembali', $req, array(CURLOPT_BUFFERSIZE => 10))); 
        echo $result->status;
    }

    public function get_mobilkembali_result(){
        $output = '';
        $no_plat = '';
        $mobil = '';
        $in_dt = '';
        $out_dt = '';
        $km_awal = '';
        $tujuan = '';


        $in_car = json_decode($this->curl->simple_get($this->API.'/mobilkembali/'.$this->input->post('mobilKembaliData')));
        $cars = json_decode($this->curl->simple_get($this->API.'/kendaraan'));
        $out_car = json_decode($this->curl->simple_get($this->API.'/mobilkeluar'));
        $user = json_decode($this->curl->simple_get($this->API.'/user/'.$in_car->data->user_id));
        
        foreach($cars->data as $car){
            // if($in_car->data->car_no == $car->car_no){
            //     $no_plat = $car->no_plat;
            //     $mobil = $car->model;
            // }
            foreach($out_car->data as $v){
                if($in_car->data->car_no == $car->car_no && $v->car_no == $in_car->data->car_no && $v->out_no == $in_car->data->out_no){
                    $no_plat = $car->no_plat;
                    $mobil = $car->model;
                    $in_dt = date('d-m-Y', strtotime($in_car->data->in_dt));
                    $out_dt = date('d-m-Y', strtotime($v->out_dt));
                    $km_awal = $v->km_awal;
                    $tujuan = $v->tujuan;
                }
            }
        }

        $output .= '      
        <table class="table"> 
            <tr>
                <td style="border:none">Nomor Polisi</td>
                <td style="border:none">:</td>
                <td style="border:none">'.$no_plat.'</td>
            </tr>
            <tr>
                <td style="border:none">Tanggal Keluar</td>
                <td style="border:none">:</td>
                <td style="border:none">'.$out_dt.'</td>
            </tr>
            <tr>
                <td style="border:none">KM Awal</td>
                <td style="border:none">:</td>
                <td style="border:none">'.$km_awal.' KM </td>
            </tr>
            <tr>
                <td style="border:none">Tujuan</td>
                <td style="border:none">:</td>
                <td style="border:none">'.$tujuan.'</td>
            </tr>
            <tr>
                <td style="border:none">Mobil</td>
                <td style="border:none">:</td>
                <td style="border:none">'.$mobil.'</td>
            </tr>
            <tr>
                <td style="border:none">Driver</td>
                <td style="border:none">:</td>
                <td style="border:none">'.$user->data->username.'</td>
            </tr>
            <tr>
                <td style="border:none">Tanggal Masuk</td>
                <td style="border:none">:</td>
                <td style="border:none">'.date("d-m-Y", strtotime($in_car->data->in_dt)).'</td>
            </tr>
            <tr>
                <td style="border:none">KM Akhir</td>
                <td style="border:none">:</td>
                <td style="border:none">'.$in_car->data->km_akhir.' KM </td>
            </tr>
        </table>';
        echo $output;
    }
}