        <script src="<?php echo base_url(); ?>assets/js/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script>
            window.jQuery || document.write('<script src="<?php echo base_url(); ?>assets/js/jquery-slim.min.js"><\/script>')
        </script>
        <script src="<?php echo base_url(); ?>assets/js/jquery-3.3.1.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/bootstrap.bundle.min.js" integrity="sha384-xrRywqdh3PHs8keKZN+8zzc5TX0GRTLCcmivcbNJWm2rs5C8PRhcEn3czEjhAO9o" crossorigin="anonymous"></script>
        <script src="<?php echo base_url(); ?>assets/js/feather.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/dashboard.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/plugins/datatables/datatables.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/plugins/alertifyjs/alertify.min.js"></script>
        <?php 
        if ( isset($script)){
          if ( ! file_exists(APPPATH.'views/custom_jscript/'.$script.'.php'))
          {
              // Whoops, we don't have a page for that!
              // show_404();
          }
          else{
            include(APPPATH.'views/custom_jscript/'.$script.'.php');
          }
        }
        else{
          
        }
          
        ?>