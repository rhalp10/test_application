  <script type="text/javascript">
          $(document).ready(function() {
             
            var post_dataTable = $('#post_data').DataTable({
            "processing":true,
            "serverSide":true,"bLengthChange": false,
            "order":[],
            "ajax":{
              url:"<?php echo base_url(); ?>page_view/post_data",
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