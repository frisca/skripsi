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
                                    <h4 class="card-title">Data Kendaraan</h4>
                                    <hr>
                                    <a href="<?php echo base_url("kendaraan/add")?>">
                                        <button type="button" class="btn btn-primary" style="margin-bottom:1rem;">
                                            Tambah
                                        </button>
                                    </a>
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>No Polisi</th>
                                                <th>Merek</th>
                                                <th>Model</th>
                                                <th>Tipe</th>
                                                <th>Warna</th>
                                                <th>Tahun</th>
                                                <th>No Rangka</th>
                                                <th>No Mesin</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                foreach($kendaraan->data as $value) {
                                            ?>
                                            <tr id="<?php echo $value->car_no?>">
                                                <td><input type="button" class="btn btn-info btn-sm view_kendaraan" value="<?php echo $value->no_plat?>" id="<?php echo $value->car_no; ?>"></td>
                                                <td><?php echo $value->merk?></td>
                                                <td><?php echo $value->model?></td>
                                                <td><?php echo $value->type?></td>
                                                <td><?php echo $value->warna?></td>
                                                <td><?php echo $value->tahun?></td>
                                                <td><?php echo $value->no_rangka?></td>
                                                <td><?php echo $value->no_mesin?></td>
                                                <td><?php echo $value->status_mobil?></td>
                                                <td style="width:21%">
                                                    <!-- <a href="<?php echo base_url("kendaraan/view/".$value->car_no)?>" style="color:transparent">
                                                        <button type="button" class="btn btn-warning icon-btn">
                                                            <i class="mdi mdi-check-all"></i>
                                                        </button>
                                                    </a> -->
                                                    <a href="<?php echo base_url("kendaraan/edit/".$value->car_no)?>" style="color:transparent">
                                                        <button type="button" class="btn btn-success icon-btn">
                                                            <i class="mdi mdi-table-edit"></i>
                                                        </button>
                                                    </a>
                                                    <button type="button" class="btn btn-danger icon-btn remove-kendaraan">
                                                        <i class="mdi mdi-delete"></i>
                                                    </button>
                                                </td>
                                            </tr>
                                            <?php
                                                }
                                            ?>
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
<div class="modal fade" id="kendaraanModal" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title" id="myModalLabel">Lihat Data Kendaraan</h4>
        </div>
        <div class="modal-body">
            <!-- Place to print the fetched phone -->
            <div id="kendaraan_result"></div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
        </div>
    </div>
</div>
