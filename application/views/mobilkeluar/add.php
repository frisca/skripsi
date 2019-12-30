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
                                    <h4 class="card-title">Tambah Data Mobil Keluar</h4>
                                    <hr>
                                    <form class="forms-kartu" method="post" id="addMobilKeluar">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group row">
                                                    <label class="col-sm-3 col-form-label">Tanggal Keluar*</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control" name="out_dt"
                                                        placeholder="Tanggal Keluar" id="datepicker" required/>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group row">
                                                    <label class="col-sm-3 col-form-label">Nomor Polisi*</label>
                                                    <div class="col-sm-9">
                                                        <select class="form-control" name="car_no">
                                                        <?php 
                                                            foreach($cars->data as $car){ 
                                                                if($car->status_mobil == "Ready") {
                                                        ?>
                                                            <option value="<?php echo $car->car_no?>"><?php echo $car->no_plat?></option>
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
                                                    <label class="col-sm-3 col-form-label">KM Awal*</label>
                                                    <div class="col-sm-9">
                                                        <div class="input-group">
                                                        <input type="text" class="form-control" placeholder="KM Awal" name="km_awal" aria-describedby="colored-addon3" required>
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
                                                        <input type="text" class="form-control" name="user_id" placeholder="Supir" 
                                                        value="<?php echo $this->session->userdata("username")?>" disabled/>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group row">
                                                    <label class="col-sm-3 col-form-label">Tujuan*</label>
                                                    <div class="col-sm-9">
                                                    <textarea class="form-control" id="tujuan" rows="5" name="tujuan" required
                                                    placeholder="Tujuan"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <a href="<?php echo base_url("mobilkeluar")?>">
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
