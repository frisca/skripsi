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
                                    <h4 class="card-title">Tambah Data User</h4>
                                    <hr>
                                    <form class="forms-user" method="post" action="" id="addUser">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group row">
                                                    <label class="col-sm-3 col-form-label">Role*</label>
                                                    <div class="col-sm-9">
                                                        <select class="form-control" name="role">
                                                            <option value="Admin">Admin</option>
                                                            <option value="Driver">Driver</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group row">
                                                    <label class="col-sm-3 col-form-label">Nama Lengkap*</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control" name="nama_lengkap"/>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group row">
                                                    <label class="col-sm-3 col-form-label">Username*</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control" name="username"/>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group row">
                                                    <label class="col-sm-3 col-form-label">Password*</label>
                                                    <div class="col-sm-9">
                                                        <input type="password" class="form-control" name="password"/>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group row">
                                                <label class="col-sm-3 col-form-label">Jenis Kelamin</label>
                                                <div class="col-sm-4">
                                                    <div class="form-radio">
                                                    <label class="form-check-label">
                                                        <input type="radio" class="form-check-input" name="jenis_kelamin" id="jenis_kelamin" value="Laki-laki" checked>
                                                        Laki-laki
                                                    </label>
                                                    </div>
                                                </div>
                                                <div class="col-sm-5">
                                                    <div class="form-radio">
                                                    <label class="form-check-label">
                                                        <input type="radio" class="form-check-input" name="jenis_kelamin" id="jenis_kelamin" value="Perempuan">
                                                        Perempuan
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group row">
                                                    <label class="col-sm-3 col-form-label">Handphone*</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control" name="no_tlp_1"/>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group row">
                                                    <label class="col-sm-3 col-form-label">KTP*</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control" name="ktp"/>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group row">
                                                    <label class="col-sm-3 col-form-label">Alamat*</label>
                                                    <div class="col-sm-9">
                                                    <textarea class="form-control" id="alamat" rows="5" name="alamat" required
                                                    placeholder="Alamat"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <a href="<?php echo base_url("user")?>">
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
