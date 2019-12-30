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
                                    <h4 class="card-title">Laporan Kartu E-Toll</h4>
                                    <hr>
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Kode Kartu</th>
                                                <th>Jenis Kartu</th>
                                                <th>Total</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php if(!empty($laporan)){
                                                $total = 0;
                                                    foreach($laporan->data as $v){
                                            ?>
                                                <tr>
                                                    <td><?php echo $v->e_card_code?></td>
                                                    <td><?php echo $v->e_card_jenis?></td>
                                                    <td><?php echo $v->total?></td>
                                                </tr>
                                            <?php 
                                                        $total = $v->total + $total;
                                                    } 
                                                } 
                                            ?>
                                            <tr>
                                                <td colspan="2">Total</td>
                                                <td><?php echo $total;?></td>
                                            </tr>
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
