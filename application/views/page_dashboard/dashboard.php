<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    </div>
    <div class="row">
        <div class="col-sm-12 text-center " style="min-height: 400px!important;">
            <H3>DASHBOARD</H3>
            <!-- <H3><?=$controller?></H3> -->
            
            <div class="float-right">
              <?php
               if(isset($_SESSION["alert_msg"])){ ?>

              <div class="alert alert-danger alert-dismissible fade show " id="alert_msg">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <strong>Restriction!</strong> <?=$_SESSION["alert_msg"]?>.
              </div>
              <?php }?>
            </div>

        </div>

       
    </div>
</main>
