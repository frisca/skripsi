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
                                    <h4 class="card-title">Laporan Mobil</h4>
                                    <hr>
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Tanggal</th>
                                                <th>Jumlah Mobil Keluar</th>
                                                <th>Jumlah Mobil Kembali</th>
                                                <th>Total Mobil</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php if(!empty($laporan)){ foreach($laporan->data as $v){?>
                                                <tr>
                                                    <td><input type="button" class="btn btn-info btn-sm view_laporan" value="<?php echo $v->tanggal;?>" id="<?php echo $v->tanggal; ?>"></td>
                                                    <td><?php echo $v->jmlh_mobil_keluar?></td>
                                                    <td><?php echo $v->jmlh_mobil_kembali?></td>
                                                    <td><?php echo $v->total_mobil?></td>
                                                </tr>
                                            <?php } }  ?>
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
