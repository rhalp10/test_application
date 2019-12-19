<?php
   $user = $this->session->userdata('user');
   
   extract($user);
   
   $user_id       = $id;
   $user_username = $username;
   $user_fullname = $name;
   $user_roles    = $roles;

   $permission = json_decode($user_roles);

   $controller = $this->uri->segment(1); 


?>
<!DOCTYPE html>
<html>
  <?php 
    if (file_exists(APPPATH.'views/templates/x-head.php'))
    {
      include(APPPATH.'views/templates/x-head.php');
    }
  ?>
   <body>
  <?php 
    if (file_exists(APPPATH.'views/templates/x-nav.php'))
    {
      include(APPPATH.'views/templates/x-nav.php');
    }
  ?>
      <div class="container-fluid">
         <div class="row">

      <style>
         .nav-link{
         color:white !important; 
         }
         svg {
         color:white !important; 
         }
         .nav-link:hover{
         background-color:#272b30;
         }
         ul ul a {
         padding-left: 50px !important;
         }
         ul ul a:hover {
         background: #eee;
         padding-left: 50px !important;
         }
      .sidebar .nav-link.active{
        background: #272b30;
       
      }
      </style>
 <?php 
    if (file_exists(APPPATH.'views/templates/x-sidenav.php'))
    {
      include(APPPATH.'views/templates/x-sidenav.php');
    }
  ?>
          <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
          <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
         
          </div>
                <div class="row">

                  <div class="col-3 col-sm-3">
                    <div class="card ">
                      <div class="card-header text-center" style=" background-color: #383d41;
        padding: 42px 0;">
                      </div>
                      <div class="card-body text-center"  >
                        <div style="margin-top: -64px;">
                          
                        <img id="p_img" src="<?php echo base_url(); ?>assets/img/users/default.jpg" alt="Profile Image"  runat="server"  height="125" width="125" class="rounded-circle" style="border:1px solid; border-color:#383d41;"/>
                        </div>
                        <h6><?=$user_fullname?></h6>
                        <!-- <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#change_picture">Change</button> -->
                      </div>
                    </div>
                  </div>
                  <div class="col-9 col-sm-9">
                    <div class="card ">
                      <div class="card-header text-center" style=" border-bottom: 5px solid ;">
                        <strong>Profile Details</strong>
                        <div class="float-right">
                          <i data-feather="info"></i>
                        </div>
                      </div>
                      <div class="card-body "  style="min-height: 250px">
                        <table class="table table-striped">
                          <tbody>
                            <tr>
                              <th scope="row">Name:</th>
                              <td colspan="3"><?=$user_fullname?></td>
                            </tr>
                           <!--  <tr>
                              <th scope="row">Birth Date:</th>
                              <td><?php  $name?></td>
                              <th scope="row">Age:</th>
                              <td><?php  $name?></td>
                            </tr>
                            <tr>
                              <th scope="row">Email:</th>
                              <td><?php  $name?></td>
                              <td></td>
                              <td  colspan="1"><button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#change_email">Change</button></td>
                            </tr> -->
                            <tr>
                              <th scope="row">Password:</th>
                              <td>********</td>
                              <td></td>
                              <!-- <td colspan="1"><button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#change_password">Change</button></td> -->
                            </tr>
                          </tbody>
                        </table>
                     
                       
                      </div>
                    </div>
                  </div>
                </div>
        </main>
         </div>
      </div>

 <?php 
    if (file_exists(APPPATH.'views/templates/x-script.php'))
    {
      include(APPPATH.'views/templates/x-script.php');
    }
  ?>
      <script type="text/javascript">
          $(document).ready(function() {
             
            var account_dataTable = $('#account_data').DataTable({
            "processing":true,
            "serverSide":true,
            "order":[],
            "ajax":{
              url:"<?php echo base_url(); ?>account/fetch_data",
              type:"POST"
            },
            "columnDefs":[
              {
                "targets":[0],
                "orderable":false,
              },
            ],

          });

            


            } );

      </script>
   </body>
</html>