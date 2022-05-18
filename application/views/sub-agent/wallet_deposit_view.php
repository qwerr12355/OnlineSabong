
            <!-- ============================================================== -->
            <!-- Title and breadcrumb -->
            <!-- ============================================================== -->
            <div class="page-titles">
                <div class="d-flex align-items-center">
                    <h5 class="font-medium m-b-0">Wallet Station</h5>
                    <div class="custom-breadcrumb ml-auto">
                      <a href="#!" class="breadcrumb">Wallet Station</a>
                      <a href="#!" class="breadcrumb">Wallet Deposit</a>
                    </div>
                </div>
            </div>
              <div class="container-fluid">
                  <div class="card">
                      <div class="card-content">
                        <h5 class="card-title">Wallet Deposit</h5>
                            <div class="row">
                                <div class="col l8 m6 s12">
                                    <form id="frmWalletDeposit">
                                      <div class="input-field col s12">
                                        <select searchable='Search' name="UserID" id="selectUser">

                                        </select>
                                        <label for="selectUser">Select user</label>
                                      </div>

                                      <div class="input-field col s12 l6">
                                        <input required type="number" name="Amount" id="txtAmount">
                                        <label for="txtAmount">Enter Amount</label>
                                      </div>

                                      <div class="input-field col s12 l6">
                                        <input required type="password" name="Password" id="txtPassword">
                                        <label for="txtPassword">Enter your password</label>
                                      </div>
                                      <div class="input-field col s12">
                                        <textarea id="txtDetails" name="Details" class="materialize-textarea"></textarea>
                                        <label for="txtAmount">Details</label>
                                      </div>
                                      <button type="submit" id="btnCashIn" class="btn right m-b-15">DEPOSIT</button>
                                    </form>
                                </div>
                                <div class="col l4 m6 s12 ml-auto">
                                    <h4 class="card-title m-t-30">User Info</h4>
                                    <p id="pName">Name :</p>
                                    <p id=pGcashNumber>Gcash Number :</p>
                                    <p id="pGcashName">Gcash Name :</p>
                                    <p id="pUsername">Username :</p>
                                    <p id="pWalletBalance">Wallet Balance :</p>
                                    <p id="pDateJoined">Date Joined :</p>
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
    <script src="<?php echo base_url(); ?>assets/dist/js/materialize.min.js"></script>

    <script src="<?php echo base_url(); ?>assets/assets/extra-libs/DataTables/jquery.dataTables.min.js"></script>

    <script src="<?php echo base_url(); ?>assets/assets/libs/sweetalert2/sweetalert2.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/formsearchcustom.js"></script>
    <script type="text/javascript">

            $(document).ready(function() {
                var _selectData=[];
                $("#frmWalletDeposit").on("submit",function(e) {
                    e.preventDefault();
                    if($("#selectUser").val()==""){
                      Swal.fire(
                          'Select a user!',
                          'Please choose a user!',
                          'warning'
                        )
                    }else{
                      $.ajax({
                              url: "<?php echo base_url(); ?>index.php/SubAgent/DepositWallet",
                              type: "POST",
                              dataType:"json",
                              data:$("#frmWalletDeposit").serialize(),
                              success: function(result){
                                if(result.success){
                                  var index = _selectData.findIndex(u => u.UserID === $("#selectUser").val());
                                  var html='<pre><span class="row">Name : '+_selectData[index].Firstname+" "+_selectData[index].Lastname+' </span>'
                                            +'<span class="row">Username : '+_selectData[index].Username+' </span>'
                                            +'<span class="row">Amount : '+$("#txtAmount").val()+' </span></pre>';
                                  Swal.fire(
                                      '<span class="row">Wallet Deposit Successfull!</span>'+html,
                                      "",
                                      'success'
                                    );
                                    loadUser();
                                    $("#pName").html("Name : ");
                                    $("#pGcashNumber").html("Gcash Number : ");
                                    $("#pGcashName").html("Gcash Name : ");
                                    $("#pUsername").html("Username : ");
                                    $("#pWalletBalance").html("Wallet Balance: ");
                                    $("#pDateJoined").html("Date joined : ");
                                    $("#txtAmount").val("");
                                    $("#txtPassword").val("");
                                    $("#txtDetails").val("");
                                }else{
                                  Swal.fire(
                                      'Error!',
                                      result.error,
                                      'warning'
                                    )
                                }
                              }
                          });
                    }

                });
                function loadUser() {
                  $.ajax({
                          url: "<?php echo base_url(); ?>index.php/MasterAgent/GetUserByUserTypeID",
                          type: "POST",
                          dataType:"json",
                          data:{"UserTypeID":6},
                          async:false,
                          success: function(result){
                              _selectData=result;
                              $('#selectUser').empty();
                                $('#selectUser').append("<option value=''>CHOOSE A USER</option>")
                              for (var i = 0; i < _selectData.length; i++) {
                                $('#selectUser').append($("<option></option>").attr("value",_selectData[i].UserID).text( _selectData[i].Username+' - '+_selectData[i].Firstname+' '+_selectData[i].Lastname ));

                              }
                              $('#selectUser').formSelect();

                              var instances;
                              document.addEventListener('DOMContentLoaded', function() {
                                  var elems = document.querySelectorAll('select');
                                  instances = M.FormSelect.init(elems, _selectData);
                              });
                          }
                        });
                }
                loadUser();
                $("#selectUser").change(function() {
                      if($("#selectUser").val()==""){
                        $("#pName").html("Name : ");
                        $("#pGcashNumber").html("Gcash Number : ");
                        $("#pGcashName").html("Gcash Name : ");
                        $("#pUsername").html("Username : ");
                        $("#pWalletBalance").html("Wallet Balance: ");
                        $("#pDateJoined").html("Date joined : ");
                      }else{
                        var index = _selectData.findIndex(u => u.UserID === $(this).val());
                        $("#pName").html("Name : "+_selectData[index].Firstname+" "+_selectData[index].Lastname);
                        $("#pGcashNumber").html("Gcash Number : "+_selectData[index].GcashNumber);
                        $("#pGcashName").html("Gcash Name : "+_selectData[index].GcashName);
                        $("#pUsername").html("Username : "+_selectData[index].Username);
                        $("#pWalletBalance").html("Wallet Balance: <span class='label label-info'>₱"+_selectData[index].WalletBalance+"</span>");
                        $("#pDateJoined").html("Date joined : "+_selectData[index].DateCreated);
                      }
                });

            });


    </script>
