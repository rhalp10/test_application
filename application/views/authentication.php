

<!-- Page Content -->
<div class="container">
  <div class="card">
    <div class="card-body text-center">
    <h1>WELCOME PAGE</h1>
    </div>
  </div>
</div>
<!-- LOGIN MODAL -->
<div class="modal fade" id="login" tabindex="-1" role="dialog" aria-labelledby="loginModalLabel" aria-hidden="true">
  <div class="modal-dialog  " role="document">
    <div class="modal-content">
      <div class="modal-header" style="border-bottom: 0px ;">
        <h5 class="modal-title" id="loginModalLabel">Sign In</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <div class="modal-body" style="background-color: #f5f5f5; border-radius: 0px 0px 5px 5px; ">
          <div class="text-center msg">
               <img src="<?php echo base_url(); ?>assets/img/logo/primary_logo.png" alt=" Logo" style="width: 100px;">
             
                <h5>Test Application</h5>   
              
              <small>Enter your username and password</small>
          </div> 
          <?php  
          echo form_open_multipart(" ", $form_login["form-attribute"]);
    
          echo ' <div class="form-label-group">'.PHP_EOL;
          echo form_input($form_login["username"]).PHP_EOL;
          echo form_label('Username', 'inputUsername').PHP_EOL;
          echo ' </div>'.PHP_EOL;
          echo ' <div class="form-label-group">'.PHP_EOL;
          echo form_password($form_login["password"]).PHP_EOL;
          echo form_label('Password', 'inputPassword').PHP_EOL;
          echo ' </div>'.PHP_EOL;
          echo '<div class="checkbox mb-3">'.PHP_EOL;
          $js = 'onClick="viewPassword()"';
          echo form_checkbox('remember-me', 'accept', FALSE, $js);
          echo form_label('Show Password', 'ShowPassword').PHP_EOL;
          echo ' </div>'.PHP_EOL;
          echo form_input($form_login["operation"]).PHP_EOL;
          echo form_button($form_login["submit"]);
          echo form_close();?>
          
      </div>
    </div>
  </div>
</div>

