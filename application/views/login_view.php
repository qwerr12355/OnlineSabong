<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from www.wrappixel.com/demos/admin-templates/material-press/package/html/dark/authentication-login1.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 09 Apr 2022 01:57:20 GMT -->
<head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>MatPress - Material Design Demo</title>
        <link href="<?php echo base_url(); ?>assets/dist/css/style.css" rel="stylesheet">
        <!-- This page CSS -->
        <link href="<?php echo base_url(); ?>assets/dist/css/pages/authentication.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>assets/assets/libs/sweetalert2/sweetalert2.min.css" rel="stylesheet" type="text/css">

        <!-- This page CSS -->
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body>
        <div class="main-wrapper">
            <!-- ============================================================== -->
            <!-- Preloader - style you can find in spinners.css -->
            <!-- ============================================================== -->
            <div class="preloader">
                <div class="loader">
                    <div class="loader__figure"></div>
                    <p class="loader__label">MatPress Admin</p>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- Preloader - style you can find in spinners.css -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Login box.scss -->
            <!-- ============================================================== -->
            <div class="auth-wrapper d-flex no-block justify-content-center align-items-center" style="background:url(<?php echo base_url(); ?>assets/assets/images/big/auth-bg.jpg) no-repeat center center;">
                <div class="auth-box">
                    <div id="loginform">
                        <div class="logo">
                            <h5 class="font-medium m-b-20">Sign In to lowbettalpakan.com</h5>
                        </div>
                        <!-- Form -->
                        <div class="row">
                            <form class="col s12">
                                <!-- email -->
                                <div class="row">
                                    <div class="input-field col s12">
                                        <input id="txtUsername" type="text" class="validate" required>
                                        <label for="txtUsername">Username</label>
                                    </div>
                                </div>
                                <!-- pwd -->
                                <div class="row">
                                    <div class="input-field col s12">
                                        <input id="txtPassword" type="password" class="validate" required>
                                        <label for="txtPassword">Password</label>
                                    </div>
                                </div>
                                <!-- pwd -->
                                <div class="row m-t-40">
                                    <div class="col s12">
                                        <button class="btn-large w100 blue accent-4" id="btnLogin">Login</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="center-align m-t-20 db">
                            Don't have an account? <a href="authentication-register1.html">Sign Up!</a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- Login box.scss -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Page wrapper scss in scafholding.scss -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Page wrapper scss in scafholding.scss -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Right Sidebar -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Right Sidebar -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- All Required js -->
        <!-- ============================================================== -->
        <script src="<?php echo base_url(); ?>assets/assets/libs/jquery/dist/jquery.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/dist/js/materialize.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/assets/libs/sweetalert2/sweetalert2.min.js"></script>

        <!-- ============================================================== -->
        <!-- This page plugin js -->
        <!-- ============================================================== -->
        <script>
            $(document).ready(function() {
              $('.tooltipped').tooltip();
              // ==============================================================
              // Login and Recover Password
              // ==============================================================
              $('#to-recover').on("click", function() {
              $("#loginform").slideUp();
              $("#recoverform").fadeIn();
              });
              $(function() {
                $(".preloader").fadeOut();
                $('#loginform').on('submit', function(e) {
                    e.preventDefault();
                    $.ajax({
                      url:"<?php echo site_url("User/Authenticate"); ?>",
                      type:"POST",
                      dataType:"json",
                      data:{
                        'Username':$("#txtUsername").val(),
                        'Password':$("#txtPassword").val()
                      },
                      success: function(result) {
                        if(result.error==""){
                          location.reload();
                        }else{
                          Swal.fire(
                            result.error,
                            '',
                            'warning'
                          )
                        }
                      }
                    });
                });
              });
            });

        </script>
    </body>

<!-- Mirrored from www.wrappixel.com/demos/admin-templates/material-press/package/html/dark/authentication-login1.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 09 Apr 2022 01:57:21 GMT -->
</html>
