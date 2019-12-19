    <nav class="col-md-2 d-none d-md-block bg-light sidebar" style="background: #6c757d !important;
               background: -webkit-linear-gradient(to right, #b4b4b4, #f0f0f0)  !important;
               /*background: linear-gradient(to right, #b4b4b4, #f0f0f0)  !important;  */
               color: black">
                                <div class="sidebar-sticky" style="overflow-x: hidden;
                  overflow-y: auto;">
                                    <div style="height: 130px;" class="text-center">
                                        <img id="c_img" src="<?php echo base_url(); ?>assets/img/users/default.jpg" alt="Profile Image" runat="server" height="85" width="85" class="rounded-circle" style="border:1px solid;" />
                                        <br>
                                        <h6 style=" color:white;"><?=$user_fullname?></h6>
                                    </div>
                                    <ul class="nav flex-column">
                                        <div style="background: #383d41;
                        font-size: 12px;
                        font-weight: 600;
                        padding: 8px 16px; color:white;">MAIN NAVIGATION</div>

                <?php 

                echo side_navlist($controller,"Dashboard","dashboard",'home');
                if ($permission->roles == 3){
                  echo side_navlist($controller,"Account","account",'user');
                }
                if ($permission->roles != 3){
                  echo side_navlist($controller,"Page","page",'clipboard');
                }
                  

                ?>
                        </ul>

                        <!-- <div class="text-center">Alulod Teacher Evaluation System</div> -->
                    </div>
                </nav>