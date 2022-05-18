
            <!-- ============================================================== -->
            <!-- Title and breadcrumb -->
            <!-- ============================================================== -->

              <div class="container-fluid">
                <div class="row">

                  <?php
                        foreach ($openevents as $event) {

                   ?>
                      <div class="card col s12 l3 grey darken-4 m-5">
                          <img class="card-img-top responsive-img" src="<?php echo base_url(); ?>assets/assets/images/big/img4.jpg" alt="Card image cap">
                          <div class="card-content">
                              <div class="d-flex no-block align-items-center m-b-15">
                                  <span><i class="ti-calendar"></i> <?php echo $event->DateCreated; ?></span>
                              </div>
                              <h5><?php echo $event->EventName; ?></h5>
                              <p class="m-b-0 m-t-10"><?php echo $event->EventDescription;  ?></p>
                              <div class="row">
                                <a href="<?php echo site_url('Player/Event/').$event->EventID; ?>" class="waves-effect waves-light btn btn-round indigo col s12">JOIN EVENT</a>
                              </div>
                          </div>
                      </div>
                      <?php
                    }
                       ?>
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
    <script type="text/javascript">

    </script>
