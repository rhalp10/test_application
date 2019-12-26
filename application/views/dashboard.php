<?php 

    $ctrlr_methd = $this->uri->segment(1); 
    if(isset($restrict)){
        //IF user is restricted to controller/page. User will be redirect to dashboard.
        if($restrict){
            $array_msg = array(
                'alert_class'   =>'alert alert-danger',
                'alert_msg'     =>'<strong>Restriction!</strong> You dont have permission to access ('.$this->uri->uri_string().') page.');
             $this->session->set_flashdata($array_msg);
             redirect('dashboard');
        }
    }


?><!DOCTYPE html>
<html>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="developer" content="Rhalp Darren R. Cabrera">
    <meta name="generator" content="Jekyll v3.8.5">
    <link rel="icon" href="<?=base_url();?>assets/img/logo/primary_logo.ico" type="image/x-icon">
    <title> Dashboard</title>

    <!-- Bootstrap core CSS -->
    <link href="<?=base_url();?>assets/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="<?=base_url();?>assets/plugins/datatables/datatables.min.css" />
    <!-- include the style -->
    <link rel="stylesheet" href="<?=base_url();?>assets/plugins/alertifyjs/css/alertify.min.css" />
    <!-- include a theme -->
    <link rel="stylesheet" href="<?=base_url();?>assets/plugins/alertifyjs/css/themes/default.min.css" />
    <link href="<?=base_url();?>assets/css/icomoon/styles.css" rel="stylesheet" type="text/css">
    <style>
        #drophover a:hover {
            background-color: transparent;
        }
        
        .uctext {
            text-transform: uppercase;
        }
        
        .modal {
            overflow-y: auto
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
        
        .nav-tabs .nav-link.active {
            background-color: #6c757d;
        }
        
        .nav-tabs .nav-link {
            background-color: #383d41;
        }
    

    </style>
    <!-- Custom styles for this template -->
    <link href="<?=base_url();?>assets/css/dashboard.css" rel="stylesheet">
</head>

<body>

    <body>
        <nav class="navbar  navbar-expand-lg  navbar-dark fixed-top bg-dark flex-md-nowrap p-0 shadow">
            <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="#">TEST Application <img src="http://localhost/test_application/assets/img/logo/primary_logo.png" alt="Logo" style="width: 30px; margin-left: 5px;"></a>
            <ul class="navbar-nav px-3 ml-auto">
                <li class="nav-item  dropdown" id="drophover">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <?=$this->userName?></a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="profile">Profile</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="<?=base_url();?>user/logout">Log Out</a>
                    </div>
                </li>
            </ul>
        </nav>
        <div class="container-fluid">
            <div class="row">

                <style>
                    .nav-link {
                        color: white !important;
                    }
                    
                    svg {
                        color: white !important;
                    }
                    
                    .nav-link:hover {
                        background-color: #272b30;
                    }
                    
                    ul ul a {
                        padding-left: 50px !important;
                    }
                    
                    ul ul a:hover {
                        background: #eee;
                        padding-left: 50px !important;
                    }
                    
                    .sidebar .nav-link.active {
                        background: #272b30;
                    }
                </style>
                <nav class="col-md-2 d-none d-md-block bg-light sidebar" style="background: #6c757d !important;
               background: -webkit-linear-gradient(to right, #b4b4b4, #f0f0f0)  !important;
               /*background: linear-gradient(to right, #b4b4b4, #f0f0f0)  !important;  */
               color: black">
                    <div class="sidebar-sticky" style="overflow-x: hidden;
                  overflow-y: auto;">
                        <div style="height: 130px;" class="text-center">
                            <img id="c_img" src="http://localhost/test_application/assets/img/users/default.jpg" alt="Profile Image" runat="server" height="85" width="85" class="rounded-circle" style="border:1px solid;" />
                            <br>
                            <h6 style=" color:white;"><?=$this->userFullname?></h6>
                        </div>
                        <ul class="nav flex-column">
                            <div style="background: #383d41;
                        font-size: 12px;
                        font-weight: 600;
                        padding: 8px 16px; color:white;">MAIN NAVIGATION</div>
                         <?php echo $this->page_dashboard_sidenav?>
                            <!-- <li class="nav-item">
                                <a class="nav-link active " href="dashboard">
                                    <span data-feather="home"></span> Dashboard <span class="sr-only">(current)</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link  " href="account">
                                    <span data-feather="user"></span> Account
                                </a>
                            </li> -->
                        </ul>

                        
                    </div>
                </nav>   
              
                <?php 
                    //if method in controller is not exist call default
                    if($ctrlr_methd)
                    {
                        //check if file exist
                        if (file_exists(APPPATH.'views/page_dashboard/'.$ctrlr_methd.'.php'))
                        {
                          include(APPPATH.'views/page_dashboard/'.$ctrlr_methd.'.php');
                        }
                        
                        if (file_exists(APPPATH.'views/page_dashboard/modals/'.$ctrlr_methd.'_modal.php'))
                        {
                          include(APPPATH.'views/page_dashboard/modals/'.$ctrlr_methd.'_modal.php');
                        }

                    }
                    else{
                     include(APPPATH.'views/page_dashboard/dashboard.php');
                    }
                  
                ?>
            </div>
        </div>

        <script src="<?=base_url();?>assets/js/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script>
            window.jQuery || document.write('<script src="<?=base_url();?>assets/js/jquery-slim.min.js"><\/script>')
        </script>
        <script src="<?=base_url();?>assets/js/jquery-3.3.1.min.js"></script>
        <script src="<?=base_url();?>assets/js/bootstrap.bundle.min.js" integrity="sha384-xrRywqdh3PHs8keKZN+8zzc5TX0GRTLCcmivcbNJWm2rs5C8PRhcEn3czEjhAO9o" crossorigin="anonymous"></script>
        <script src="<?=base_url();?>/assets/js/feather.min.js"></script>
        <script src="<?=base_url();?>/assets/js/dashboard.js"></script>
        <script type="text/javascript" src="<?=base_url();?>assets/plugins/datatables/datatables.min.js"></script>
        <script src="<?=base_url();?>assets/plugins/alertifyjs/alertify.min.js"></script>
        <?php 
        //if method in controller is not exist call default
        if($ctrlr_methd)
        {
            //check if file exist
            if (file_exists(APPPATH.'views/page_dashboard/scripts/'.$ctrlr_methd.'_script.php'))
            {
              include(APPPATH.'views/page_dashboard/scripts/'.$ctrlr_methd.'_script.php');
            }

        }
        
                  
         
         if(isset($_SESSION["alert_msg"])){ ?>
        <script>
            $("#alert_msg").fadeTo(2000, 500).slideUp(500, function(){
                $("#alert_msg").slideUp(500);
            });
        </script>
        <?php }?>

    </body>

</html>