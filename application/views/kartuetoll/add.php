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
                                    <h4 class="card-title">Tambah Data Kartu E-Toll</h4>
                                    <hr>
                                    <form class="forms-kartu" method="post" action="" id="addKartu">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group row">
                                                    <label class="col-sm-3 col-form-label">Jenis Kartu*</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control" name="e_card_jenis"
                                                        placeholder="Jenis Kartu"/>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group row">
                                                    <label class="col-sm-3 col-form-label">Kode Kartu*</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control" name="e_card_code"
                                                        placeholder="Kode Kartu"/>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <a href="<?php echo base_url("kartuetoll")?>">
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
