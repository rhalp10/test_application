<script>
  function viewPassword() {
            var x = document.getElementById("login_password");
            if (x.type === "password") {
                x.type = "text";
            } else {
                x.type = "password";
            }
        }
     $(document).on('submit', '#login_form', function(event){
            event.preventDefault();

              $.ajax({
                url:"<?php echo base_url(); ?>index.php/user/authentication",
                method:'POST',
                data:new FormData(this),
                contentType:false,
                processData:false,
                type:  'html',
                success:function(data)
                {
                  var newdata = JSON.parse(data);
                  if (newdata.success) {
                      alertify.alert(newdata.success).setHeader('Login Success');
                     window.location.assign("<?php echo base_url(); ?>dashboard");
                  }
                  else{
                    alertify.alert(newdata.error).setHeader('Error Login');
                  }
                }
              });
           
          });
</script>