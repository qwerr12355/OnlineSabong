
            <!-- ============================================================== -->
            <!-- Title and breadcrumb -->
            <!-- ============================================================== -->
            <div class="page-titles">
                <div class="d-flex align-items-center">
                    <h5 class="font-medium m-b-0">Mater Agent</h5>
                    <div class="custom-breadcrumb ml-auto">
                        <a href="#!" class="breadcrumb">User</a>
                        <a href="#!" class="breadcrumb">Master Agent</a>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- Container fluid scss in scafholding.scss -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                <div class="row">
                    <div class="col s12">
                        <div class="card">
                            <div class="card-content">
                              <div class="d-flex no-block align-items-center">
                                  <h5 class="card-title">All master agents</h5>
                                  <div class="ml-auto">
                                      <a class="waves-effect waves-light btn modal-trigger" href="#modal2">ADD NEW MASTER AGENT</a>
                                  </div>
                              </div>
                              <div class="table-responsive">
                                  <table id="tblOperator" class="table centered table-bordered nowrap display compact">
                                      <thead>
                                          <tr>
                                              <th>#</th>
                                              <th>Name</th>
                                              <th>Username</th>
                                              <th>Wallet Balance</th>
                                              <th>Current Commission</th>
                                              <th>Total Commission</th>
                                              <th>Date Joined</th>
                                              <th>Action</th>
                                          </tr>
                                      </thead>
                                      <tbody>
                                      </tbody>
                                  </table>
                              </div>
                            </div>
                        </div>
                        <!-- Create Modal Structure -->
                        <div id="modal2" class="modal">
                            <form id="frmMasterAgent" class="col s12">
                            <div class="modal-content">
                                <h5 class="card-title"> <i class="fas fa-phone-square m-r-10"></i>New master agent</h5>
                                <div class="row">
                                        <div class="row">
                                            <div class="input-field col s12 l4">
                                                <i class="material-icons prefix">account_circle</i>
                                                <input id="fname" required class="name" name="Firstname" type="text">
                                                <label for="fname">Enter Firstname Here*</label>
                                            </div>
                                            <div class="input-field col s12 l4">
                                                <i class="material-icons prefix">account_circle</i>
                                                <label for="lname">Enter Lastname Here</label>
                                                <input required id="lname" name="Lastname" class="name" type="text" class="validate">
                                                <div class="errortxtFname"></div>
                                            </div>
                                            <div class="input-field col s12 l4">
                                                <i class="material-icons prefix">phone</i>
                                                <label for="gcashnumber">Gcash number</label>
                                                <input id="gcashnumber" name="GcashNumber" type="number" class="validate">
                                                <div class="errortxtFname"></div>

                                            </div>
                                            <div class="input-field col s12 l4">
                                                <i class="material-icons prefix">account_circle</i>
                                                <label for="gcashname">Enter gcash name</label>
                                                <input id="gcashname" name="GcashName" class="name" type="text" class="validate">
                                                <div class="errortxtFname"></div>

                                            </div>
                                            <div class="input-field col s12 l8">
                                                <i class="material-icons prefix">account_circle</i>
                                                <label for="facebooklink">Enter Facebook Link</label>
                                                <input id="facebooklink" name="FacebookLink" type="text" class="validate">
                                                <div class="errortxtFname"></div>

                                            </div>
                                            <div class="input-field col s12 l4">
                                                <i class="material-icons prefix">account_circle</i>
                                                <label for="username">Username</label>
                                                <input required id="username" name="Username" type="text" class="validate">
                                                <div class="errortxtFname"></div>

                                            </div>
                                            <div class="input-field col s12 l4">
                                                <i class="material-icons prefix">account_circle</i>
                                                <label for="password">Password</label>
                                                <input required id="password" name="Password" type="password" class="validate">
                                                <div class="errortxtFname"></div>

                                            </div>
                                            <div class="input-field col s12 l4">
                                                <i class="material-icons prefix">account_circle</i>
                                                <label for="cpassword">Confirm Password</label>
                                                <input required id="cpassword" name="ConfirmPassword" type="password" class="validate">
                                                <div class="errortxtFname"></div>

                                            </div>
                                        </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="modal-action waves-effect waves-green btn white-text" id="btnAddNewOperator"><i class="far fa-save m-r-10"></i> Add</a>
                            </div>

                            </form>
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
        <!-- ============================================================== -->
        <!-- Right Sidebar -->
        <!-- ============================================================== -->

        <!-- ============================================================== -->
        <!-- Right Sidebar -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- All Required js -->

    <script src="<?php echo base_url(); ?>assets/assets/libs/jquery/dist/jquery.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/assets/libs/sweetalert2/sweetalert2.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/dist/js/materialize.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/dist/js/pages/forms/jquery.validate.min.js"></script>

    <script src="<?php echo base_url(); ?>assets/assets/extra-libs/prism/prism.js"></script>


    <script src="<?php echo base_url(); ?>assets/assets/extra-libs/DataTables/jquery.dataTables.min.js"></script>
    <script type="text/javascript">
        $( document ).ready(function() {
            $('.name').on('keydown', function(event) {
                if (this.selectionStart == 0 && event.keyCode >= 65 && event.keyCode <= 90 && !(event.shiftKey) && !(event.ctrlKey) && !(event.metaKey) && !(event.altKey)) {
                   var $t = $(this);
                   event.preventDefault();
                   var char = String.fromCharCode(event.keyCode);
                   $t.val(char + $t.val().slice(this.selectionEnd));
                   this.setSelectionRange(1,1);
                }
            });
            $("#frmMasterAgent").on('submit', function(e){
                 e.preventDefault();
                 $.ajax({
                   type: "POST",
                   url: "<?php echo base_url(); ?>index.php/Operator/AddNewMasterAgent",
                   dataType:"json",
                   data:
                    $("#frmMasterAgent").serialize(),
                   success: function(response){
                     if(response.success){
                       $("#modal2").modal('close');
                       $("#username").val("");
                       $("#password").val("");
                       $("#cpassword").val("");
                       $("#fname").val("");
                       $("#lname").val("");
                       $("#gcashnumber").val("");
                       $("#facebooklink").val("") ;
                       $("#gcashname").val("");
                       Swal.fire({
                         icon: 'success',
                         title: 'Successfully added.',
                         showConfirmButton: false,
                         timer: 1500
                       })
                       loadOperator();
                     }else{
                       Swal.fire({
                         icon: 'warning',
                         title: response.error,
                         showConfirmButton: false,
                         timer: 1500
                       })
                     }
                   }
                 });
              });
            var userArray=[];
            loadOperator();
            function loadOperator() {
              $.ajax({
                url: "<?php echo base_url(); ?>index.php/Operator/GetMasterAgentUserRecruits",
                type: "POST",
                dataType:"json",
                async:false,
                success: function(result){
                    userArray=result;
                }
              });
              var _html='';
              $('#tblOperator').dataTable().fnClearTable();
              $('#tblOperator').dataTable().fnDestroy();
              for (var i = 0; i < userArray.length; i++) {
                var datejoined=new Date(userArray[i].DateCreated);
                _html+='<tr>'
                          +'<td>'+(i+1)+'</td>'
                          +'<td>'+userArray[i].Lastname+", "+userArray[i].Firstname+'</td>'
                          +'<td>'+userArray[i].Username+'</td>'
                          +'<td>'+userArray[i].WalletBalance+'</td>'
                          +'<td>'+userArray[i].CurrentCommission+'</td>'
                          +'<td>'+userArray[i].TotalCommission+'</td>'
                          +'<td>'+datejoined.toLocaleDateString()+'</td>'
                          +'<td><a href="<?php echo base_url(); ?>index.php/Operator/MasterAgentInfo/'+userArray[i].UserID+'" class="btn"><i class="material-icons">edit</i></button></a>'
                      +'</tr>';

              }
              $("#tblOperator tbody").html(_html);

              $("#tblOperator").DataTable();
            }
        });
    </script>
