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
                                    <h4 class="card-title">Ubah Data User</h4>
                                    <hr>
                                    <form class="forms-sample" method="post" action="" id="editUser">
                                            <input type="hidden" class="form-control" name="user_id" placeholder="Nama Lengkap" required
                                            value="<?php echo $user->data->user_id?>">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group row">
                                                        <label class="col-sm-3 col-form-label">Role*</label>
                                                        <div class="col-sm-9">
                                                            <select class="form-control" name="role">
                                                                <?php
                                                                    if($user->data->role == "Admin"){
                                                                ?>
                                                                    <option value="Admin" selected>Admin</option>
                                                                    <option value="Driver">Driver</option>
                                                                <?php
                                                                    }else if($user->data->role == "Driver"){
                                                                ?>
                                                                    <option value="Admin">Admin</option>
                                                                    <option value="Driver" selected>Driver</option>
                                                                <?php 
                                                                    }else{
                                                                ?>
                                                                    <option value="Admin">Admin</option>
                                                                    <option value="Driver" selected>Driver</option>
                                                                <?php
                                                                    }
                                                                ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group row">
                                                        <label class="col-sm-3 col-form-label">Nama Lengkap*</label>
                                                        <div class="col-sm-9">
                                                        <input type="text" class="form-control" name="nama_lengkap" placeholder="Nama Lengkap" required
                                                        value="<?php echo $user->data->nama_lengkap?>">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group row">
                                                        <label class="col-sm-3 col-form-label">Username*</label>
                                                        <div class="col-sm-9">
                                                        <input type="text" class="form-control" name="username" placeholder="Username" required
                                                        value="<?php echo $user->data->username?>">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group row">
                                                    <label class="col-sm-3 col-form-label">Jenis Kelamin</label>
                                                    <!-- <div class="col-sm-4">
                                                        <div class="form-radio">
                                                        <label class="form-check-label">
                                                            <input type="radio" class="form-check-input" name="jenis_kelamin" id="jenis_kelamin" value="laki-laki" checked>
                                                            Laki-laki
                                                        </label>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-5">
                                                        <div class="form-radio">
                                                        <label class="form-check-label">
                                                            <input type="radio" class="form-check-input" name="jenis_kelamin" id="jenis_kelamin" value="perempuan">
                                                            Perempuan
                                                        </label>
                                                    </div> -->
                                                    <?php
                                                        if($user->data->jenis_kelamin == "Laki-laki"){
                                                    ?>
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
                                                    <?php
                                                        }else if($user->data->jenis_kelamin == "Perempuan"){
                                                    ?>
                                                        <div class="col-sm-4">
                                                            <div class="form-radio">
                                                            <label class="form-check-label">
                                                                <input type="radio" class="form-check-input" name="jenis_kelamin" id="jenis_kelamin" value="Laki-laki">
                                                                Laki-laki
                                                            </label>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-5">
                                                            <div class="form-radio">
                                                            <label class="form-check-label">
                                                                <input type="radio" class="form-check-input" name="jenis_kelamin" id="jenis_kelamin" value="Perempuan" checked>
                                                                Perempuan
                                                            </label>
                                                        </div>
                                                    <?php
                                                        }
                                                    ?>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group row">
                                                        <label class="col-sm-3 col-form-label">Handphone*</label>
                                                        <div class="col-sm-9">
                                                        <input type="text" class="form-control" name="no_tlp_1" placeholder="Handphone" required
                                                        value="<?php echo $user->data->no_tlp_1?>">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group row">
                                                        <label class="col-sm-3 col-form-label">KTP*</label>
                                                        <div class="col-sm-9">
                                                        <input type="text" class="form-control" name="ktp" placeholder="KTP" required
                                                        value="<?php echo $user->data->ktp?>">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group row">
                                                        <label class="col-sm-3 col-form-label">Alamat*</label>
                                                        <div class="col-sm-9">
                                                        <textarea class="form-control" id="alamat" rows="5" name="alamat" required
                                                        placeholder="Alamat"><?php echo $user->data->alamat?></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        <button type="submit" class="btn btn-primary mr-2">Simpan</button>
                                        <a href="<?php echo base_url("user")?>">
                                            <button class="btn btn-light" type="button">Kembali</button>
                                        </a>
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
