<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
    <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url('home')?>">
        <span class="menu-title">Dashboard</span>
        <i class="mdi mdi-home menu-icon"></i>
        </a>
    </li>
    <?php 
        if($this->session->userdata("role") != "Driver") {
    ?>
        <!-- <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#master" aria-expanded="false" aria-controls="master">
            <span class="menu-title">Master Data</span>
            <i class="menu-arrow"></i>
            <i class="mdi mdi-view-list menu-icon"></i>
            </a>
            <div class="collapse" id="master">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="<?php echo base_url("user")?>">Data User</a></li>
                    <li class="nav-item"> <a class="nav-link" href="<?php echo base_url("kendaraan")?>">Data Kendaraan</a></li>
                    <li class="nav-item"> <a class="nav-link" href="<?php echo base_url("kartuetoll")?>">Data Kartu E-Toll</a></li>
                </ul>
            </div>
        </li> -->
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
            <span class="menu-title">Master Data</span>
            <i class="menu-arrow"></i>
            <i class="mdi mdi-view-list menu-icon"></i>
            </a>
            <div class="collapse" id="ui-basic">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="<?php echo base_url("user")?>">Data User</a></li>
                    <li class="nav-item"> <a class="nav-link" href="<?php echo base_url("kendaraan")?>">Data Kendaraan</a></li>
                    <li class="nav-item"> <a class="nav-link" href="<?php echo base_url("kartuetoll")?>">Data Kartu E-Toll</a></li>
                </ul>
            </div>
        </li>
    <?php 
        }
    ?>
    <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url("mobilkeluar")?>">
        <span class="menu-title">Mobil Keluar</span>
        <i class="mdi mdi-reply menu-icon"></i>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url("mobilkembali")?>">
        <span class="menu-title">Mobil Kembali</span>
        <i class="mdi mdi-share menu-icon"></i>
        </a>
    </li>
    <!-- <li class="nav-item">
        <a class="nav-link" data-toggle="collapse" href="#laporan" aria-expanded="false" aria-controls="laporan">
        <span class="menu-title">Laporan</span>
        <i class="menu-arrow"></i>
        <i class="mdi mdi-note-text menu-icon"></i>
        </a>
        <div class="collapse" id="laporan">
            <ul class="nav flex-column sub-menu">
                <?php 
                    if($this->session->userdata("role") != "Driver") {
                ?>
                    <li class="nav-item"> <a class="nav-link" href="<?php echo base_url('laporan/kartu')?>">Kartu E-Toll</a></li>
                <?php } ?>
                    <li class="nav-item"> <a class="nav-link" href="<?php echo base_url('laporan/mobil')?>">Mobil</a></li>
            </ul>
        </div>
    </li> -->

    <li class="nav-item">
        <a class="nav-link" data-toggle="collapse" href="#auth" aria-expanded="false" aria-controls="auth">
        <span class="menu-title">Laporan</span>
        <i class="menu-arrow"></i>
        <i class="mdi mdi-note-text menu-icon"></i>
        </a>
        <div class="collapse" id="auth">
            <?php 
                if($this->session->userdata("role") != "Driver") {
            ?>
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="<?php echo base_url('laporankartu')?>">Kartu E-Tol</a></li>
                    <li class="nav-item"> <a class="nav-link" href="<?php echo base_url('laporanmobil')?>">Mobil</a></li>
                </ul>
            <?php 
                }else{
            ?>
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="<?php echo base_url('laporanmobil')?>">Mobil</a></li>
                </ul>
            <?php
                }
            ?>
        </div>
    </li>
</nav>