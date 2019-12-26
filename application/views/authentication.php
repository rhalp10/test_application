<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="developer" content="Rhalp Darren R. Cabrera">
    <meta name="generator" content="Jekyll v3.8.5">
    <title>Login Authentication </title>

    <link rel="icon" href="<?=base_url();?>assets/img/logo/primary_logo.ico" type="image/x-icon">
    <!-- Bootstrap core CSS -->
	<link href="<?=base_url();?>assets/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <style>
      body {
      background: url('<?=base_url();?>assets/img/background/bg-login.jpg') no-repeat center center fixed;
      -webkit-background-size: cover;
      -moz-background-size: cover;
      background-size: cover;
      -o-background-size: cover;
    }
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>
    <!-- Custom styles for this template -->
    <link href="<?=base_url();?>assets/css/floating-labels.css" rel="stylesheet">

  <!-- include the style -->
  <link rel="stylesheet" href="<?=base_url();?>assets/plugins/alertifyjs/css/alertify.min.css" />
  <!-- include a theme -->
  <link rel="stylesheet" href="<?=base_url();?>assets/plugins/alertifyjs/css/themes/default.min.css" />
  </head> <body>
<header class=" fixed-bottom ">
  <nav class="navbar navbar-expand-md navbar-light bg-light ">
    <a class="navbar-brand" href="index"><img src="assets/img/logo/primary_logo.png" width="20%" style="max-width:80px; margin-top: -7px; padding: 0px;"> Test Application</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
      <div class="collapse navbar-collapse" id="navbarCollapse">
    
      	
    </div>

  </nav>
  	<div class="w-100 bg-dark text-center">
  		<center class="text-white">
          Test Application<br>
All Rights Reserved<br>Copyright &copy; 2019       </center>
  	</div>
</header>   <div class="container">
      <div class="row">
         <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
            <div class="card card-signin my-5 ">
               <h5 class="card-title text-center" id="f_text" style="background-color: #4a87c8; padding: 15px; color: white; border-radius: 5px 5px 0px 0px;" >Sign In</h5>
               <div class="card-body">
                  <hr style="margin-top: -30px;">
                  <div class="text-center msg">
                     <img src="assets/img/logo/primary_logo.png" alt="CvSU Logo" style="width: 100px;">
                     <h3>Sample</h3>
                     <h5>Test Application</h5>
                     <small id="f_stext">Login here using your username and password</small>
                  </div>
                  <div id="f_login">
               
                     <?php 
                      $form_login["form-attribute"] = array(
                                'class'  => 'form-signin',
                                'id' => 'login_form',
                                'role' => 'form',
                                'method' => 'POST',
                            );
                          
                      $form_login["username"] = array(
                              'type'      =>"text" ,
                              'id'      =>"login_user", 
                              'class'     =>"form-control", 
                              'placeholder' =>"Username" ,
                              'name'      =>"login_user", 
                              'value'         => '',
                              'required' => '',
                      );
                      $form_login["password"] = array(
                              'type'      =>"password" ,
                              'id'      =>"login_password", 
                              'class'     =>"form-control", 
                              'placeholder' =>"Password" ,
                              'name'      =>"login_password", 
                              'value'         => '',
                              'required' => '',
                      );
                      $form_login["operation"] = array(
                              'type'      =>"hidden" ,
                              'id'      =>"login_operation", 
                              'name'      =>"operation", 
                              'value'         => 'submit_login',
                      );
                      $form_login["submit"]  = array(
                                  'class'         =>"btn btn-primary btn-block",
                                  'type'          => 'submit',
                                  'style'          => 'background-color: #1d8f1d',
                                  'name'            => 'submit_login',
                                  'content' => 'Sign in',
                          );
                      echo form_open_multipart("user/authentication", $form_login["form-attribute"]);
                      echo ' <div class="form-label-group">'.PHP_EOL;
                      echo form_input($form_login["username"]).PHP_EOL;
                      echo form_label('Username', 'inputUsername').PHP_EOL;
                      echo ' </div>'.PHP_EOL;
                      echo ' <div class="form-label-group">'.PHP_EOL;
                      echo form_password($form_login["password"]).PHP_EOL;
                      echo form_label('Password', 'inputPassword').PHP_EOL;
                      echo ' </div>'.PHP_EOL;
                      // echo '<div class="checkbox mb-3">'.PHP_EOL;
                      // $js = 'onClick="viewPassword()"';
                      // echo form_checkbox('remember-me', 'accept', FALSE, $js);
                      // echo form_label('Show Password', 'ShowPassword').PHP_EOL;
                      // echo ' </div>'.PHP_EOL;
                      echo form_input($form_login["operation"]).PHP_EOL;
                      echo form_button($form_login["submit"]);
                      echo form_close();
                     ?>
                  </div>

                    <?php
                     if(isset($_SESSION["alert_msg"])){ ?>
                     <div class="<?=$_SESSION['alert_class']?>" role="alert">
                      <?=$_SESSION["alert_msg"]?>
                    </div>
                    <?php }?>
               </div>
            </div>
         </div>
      </div>
   </div>
</body>
<script src="<?=base_url();?>assets/js/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="<?=base_url();?>assets/js/jquery-3.3.1.min.js" ></script>
<script>window.jQuery || document.write('<script src="<?=base_url();?>assets/js/jquery-slim.min.js"><\/script>')</script><script src="<?=base_url();?>assets/js/bootstrap.bundle.min.js" integrity="sha384-xrRywqdh3PHs8keKZN+8zzc5TX0GRTLCcmivcbNJWm2rs5C8PRhcEn3czEjhAO9o" crossorigin="anonymous"></script>
<script src="<?=base_url();?>assets/plugins/alertifyjs/alertify.min.js"></script>

</html>