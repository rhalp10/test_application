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
                  <h1 class="h2"  style="font-size:16px;"><?php echo $page_title?> Record</h1>
               </div>
               <nav aria-label="breadcrumb" >
                  <ol class="breadcrumb bcrum">
                     <li class="breadcrumb-item "><a href="dashboard" class="bcrum_i_a">Dashboard</a></li>
                     <li class="breadcrumb-item  active bcrum_i_ac" aria-current="page"><?php echo $page_title?> Record</li>
                  </ol>
               </nav>
               <div class="table-responsive">
                  <button type="button" class="btn btn-sm btn-primary add" data-toggle="modal" data-target="#page_modal" >
                  Add 
                  </button>
                  <br><br>
                  <table class="table table-borderless table-sm" id="page_data">
                     <thead>
                          <tr>
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
<div class="modal fade" id="page_modal" tabindex="-1" role="dialog" aria-labelledby="pageModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="pageModalLabel">Add Page</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
           <?php  
         
          echo form_open_multipart(" ", $form_page["form_attribute"]);
    
          echo ' <div class="form-label-group">'.PHP_EOL;
          echo form_label('Title', 'inputTitle').PHP_EOL;
          echo form_input($form_page["title"]).PHP_EOL;
          echo ' </div>'.PHP_EOL;
          echo ' <div class="form-label-group">'.PHP_EOL;
          echo form_label('Title', 'inputTitle').PHP_EOL;
          echo form_textarea($form_page["body"]).PHP_EOL;
          echo ' </div>'.PHP_EOL;
          echo ' <div class="form-label-group" id="input_group_status">'.PHP_EOL;
          echo form_label('Status', 'inputStatus').PHP_EOL;
          echo form_dropdown('page_status', $form_page["status_options"], 'large',$form_page["status_options_js"]).PHP_EOL;
          echo ' </div>'.PHP_EOL;   
          echo form_input($form_page["page_ID"]).PHP_EOL;
          echo form_input($form_page["operation"]).PHP_EOL;
          ?>
       
         
      </div>
      <div class="modal-footer">
        
         <?php  echo form_button($form_page["submit_button_attribute"]);?>
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