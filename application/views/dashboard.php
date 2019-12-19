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
                      <div class="col-sm-12 text-center " style="min-height: 100px;">
                          <H3 >TEST APPLICATION</H3>
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

   </body>
</html>