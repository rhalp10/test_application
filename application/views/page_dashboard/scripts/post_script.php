  <script type="text/javascript">
          $(document).ready(function() {
             
            var page_dataTable = $('#page_data').DataTable({
            "processing":true,
            "serverSide":true,
            "order":[],
            "ajax":{
              url:"<?php echo base_url(); ?>ajax/fetch_datatable/post",
              type:"POST"
            },
            "columnDefs":[
              {
                "targets":[0],
                "orderable":false,
              },
            ],

          });
            // <?php 
            // if ($permission->roles == 2){
            //   ?>
            //   $("#input_group_status").show();
              
            //   <?php
            // }
            // else{
            //   ?>
            //   $("#input_group_status").hide();
            //   <?php
            // }
            // ?>

          $(document).on('submit', '#page_form', function(event){
            event.preventDefault();

              $.ajax({
                url:"<?php echo base_url(); ?>ajax/insert/post",
                method:'POST',
                data:new FormData(this),
                contentType:false,
                processData:false,
                type:  'html',
                success:function(data)
                {
                  var newdata = JSON.parse(data);
                  if (newdata.success) {
                      alertify.alert(newdata.success).setHeader('Page');
                      page_dataTable.ajax.reload();
                      $('#page_modal').modal('hide');
                       alertify.success('Success'); 
                     
                  }
                  else{
                    alertify.alert(newdata.error).setHeader('Page');
                    alertify.error('Error');
                  }
                }
              });
           
          });

          $(document).on('click', '.add', function(){
           $('#pageModalLabel').text('Add Page');
         
           $("#page_title").prop("disabled", false);
           $("#page_content").prop("disabled", false);
           $("#page_status").prop("disabled", false);
           $('#page_form')[0].reset();

           $("#submit_input").show();
           $('#submit_input').text('Submit');
           $('#submit_input').val('page_submit');
           $('#operation').val("page_submit");
         });

          $(document).on('click', '.view', function(){
            var page_ID = $(this).attr("id");
            $('#pageModalLabel').text('View Page');
            $('#page_modal').modal('show'); 

            $("#page_title").prop("disabled", true);
            $("#page_content").prop("disabled", true);
            $("#page_status").prop("disabled", true);
            $("#submit_input").hide();
             $.ajax({
                url:"<?php echo base_url(); ?>ajax/fetch_single/post",
                method:'POST',
                data:{operation:"page_view",page_ID:page_ID},
                dataType    :   'json',
                success:function(data)
                {
                  $('#page_title').val(data.page_title);
                  $('#page_content').val(data.page_content);
                  $('#page_status').val(data.page_status).change(); 

                  $('#page_ID').val(page_ID);
                  $('#submit_input').text('View');
                  $('#submit_input').val('page_view');
                  $('#operation').val("page_view");
                  
                }
              });


            });
          $(document).on('click', '.edit', function(){
            var page_ID = $(this).attr("id");
            $('#pageModalLabel').text('Edit Page');
            $('#page_modal').modal('show'); 
             $.ajax({
                url:"<?php echo base_url(); ?>ajax/fetch_single/post",
                method:'POST',
                data:{operation:"page_update",page_ID:page_ID},
                dataType    :   'json',
                success:function(data)
                {


                  $("#page_title").prop("disabled", false);
                  $("#page_content").prop("disabled", false);
                  $("#page_status").prop("disabled", false);

                  $('#page_title').val(data.page_title);
                  $('#page_content').val(data.page_content);
                  $('#page_status').val(data.page_status).change(); 

                  $("#submit_input").show();
                  $('#page_ID').val(page_ID);
                  $('#submit_input').text('Update');
                  $('#submit_input').val('page_update');
                  $('#operation').val("page_update");
                  
                }
              });


            });
           $(document).on('click', '.delete', function(){

            var page_ID = $(this).attr("id");
            alertify.confirm('Are you sure you want to delete this page?', 
            function(){
              $.ajax({
               url:"<?php echo base_url(); ?>ajax/insert/post",
               method        :   'POST',
               data        :   {operation:"page_delete",page_ID:page_ID},
               type:  'html',
               success:function(data)
                {
                  var newdata = JSON.parse(data);
                  if (newdata.success) {
                    alertify.alert(newdata.success).setHeader('Delete Page');
                    page_dataTable.ajax.reload();
                    alertify.success('Success'); 
                     
                  }
                  else{
                    alertify.alert(newdata.error).setHeader('Delete Page');
                    alertify.error('Error');
                  }
               }
              })
               
             },
            function(){ 
              alertify.error('Cancel')
            }).setHeader('Delete Page');

              

            });
            


            } );

      </script>