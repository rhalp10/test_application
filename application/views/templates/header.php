
<header class=" fixed-bottom ">
  <nav class="navbar navbar-expand-md navbar-light bg-light ">
    <a class="navbar-brand" href="<?php echo base_url(); ?>"><img src="<?php echo base_url(); ?>assets/img/logo/primary_logo.png" width="20%" style="max-width:80px; margin-top: -7px; padding: 0px;"> TEST APPLICATION</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
      <div class="collapse navbar-collapse" id="navbarCollapse">
       <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
          <a class="nav-link" data-toggle="modal" data-target="#overview">Overview</a>
        </li>
        <li class="nav-item ">
          <a class="nav-link" href="post">Post</a>
        </li>
        <!-- <li class="nav-item ">
          <a class="nav-link" data-toggle="modal" data-target="#history">History</a>
        </li> -->
      </ul>
  
        <div class="btn-group">
          <a class="btn btn-primary  my-2 my-sm-0 text-white btn-sm"  data-toggle="modal" data-target="#login"><i class="fas fa-person"></i> Sign In</a>
        </div>
   
      	
    </div>

  </nav>
  	<div class="w-100 bg-dark text-center">
  		<center class="text-white">
          TEST APPLICATION <br>
All Rights Reserved<br>Copyright &copy; 2019 <?php 
												if (date('Y') !== "2019") 
												{
													echo " - " . date('Y');
												}
												else 
												{
												
												}
											?>
      </center>
  	</div>
</header>