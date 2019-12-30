<?php $this->load->view("script_header")?>
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
                                    <h4 class="card-title">Mobil Kembali</h4>
                                    <hr>
                                    <a href="<?php echo base_url("mobilkembali/add")?>">
                                        <button type="button" class="btn btn-primary" style="margin-bottom:1rem;">
                                            Tambah
                                        </button>
                                    </a>
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Nomor Polisi</th>
                                                <th>Tanggal Keluar</th>
                                                <th>KM Awal</th>
                                                <th>Tujuan</th>
                                                <th>Mobil</th>
                                                <th>Driver</th>
                                                <th>Tanggal Masuk</th>
                                                <th>KM Akhir</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <!-- Admin -->
                                            <?php
                                                foreach($mobilkembali->data as $value) {
                                                    if($this->session->userdata("role") == "Admin") {
                                            ?>
                                            <tr id="<?php echo $value->in_no?>">
                                                <?php 
                                                    foreach($cars->data as $car){
                                                        if($car->car_no == $value->car_no){
                                                ?>
                                                <td>
                                                    <input type="button" class="btn btn-info btn-sm view_mobilkembali" value="<?php echo $car->no_plat?>" id="<?php echo $value->in_no; ?>">
                                                </td>
                                                <?php 
                                                    foreach($mobilkeluar->data as $out){
                                                        if($out->out_no == $value->out_no){
                                                ?>
                                                        <td>
                                                            <?php if($out->out_dt == "0000-00-00"){ echo '';}else{ echo date('d-m-Y', strtotime($out->out_dt));}?>
                                                        </td>
                                                        <td>
                                                            <?php echo $out->km_awal;?> KM
                                                        </td>
                                                        <td>
                                                            <?php echo $out->tujuan;?>
                                                        </td>
                                                        <td>
                                                            <?php echo $car->model;?>
                                                        </td>
                                                <?php
                                                        }
                                                    }
                                                ?>
                                                <?php 
                                                    foreach($users->data as $user){
                                                        if($user->user_id == $value->user_id){
                                                ?>
                                                <td>
                                                    <?php echo $user->username?>
                                                </td>
                                                <?php 
                                                        }
                                                    } 
                                                ?>
                                                <td>
                                                    <?php if($value->in_dt == "0000-00-00"){ echo '';}else{ echo date('d-m-Y', strtotime($value->in_dt));}?>
                                                </td>
                                                <td><?php echo $value->km_akhir?> KM</td>
                                                <td>
                                                    <a href="<?php echo base_url("mobilkembali/edit/".$value->in_no)?>" style="color:transparent">
                                                        <button type="button" class="btn btn-success icon-btn">
                                                            <i class="mdi mdi-table-edit"></i>
                                                        </button>
                                                    </a>
                                                    <!-- <button type="button" class="btn btn-danger icon-btn remove-mobilkembali">
                                                        <i class="mdi mdi-delete"></i>
                                                    </button> -->
                                                </td>
                                                <?php 
                                                        }
                                                    } 
                                                ?>
                                            </tr>
                                            <?php
                                                }
                                            }
                                            ?>
                                            <!-- End Admin -->


                                            <!-- User -->
                                            <?php
                                                foreach($mobilkembali->data as $value) {
                                                    if($this->session->userdata("role") != "Admin" && $this->session->userdata("user_id") == $value->user_id) {
                                            ?>
                                            <tr id="<?php echo $value->in_no?>">
                                                <?php 
                                                    foreach($cars->data as $car){
                                                        if($car->car_no == $value->car_no){
                                                ?>
                                                <td>
                                                    <input type="button" class="btn btn-info btn-sm view_mobilkeluar" value="<?php echo $car->no_plat?>" id="<?php echo $value->in_no; ?>">
                                                </td>
                                                <?php 
                                                    foreach($mobilkeluar->data as $out){
                                                        if($out->out_no == $value->out_no){
                                                ?>
                                                        <td>
                                                            <?php if($out->out_dt == "0000-00-00"){ echo '';}else{ echo date('d-m-Y', strtotime($out->out_dt));}?>
                                                        </td>
                                                        <td>
                                                            <?php echo $out->km_awal;?> KM
                                                        </td>
                                                        <td>
                                                            <?php echo $out->tujuan;?>
                                                        </td>
                                                        <td>
                                                            <?php echo $car->model;?>
                                                        </td>
                                                <?php
                                                        }
                                                    }
                                                ?>
                                                <?php 
                                                    foreach($users->data as $user){
                                                        if($user->user_id == $value->user_id){
                                                ?>
                                                <td>
                                                    <?php echo $user->username?>
                                                </td>
                                                <?php 
                                                        }
                                                    } 
                                                ?>
                                                <td>
                                                    <?php if($value->in_dt == "0000-00-00"){ echo '';}else{ echo date('d-m-Y', strtotime($value->in_dt));}?>
                                                </td>
                                                <td><?php echo $value->km_akhir?> KM</td>
                                                <td>
                                                    <a href="<?php echo base_url("mobilkembali/edit/".$value->in_no)?>" style="color:transparent">
                                                        <button type="button" class="btn btn-success icon-btn">
                                                            <i class="mdi mdi-table-edit"></i>
                                                        </button>
                                                    </a>
                                                </td>
                                                <?php 
                                                        }
                                                    } 
                                                ?>
                                            </tr>
                                            <?php
                                                }
                                            }
                                            ?>
                                            <!-- End User -->
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- partial:partials/_footer.html -->
        <?php $this->load->view("footer")?>
        <!-- partial -->
    </div>
<?php $this->load->view("script_footer");?>
<div class="modal fade" id="mobilKembaliModal" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title" id="myModalLabel">Lihat Mobil Kembali</h4>
        </div>
        <div class="modal-body">
            <!-- Place to print the fetched phone -->
            <div id="mobilkembali_result"></div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
        </div>
    </div>
</div>
