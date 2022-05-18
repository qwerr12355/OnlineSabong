
            <!-- ============================================================== -->
            <!-- Title and breadcrumb -->
            <!-- ============================================================== -->
            <div class="page-titles">
                <div class="d-flex align-items-center">
                    <h5 class="font-medium m-b-0">Sub-operator Information</h5>
                    <div class="custom-breadcrumb ml-auto">
                        <a href="#!" class="breadcrumb">User</a>
                        <a href="#!" class="breadcrumb">Sub-operator</a>
                        <a href="#!" class="breadcrumb">Information</a>
                    </div>
                </div>
            </div>
            <div class="container-fluid">
              <div class="row">
                  <div class="col s12 m12 l3">
                      <div class="card">
                          <div class="card-content">
                              <div class="center-align m-t-30">
                                  <h4 class="card-title m-t-10"><?php echo $info->Firstname." ".$info->Lastname ?></h4>
                                  <h6 class="card-subtitle">Date Joined: <?php echo $info->DateCreated; ?> </h6>
                              </div>
                          </div>
                          <hr>
                          <div class="card-content">
                              <small>Username </small>
                              <h6><?php echo $info->Username; ?></h6>
                              <small>Gcash Number </small>
                              <h6><?php echo $info->GcashNumber; ?></h6>
                              <small>Gcash Name</small>
                              <h6><?php echo $info->GcashName; ?></h6>
                              <a href="<?php echo $info->FBLink; ?>" class="btn-floating indigo darken-2 m-t-10"><i class="fab fa-facebook"></i></a>
                          </div>
                      </div>
                    </div>
                    <div class="col s12 m12 l9">
                        <div class="card">
                            <div class="row">
                                <div class="col s12">
                                    <ul class="tabs">
                                        <li class="tab col s3"><a href="#profile">Dashboard</a></li>
                                        <li class="tab col s3"><a href="#account">Account</a></li>
                                    </ul>
                                </div>
                                  <div id="profile" class="col s12">
                                    <div class="card-content">
                                      <div class="col m6 s12 l4">
                                        <div class="card indigo">
                                          <div class="p-15">
                                            <div class="d-flex no-block align-items-center">
                                              <div class="m-r-10 blue-text text-accent-4">
                                                <i class="material-icons display-5">account_balance_wallet</i>
                                              </div>
                                              <div>
                                                <span class="white-text">Wallet Balance</span>
                                                <h5 class="font-medium m-b-0"><?php echo $info->WalletBalance; ?></h5>
                                              </div>
                                            </div>
                                          </div>
                                        </div>
                                      </div>
                                      <div class="col m6 s12 l4">
                                        <div class="card green">
                                          <div class="p-15">
                                            <div class="d-flex no-block align-items-center">
                                              <div class="m-r-10 blue-text text-accent-4">
                                                <i class="material-icons display-5">account_balance_wallet</i>
                                              </div>
                                              <div>
                                                <span class="white-text">Current Commission</span>
                                                <h5 class="font-medium m-b-0"><?php echo $info->CurrentCommission; ?></h5>
                                              </div>
                                            </div>
                                          </div>
                                        </div>
                                      </div>
                                      <div class="col m6 s12 l4">
                                        <div class="card green">
                                          <div class="p-15">
                                            <div class="d-flex no-block align-items-center">
                                              <div class="m-r-10 blue-text text-accent-4">
                                                <i class="material-icons display-5">account_balance_wallet</i>
                                              </div>
                                              <div>
                                                <span class="white-text">Total Commission</span>
                                                <h5 class="font-medium m-b-0"><?php echo $info->TotalCommission; ?></h5>
                                              </div>
                                            </div>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                  <div id="account" class="col s12">
                                    <form id="frmOperator">
                                      <div class="card-content">
                                                <input type="hidden" id="txtUserID" name="UserID" value="<?php echo $info->UserID; ?>">
                                                  <div class="input-field col s12 l6">
                                                      <input id="txtFirstname" name="Firstname" required class="name" type="text" value="<?php echo $info->Firstname; ?>">
                                                      <label for="txtFirstname">Firstname</label>
                                                  </div>
                                                  <div class="input-field col s12 l6">
                                                      <input id="txtLastname"name="Lastname" required class="name" type="text" value="<?php echo $info->Lastname; ?>">
                                                      <label for="txtLastname">Lastname</label>
                                                  </div>
                                                  <div class="input-field col s12 l6">
                                                      <input id="txtGcashNumber" name="GcashNumber" type="number" value="<?php echo $info->GcashNumber; ?>">
                                                      <label for="txtGcashNumber">Gcash Number</label>
                                                  </div>
                                                  <div class="input-field col s12 l6">
                                                      <input id="txtGcashname" name="GcashName" class="name" type="text" value="<?php echo $info->GcashName; ?>">
                                                      <label for="txtGcashname">Gcash Name</label>
                                                  </div>
                                                  <div class="input-field col s12 l6">
                                                      <input id="txtFacebookLink" name="FacebookLink" type="text" value="<?php echo $info->FBLink; ?>">
                                                      <label for="txtFacebookLink">Facebook Link</label>
                                                  </div>
                                                  <div class="input-field col s12 l6">
                                                      <input id="txtUsername" name="Username" required type="text" value="<?php echo $info->Username; ?>">
                                                      <label for="txtUsername">Username</label>
                                                  </div>

                                              <div class="row">
                                                  <div class="input-field col s12">
                                                    <button class="btn waves-effect right" id="btnUpdateProfile" type="submit" name="action">Update Profile</button>
                                                  </div>
                                              </div>
                                      </div>
                                    </form>
                                  </div>
                              </div>
                              </div>
                              <div class="card">
                                <div class="card-content">
                                  <p class="card-title">Wallet logs</p>
                                  <table id="tblWalletLogs" class="table dataTable centered table-bordered nowrap display">
                                    <thead>
                                      <tr class="grey lighten-4">
                                        <th>Decription</th>
                                        <th>Amount</th>
                                        <th>Date</th>
                                        <th>Proccessed by</th>
                                        <th>Details</th>
                                      </tr>
                                      </thead>
                                        <tbody>
                                            <?php
                                                if($walletlogs){
                                                  foreach ($walletlogs as $wl) {
                                                    if($wl['Type']=="Debit"){
                                                      echo "<tr>"
                                                                ."<td><span class='label label-success'>".$wl['Description']."</span></td>"
                                                                ."<td>".$wl['Amount']."</td>"
                                                                ."<td>".$wl['Date']."</td>"
                                                                ."<td>".$wl['Firstname']." ".$wl['Lastname']."</td>"
                                                                ."<td>".$wl['Details']."</td>"
                                                           ."</tr>";
                                                    }else{
                                                      echo "<tr>"
                                                                ."<td><span class='label label-danger'>".$wl['Description']."</span></td>"
                                                                ."<td>".$wl['Amount']."</td>"
                                                                ."<td>".$wl['Date']."</td>"
                                                                ."<td>".$wl['Firstname']." ".$wl['Lastname']."</td>"
                                                                ."<td>".$wl['Details']."</td>"
                                                           ."</tr>";
                                                    }
                                                  }
                                                }
                                             ?>
                                        </tbody>
                                    </table>
                                </div>
                              </div>
                              <div class="card">
                                <div class="card-content">
                                  <p class="card-title">Master-agent(s)</p>
                                  <table id="tblMasterAgents" class="table dataTable centered table-bordered nowrap display">
                                    <thead>
                                      <tr class="grey lighten-4">
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Username</th>
                                        <th>WalletBalance</th>
                                        <th>CurrentCommission</th>
                                        <th>Date Joined</th>
                                      </tr>
                                      </thead>
                                        <tbody>
                                            <?php
                                                $i=1;
                                                if($masteragent){
                                                  foreach ($masteragent as $ma) {
                                                      echo "<tr>"
                                                                ."<td>".$i."</td>"
                                                                ."<td>".$ma['Lastname'].", ".$ma['Firstname']."</td>"
                                                                ."<td>".$ma['Username']."</td>"
                                                                ."<td>".$ma['WalletBalance']."</td>"
                                                                ."<td>".$ma['CurrentCommission']."</td>"
                                                                ."<td>".$ma['DateCreated']."</td>"
                                                          ."</tr>";
                                                          $i++;
                                                  }
                                                }
                                             ?>
                                        </tbody>
                                    </table>
                                </div>
                              </div>
                              <div class="card">
                                <div class="card-content">
                                  <p class="card-title">Sub-agent(s)</p>
                                  <table id="tblSubAgents" class="table dataTable centered table-bordered nowrap display">
                                    <thead>
                                      <tr class="grey lighten-4">
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Username</th>
                                        <th>WalletBalance</th>
                                        <th>CurrentCommission</th>
                                        <th>Date Joined</th>
                                      </tr>
                                      </thead>
                                        <tbody>
                                          <?php
                                              $i=1;
                                              if($subagent){
                                                foreach ($subagent as $sa) {
                                                    echo "<tr>"
                                                              ."<td>".$i."</td>"
                                                              ."<td>".$sa['Lastname'].", ".$sa['Firstname']."</td>"
                                                              ."<td>".$sa['Username']."</td>"
                                                              ."<td>".$sa['WalletBalance']."</td>"
                                                              ."<td>".$sa['CurrentCommission']."</td>"
                                                              ."<td>".$sa['DateCreated']."</td>"
                                                        ."</tr>";
                                                        $i++;
                                                }
                                              }
                                           ?>
                                        </tbody>
                                    </table>
                                </div>
                              </div>
                              <div class="card">
                                <div class="card-content">
                                  <p class="card-title">Players(s)</p>
                                  <table id="tblPlayers" class="table dataTable centered table-bordered nowrap display">
                                    <thead>
                                      <tr class="grey lighten-4">
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Username</th>
                                        <th>WalletBalance</th>
                                        <th>CurrentCommission</th>
                                        <th>Date Joined</th>
                                      </tr>
                                      </thead>
                                        <tbody>
                                          <?php
                                              $i=1;
                                              if($player){
                                                foreach ($player as $p) {
                                                    echo "<tr>"
                                                              ."<td>".$i."</td>"
                                                              ."<td>".$p['Lastname'].", ".$p['Firstname']."</td>"
                                                              ."<td>".$p['Username']."</td>"
                                                              ."<td>".$p['WalletBalance']."</td>"
                                                              ."<td>".$p['CurrentCommission']."</td>"
                                                              ."<td>".$p['DateCreated']."</td>"
                                                        ."</tr>";
                                                        $i++;
                                                }
                                              }
                                           ?>
                                        </tbody>
                                    </table>
                                </div>
                              </div>
                    </div>
                </div>
              </div>
              <!-- Modal Trigger -->


            </div>
            <!-- ============================================================== -->
            <!-- Container fluid scss in scafholding.scss -->
            <!-- ============================================================== -->
            <footer class="center-align m-b-30 m-l-15 m-r-15">All Rights Reserved by MatPress. Designed and Developed by <a href="https://wrappixel.com/">WrapPixel</a>.</footer>
        </div>
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
    <script src="<?php echo base_url(); ?>assets/assets/libs/sweetalert2/sweetalert2.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/dist/js/materialize.min.js"></script>

    <script src="<?php echo base_url(); ?>assets/assets/extra-libs/DataTables/jquery.dataTables.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
          $("#tblWalletLogs").DataTable();
          $("#tblMasterAgents").DataTable();
          $("#tblSubAgents").DataTable();
          $("#tblPlayers").DataTable();
          $('.name').on('keydown', function(event) {
              if (this.selectionStart == 0 && event.keyCode >= 65 && event.keyCode <= 90 && !(event.shiftKey) && !(event.ctrlKey) && !(event.metaKey) && !(event.altKey)) {
                 var $t = $(this);
                 event.preventDefault();
                 var char = String.fromCharCode(event.keyCode);
                 $t.val(char + $t.val().slice(this.selectionEnd));
                 this.setSelectionRange(1,1);
              }
          });
          $("#frmOperator").on("submit",function(e) {
              e.preventDefault();
              $.ajax({
                url:"<?php echo base_url(); ?>index.php/Admin/UpdateUser",
                type:"POST",
                data:$("#frmOperator").serialize(),
                dataType:"json",
                success:function(result) {
                  if(result.success){
                    Swal.fire({
                      icon: 'success',
                      title: 'successfully updated.',
                      showConfirmButton: false,
                      timer: 1500
                    })
                  }else if(result.error!=""){
                    Swal.fire({
                      icon: 'warning',
                      title: result.error,
                      showConfirmButton: false,
                      timer: 1500
                    })
                  }else{
                    Swal.fire({
                      icon: 'warning',
                      title: "You haven't changed anything.",
                      showConfirmButton: false,
                      timer: 1500
                    })
                  }
                }
              });
          });
        })
    </script>
