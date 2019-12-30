<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MobilKeluar extends CI_Controller {

	var $API="";

    public function __construct() {
        parent::__construct();

        if($this->session->userdata('status') != "login"){
			redirect(base_url("login"));
        }
        $this->API="http://localhost/api_trust";
    }

    public function index(){
        $data['mobilkeluar'] = json_decode($this->curl->simple_get($this->API.'/mobilkeluar'));
        $data['cars'] = json_decode($this->curl->simple_get($this->API.'/kendaraan'));
        $data['users'] = json_decode($this->curl->simple_get($this->API.'/user'));
        $this->load->view('mobilkeluar/list',$data);
    }

    public function add(){
        $data['cars'] = json_decode($this->curl->simple_get($this->API.'/kendaraan'));
        $this->load->view("mobilkeluar/add", $data);
    }

    public function processAdd(){
        if ($this->session->userdata("role") == "Admin"){
            $req = array(
                "out_dt"  => date('Y-m-d', strtotime($this->input->post("out_dt"))),
                "km_awal" => $this->input->post("km_awal"),
                "tujuan"  => $this->input->post("tujuan"),
                "car_no"  => $this->input->post("car_no"),
                "user_id" => $this->session->userdata("user_id"),
                "status"  => "In Use",
                "progress" => "Approve",
            );
        }else{
            $req = array(
                "out_dt"  => date('Y-m-d', strtotime($this->input->post("out_dt"))),
                "km_awal" => $this->input->post("km_awal"),
                "tujuan"  => $this->input->post("tujuan"),
                "car_no"  => $this->input->post("car_no"),
                "user_id" => $this->session->userdata("user_id"),
                "status"  => "Request",
                "progress" => "In Progress",
            );
        }
        
        $result =  json_decode($this->curl->simple_post($this->API.'/mobilkeluar', $req, array(CURLOPT_BUFFERSIZE => 10))); 
        echo $result->status;
    }

    public function get_mobilkeluar_result(){
        $output = '';
        $no_plat = '';
        $mobil = '';
        $out_car = json_decode($this->curl->simple_get($this->API.'/mobilkeluar/'.$this->input->post('mobilKeluarData')));
        $cars = json_decode($this->curl->simple_get($this->API.'/kendaraan'));
        $user = json_decode($this->curl->simple_get($this->API.'/user/'.$out_car->data->user_id));
        
        foreach($cars->data as $car){
            if($out_car->data->car_no == $car->car_no){
                $no_plat = $car->no_plat;
                $mobil = $car->model;
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
                <td>Mobil</td>
                <td>:</td>
                <td>'.$mobil.'</td>
            </tr>
            <tr>
                <td>Tanggal Keluar</td>
                <td>:</td>
                <td>'.date('d-m-Y', strtotime($out_car->data->out_dt)).'</td>
            </tr>
            <tr>
                <td>KM Awal</td>
                <td>:</td>
                <td>'.$out_car->data->km_awal.' KM </td>
            </tr>
            <tr>
                <td>Tujuan</td>
                <td>:</td>
                <td>'.$out_car->data->tujuan.'</td>
            </tr>
            <tr>
                <td>Driver</td>
                <td>:</td>
                <td>'.$user->data->username.'</td>
            </tr>
            <tr>
                <td>Status</td>
                <td>:</td>
                <td>'.$out_car->data->status.'</td>
            </tr>
            <tr>
                <td>Progress</td>
                <td>:</td>
                <td>'.$out_car->data->progress.'</td>
            </tr>
        </table>';
        echo $output;
    }


    public function edit($id){
        $data['mobilkeluar'] = json_decode($this->curl->simple_get($this->API.'/mobilkeluar/'.$id));
        $data['cars'] = json_decode($this->curl->simple_get($this->API.'/kendaraan'));
        $this->load->view('mobilkeluar/edit',$data);
    }

    public function processEdit(){
        if ($this->session->userdata("role") == "Admin"){
            $req = array(
                "out_no"  => $this->input->post("out_no"),
                "out_dt"  => date('Y-m-d', strtotime($this->input->post("out_dt"))),
                "km_awal" => $this->input->post("km_awal"),
                "tujuan"  => $this->input->post("tujuan")
            );
        }else{
            $req = array(
                "out_no"  => $this->input->post("out_no"),
                "out_dt"  => date('Y-m-d', strtotime($this->input->post("out_dt"))),
                "km_awal" => $this->input->post("km_awal"),
                "tujuan"  => $this->input->post("tujuan")
            );
        }
        
        $result =  json_decode($this->curl->simple_put($this->API.'/mobilkeluar', $req, array(CURLOPT_BUFFERSIZE => 10))); 
        echo $result->status;
    }

    public function approve($id){
        $out_car = json_decode($this->curl->simple_get($this->API.'/mobilkeluar/'.$id));

        // request car in
        // $req_out_car = array(
        //     'in_dt'                     => '',
        //     'out_no'                    => $out_car->data->out_no,
        //     'km_akhir'                  => null,
        //     'car_no'                    => $out_car->data->car_no,
        //     'model'                     => '',
        //     'user_id'                   => $this->session->userdata('user_id'),
        //     'status'                    => '',
        //     'keterangan'                => ''
        // );

        // request approve
        $approve = array(
            'out_no'                    => $out_car->data->out_no,
            'car_no'                    => $out_car->data->car_no,
        );

        $result =  json_decode($this->curl->simple_put($this->API.'/approve', $approve, array(CURLOPT_BUFFERSIZE => 10))); 
        echo $result->status;
    }

    public function reject($id){
        $out_car = json_decode($this->curl->simple_get($this->API.'/mobilkeluar/'.$id));
        $req = array(
            "out_no"  => $out_car->data->out_no,
            "car_no" => $out_car->data->car_no
        );
        $result =  json_decode($this->curl->simple_put($this->API.'/reject', $req, array(CURLOPT_BUFFERSIZE => 10))); 
        echo $result->status;
    }

    public function lacak($id){
        $m_keluar = json_decode($this->curl->simple_get($this->API.'/mobilkeluar/'.$id));
        
        $apiKey = 'AIzaSyBHTZQJqVbYFtyDJgn9LmoC8qObsv--mic';

        // $addressFrom = 'Jl. H. R. Rasuna Said RT.18/RW.2, Kuningan, Karet Kuningan,  Jakarta, Indonesia';
        $addressFrom = 'Jl. H. R. Rasuna Said RT.18/RW.2, Kuningan, Karet Kuningan,  Jakarta, Indonesia';
		$addressTo = $m_keluar->data->tujuan;
        
        // Change address format
        $formattedAddrFrom    = str_replace(' ', '+', $addressFrom);
        $formattedAddrTo     = str_replace(' ', '+', $addressTo);
        $unit = 'K';
        
        // Geocoding API request with start address
        $geocodeFrom = file_get_contents('https://maps.googleapis.com/maps/api/geocode/json?address='.$formattedAddrFrom.'&sensor=false&key='.$apiKey);
        $outputFrom = json_decode($geocodeFrom);
        if(!empty($outputFrom->error_message)){
            return $outputFrom->error_message;
        }
        
        // Geocoding API request with end address
        $geocodeTo = file_get_contents('https://maps.googleapis.com/maps/api/geocode/json?address='.$formattedAddrTo.'&sensor=false&key='.$apiKey);
        $outputTo = json_decode($geocodeTo);
        if(!empty($outputTo->error_message)){
            return $outputTo->error_message;
        }
        
        // Get latitude and longitude from the geodata
        $latitudeFrom    = $outputFrom->results[0]->geometry->location->lat;
        $longitudeFrom    = $outputFrom->results[0]->geometry->location->lng;
        $latitudeTo        = $outputTo->results[0]->geometry->location->lat;
        $longitudeTo    = $outputTo->results[0]->geometry->location->lng;
        
        // Calculate distance between latitude and longitude
        $theta    = $longitudeFrom - $longitudeTo;
        $dist    = sin(deg2rad($latitudeFrom)) * sin(deg2rad($latitudeTo)) +  cos(deg2rad($latitudeFrom)) * cos(deg2rad($latitudeTo)) * cos(deg2rad($theta));
        $dist    = acos($dist);
        $dist    = rad2deg($dist);
        $miles    = $dist * 60 * 1.1515;
        
        // Convert unit and return distance
        $unit = strtoupper($unit);
        //$tamp = array();
        $t_distance = "";
        if($unit == "K"){
            $t_distance =  round($miles * 1.609344, 2).' km';
        }elseif($unit == "M"){
            $t_distance = round($miles * 1609.344, 2).' meters';
        }else{
            $t_distance = round($miles, 2).' miles';
        }

        // $data['distance'] =  $t_distance;
        // $data['lang'] =  $latitudeTo;
        // $data['lng'] = $longitudeTo;

        $result[] = array( 
            'distance' => $t_distance,
            'lat' => $latitudeTo,
            'lng' => $longitudeTo
        );

        $data['mitra'] = $result;

        $this->load->view("mobilkeluar/lacak", $data);
    }
}