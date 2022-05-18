<!-- Title and breadcrumb -->
<!-- ============================================================== -->
<div class="page-titles">
    <div class="d-flex align-items-center">
        <h5 class="font-medium m-b-0">Player</h5>
        <div class="custom-breadcrumb ml-auto">
            <a href="#!" class="breadcrumb">Player</a>
            <a href="#!" class="breadcrumb">Information</a>
        </div>
    </div>
</div>
<!-- ============================================================== -->
<!-- Container fluid scss in scafholding.scss -->
<!-- ============================================================== -->
<div class="container-fluid">
    <div class="row">
        <div class="col s12 m12 l3">
            <div class="card">
                <div class="card-content">
                    <div class="center-align m-t-30">
                        <h4 class="card-title m-t-10"><?php echo $info->Firstname." ".$info->Lastname ?></h4>
                        <h6 class="card-subtitle">Date Joined: <?php echo $info->DateCreated; ?> </h6>
                        <div class="center-align">
                            <div>
                                <a href="javascript:void(0)" class="m-r-40"> <p> Wallet balance: <span class="label label-info">₱ <?php echo $info->WalletBalance ?></span></p></a>
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="card-content">
                    <small>Gcash Number </small>
                    <h6><?php echo $info->Gcashnumber; ?></h6>
                    <small>Gcash Name</small>
                    <h6><?php echo $info->GcashName; ?></h6>
                    <a href="<?php echo $info->FacebookLink; ?>" class="btn-floating indigo darken-2 m-t-10"><i class="fab fa-facebook"></i></a>
                </div>
            </div>
        </div>
        <div class="col s12 m12 l9">
            <div class="card">
                <div class="row">
                    <div class="col s12">
                        <ul class="tabs">
                            <li class="tab col s3"><a href="#profile">Edit Profile</a></li>
                            <li class="tab col s3"><a href="#account">Edit Account</a></li>
                        </ul>
                    </div>
                      <div id="profile" class="col s12">
                          <div class="card-content">
                                    <input type="hidden" id="txtAgentID" value="<?php echo $info->AgentID; ?>">
                                      <div class="input-field col s12 l6">
                                          <input id="txtFirstname" type="text" value="<?php echo $info->Firstname; ?>">
                                          <label for="txtFirstname">Firstname</label>
                                      </div>
                                      <div class="input-field col s12 l6">
                                          <input id="txtLastname" type="text" value="<?php echo $info->Lastname; ?>">
                                          <label for="txtLastname">Lastname</label>
                                      </div>
                                      <div class="input-field col s12 l6">
                                          <input id="txtGcashNumber" type="number" value="<?php echo $info->Gcashnumber; ?>">
                                          <label for="txtGcashNumber">Gcash Number</label>
                                      </div>
                                      <div class="input-field col s12 l6">
                                          <input id="txtGcashName" type="text" value="<?php echo $info->GcashName; ?>">
                                          <label for="txtGcashName">Gcash Name</label>
                                      </div>
                                      <div class="input-field col s12 l6">
                                          <input id="txtFacebookLink" type="text" value="<?php echo $info->FacebookLink; ?>">
                                          <label for="txtFacebookLink">Facebook Link</label>
                                      </div>
                                      <div class="input-field col s12 l6">
                                          <input id="txtUsername" type="text" value="<?php echo $info->Username; ?>">
                                          <label for="txtUsername">Username</label>
                                      </div>

                                  <div class="row">
                                      <div class="input-field col s12">
                                        <button class="btn waves-effect right" id="btnUpdateProfile" name="action">Update Profile</button>
                                      </div>
                                  </div>
                          </div>
                      </div>
                      <div id="account" class="col s12">
                          <div class="card-content">
                                  <div class="row">
                                    <input type="hidden" id="txtUserID" value="<?php echo $info->UserID; ?>">

                                  </div>
                                  <div class="row">
                                      <div class="input-field col s12">
                                          <input id="txtNewPassword" type="password" value="">
                                          <label for="txtNewPassword">New Password</label>
                                      </div>
                                  </div>
                                  <div class="row">
                                      <div class="input-field col s12">
                                          <input id="txtCPass" type="password" value="">
                                          <label for="txtCpass">Confirm Password</label>
                                      </div>
                                  </div>
                                  <div class="row">
                                      <div class="input-field col s12">
                                          <input id="txtOldPass" type="password">
                                          <label for="txtOldPass">Old Password</label>
                                      </div>
                                  </div>
                                  <div class="row">
                                      <div class="input-field col s12">
                                        <button class="btn waves-effect right" id="btnUpdateAccount" name="action">Update Account</button>
                                      </div>
                                  </div>
                          </div>
                      </div>
                  </div>
                  </div>
                  <div class="card">
                  </div>
                  <div class="card">
                    <div class="card-content">
                      <p class="card-title"><span class="label label-info">Betting History</span></p>
                      <table id="tblTransaction" class="table dataTable centered table-bordered nowrap display">
                        <thead>
                          <tr class="grey lighten-4">
                            <th>Date</th>
                            <th>Bet Amount</th>
                            <th>Choice</th>
                            <th>Status</th>
                          </tr>
                        </thead>
                        <tbody>

                        </tbody>
                      </table>
                    </div>
                  </div>
                  </div>
                  </div>
                  </div>
                  <!-- ============================================================== -->
                  <!-- Container fluid scss in scafholding.scss -->
                  <!-- ============================================================== -->
                  <footer class="center-align m-b-30 m-l-15 m-r-15">All Rights Reserved by MatPress. Designed and Developed by <a href="https://wrappixel.com/">WrapPixel</a>.</footer>
                  </div>
                  <!-- ============================================================== -->
                  <!-- Page wrapper scss in scafholding.scss -->

                  <!-- ============================================================== -->
                  <!-- Right Sidebar -->
                  <!-- ============================================================== -->
                  </div>
                  <!-- All Required js -->
                  <!-- ============================================================== -->
                  <script src="<?php echo base_url(); ?>assets/assets/libs/jquery/dist/jquery.min.js"></script>
                  <script src="<?php echo base_url(); ?>assets/assets/libs/sweetalert2/sweetalert2.min.js"></script>

                  <script src="<?php echo base_url(); ?>assets/assets/extra-libs/DataTables/jquery.dataTables.min.js"></script>
                  <script src="<?php echo base_url(); ?>assets/dist/js/materialize.min.js"></script>

                  <script type="text/javascript">
                      $(document).ready(function() {
                          $('#tblTransaction').DataTable({
                            "bLengthChange": false,
                            "bFilter": true,
                            "searching": false,
                            "bInfo": false,
                            "bAutoWidth": false
                          });
                          $("#btnUpdateAccount").click(function() {
                            $.ajax({
                              url: "<?php echo base_url(); ?>index.php/User/ChangePassword",
                              type: "POST",
                              data:{
                                'UserID': $('#txtUserID').val(),
                                'CPass': $('#txtCPass').val(),
                                'Password': $('#txtNewPassword').val(),
                                'OldPass': $('#txtOldPass').val()
                              },
                              dataType:"json",
                              success: function(result){
                                  if(result.success){
                                    Swal.fire({
                                        icon: 'success',
                                        title: 'Successfully updated',
                                        showConfirmButton: false,
                                        timer: 3000
                                      })
                                  }else{
                                    Swal.fire({
                                        icon: 'warning',
                                        title: result.error,
                                        showConfirmButton: false,
                                        timer: 3000
                                      })
                                  }
                              }
                            });
                          });

                          $("#btnUpdateProfile").click(function() {
                            $.ajax({
                              url: "<?php echo base_url(); ?>index.php/Agent/UpdateAgent",
                              type: "POST",
                              data:{
                                'Firstname': $('#txtFirstname').val(),
                                'UserID': $('#txtUserID').val(),
                                'Lastname': $('#txtLastname').val(),
                                'GcashNumber': $('#txtGcashNumber').val(),
                                'GcashName': $('#txtGcashName').val(),
                                'FacebookLink': $('#txtFacebookLink').val(),
                                'Username': $('#txtUsername').val(),
                                'AgentID':$("#txtAgentID").val()
                              },
                              dataType:"json",
                              success: function(response){
                                  if(response.success){
                                    Swal.fire({
                                      icon: 'success',
                                      title: 'Your work has been saved',
                                      showConfirmButton: false,
                                      timer: 1500
                                      })
                                  }else if(response.error!=""){
                                    Swal.fire({
                                      icon: 'warning',
                                      title: response.error,
                                      showConfirmButton: false,
                                      timer: 1500
                                      })
                                  }else{
                                    Swal.fire({
                                      icon: 'warning',
                                      title: "You didn't changed anything.",
                                      showConfirmButton: false,
                                      timer: 1500
                                      })
                                  }
                              }
                            });
                          });
                      })
                  </script>
