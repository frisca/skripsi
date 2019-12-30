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
                                    <h4 class="card-title">Data User</h4>
                                    <hr>
                                    <a href="<?php echo base_url("user/add")?>">
                                        <button type="button" class="btn btn-primary" style="margin-bottom:1rem;">
                                            Tambah
                                        </button>
                                    </a>
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <!-- <th>ID</th> -->
                                                <th>Nama Lengkap</th>
                                                <th>Username</th>
                                                <th>Jenis Kelamin</th>
                                                <th>Alamat</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                foreach($user->data as $value) {
                                            ?>
                                            <tr id="<?php echo $value->user_id?>">
                                                <td><input type="button" class="btn btn-info btn-sm view_user" value="<?php echo $value->nama_lengkap?>" id="<?php echo $value->user_id; ?>"></td>
                                                <td><?php echo $value->username?></td>
                                                <td><?php echo $value->jenis_kelamin?></td>
                                                <td><?php echo $value->alamat?></td>
                                                <td style="width:21%">
                                                    <a href="<?php echo base_url("user/edit/".$value->user_id)?>" style="color:transparent">
                                                        <button type="button" class="btn btn-success icon-btn">
                                                            <i class="mdi mdi-table-edit"></i>
                                                        </button>
                                                    </a>
                                                    <button type="button" class="btn btn-danger icon-btn remove-user">
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
    <div class="modal fade" id="userModal" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">Lihat Data User</h4>
            </div>
            <div class="modal-body">
                <!-- Place to print the fetched phone -->
                <div id="user_result"></div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
            </div>
        </div>
    </div>
<?php $this->load->view("script_footer");?>


