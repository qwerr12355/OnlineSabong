
            <!-- ============================================================== -->
            <!-- Title and breadcrumb -->
            <!-- ============================================================== -->
            <div class="page-titles">
                <div class="d-flex align-items-center">
                    <h5 class="font-medium m-b-0">Event Information</h5>
                    <div class="custom-breadcrumb ml-auto">
                        <a href="#!" class="breadcrumb">Home</a>
                        <a href="#!" class="breadcrumb">Event Information</a>
                    </div>
                </div>
            </div>
              <div class="container-fluid">
                <div class="row">
                  <div class="col s12 m12 l8">
                    <div class="card">
                        <div class="card-content">
                            <div class="row">
                              <input type="hidden" id="txtEventID" value="<?php echo $eventinfo->EventID; ?>">
                              <div class="input-field col s12 l6">
                                <input type="text" id="txtEventName" value="<?php echo $eventinfo->EventName; ?>">
                                <label for="txtEventName">Event Name</label>
                              </div>
                              <div class="input-field col s12 l6">
                                <textarea id="txtDescription" class="materialize-textarea"><?php echo $eventinfo->EventDescription; ?></textarea>
                                <label for="txtDescription">Event Description</label>
                              </div>
                              <div class="input-field col s12">
                                <textarea id="txtIframe" class="materialize-textarea"><?php echo $eventinfo->iframe; ?></textarea>
                                <label for="txtIframe">Iframe embed video</label>
                              </div>
                            </div>
                            <div class="row">
                              <button id="btnUpdateInfo" class="btn right">Save Changes</button>
                            </div>
                        </div>
                    </div>
                  </div>
                  <div class="col s12 m12 l4">
                    <div class="card">
                        <div class="card-content">
                          <?php if($eventinfo->Status=="TBD"){
                              echo
                                    "<p>Status: TBD</p>".
                                    "<p>Total Fights : TBD</p>".
                                    "<p>Total Fights : TBD x</p>".
                                    "<p>Meron Wins : <span class='label label-danger'>TBD</span></p>".
                                    "<p>Wala Wins : <span class='label label-info'>TBD</span></p>".
                                    "<p>Draws : <span class='label label-success'>TBD</span></p>".
                                    "<div class='row'>".
                                    "<button id='btnOpenEvent' class='btn green col s12'>OPEN EVENT</button>".
                                    "</div>";
                            }else if($eventinfo->Status=="Open"){
                              echo
                                    "<p>Status: ".$eventinfo->Status." </p>".
                                    "<p>Total Fights : TBD</p>".
                                    "<p>Total Fights : TBD x</p>".
                                    "<p>Meron Wins : <span class='label label-danger'>TBD</span></p>".
                                    "<p>Wala Wins : <span class='label label-info'>TBD</span></p>".
                                    "<p>Draws : <span class='label label-success'>TBD</span></p>".
                                    "<div class='row'>".
                                    "<a  href='".base_url()."index.php/Admin/EventControls/".$eventinfo->EventID."' class='btn col s12'>OPEN CONTROLS</a>".
                                    "</div>";
                            }else{
                              echo
                                    "<p>Status: ".$eventinfo->Status." </p>".
                                    "<p>Total Fights : TBD</p>".
                                    "<p>Total Fights : TBD x</p>".
                                    "<p>Meron Wins : <span class='label label-danger'>TBD</span></p>".
                                    "<p>Wala Wins : <span class='label label-info'>TBD</span></p>".
                                    "<p>Draws : <span class='label label-success'>TBD</span></p>";
                            }


                           ?>
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

    <script src="<?php echo base_url(); ?>assets/assets/extra-libs/DataTables/jquery.dataTables.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/dist/js/materialize.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/assets/libs/sweetalert2/sweetalert2.min.js"></script>
    <script type="text/javascript">
      $(document).ready(function() {
        $("#btnOpenEvent").click(function() {
          Swal.fire({
                title: 'Are you sure you want to open this event?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, open it!'
                }).then((result) => {
                if (result.isConfirmed) {
                  $.ajax({
                    url:"<?php echo base_url() ?>index.php/Event/OpenEvent",
                    type:"POST",
                    data:{
                      "EventID":$("#txtEventID").val()
                    },
                    dataType:"json",
                    success: function(response) {
                      if(response.success){
                        location.replace("<?php echo site_url('Admin/EventControls/') ?>"+$("#txtEventID").val());
                      }
                    }
                  })
                }
            })
        });

        $("#btnUpdateInfo").click(function() {
            $.ajax({
              url:"<?php echo base_url() ?>index.php/Event/UpdateEventInfo",
              type:"POST",
              data:{
                "EventID":$("#txtEventID").val(),
                "EventName":$("#txtEventName").val(),
                "EventDescription":$("#txtDescription").val(),
                "Iframe":$("#txtIframe").val()
              },
              dataType:"json",
              success: function(response) {
                if(response.success){
                  Swal.fire({
                      icon: 'success',
                      title: 'Successfully updated',
                      showConfirmButton: false,
                      timer: 3000
                    })
                }else if(response.error!=""){
                  Swal.fire({
                      icon: 'warning',
                      title: response.error,
                      showConfirmButton: false,
                      timer: 3000
                    })
                }else{
                  Swal.fire({
                      icon: 'warning',
                      title: "You didn't changed anything.",
                      showConfirmButton: false,
                      timer: 3000
                    })
                }
              }
            })
        });
      });

    </script>
