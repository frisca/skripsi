<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Sistem Informasi Pengelolaan Data dan Pelacakan Mobil</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="<?php echo base_url()?>assets/node_modules/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="<?php echo base_url()?>assets/node_modules/perfect-scrollbar/dist/css/perfect-scrollbar.min.css">
  <!-- endinject -->
  <!-- plugin css for this page -->
  <link rel="stylesheet" href="<?php echo base_url()?>assets/node_modules/jquery-bar-rating/dist/themes/css-stars.css">
  <link rel="stylesheet" href="<?php echo base_url()?>assets/node_modules/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css" />
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="<?php echo base_url()?>assets/css/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="images/favicon.png" />
  <script src="https://lipis.github.io/bootstrap-sweetalert/dist/sweetalert.js"></script>
  <link rel="stylesheet" href="https://lipis.github.io/bootstrap-sweetalert/dist/sweetalert.css" />
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap.min.css" />
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBHTZQJqVbYFtyDJgn9LmoC8qObsv--mic&callback=initMap" type="text/javascript"></script>

  <style type="text/css">
        #map-canvas {
            margin: 0;
            padding: 0;
            height: 400px;
            max-width: none;
        }
        #map-canvas img {
            max-width: none !important;
        }
        .gm-style-iw {
            width: 350px !important;
            top: 15px !important;
            left: 0px !important;
            background-color: #fff;
            box-shadow: 0 1px 6px rgba(178, 178, 178, 0.6);
            border: 1px solid rgba(72, 181, 233, 0.6);
            border-radius: 2px 2px 10px 10px;
        }
        #iw-container {
            margin-bottom: 10px;
        }
        #iw-container .iw-title {
            font-family: 'Open Sans Condensed', sans-serif;
            font-size: 22px;
            font-weight: 400;
            padding: 10px;
            background-color: #48b5e9;
            color: white;
            margin: 0;
            border-radius: 2px 2px 0 0;
        }
        #iw-container .iw-content {
            font-size: 13px;
            line-height: 18px;
            font-weight: 400;
            margin-right: 1px;
            padding: 15px 5px 20px 15px;
            max-height: 140px;
            overflow-y: auto;
            overflow-x: hidden;
        }
        .iw-content img {
            float: right;
            margin: 0 5px 5px 10px; 
        }
        .iw-subTitle {
            font-size: 16px;
            font-weight: 700;
            padding: 5px 0;
        }
        .iw-bottom-gradient {
            position: absolute;
            width: 326px;
            height: 25px;
            bottom: 10px;
            right: 18px;
            background: linear-gradient(to bottom, rgba(255,255,255,0) 0%, rgba(255,255,255,1) 100%);
            background: -webkit-linear-gradient(top, rgba(255,255,255,0) 0%, rgba(255,255,255,1) 100%);
            background: -moz-linear-gradient(top, rgba(255,255,255,0) 0%, rgba(255,255,255,1) 100%);
            background: -ms-linear-gradient(top, rgba(255,255,255,0) 0%, rgba(255,255,255,1) 100%);
        }
    </style>
    
    <script type="text/javascript">
        var marker;
        function initialize() {
            var infoWindow = new google.maps.InfoWindow;
            
            var mapOptions = {
              mapTypeId: google.maps.MapTypeId.ROADMAP
            } 
     
            var map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);
            var bounds = new google.maps.LatLngBounds();

            // Retrieve data from database
            <?php
                foreach ($mitra as $key => $value)
                {
            ?>
                var lat = <?php echo $value['lat']?>;
                var lng = <?php echo $value['lng']?>;
                var distance = <?php echo json_encode($value['distance']);?>; 
                

                var info = '<div id="iw-container">' +
                        '<div class="iw-content">' +
                          '<p>' + distance + ' dari lokasi Anda</p>' +
                        '</div>' +
                      '</div>';

                var lokasi = new google.maps.LatLng(lat, lng);
                bounds.extend(lokasi);
                var marker = new google.maps.Marker({
                    map: map,
                    position: lokasi
                });       
                map.fitBounds(bounds);
                bindInfoWindow(marker, map, infoWindow, info);

            <?php
                }
            ?>
              
            function bindInfoWindow(marker, map, infoWindow, html) {
              google.maps.event.addListener(marker, 'click', function() {
                infoWindow.setContent(html);
                infoWindow.open(map, marker);
              });
            }
     
            }
        google.maps.event.addDomListener(window, 'load', initialize);


    </script>
</head>
<body style="background-color: #3366ff" onload="initialize()">
    <div class="container-scroller">
        <!-- partial:partials/_navbar.html -->
        <?php $this->load->view('header');?>
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            <div class="row row-offcanvas row-offcanvas-right">
                <!-- partial:partials/_sidebar.html -->
                <?php $this->load->view('menu');?>
                <!-- partial:partials/_sidebar.html -->
                <div class="content-wrapper">
                    <div class="row">
                        <div class="col-lg-12 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Lacak Mobil Keluar</h4>
                                    <hr>
                                    <div id="map-canvas" style="width: 1080px; height: 600px;margin-top: 70px;"></div>
                                </div>
                            </div>
                        </div>
                    </div>  
                </div>
            </div>
        </div>
    <!-- <div id="map-canvas" style="width: 1138px; height: 600px;margin-top: 70px;"></div> -->

    <!-- plugins:js -->
    <script src="<?php echo base_url()?>assets/node_modules/jquery/dist/jquery.min.js"></script>
    <script src="<?php echo base_url()?>assets/node_modules/popper.js/dist/umd/popper.min.js"></script>
    <script src="<?php echo base_url()?>assets/node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url()?>assets/node_modules/perfect-scrollbar/dist/js/perfect-scrollbar.jquery.min.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page-->
    <script src="<?php echo base_url()?>assets/node_modules/chart.js/dist/Chart.min.js"></script>
    <!-- End plugin js for this page-->
    <!-- inject:js -->
    <script src="<?php echo base_url()?>assets/js/off-canvas.js"></script>
    <script src="<?php echo base_url()?>assets/js/misc.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page-->
    <script src="<?php echo base_url()?>assets/js/dashboard.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<body>
</html>