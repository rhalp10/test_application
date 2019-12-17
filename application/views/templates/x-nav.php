        <nav class="navbar  navbar-expand-lg  navbar-dark fixed-top bg-dark flex-md-nowrap p-0 shadow">
            <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="#">TEST Application <img src="<?php echo base_url(); ?>assets/img/logo/primary_logo.png" alt="Logo" style="width: 30px; margin-left: 5px;"></a>
            <ul class="navbar-nav px-3 ml-auto">
                <li class="nav-item  dropdown" id="drophover">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <?=$user_username?>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="profile">Profile</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="<?php echo base_url(); ?>index.php/user/logout">Log Out</a>
                    </div>
                </li>
            </ul>
        </nav>