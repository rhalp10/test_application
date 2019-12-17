<?php
   $user = $this->session->userdata('user');
   extract($user);

   $json = $roles;

   
   $user_id       = $id;
   $user_username = $username;
   $user_fullname = $name;
   $user_roles    = $roles;
   $permission = json_decode($user_roles);

   if ($permission->roles != 3){
    redirect("/dashboard");
   }
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
                  <h1 class="h2"  style="font-size:16px;"><?php echo $page_title?> Record</h1>
               </div>
               <nav aria-label="breadcrumb" >
                  <ol class="breadcrumb bcrum">
                     <li class="breadcrumb-item "><a href="dashboard" class="bcrum_i_a">Dashboard</a></li>
                     <li class="breadcrumb-item  active bcrum_i_ac" aria-current="page"><?php echo $page_title?> Record</li>
                  </ol>
               </nav>
               <div class="table-responsive">
                  <button type="button" class="btn btn-sm btn-primary add" data-toggle="modal" data-target="#account_modal" >
                  Add 
                  </button>
                  <br><br>
                  <table class="table table-striped table-sm" id="account_data">
                     <thead>
                          <tr>
                             <th>#</th>
                             <th>Name</th>
                             <th>Username</th>
                             <th>User Level</th>
                             <th>Action</th>
                           </tr>
                     </thead>
                     <tbody>
                     </tbody>
                  </table>
                  
               </div>
            </main>
         </div>
      </div>
<!-- Modal -->
<div class="modal fade" id="account_modal" tabindex="-1" role="dialog" aria-labelledby="accountModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="accountModalLabel">Add Account</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
           <?php  
         
          echo form_open_multipart(" ", $form_account["form_attribute"]);
    
          echo ' <div class="form-label-group">'.PHP_EOL;
          echo form_label('Username', 'inputUsername').PHP_EOL;
          echo form_input($form_account["username"]).PHP_EOL;
          echo ' </div>'.PHP_EOL;
          echo ' <div id="input_group_pass" class="form-label-group">'.PHP_EOL;
          echo form_label('Password', 'inputPassword').PHP_EOL;
          echo form_password($form_account["password"]).PHP_EOL;
          echo ' </div>'.PHP_EOL;
          echo ' <div id="input_group_cpass" class="form-label-group">'.PHP_EOL;
          echo form_label('Confirm Password', 'inputCsPassword').PHP_EOL;
          echo form_password($form_account["confirm-password"]).PHP_EOL;
          echo ' </div>'.PHP_EOL;   
          echo ' <div class="form-label-group">'.PHP_EOL;
          echo form_label('Full Name', 'inputFullname').PHP_EOL;
          echo form_input($form_account["fullname"]).PHP_EOL;
          echo ' </div>'.PHP_EOL;
          echo ' <div class="form-label-group">'.PHP_EOL;
          echo form_label('Role', 'inputRole').PHP_EOL;
          echo form_dropdown('account_role', $form_account["role_options"], 'large',$form_account["role_options_js"]).PHP_EOL;
          echo ' </div>'.PHP_EOL;         
          echo form_input($form_account["account_ID"]).PHP_EOL;
          echo form_input($form_account["operation"]).PHP_EOL;
          ?>
       
         
      </div>
      <div class="modal-footer">
        
         <?php  echo form_button($form_account["submit_button_attribute"]);?>
        <button type="button"  class="btn btn-secondary" data-dismiss="modal">Close</button>
    
         <?php 
          echo form_close();?>
      </div>
    </div>
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