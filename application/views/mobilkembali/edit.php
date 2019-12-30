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
                                    <h4 class="card-title">Ubah Data Mobil Kembali</h4>
                                    <hr>
                                    <form class="forms-kartu" method="post" id="editMobilKembali">
                                        <div class="row">
                                            <input type="hidden" class="form-control" name="in_no" required
                                            value="<?php echo $mobilkembali->data->in_no?>">
                                            <div class="col-md-12">
                                                <div class="form-group row">
                                                    <label class="col-sm-3 col-form-label">Tanggal Masuk*</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control" name="in_dt"
                                                        placeholder="Tanggal Masuk" id="datepicker" required 
                                                        value="<?php echo date("d-m-Y", strtotime($mobilkembali->data->in_dt))?>"/>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group row">
                                                    <label class="col-sm-3 col-form-label">Nomor Polisi*</label>
                                                    <div class="col-sm-9">
                                                        <select class="form-control" name="car_no" placeholder="Nomor Polisi" disabled>
                                                        <?php 
                                                            foreach($cars->data as $v){ 
                                                                if($v->car_no == $mobilkembali->data->car_no){
                                                        ?>
                                                            <option value="<?php echo $v->car_no?>"><?php echo $v->model?></option>
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
                                                    <label class="col-sm-3 col-form-label">KM Akhir*</label>
                                                    <div class="col-sm-9">
                                                        <div class="input-group">
                                                        <input type="text" class="form-control" placeholder="KM Akhir" name="km_akhir" aria-describedby="colored-addon3" required
                                                        value="<?php echo $mobilkembali->data->km_akhir?>">
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
