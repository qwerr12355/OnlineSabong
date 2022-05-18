
  <div class="container-fluid" style="padding:0px">
      <div class="row">
        <input type="hidden" id="txtEventID" value="<?php echo $eventinfo->EventID; ?>">
          <div class="col s12 l6">
            <div class="twitch">
                <div class="twitch-video">
                      <?php echo $eventinfo->iframe; ?>
                </div>
            </div>
          </div>
          <div class="col l6 s12 grey lighten-4">
              <div class="grey darken-4 p-t-5">
                  <div class="center-align white-text display-6">
                    <h6 class="green darken-4" id="lblStatusOpen"> BETTING IS NOW OPEN!!!</h6>
                    <h6 class="red" id="lblStatusClose"> BETTING IS NOW CLOSED!!!</h6>
                    <h6 id="lblWinner">Winner</h6>
                  </div>
              </div>
            <div class="center-align white-text display-6">
              <h6> Fight Number:# <span id="lblFightNumber" class="label label-info">60</span> </h6>
            </div>
            <div class="row">
              <div class="col s6">
                      <div class="card dark">
                          <div class="red darken-3 p-t-5">
                              <div class="center-align white-text display-6">
                                  <h5>MERON</h5>
                              </div>
                          </div>
                          <div class="col s12">
                            <div class="center">
                              <div class="row">
                                  <h6 class="red-text m-b-0">TOTAL BETS</h6>
                                  <h4 id="lblTotalMeronBets" class="red-text font-medium">₱ 0</h4>
                              </div>
                              <div class="row" id="partialMeronPayout">
                                  <h6 class="red-text m-b-0">PAYOUT</h6>
                                  <h6 class="red-text font-medium">₱ <span id="lblMeronWinPrice">200</span> </h6>
                              </div>

                              <div class="row">
                                <button type="button" id="btnMeron" class="btn col s12 red">BET MERON</button>
                              </div>
                            </div>
                          </div>
                      </div>
              </div>
                <div class="col s6">
                        <div class="card dark">
                            <div class="blue darken-3 p-t-5">
                                <div class="center-align white-text display-6">
                                    <h5>WALA</h5>
                                </div>
                            </div>
                            <div class="col s12">
                                <div class="center">
                                    <div class="row">
                                        <h6 class="blue-text m-b-0">TOTAL BETS</h6>
                                        <h4 id="lblTotalWalaBets" class="blue-text font-medium">₱ 0</h4>
                                    </div>
                                    <div class="row" id="partialWalaPayout">
                                        <h6 class="blue-text m-b-0">PAYOUT</h6>
                                        <h6 class="blue-text font-medium">₱ <span id="lblWalaWinPrice">200</span> </h6>
                                    </div>

                                    <div class="row">
                                      <button type="button" id="btnWala" class="btn col s12 indigo">BET WALA</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                </div>
            </div>

            <div class="p-t-5">
                <div class="center-align white-text display-6">
                  <div class="row" id="playerPayoutMeron">
                      <h5 class="red-text m-b-0">MY BET PAYOUT</h5>
                      <h5 class="red-text font-medium"><span id="lblPlayerMeronBetAmount">₱ 100 =</span> <span id="lblPlayerMeronPayout">200</span> </h5>
                  </div>
                  <div class="row" id="playerPayoutWala">
                      <h5 class="blue-text m-b-0">MY BET PAYOUT</h5>
                      <h5 class="blue-text font-medium"><span id="lblPlayerWalaBetAmount">₱ 100 = </span><span id="lblPlayerWalaPayout">₱ 200</span> </h5>
                  </div>
                  <h6 class="red" id="lblMeronPlaceBet"> YOU PLACED BET ON MERON</h6>
                  <h6 class="indigo" id="lblWalaPlaceBet"> YOU PLACED BET ON WALA</h6>
                </div>
            </div>
              <div class="grey darken-4 p-t-5">
                  <div class="center-align white-text display-6">
                      <h6>My Wallet Balance : <span id="lblWalletBalance"> ₱ 0</span></h6>
                  </div>
              </div>
              <input type="hidden" id="txtCockFightID">
                <div class="input-field col s12 l4">
                    <input type="number" id="txtBetAmount">
                    <label for="txtBetAmount">ENTER AMOUNT HERE</label>
                </div>
                <div class="col s12 l8">
                  <div class="row">
                    <button type="button" id="btn10" class="btn col s3 grey darken-4">₱10</button>
                    <button type="button" id="btn50" class="btn col s3 grey darken-4">₱50</button>
                    <button type="button" id="btn100" class="btn col s3 grey darken-4">₱100</button>
                    <button type="button" id="btn200" class="btn col s3 grey darken-4">200</button>
                  </div>
                  <div class="row">
                    <button type="button" id="btn300" class="btn col s3 grey darken-4">₱300</button>
                    <button type="button" id="btn400" class="btn col s3 grey darken-4">₱400</button>
                    <button type="button" id="btn500" class="btn col s3 grey darken-4">₱500</button>
                    <button type="button" id="btn1000" class="btn col s3 grey darken-4">₱1000</button>
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
<footer class="center-align m-b-30 m-l-15 m-r-15">All Rights Reserved by MatPress. Designed and Developed by Raymundo R. Alfeche Jr.</footer>
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
      $("#lblMeronPlaceBet").hide();
      $("#lblWalaPlaceBet").hide();
      $("#lblStatusOpen").hide();
      $("#lblStatusClose").hide();
      $("#lblStatus").hide();
      $("#btnMeron").hide();
      $("#btnWala").hide();

      $("#playerPayoutMeron").hide();
      $("#playerPayoutWala").hide();
    $(document).ready(function() {
        $("#btnWala").click(function() {
              $.ajax({
                  url:"<?php echo base_url(); ?>index.php/Player/BetWala",
                  type:"POST",
                  data:{
                    "BetAmount":$("#txtBetAmount").val(),
                    "CockFightID":$("#txtCockFightID").val()
                  },
                  async:false,
                  dataType:"json",
                  success:function (response) {
                    if(response.success){
                      Swal.fire({
                          title: 'Are you sure?',
                          text: "You won't be able to revert this!",
                          icon: 'warning',
                          showCancelButton: true,
                          confirmButtonColor: '#3085d6',
                          cancelButtonColor: '#d33',
                          confirmButtonText: 'Yes, bet wala now!'
                          }).then((result) => {
                          if (result.isConfirmed) {
                            Swal.fire(
                              'Bet Placed!',
                              'success'
                            )
                          }
                      });
                    }else{
                      Swal.fire({
                        title: response.error,
                        icon: 'warning',
                      })
                    }
                  }
              });
        });
        $("#btnMeron").click(function() {

              $.ajax({
                  url:"<?php echo base_url(); ?>index.php/Player/BetMeron",
                  type:"POST",
                  data:{
                    "BetAmount":$("#txtBetAmount").val(),
                    "CockFightID":$("#txtCockFightID").val()
                  },
                  async:false,
                  dataType:"json",
                  success:function (response) {
                    if(response.success){
                      Swal.fire({
                          title: 'Are you sure?',
                          text: "You won't be able to revert this!",
                          icon: 'warning',
                          showCancelButton: true,
                          confirmButtonColor: '#3085d6',
                          cancelButtonColor: '#d33',
                          confirmButtonText: 'Yes, bet meron now!'
                          }).then((result) => {
                          if (result.isConfirmed) {
                            Swal.fire(
                              'Bet Placed!',
                              '',
                              'success'
                            )
                          }
                      });
                    }else{
                      Swal.fire({
                        title: response.error,
                        icon: 'warning'
                      })
                    }
                  }
              });
        });
        setInterval(function(){loadLastCockFight()},3000);
        function loadLastCockFight(){
          $("#lblMeronPlaceBet").hide();
          $("#lblWalaPlaceBet").hide();
          $("#lblStatusOpen").hide();
          $("#lblStatusClose").hide();
          $("#lblStatus").hide();
          $("#btnMeron").hide();
          $("#btnWala").hide();

          $("#playerPayoutMeron").hide();
          $("#playerPayoutWala").hide();
          $.ajax({
              url:"<?php echo base_url(); ?>index.php/Player/GetPlayerConsole",
              type:"POST",
              dataType:"json",
              async:false,
              data:{
                "EventID":$("#txtEventID").val()
              },
              success: function(response){
                if(response.success){
                  $("#totalmeronbet").val(response.GetLastCockfight.CockfightID);
                  $("#txtCockFightID").val(response.GetLastCockfight.CockfightID);
                  $("#lblWalletBalance").html("₱ "+(parseFloat(response.PlayerWallet)).toFixed(2));
                  $("#lblProfileWalletProfile").html("₱ "+(parseFloat(response.PlayerWallet)).toFixed(2));
                  if(response.GetLastCockfight.Status=="Open"){
                    $("#lblStatusOpen").show();
                    $("#lblStatusClose").hide();
                    $("#btnMeron").show();
                    $("#btnWala").show();
                  }else{
                    $("#lblStatus").html("BETTING IS NOW CLOSED");
                    $("#lblStatusOpen").hide();
                    $("#lblStatusClose").show();
                    $("#btnMeron").hide();
                    $("#btnWala").hide();
                  }
                  $("#lblFightNumber").html(response.GetLastCockfight.FightNumber);
                  if(response.GetLastCockfight.Winner!=null){
                    if(response.GetLastCockfight.Winner=="Meron"){
                      $("#lblWinner").html("MERON WINS!!!");
                    }else if(response.GetLastCockfight.Winner=="Wala"){
                      $("#lblWinner").html("WALA WINS!!!");
                    }else if(response.GetLastCockfight.Winner=="Draw"){
                      $("#lblWinner").html("DRAW. Your bet is returned to your wallet!");
                    }else{
                      $("#lblWinner").html("Canceled amount is returned to your wallet!");
                    }

                    $("#lblStatusOpen").hide();
                    $("#lblStatusClose").hide();

                    $("#lblWinner").show();
                  }else{
                    $("#lblWinner").hide();
                  }
                  if(response.totalmeronbet==null){
                    $("#lblTotalMeronBets").html("₱ 0");
                  }else{
                    $("#lblTotalMeronBets").html("₱ "+(parseFloat(response.totalmeronbet)*10).toFixed(2));
                  }
                  if(response.totalwalabet==null){
                    $("#lblTotalWalaBets").html("₱ 0");
                  }else{
                    $("#lblTotalWalaBets").html("₱ "+(parseFloat(response.totalwalabet)*10).toFixed(2));

                  }
                  if(response.CurrentPlayerBet){
                    // $("#partialMeronPayout").hide();
                    // $("#partialWalaPayout").hide();
                    if(response.CurrentPlayerBet.Choice=="Meron"){
                      $("#lblMeronPlaceBet").show();
                      $("#lblWalaPlaceBet").hide();
                      $("#lblPlayerMeronBetAmount").html("₱ "+response.playertotalbet);

                      var playermeronbetamount=parseFloat(response.playertotalbet);
                      var meronodds=parseFloat(response.meronodds);
                      var playermeronpayout=(playermeronbetamount*meronodds)+playermeronbetamount;
                      playermeronpayout=playermeronpayout-(playermeronpayout*.06);
                      if(!(isNaN(playermeronpayout))){
                        $("#lblPlayerMeronPayout").html(" = ₱ "+playermeronpayout.toFixed(2));
                      }else{
                        $("#lblPlayerMeronPayout").html(" = ₱ 0");
                      }

                    }else{
                      $("#lblMeronPlaceBet").hide();
                      $("#lblWalaPlaceBet").show();
                      $("#lblPlayerWalaBetAmount").html("₱ "+response.playertotalbet);
                      var playerwalabetamount=parseFloat(response.playertotalbet);
                      var walaodds=parseFloat(response.walaodds);
                      var playerwalapayout=(playerwalabetamount*walaodds)+playerwalabetamount;
                      playerwalapayout=(playerwalapayout)-(playerwalapayout*.06);
                      $("#lblPlayerWalaPayout").html(" = ₱ "+playerwalapayout.toFixed(2));
                    }
                  }else{
                    if(response.GetLastCockfight.Status!="Closed"){
                      $("#btnMeron").show();
                      $("#btnWala").show();
                    }
                    $("#playerPayoutMeron").hide();
                    $("#playerPayoutWala").hide();
                    $("#partialMeronPayout").show();
                    $("#partialWalaPayout").show();

                  }

                  $("#lblMeronWinPrice").html(parseFloat(response.meronwinningprice).toFixed(2));
                  $("#lblWalaWinPrice").html(parseFloat(response.walawinningprice).toFixed(2));
                }else{
                    $("#lblFightNumber").html("0");
                }
              }

          })
        }
        $("#btn10").click(function() {
            $("#txtBetAmount").val("10");
            M.updateTextFields();
        });
        $("#btn50").click(function() {
            $("#txtBetAmount").val("50");
            M.updateTextFields();
        });
        $("#btn100").click(function() {
            $("#txtBetAmount").val("100");
            M.updateTextFields();
        });
        $("#btn200").click(function() {
            $("#txtBetAmount").val("200");
            M.updateTextFields();
        });
        $("#btn300").click(function() {
            $("#txtBetAmount").val("300");
            M.updateTextFields();
        });
        $("#btn400").click(function() {
            $("#txtBetAmount").val("400");
            M.updateTextFields();
        });
        $("#btn500").click(function() {
            $("#txtBetAmount").val("500");
            M.updateTextFields();
        });
        $("#btn1000").click(function() {
            $("#txtBetAmount").val("1000");
            M.updateTextFields();
        });

    });
</script>
