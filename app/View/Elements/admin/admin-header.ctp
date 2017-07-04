<header class="main-header">
    <!-- Logo -->
    
    <a href="javascript:void(0)" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>MS</b></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b><img class="admin-logo" src="<?php echo $this->webroot; ?>img/logo_admin.png"></b></span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
         
         
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu" onclick="$('.user-info-toggle').toggle();">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
               <?php if($loggedUser['user_image']){ $img= $loggedUser['user_image']; } else { $img = ADMIN_AVATAR ; }?>
                        <img src="<?php echo $this->webroot; ?>img/profiles/<?php echo $img ; ?>" class="user-image" alt="User Image">
              <span class="hidden-xs"> <?php echo $loggedUser['firstname'].' '.$loggedUser['lastname']; ?></span>
            </a>
            <ul class="dropdown-menu user-info-toggle">
              <!-- User image -->
              <li class="user-header">
                <?php if($loggedUser['user_image']){ $img= $loggedUser['user_image']; } else { $img = ADMIN_AVATAR ; }?>
                        <img src="<?php echo $this->webroot; ?>img/profiles/<?php echo $img ; ?>" class="img-circle" alt="User Image">

                <p>
                  <?php echo $loggedUser['firstname'].' '.$loggedUser['lastname']; ?>
                  <small></small>
                </p>
              </li>
             
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                
                <div class="pull-right">
                  <a href="<?php echo $this->webroot; ?>admin/logins/logout" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
         
        </ul>
      </div>
    </nav>
  </header>
