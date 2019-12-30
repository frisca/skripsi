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
                                    <h4 class="card-title">Ubah Data Kendaraan</h4>
                                    <hr>
                                    <form class="forms-kendaraan" method="post" id="editKendaraan">
                                        <input type="hidden" class="form-control" name="car_no" required
                                        value="<?php echo $kendaraan->data->car_no?>">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group row">
                                                <label class="col-sm-3 col-form-label">Nomor Polisi*</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" name="no_plat" required
                                                    value="<?php echo $kendaraan->data->no_plat?>" placeholder="Nomor Polisi"/>
                                                </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group row">
                                                    <label class="col-sm-3 col-form-label">Merk*</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control" name="merk" required
                                                        value="<?php echo $kendaraan->data->merk?>" placeholder="Merk"/>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group row">
                                                    <label class="col-sm-3 col-form-label">Jenis*</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control" name="jenis" required
                                                        value="<?php echo $kendaraan->data->jenis?>" placeholder="Jenis"/>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group row">
                                                    <label class="col-sm-3 col-form-label">Model*</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control" name="model" required
                                                        value="<?php echo $kendaraan->data->model?>" placeholder="Model"/>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group row">
                                                <label class="col-sm-3 col-form-label">Tipe</label>
                                                <?php if($kendaraan->data->type == "Manual"){?>
                                                <div class="col-sm-4">
                                                    <div class="form-radio">
                                                    <label class="form-check-label">
                                                        <input type="radio" class="form-check-input" name="type" id="type" value="Manual" checked>
                                                        Manual
                                                    </label>
                                                    </div>
                                                </div>
                                                <div class="col-sm-5">
                                                    <div class="form-radio">
                                                    <label class="form-check-label">
                                                        <input type="radio" class="form-check-input" name="type" id="type" value="Otomatis">
                                                        Otomatis
                                                    </label>
                                                </div>
                                                <?php }else{ ?>
                                                <div class="col-sm-4">
                                                    <div class="form-radio">
                                                    <label class="form-check-label">
                                                        <input type="radio" class="form-check-input" name="type" id="type" value="Manual">
                                                        Manual
                                                    </label>
                                                    </div>
                                                </div>
                                                <div class="col-sm-5">
                                                    <div class="form-radio">
                                                    <label class="form-check-label">
                                                        <input type="radio" class="form-check-input" name="type" id="type" value="Otomatis" checked>
                                                        Otomatis
                                                    </label>
                                                </div>
                                                <?php } ?>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group row">
                                                    <label class="col-sm-3 col-form-label">Tahun*</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control" name="tahun" required
                                                        value="<?php echo $kendaraan->data->tahun?>" placeholder="Tahun"/>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group row">
                                                    <label class="col-sm-3 col-form-label">Warna*</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control" name="warna" required
                                                        value="<?php echo $kendaraan->data->warna?>" placeholder="Warna"/>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group row">
                                                    <label class="col-sm-3 col-form-label">Nomor Rangka*</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control" name="no_rangka" required
                                                        value="<?php echo $kendaraan->data->no_rangka?>" placeholder="Nomor Rangka"/>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group row">
                                                    <label class="col-sm-3 col-form-label">Nomor Mesin*</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control" name="no_mesin" required
                                                        value="<?php echo $kendaraan->data->no_mesin?>" placeholder="Nomor Mesin"/>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group row">
                                                    <label class="col-sm-3 col-form-label">Nomor BPKB*</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control" name="no_bpkb" required
                                                        value="<?php echo $kendaraan->data->no_bpkb?>" placeholder="Nomor BPKB"/>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group row">
                                                    <label class="col-sm-3 col-form-label">Nama Pemilik*</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control" name="nama_pemilik" required
                                                        value="<?php echo $kendaraan->data->nama_pemilik?>" placeholder="Nama Pemilik"/>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group row">
                                                    <label class="col-sm-3 col-form-label">Alamat*</label>
                                                    <div class="col-sm-9">
                                                    <textarea class="form-control" id="alamat" rows="5" name="alamat" required
                                                    placeholder="Alamat"><?php echo $kendaraan->data->alamat?></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <a href="<?php echo base_url("kendaraan")?>">
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
