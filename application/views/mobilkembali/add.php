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
                                    <h4 class="card-title">Tambah Data Mobil Kembali</h4>
                                    <hr>
                                    <form class="forms-kartu" method="post" id="addMobilKembali">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group row">
                                                    <label class="col-sm-3 col-form-label">Tanggal Masuk*</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control" name="in_dt"
                                                        placeholder="Tanggal Masuk" id="datepicker" required/>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group row">
                                                    <label class="col-sm-3 col-form-label">Nomor Polisi*</label>
                                                    <div class="col-sm-9">
                                                        <select class="form-control" name="car_no" placeholder="Nomor Polisi">
                                                        <option value="">-- Pilih Nomor Polisi --</option>
                                                        <?php 
                                                            foreach($mobilkeluar->data as $value){ 
                                                                if($value->status == "In Use" && $value->user_id == $this->session->userdata("user_id")){
                                                                    foreach($cars->data as $v){
                                                                        if($v->car_no == $value->car_no){
                                                        ?>
                                                                        <option value="<?php echo $v->car_no?>"><?php echo $v->no_plat;?></option>
                                                        <?php 
                                                                        }
                                                                    }
                                                                } 
                                                            }
                                                        ?>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group row">
                                                    <label class="col-sm-3 col-form-label">KM Akhir*</label>
                                                    <div class="col-sm-9">
                                                        <div class="input-group">
                                                        <input type="text" class="form-control" placeholder="KM Akhir" name="km_akhir" aria-describedby="colored-addon3" required>
                                                        <span class="input-group-addon bg-default border-default" id="colored-addon3" style="color:#000000">
                                                            KM
                                                        </span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group row">
                                                    <label class="col-sm-3 col-form-label">Driver*</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control" name="user_id" placeholder="Driver" 
                                                        value="<?php echo $this->session->userdata("username")?>" disabled/>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group row">
                                                    <label class="col-sm-3 col-form-label">Kartu E-Toll*</label>
                                                    <div class="col-sm-9">
                                                        <select class="form-control" name="e_card_code" placeholder="Kartu E-Toll">
                                                        <option value="">-- Pilih Kartu E-Toll --</option>
                                                        <?php 
                                                            foreach($cards->data as $value){ 
                                                                if($value->e_card_code == $mobilkembali->e_card_code){
                                                        ?>
                                                                <option value="<?php echo $value->e_card_code?>" selected><?php echo $value->e_card_jenis?></option>
                                                        <?php 
                                                                }else{
                                                        ?>
                                                                <option value="<?php echo $value->e_card_code?>"><?php echo $value->e_card_jenis?></option>
                                                        <?php
                                                                
                                                                }
                                                            }
                                                        ?>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group row">
                                                    <label class="col-sm-3 col-form-label">Jumlah Biaya Kartu E-Toll*</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control" name="sisa_etol" placeholder="Jumlah Biaya Kartu E-Toll" 
                                                        value=""/>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <a href="<?php echo base_url("mobilkembali")?>">
                                            <button class="btn btn-light" type="button" style="float:right;">Kembali</button>
                                        </a>
                                        <button type="submit" class="btn btn-primary mr-2" style="float:right;">Simpan</button>
                                    </form>
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
