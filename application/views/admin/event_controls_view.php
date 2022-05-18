            <div class="page-titles">
                <div class="d-flex align-items-center">
                    <h5 class="font-medium m-b-0">Event Control</h5>
                    <div class="custom-breadcrumb ml-auto">
                        <a href="#!" class="breadcrumb">Event</a>
                        <a href="#!" class="breadcrumb">Controls</a>
                    </div>
                </div>
            </div>
              <div class="container-fluid">
                  <div class="row">
                    <div class="card">
                        <div class="card-content">
                            <div class="row">
                              <div class="card col s12 l8">
                                <div class="twitch">
                                    <div class="twitch-video">
                                          <?php echo $eventinfo->iframe; ?>
                                    </div>
                                </div>
                              </div>
                              <div class="card col s12 l4">
                                <div class="card-content">
                                    <div class="row">
                                      <span id="lblOpen" class="label label-success">BETTING IS NOW OPEN</span>
                                      <span id="lblClose" class="label label-danger">BETTING IS CLOSED</span>
                                      <input type="hidden" value="<?php echo $EventID; ?>" readonly id="txtEventID">
                                      <input type="hidden" readonly id="txtCockFightID">
                                      <div class="input-field col s12">
                                          <input type="number" id="txtFightNumber">
                                          <label for="txtFightNumber">Fight No.</label>
                                      </div>
                                    </div>
                                    <div class="row">
                                      <button type="button" id="btnOpenBet" class="btn col green s12">OPEN BET</button>
                                    </div>
                                    <div class="row">
                                      <button type="button" id="btnCloseBet" class="btn col red s12">CLOSE BET</button>
                                    </div>
                                    <div class="row">
                                      <a href="#WinnerModal" type="button" id="btnChooseWinner" class="btn col s12 modal-trigger">CHOOSE WINNER</a>
                                    </div>
                                    <div class="row">
                                      <div class="input-field col s12">
                                          <input  readonly type="number" id="txtMeronBets">
                                          <label for="txtMeronBets">Total Meron bets</label>
                                      </div>
                                    </div>
                                    <div class="row">
                                      <div class="input-field col s12">
                                          <input  readonly type="number" id="txtWalaBets">
                                          <label for="txtWalaBets">Total Wala bets</label>
                                      </div>
                                    </div>
                                    <div class="row">
                                      <div class="input-field col s12">
                                          <input readonly type="number" id="txtTotalDraw">
                                          <label for="txtTotalDraw">Total draw bets</label>
                                      </div>
                                    </div>
                                </div>
                              </div>
                            </div>
                            <div class="row">
                                <button type="button" id="btnEndEvent" class="btn red right">END EVENT</button>
                            </div>
                        </div>
                    </div>
                  </div>

              </div>
              <div id="WinnerModal" class="modal">
                  <div class="modal-content">
                    <div class="row">
                      <button type="button" id="btnMeronWins" class="btn red col s12 l3 ">Meron Wins</button>
                      <button type="button" id="btnWalaWins" class="btn blue col s12 l3">Wala Wins</button>
                      <button type="button" id="btnDraw" class="btn green col s12 l3">Draw</button>
                      <button type="button" id="btnCancel" class="btn grey col s12 l3">Cancel</button>
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

    <script src="<?php echo base_url(); ?>assets/assets/extra-libs/DataTables/jquery.dataTables.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/dist/js/materialize.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/assets/libs/sweetalert2/sweetalert2.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $("#btnOpenBet").hide();
            $("#btnCloseBet").hide();
            $("#btnChooseWinner").hide();
            $("#lblOpen").hide();
            $("#lblClose").hide();
            loadLastCockFight();
            function loadLastCockFight(){
              $.ajax({
                  url:"<?php echo base_url(); ?>index.php/Cockfight/GetLastCockfight",
                  type:"POST",
                  dataType:"json",
                  data:{
                    "EventID":$("#txtEventID").val()
                  },
                  success: function(response){

                      if(response.FightNumber==""){
                        $("#btnOpenBet").show();
                      }else{
                        $("#txtCockFightID").val(response.GetLastCockfight.CockfightID);
                      }
                      if(response.GetLastCockfight.Status=="Closed"){
                        $("#btnOpenBet").hide();
                        $("#txtCockFightID").val(response.GetLastCockfight.CockfightID);
                        $("#lblClose").show();
                        $("#txtFightNumber").val(parseInt(response.GetLastCockfight.FightNumber));

                        $("#lblOpen").hide();
                        $("#btnChooseWinner").show();
                        $("#btnCloseBet").hide();
                      }
                      if(response.GetLastCockfight.Status=="Open"){
                        $("#btnOpenBet").hide();
                        $("#lblOpen").show();
                        $("#lblClose").hide();
                        $("#txtFightNumber").val(parseInt(response.GetLastCockfight.FightNumber));

                        $("#btnCloseBet").show();
                        $("#txtCockFightID").val(response.GetLastCockfight.CockfightID);

                      }
                      if(response.GetLastCockfight.Winner!=null){
                        $("#btnOpenBet").show();
                        $("#lblOpen").hide();
                        $("#lblClose").hide();
                        $("#btnChooseWinner").hide();
                        $("#txtFightNumber").val(parseInt(response.GetLastCockfight.FightNumber)+1);

                      }
                      M.updateTextFields();
                  }

              });
            }
            $("#btnOpenBet").click(function() {
              Swal.fire({
                  title: 'Are you sure you want to open a new bet?',
                  icon: 'warning',
                  showCancelButton: true,
                  confirmButtonColor: '#3085d6',
                  cancelButtonColor: '#d33',
                  confirmButtonText: 'Yes, open!'
                  }).then((result) => {
                  if (result.isConfirmed) {
                    $.ajax({
                        url:"<?php echo base_url(); ?>index.php/Cockfight/Add",
                        type:"POST",
                        data:{
                          "EventID":$("#txtEventID").val(),
                          "CockfightID":$("#txtCockFightID").val(),
                          "FightNumber":$("#txtFightNumber").val()
                        },
                        dataType:"json",
                        success: function(response){
                            if(response.success){
                              Swal.fire(
                                'Betting is now open .',
                                '',
                                'success'
                              );
                              loadLastCockFight();
                            }
                        }

                    });

                  }
                })
            });
            $("#btnCloseBet").click(function() {
              Swal.fire({
                  title: 'Are you sure you want to close bet?',
                  icon: 'warning',
                  showCancelButton: true,
                  confirmButtonColor: '#3085d6',
                  cancelButtonColor: '#d33',
                  confirmButtonText: 'Yes, close!'
                  }).then((result) => {
                  if (result.isConfirmed) {
                    $.ajax({
                        url:"<?php echo base_url(); ?>index.php/Cockfight/UpdateStatus",
                        type:"POST",
                        data:{
                          "CockFightID":$("#txtCockFightID").val()
                        },
                        dataType:"json",
                        success: function(response){
                            if(response.success){
                              Swal.fire(
                                'Betting was closed .',
                                '',
                                'success'
                              );
                              loadLastCockFight();
                            }
                        }

                    });

                  }
                })
            });
            $("#btnMeronWins").click(function() {
              Swal.fire({
                  title: 'Are you sure?',
                  icon: 'warning',
                  showCancelButton: true,
                  confirmButtonColor: '#3085d6',
                  cancelButtonColor: '#d33',
                  confirmButtonText: 'Yes!'
                  }).then((result) => {
                  if (result.isConfirmed) {
                    $.ajax({
                        url:"<?php echo base_url(); ?>index.php/Cockfight/UpdateWinner",
                        type:"POST",
                        data:{
                          "CockFightID":$("#txtCockFightID").val(),
                          'Winner':'Meron'
                        },
                        dataType:"json",
                        success: function(response){
                            if(response.success){
                              Swal.fire(
                                'Meron wins .',
                                '',
                                'success'
                              );
                              loadLastCockFight();
                              $("#WinnerModal").modal('close');
                            }
                        }

                    });

                  }
                })
            });
            $("#btnWalaWins").click(function() {
              Swal.fire({
                  title: 'Are you sure?',
                  icon: 'warning',
                  showCancelButton: true,
                  confirmButtonColor: '#3085d6',
                  cancelButtonColor: '#d33',
                  confirmButtonText: 'Yes!'
                  }).then((result) => {
                  if (result.isConfirmed) {
                    $.ajax({
                        url:"<?php echo base_url(); ?>index.php/Cockfight/UpdateWinner",
                        type:"POST",
                        data:{
                          "CockFightID":$("#txtCockFightID").val(),
                          'Winner':'Wala'
                        },
                        dataType:"json",
                        success: function(response){
                            if(response.success){
                              Swal.fire(
                                'Wala wins .',
                                '',
                                'success'
                              );
                              loadLastCockFight();
                              $("#WinnerModal").modal('close');
                            }
                        }

                    });

                  }
                })
            });
            $("#btnDraw").click(function() {
              Swal.fire({
                  title: 'Are you sure?',
                  icon: 'warning',
                  showCancelButton: true,
                  confirmButtonColor: '#3085d6',
                  cancelButtonColor: '#d33',
                  confirmButtonText: 'Yes!'
                  }).then((result) => {
                  if (result.isConfirmed) {
                    $.ajax({
                        url:"<?php echo base_url(); ?>index.php/Cockfight/UpdateWinner",
                        type:"POST",
                        data:{
                          "CockFightID":$("#txtCockFightID").val(),
                          'Winner':'Draw'
                        },
                        dataType:"json",
                        success: function(response){
                            if(response.success){
                              Swal.fire(
                                'Bet was draw .',
                                '',
                                'success'
                              );
                              loadLastCockFight();
                              $("#WinnerModal").modal('close');
                            }
                        }

                    });

                  }
                })
            });
            $("#btnCancel").click(function() {
              Swal.fire({
                  title: 'Are you sure you want to cancel?',
                  icon: 'warning',
                  showCancelButton: true,
                  confirmButtonColor: '#3085d6',
                  cancelButtonColor: '#d33',
                  confirmButtonText: 'Yes!'
                  }).then((result) => {
                  if (result.isConfirmed) {
                    $.ajax({
                        url:"<?php echo base_url(); ?>index.php/Cockfight/UpdateWinner",
                        type:"POST",
                        data:{
                          "CockFightID":$("#txtCockFightID").val(),
                          'Winner':'Cancelled'
                        },
                        dataType:"json",
                        success: function(response){
                            if(response.success){
                              Swal.fire(
                                'Bet was cancelled.',
                                '',
                                'success'
                              );
                              loadLastCockFight();
                              $("#WinnerModal").modal('close');
                            }
                        }

                    });

                  }
                })
            });
            $("#btnEndEvent").click(function() {
              Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, end it!'
                }).then((result) => {
                if (result.isConfirmed) {
                  $.ajax({
                    url:"<?php echo base_url() ?>index.php/Event/CloseEvent",
                    type:"POST",
                    data:{
                      "EventID":$("#txtEventID").val()
                    },
                    dataType:"json",
                    success: function(response) {
                      if(response.success){
                        location.replace("<?php echo site_url('Admin/Events') ?>");
                      }
                    }
                  });
                }
                })
            });
        });

    </script>
