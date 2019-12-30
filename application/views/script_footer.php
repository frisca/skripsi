
  <!-- plugins:js -->
  <script src="<?php echo base_url()?>assets/node_modules/jquery/dist/jquery.min.js"></script>
  <script src="<?php echo base_url()?>assets/node_modules/popper.js/dist/umd/popper.min.js"></script>
  <script src="<?php echo base_url()?>assets/node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
  <script src="<?php echo base_url()?>assets/node_modules/perfect-scrollbar/dist/js/perfect-scrollbar.jquery.min.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page-->
  <script src="<?php echo base_url()?>assets/node_modules/chart.js/dist/Chart.min.js"></script>
  <!-- End plugin js for this page-->
  <!-- inject:js -->
  <script src="<?php echo base_url()?>assets/js/off-canvas.js"></script>
  <script src="<?php echo base_url()?>assets/js/misc.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="<?php echo base_url()?>assets/js/dashboard.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

  <!-- End custom js for this page-->

    <script type="text/javascript">
        $(".remove-user").click(function(){
            var id = $(this).parents("tr").attr("id");
        
            swal({
                title: "Apakah Anda yakin ingin menghapus data user?",
                type: "warning",
                showCancelButton: true,
                confirmButtonClass: "btn-danger",
                confirmButtonText: "Ya",
                cancelButtonText: "Tidak",
                closeOnConfirm: false,
                closeOnCancel: false
            },
            function(isConfirm) {
                if (isConfirm) {
                    $.ajax({
                        url: '<?php echo base_url('user/delete/')?>'+id,
                        type: 'DELETE',
                        error: function() {
                            alert('Terjadi kesalahan');
                        },
                        success: function(data) {
                            // $("#"+id).remove();
                            // swal("Deleted!", "Your imaginary file has been deleted.", "success");
                            if(data == true){
                                $("#"+id).remove();
                                swal("Berhasil!", "Data user berhasil dihapus.", "success");
                            }else{
                                swal("Gagal!", "Data user tidak berhasil dihapus.", "failed");
                            }
                        }
                    });
                } else {
                // swal("Tidak", "Data tidak dihapus", "error");
                }
            });
        });

        $('.view_user').click(function(){
            // Get the id of selected phone and assign it in a variable called phoneData
            var userData = $(this).attr('id');
            // Start AJAX function
            $.ajax({
                // Path for controller function which fetches selected phone data
                url: "<?php echo base_url() ?>user/get_user_result",
                // Method of getting data
                method: "POST",
                // Data is sent to the server
                data: {userData:userData},
                // Callback function that is executed after data is successfully sent and recieved
                success: function(data){
                    // Print the fetched data of the selected phone in the section called #phone_result 
                    // within the Bootstrap modal
                    $('#user_result').html(data);
                    // Display the Bootstrap modal
                    $('#userModal').modal('show');
                }
            });
        });

        $('.view_kendaraan').click(function(){
            // Get the id of selected phone and assign it in a variable called phoneData
            var kendaraanData = $(this).attr('id');
            // Start AJAX function
            $.ajax({
                // Path for controller function which fetches selected phone data
                url: "<?php echo base_url() ?>kendaraan/get_kendaraan_result",
                // Method of getting data
                method: "POST",
                // Data is sent to the server
                data: {kendaraanData:kendaraanData},
                // Callback function that is executed after data is successfully sent and recieved
                success: function(data){
                    // Print the fetched data of the selected phone in the section called #phone_result 
                    // within the Bootstrap modal
                    $('#kendaraan_result').html(data);
                    // Display the Bootstrap modal
                    $('#kendaraanModal').modal('show');
                }
            });
        });

        $(document).ready(function(){
            $('#addKendaraan').on('submit',function(e) {  
                $.ajax({
                    url:'<?php echo base_url('kendaraan/processAdd')?>', //nama action script php sobat
                    data:$(this).serialize(),
                    type:'POST',
                    success:function(data){
                        if(data==true){
                            // swal("Success!", "Data Kendaraan berhasil disimpan!", "success");
                            // window.location.href = "<?php echo base_url('kendaraan')?>";
                            swal({
                                title: "Berhasil!", 
                                text:  "Data kendaraan berhasil disimpan!",
                                type: "success",
                                showCancelButton: false,
                                confirmButtonClass: "btn-primary",
                                confirmButtonText: "Ya",
                                closeOnConfirm: false
                            },
                            function(isConfirm) {
                                if (isConfirm) {
                                    window.location.href="<?php echo base_url('kendaraan')?>";
                                } else {
                                    swal("Maaf...", "Terjadi kesalahan :(", "error");
                                }
                            });
                        }else{
                            swal("Maaf...", "Terjadi kesalahan :(", "error");
                        }
                    },
                    error:function(data){
                        swal("Maaf...", "Terjadi kesalahan :(", "error");
                    }
                });
                e.preventDefault(); 
            });

            $(".remove-kendaraan").click(function(){
                var id = $(this).parents("tr").attr("id");
            
                swal({
                    title: "Apakah Anda yakin ingin menghapus data kendaraan?",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonClass: "btn-danger",
                    confirmButtonText: "Ya",
                    cancelButtonText: "Tidak",
                    closeOnConfirm: false,
                    closeOnCancel: false
                },
                function(isConfirm) {
                    if (isConfirm) {
                        $.ajax({
                            url: '<?php echo base_url('kendaraan/delete/')?>'+id,
                            type: 'DELETE',
                            error: function() {
                                alert('Terjadi kesalahan');
                            },
                            success: function(data) {
                                // $("#"+id).remove();
                                // swal("Deleted!", "Your imaginary file has been deleted.", "success");
                                if(data == true){
                                    $("#"+id).remove();
                                    swal("Berhasil!", "Data kendaraan berhasil dihapus.", "success");
                                }else{
                                    swal("Gagal!", "Data kendaraan tidak berhasil dihapus.", "failed");
                                }
                            }
                        });
                    } else {
                        // swal("Gagal", "Data tidak dihapus", "error");
                    }
                });
            });

            $('#editKendaraan').on('submit',function(e) {  
                $.ajax({
                    url:'<?php echo base_url('kendaraan/processEdit')?>', //nama action script php sobat
                    data:$(this).serialize(),
                    type:'POST',
                    success:function(data){
                        if(data==true){
                            swal({
                                title: "Berhasil!", 
                                text:  "Data Kendaraan berhasil diubah!",
                                type: "success",
                                showCancelButton: false,
                                confirmButtonClass: "btn-primary",
                                confirmButtonText: "Ya",
                                closeOnConfirm: false
                            },
                            function(isConfirm) {
                                if (isConfirm) {
                                    window.location.href="<?php echo base_url('kendaraan')?>";
                                } else {
                                    swal("Maaf...", "Terjadi kesalahan :(", "error");
                                }
                            });
                        }else{
                            swal("Maaf...", "Terjadi kesalahan :(", "error");
                        }
                    },
                    error:function(data){
                        swal("Maaf...", "Terjadi kesalahan :(", "error");
                    }
                });
                e.preventDefault(); 
            });

            $('#addUser').on('submit',function(e) {  
                $.ajax({
                    url:'<?php echo base_url('user/processAdd')?>', //nama action script php sobat
                    data:$(this).serialize(),
                    type:'POST',
                    success:function(data){
                        if(data==true){
                            swal({
                                title: "Berhasil!", 
                                text:  "Data user berhasil disimpan!",
                                type: "success",
                                showCancelButton: false,
                                confirmButtonClass: "btn-primary",
                                confirmButtonText: "Ya",
                                closeOnConfirm: false
                            },
                            function(isConfirm) {
                                if (isConfirm) {
                                    window.location.href="<?php echo base_url('user')?>";
                                } else {
                                    swal("Maaf...", "Terjadi kesalahan :(", "error");
                                }
                            });
                        }else{
                            swal("Maaf...", "Terjadi kesalahan :(", "error");
                        }
                    },
                    error:function(data){
                        swal("Maaf...", "Terjadi kesalahan :(", "error");
                    }
                });
                e.preventDefault(); 
            });

            $('#editUser').on('submit',function(e) {  
                $.ajax({
                    url:'<?php echo base_url('user/processEdit')?>', //nama action script php sobat
                    data:$(this).serialize(),
                    type:'POST',
                    success:function(data){
                        if(data==true){
                            swal({
                                title: "Berhasil!", 
                                text:  "Data user berhasil diubah!",
                                type: "success",
                                showCancelButton: false,
                                confirmButtonClass: "btn-primary",
                                confirmButtonText: "Ya",
                                closeOnConfirm: false
                            },
                            function(isConfirm) {
                                if (isConfirm) {
                                    window.location.href="<?php echo base_url('user')?>";
                                } else {
                                    swal("Maaf...", "Terjadi kesalahan :(", "error");
                                }
                            });
                        }else{
                            swal("Maaf...", "Terjadi kesalahan :(", "error");
                        }
                    },
                    error:function(data){
                        swal("Maaf...", "Terjadi kesalahan :(", "error");
                    }
                });
                e.preventDefault(); 
            });

            $('.view_kartu').click(function(){
                // Get the id of selected phone and assign it in a variable called phoneData
                var kartuData = $(this).attr('id');
                // Start AJAX function
                $.ajax({
                    // Path for controller function which fetches selected phone data
                    url: "<?php echo base_url() ?>kartuetoll/get_kartu_result",
                    // Method of getting data
                    method: "POST",
                    // Data is sent to the server
                    data: {kartuData:kartuData},
                    // Callback function that is executed after data is successfully sent and recieved
                    success: function(data){
                        // Print the fetched data of the selected phone in the section called #phone_result 
                        // within the Bootstrap modal
                        $('#kartu_result').html(data);
                        // Display the Bootstrap modal
                        $('#kartuModal').modal('show');
                    }
                });
            });

            $('#addKartu').on('submit',function(e) {  
                $.ajax({
                    url:'<?php echo base_url('kartuetoll/processAdd')?>', //nama action script php sobat
                    data:$(this).serialize(),
                    type:'POST',
                    success:function(data){
                        if(data==true){
                            swal({
                                title: "Berhasil!", 
                                text:  "Data kartu e-toll berhasil disimpan!",
                                type: "success",
                                showCancelButton: false,
                                confirmButtonClass: "btn-primary",
                                confirmButtonText: "Ya",
                                closeOnConfirm: false
                            },
                            function(isConfirm) {
                                if (isConfirm) {
                                    window.location.href="<?php echo base_url('kartuetoll')?>";
                                } else {
                                    swal("Maaf...", "Terjadi kesalahan :(", "error");
                                }
                            });
                        }else{
                            swal("Maaf...", "Terjadi kesalahan :(", "error");
                        }
                    },
                    error:function(data){
                        swal("Maaf...", "Terjadi kesalahan :(", "error");
                    }
                });
                e.preventDefault(); 
            });

            $('#editKartu').on('submit',function(e) {  
                $.ajax({
                    url:'<?php echo base_url('kartuetoll/processEdit')?>', //nama action script php sobat
                    data:$(this).serialize(),
                    type:'POST',
                    success:function(data){
                        if(data==true){
                            swal({
                                title: "Berhasil!", 
                                text:  "Data kartu e-toll berhasil diubah!",
                                type: "success",
                                showCancelButton: false,
                                confirmButtonClass: "btn-primary",
                                confirmButtonText: "Ya",
                                closeOnConfirm: false
                            },
                            function(isConfirm) {
                                if (isConfirm) {
                                    window.location.href="<?php echo base_url('kartuetoll')?>";
                                } else {
                                    swal("Maaf...", "Terjadi kesalahan :(", "error");
                                }
                            });
                        }else{
                            swal("Maaf...", "Terjadi kesalahan :(", "error");
                        }
                    },
                    error:function(data){
                        swal("Maaf...", "Terjadi kesalahan :(", "error");
                    }
                });
                e.preventDefault(); 
            });

            $(".remove-kartuetoll").click(function(){
                var id = $(this).parents("tr").attr("id");
            
                swal({
                    title: "Apakah Anda yakin ingin menghapus data kartu e-toll?",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonClass: "btn-danger",
                    confirmButtonText: "Ya",
                    cancelButtonText: "Tidak",
                    closeOnConfirm: false,
                    closeOnCancel: false
                },
                function(isConfirm) {
                    if (isConfirm) {
                        $.ajax({
                            url: '<?php echo base_url('kartuetoll/delete/')?>'+id,
                            type: 'DELETE',
                            error: function() {
                                alert('Terjadi kesalahan');
                            },
                            success: function(data) {
                                // $("#"+id).remove();
                                // swal("Deleted!", "Your imaginary file has been deleted.", "success");
                                if(data == true){
                                    $("#"+id).remove();
                                    swal("Berhasil!", "Data kartu e-toll berhasil dihapus.", "success");
                                }else{
                                    swal("Gagal!", "Data kartu e-toll tidak berhasil dihapus.", "failed");
                                }
                            }
                        });
                    } else {
                        // swal("Gagal", "Data tidak dihapus", "error");
                    }
                });
            });

            $("#datepicker").datepicker({dateFormat: 'dd-mm-yy'});

            $('#addMobilKeluar').on('submit',function(e) {  
                $.ajax({
                    url:'<?php echo base_url('mobilkeluar/processAdd')?>', //nama action script php sobat
                    data:$(this).serialize(),
                    type:'POST',
                    success:function(data){
                        if(data==true){
                            swal({
                                title: "Berhasil!", 
                                text:  "Data mobil keluar berhasil disimpan!",
                                type: "success",
                                showCancelButton: false,
                                confirmButtonClass: "btn-primary",
                                confirmButtonText: "Ya",
                                closeOnConfirm: false
                            },
                            function(isConfirm) {
                                if (isConfirm) {
                                    window.location.href="<?php echo base_url('mobilkeluar')?>";
                                } else {
                                    swal("Maaf...", "Terjadi kesalahan :(", "error");
                                }
                            });
                        }else{
                            swal("Maaf...", "Terjadi kesalahan :(", "error");
                        }
                    },
                    error:function(data){
                        swal("Maaf...", "Terjadi kesalahan :(", "error");
                    }
                });
                e.preventDefault(); 
            });

            $('.view_mobilkeluar').click(function(){
                // Get the id of selected phone and assign it in a variable called phoneData
                var mobilKeluarData = $(this).attr('id');
                // Start AJAX function
                $.ajax({
                    // Path for controller function which fetches selected phone data
                    url: "<?php echo base_url() ?>mobilkeluar/get_mobilkeluar_result",
                    // Method of getting data
                    method: "POST",
                    // Data is sent to the server
                    data: {mobilKeluarData:mobilKeluarData},
                    // Callback function that is executed after data is successfully sent and recieved
                    success: function(data){
                        // Print the fetched data of the selected phone in the section called #phone_result 
                        // within the Bootstrap modal
                        $('#mobilKeluar_result').html(data);
                        // Display the Bootstrap modal
                        $('#mobilKeluarModal').modal('show');
                    }
                });
            });

            $('#editMobilKeluar').on('submit',function(e) {  
                $.ajax({
                    url:'<?php echo base_url('mobilkeluar/processEdit')?>', //nama action script php sobat
                    data:$(this).serialize(),
                    type:'POST',
                    success:function(data){
                        if(data==true){
                            swal({
                                title: "Berhasil!", 
                                text:  "Data mobil keluar berhasil diubah!",
                                type: "success",
                                showCancelButton: false,
                                confirmButtonClass: "btn-primary",
                                confirmButtonText: "Ya",
                                closeOnConfirm: false
                            },
                            function(isConfirm) {
                                if (isConfirm) {
                                    window.location.href="<?php echo base_url('mobilkeluar')?>";
                                } else {
                                    swal("Maaf...", "Terjadi kesalahan :(", "error");
                                }
                            });
                        }else{
                            swal("Maaf...", "Terjadi kesalahan :(", "error");
                        }
                    },
                    error:function(data){
                        swal("Maaf...", "Terjadi kesalahan :(", "error");
                    }
                });
                e.preventDefault(); 
            });

            $(".approve").click(function(){
                var id = $(this).parents("tr").attr("id");
            
                swal({
                    title: "Apakah Anda yakin ingin setujui form ini?",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonClass: "btn-danger",
                    confirmButtonText: "Ya",
                    cancelButtonText: "Tidak",
                    closeOnConfirm: false,
                    closeOnCancel: false
                },
                function(isConfirm) {
                    if (isConfirm) {
                        $.ajax({
                            url: '<?php echo base_url('mobilkeluar/approve/')?>'+id,
                            type: 'POST',
                            error: function() {
                                alert('Terjadi kesalahan');
                            },
                            success: function(data) {
                                // $("#"+id).remove();
                                // swal("Deleted!", "Your imaginary file has been deleted.", "success");
                                if(data == true){
                                    swal("Berhasil!", "Form telah disetujui.", "success");
                                    window.location.href="<?php echo base_url('mobilkeluar')?>";
                                }else{
                                    swal("Gagal!", "Form gagal disetujui.", "failed");
                                }
                            }
                        });
                    } else {
                        // swal("Gagal", "Data tidak dihapus", "error");
                    }
                });
            });

            $(".reject").click(function(){
                var id = $(this).parents("tr").attr("id");
            
                swal({
                    title: "Apakah Anda yakin ingin tolak form ini?",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonClass: "btn-danger",
                    confirmButtonText: "Ya",
                    cancelButtonText: "Tidak",
                    closeOnConfirm: false,
                    closeOnCancel: false
                },
                function(isConfirm) {
                    if (isConfirm) {
                        $.ajax({
                            url: '<?php echo base_url('mobilkeluar/reject/')?>'+id,
                            type: 'POST',
                            error: function() {
                                alert('Terjadi kesalahan');
                            },
                            success: function(data) {
                                // $("#"+id).remove();
                                // swal("Deleted!", "Your imaginary file has been deleted.", "success");
                                if(data == true){
                                    swal("Berhasil!", "Form telah ditolak.", "success");
                                    window.location.href="<?php echo base_url('mobilkeluar')?>";
                                }else{
                                    swal("Gagal!", "Form gagal ditolak.", "failed");
                                }
                            }
                        });
                    } else {
                        // swal("Gagal", "Data tidak dihapus", "error");
                    }
                });
            });

            $('#addMobilKembali').on('submit',function(e) {  
                $.ajax({
                    url:'<?php echo base_url('mobilkembali/processAdd')?>', //nama action script php sobat
                    data:$(this).serialize(),
                    type:'POST',
                    success:function(data){
                        if(data==true){
                            swal({
                                title: "Berhasil!", 
                                text:  "Data mobil kembali berhasil disimpan!",
                                type: "success",
                                showCancelButton: false,
                                confirmButtonClass: "btn-primary",
                                confirmButtonText: "Ya",
                                closeOnConfirm: false
                            },
                            function(isConfirm) {
                                if (isConfirm) {
                                    window.location.href="<?php echo base_url('mobilkembali')?>";
                                } else {
                                    swal("Maaf...", "Terjadi kesalahan :(", "error");
                                }
                            });
                        }else{
                            swal("Maaf...", "Terjadi kesalahan :(", "error");
                        }
                    },
                    error:function(data){
                        swal("Maaf...", "Terjadi kesalahan :(", "error");
                    }
                });
                e.preventDefault(); 
            });

            $('#editMobilKembali').on('submit',function(e) {  
                $.ajax({
                    url:'<?php echo base_url('mobilkembali/processEdit')?>', //nama action script php sobat
                    data:$(this).serialize(),
                    type:'POST',
                    success:function(data){
                        if(data==true){
                            swal({
                                title: "Berhasil!", 
                                text:  "Data mobil kembali berhasil diubah!",
                                type: "success",
                                showCancelButton: false,
                                confirmButtonClass: "btn-primary",
                                confirmButtonText: "Ya",
                                closeOnConfirm: false
                            },
                            function(isConfirm) {
                                if (isConfirm) {
                                    window.location.href="<?php echo base_url('mobilkembali')?>";
                                } else {
                                    swal("Maaf...", "Terjadi kesalahan :(", "error");
                                }
                            });
                        }else{
                            swal("Maaf...", "Terjadi kesalahan :(", "error");
                        }
                    },
                    error:function(data){
                        swal("Maaf...", "Terjadi kesalahan :(", "error");
                    }
                });
                e.preventDefault(); 
            });

            $('.view_mobilkembali').click(function(){
                // Get the id of selected phone and assign it in a variable called phoneData
                var mobilKembaliData = $(this).attr('id');
                // Start AJAX function
                $.ajax({
                    // Path for controller function which fetches selected phone data
                    url: "<?php echo base_url() ?>mobilkembali/get_mobilkembali_result",
                    // Method of getting data
                    method: "POST",
                    // Data is sent to the server
                    data: {mobilKembaliData:mobilKembaliData},
                    // Callback function that is executed after data is successfully sent and recieved
                    success: function(data){
                        // Print the fetched data of the selected phone in the section called #phone_result 
                        // within the Bootstrap modal
                        $('#mobilkembali_result').html(data);
                        // Display the Bootstrap modal
                        $('#mobilKembaliModal').modal('show');
                    }
                });
            });
            $('.view_laporan').click(function(){
                // Get the id of selected phone and assign it in a variable called phoneData
                var mobilData = $(this).attr('id');
                console.log(mobilData)
                // Start AJAX function
                $.ajax({
                    // Path for controller function which fetches selected phone data
                    url: "<?php echo base_url() ?>laporanmobil/viewLaporanMobil",
                    // Method of getting data
                    method: "POST",
                    // Data is sent to the server
                    data: {mobilData:mobilData},
                    // Callback function that is executed after data is successfully sent and recieved
                    success: function(data){
                        console.log(data);
                    }
                });
            });
        });
    </script>
</body>

</html>