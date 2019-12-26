  <script type="text/javascript">
          $(document).ready(function() {

             
            var account_dataTable = $('#account_data').DataTable({
            "processing":true,
            "serverSide":true,
            "order":[],
            "ajax":{
              url:"<?php echo base_url(); ?>ajax/fetch_datatable/account",
              type:"POST"
            },
            "columnDefs":[
              {
                "targets":[0],
                "orderable":false,
              },
            ],

          });

          $(document).on('submit', '#account_form', function(event){
            event.preventDefault();

              $.ajax({
                url:"<?php echo base_url(); ?>ajax/insert/account",
                method:'POST',
                data:new FormData(this),
                contentType:false,
                processData:false,
                type:  'html',
                success:function(data)
                {
                  var newdata = JSON.parse(data);
                  if (newdata.success) {
                      alertify.alert(newdata.success).setHeader('Account');
                      account_dataTable.ajax.reload();
                      $('#account_modal').modal('hide');
                      alertify.success('Success');

                     
                  }
                  else{
                    alertify.alert(newdata.error).setHeader('Account');
                    alertify.error('Error');
                  }
                }
              });
           
          });
          
        
        $(document).on('click', '.add', function(){
           $('#accountModalLabel').text('Add Account');
         

           $("#account_user").prop("disabled", false);
           $("#input_group_pass").show();
           $("#input_group_cpass").show();
           $("#account_name").prop("disabled", false);
           $("#account_role").prop("disabled", false);

           $('#account_form')[0].reset();

           $("#submit_input").show();
           $('#submit_input').text('Submit');
           $('#submit_input').val('account_submit');
           $('#operation').val("account_submit");
         });

         $(document).on('click', '.view', function(){
            var account_ID = $(this).attr("id");
            $('#accountModalLabel').text('View Account');
            $('#account_modal').modal('show'); 
             $.ajax({
                url:"<?php echo base_url(); ?>ajax/fetch_single/account",
                method:'POST',
                data:{operation:"account_view",account_ID:account_ID},
                dataType    :   'json',
                success:function(data)
                {
                  $("#account_user").prop("disabled", true);
                  
                  $("#input_group_pass").hide();
                  $("#input_group_cpass").hide();
                  $("#account_name").prop("disabled", true);
                  $("#account_role").prop("disabled", true);

                  $('#account_user').val(data.account_user);
                  $('#account_password').val(data.account_password);
                  $('#account_confirm_password').val(data.account_password);
                  $('#account_name').val(data.account_fullname);
                  $('#account_role').val(data.account_role).change(); 

                  $("#submit_input").hide();
                  $('#account_ID').val(account_ID);
                  $('#submit_input').text('View');
                  $('#submit_input').val('account_view');
                  $('#operation').val("account_view");
                  
                }
              });


            });

          $(document).on('click', '.edit', function(){
            var account_ID = $(this).attr("id");
            $('#accountModalLabel').text('Edit Account');
            $('#account_modal').modal('show'); 
             $.ajax({
                url:"<?php echo base_url(); ?>ajax/fetch_single/account",
                method:'POST',
                data:{operation:"account_update",account_ID:account_ID},
                dataType    :   'json',
                success:function(data)
                {
                  $("#account_user").prop("disabled", true);
                  $("#input_group_pass").show();
                  $("#input_group_cpass").show();
                  $("#account_name").prop("disabled", false);
                  $("#account_role").prop("disabled", false);

                  $('#account_user').val(data.account_user);
                  $('#account_password').val(data.account_password);
                  $('#account_confirm_password').val(data.account_password);
                  $('#account_name').val(data.account_fullname);
                  $('#account_role').val(data.account_role).change(); 

                  $("#submit_input").show();
                  $('#account_ID').val(account_ID);
                  $('#submit_input').text('Update');
                  $('#submit_input').val('account_update');
                  $('#operation').val("account_update");
                  
                }
              });


            });
          $(document).on('click', '.delete', function(){

            var account_ID = $(this).attr("id");
            alertify.confirm('Are you sure you want to delete this  account?', 
            function(){
              $.ajax({
               url:"<?php echo base_url(); ?>ajax/insert/account",
               method        :   'POST',
               data        :   {operation:"account_delete",account_ID:account_ID},
               type:  'html',
               success:function(data)
                {
                  var newdata = JSON.parse(data);
                  if (newdata.success) {
                      alertify.alert(newdata.success).setHeader('Delete Account');
                      account_dataTable.ajax.reload();
                      alertify.success('Success');
                     
                  }
                  else{
                    alertify.alert(newdata.error).setHeader('Delete Account');
                    alertify.error('Error');
                  }
               }
              })
               
             },
            function(){ 
              alertify.error('Cancel')
            }).setHeader('Delete Account');

              

            });


            


            } );

      </script>
