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
         $form_page["form_attribute"] = array(
                    'class'   => '',
                    'id'    => 'page_form',
                    'role'  => 'form',
                    'method'  => 'POST',
                );
              $form_page["submit_button_attribute"] = array(
                        'class'   =>"btn btn-primary",
                        'id'    => 'submit_input',
                        'type'    => 'submit',
                        'name'    => 'submit_input',
                        'content' => 'Submit',
                );
          $form_page["title"] = array(
                  'type'      =>"text" ,
                  'id'      =>"page_title", 
                  'class'     =>"form-control", 
                  'placeholder' =>"Title" ,
                  'name'      =>"page_title", 
                  'value'         => '',
                  'required'    => '',
          );
          $form_page["body"] = array(
                  'type'      =>"text" ,
                  'id'      =>"page_content", 
                  'class'     =>"form-control", 
                  'placeholder' =>"Body Content" ,
                  'name'      =>"page_content", 
                  'value'         => '',
                  'required'    => '',
          );
          $form_page["status_options"] = array(
                
                '1'        => 'Activate',
                '0'        => 'Deactived',
                );
              $form_page["status_options_js"] = array(
                        'class'       => 'form-control',
                        'id'       => 'page_status',
              );
          $form_page["page_ID"] = array(
                  'type'      =>"hidden" ,
                  'id'      =>"page_ID", 
                  'name'      =>"page_ID", 
                  'value'         => 'page_ID',
          );
          $form_page["operation"] = array(
                  'type'      =>"hidden" ,
                  'id'      =>"operation", 
                  'name'      =>"operation", 
                  'value'         => 'page_submit',
          );
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