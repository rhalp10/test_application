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
          $form_account["form_attribute"] = array(
                    'class'  => '',
                    'id' => 'account_form',
                    'role' => 'form',
                    'method' => 'POST',
                );
          $form_account["submit_button_attribute"] = array(
                        'class'         =>"btn btn-primary",
                        'id' => 'submit_input',
                        'type'          => 'submit',
                        'name'            => 'submit_input',
                        'content' => 'Submit',
                );
          $form_account["username"] = array(
                  'type'      =>"text" ,
                  'id'      =>"account_user", 
                  'class'     =>"form-control", 
                  'placeholder' =>"Username" ,
                  'name'      =>"account_user", 
                  'value'         => '',
                  'required' => '',
          );
          $form_account["password"] = array(
                  'type'      =>"password" ,
                  'id'      =>"account_password", 
                  'class'     =>"form-control", 
                  'placeholder' =>"Password" ,
                  'name'      =>"account_password", 
                  'value'         => '',
                  'required' => '',
          );
          $form_account["confirm-password"] = array(
                  'type'      =>"password" ,
                  'id'      =>"account_confirm_password", 
                  'class'     =>"form-control", 
                  'placeholder' =>"Confirm Password" ,
                  'name'      =>"account_confirm_password", 
                  'value'         => '',
                  'required' => '',
          );
          $form_account["fullname"] = array(
                  'type'      =>"text" ,
                  'id'      =>"account_name", 
                  'class'     =>"form-control", 
                  'placeholder' =>"Full Name" ,
                  'name'      =>"account_name", 
                  'value'         => '',
                  'required' => '',
          );
          $form_account["role_options"] = array(
                
                '1'        => 'Contributor',
                '2'        => 'Editor',
                '3'        => 'Admin',
                );
          $form_account["role_options_js"] = array(
                        'class'       => 'form-control',
                        'id'       => 'account_role',
              );
          $form_account["account_ID"] = array(
                  'type'      =>"hidden" ,
                  'id'      =>"account_ID", 
                  'name'      =>"account_ID", 
                  'value'         => 'account_ID',
          );
          $form_account["operation"] = array(
                  'type'      =>"hidden" ,
                  'id'      =>"operation", 
                  'name'      =>"operation", 
                  'value'         => 'account_submit',
          );
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