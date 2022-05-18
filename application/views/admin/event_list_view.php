
            <!-- ============================================================== -->
            <!-- Title and breadcrumb -->
            <!-- ============================================================== -->
            <div class="page-titles">
                <div class="d-flex align-items-center">
                    <h5 class="font-medium m-b-0">Events</h5>
                    <div class="custom-breadcrumb ml-auto">
                        <a href="#!" class="breadcrumb">Home</a>
                        <a href="#!" class="breadcrumb">Events</a>
                    </div>
                </div>
            </div>
              <div class="container-fluid">
                <div class="card">
                    <div class="card-content">
                        <div class="row">
                          <div class="col s12">
                              <a href="#AddEventModal" class="btn modal-trigger right">Add new event</a>
                          </div>
                        </div>
                        <div class="row">
                          <div class="table-responsive">
                            <table id="tblEvents" class="table centered resposive table-bordered nowrap display">
                                <thead>
                                    <tr class="grey lighten-4">
                                      <th>Event Name</th>
                                      <th>Event Desciption</th>
                                      <th>Date created</th>
                                      <th>Action</th>
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
              <div id="AddEventModal" class="modal">
                  <div class="modal-content">
                    <h5>Add new event</h5>
                    <div class="row">
                      <div class="input-field col s12 l6">
                        <input type="text" id="txtEventName">
                        <label for="txtEventName">Event name</label>
                      </div>
                      <div class="input-field col s12 l6">
                        <textarea id="txtEventDescription" class="materialize-textarea"></textarea>
                        <label for="txtEventDescription">Event description</label>
                      </div>
                    </div>

                  </div>
                  <div class="modal-footer">
                      <button id="btnAdd" class="btn modal-close">Add event</button>
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
    <!-- ============================================================== -->
    <script src="<?php echo base_url(); ?>assets/assets/libs/jquery/dist/jquery.min.js"></script>

    <script src="<?php echo base_url(); ?>assets/assets/libs/sweetalert2/sweetalert2.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/assets/extra-libs/DataTables/jquery.dataTables.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/dist/js/materialize.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $("#tblEvents").dataTable();
            $('.datepicker').datepicker();
            loadEvents();
            $("#btnAdd").click(function() {
              $.ajax({
                url:"<?php echo base_url(); ?>index.php/Event/AddEvent",
                type:"POST",
                data:{
                  'EventName': $("#txtEventName").val(),
                  'EventDescription': $("#txtEventDescription").val(),
                  'StartDate': $("#txtStartDate").val(),
                  'EndDate': $("#txtEndDate").val()

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
                    loadEvents();
                  }else{
                    Swal.fire({
                        icon: 'warning',
                        title: response.error,
                        showConfirmButton: false,
                        timer: 3000
                      })
                  }
                }
              });
            });
            var eventData=[];
            function loadEvents() {
              $.ajax({
                url: "<?php echo base_url(); ?>index.php/Event/GetAllEvent",
                type: "POST",
                dataType:"json",
                async:false,
                success: function(result){
                    eventData=result;
                }
              });
              var _html='';
              $('#tblEvents').dataTable().fnClearTable();
              $('#tblEvents').dataTable().fnDestroy();
              for (var i = 0; i < eventData.length; i++) {
                _html+='<tr>'
                            +'<td>'+ eventData[i].EventName+'</td>'
                            +'<td>'+ eventData[i].EventDescription +'</td>'
                            +'<td>'+ eventData[i].DateCreated +'</td>'
                            +'<td><a href="<?php echo base_url(); ?>index.php/Admin/EventInfo/'+eventData[i].EventID+'" class="btn btn-sm btn-icon btn-pure btn-outline delete-row-btn" data-toggle="tooltip" data-original-title="Delete">View</a></td>'
                      +'</tr>';

              }
              $("#tblEvents tbody").html(_html);

              $("#tblEvents").dataTable();
            }
        });

    </script>
