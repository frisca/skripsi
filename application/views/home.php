<?php $this->load->view("script_header")?>
    <div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    <?php $this->load->view('header');?>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <div class="row row-offcanvas row-offcanvas-right">
        <!-- partial:partials/_sidebar.html -->
        <?php $this->load->view('menu');?>
        <!-- partial -->
        <div class="content-wrapper">
          
        </div>
        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->
        <?php $this->load->view("footer")?>
        <!-- partial -->
      </div>
      <!-- row-offcanvas ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
<?php $this->load->view("script_footer");?>
