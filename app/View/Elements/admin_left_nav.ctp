<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <?php if($loggedUser['user_image']){ $img= $loggedUser['user_image']; } else { $img= ADMIN_AVATAR ; }?>
                        <img src="<?php echo $this->webroot; ?>img/profiles/<?php echo $img ; ?>" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p> <?php echo $loggedUser['firstname'].' '.$loggedUser['lastname']; ?></p>
          
        </div>
      </div>
     
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">      
        
		
        <li class="<?php if($this->name=='Dashboard') echo 'active' ; ?> treeview">
         <?php echo $this->Html->link('<i class="fa fa-dashboard"></i> <span>Dashboard</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>',array('controller'=>'dashboard','action'=>'index','admin'=>true),array('escape'=>false)); ?>
        
        </li>
		
		
		<li class="treeview <?php if((in_array($this->action,array('admin_prices','admin_add_price'))))  echo 'active' ; ?>">
          <a href="#">
          <i class="fa fa-dollar" aria-hidden="true"></i>

            <span>Campaign Management</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
        
          <ul  class="treeview-menu <?php if($this->name=='Home' && in_array($this->action,array('admin_prices','admin_add_price'))) echo 'menu-open' ; ?>">
            <li <?php if($this->action=='admin_add_price') echo 'class="active"' ; ?>><?php echo $this->Html->link('<i class="fa fa-circle-o"></i> Add Campaign',array('controller'=>'home','action'=>'add_price','admin'=>true),array('escape'=>false)); ?></li>
            <li <?php if($this->action=='admin_prices') echo 'class="active"' ; ?>><?php echo $this->Html->link('<i class="fa fa-circle-o"></i> List Campaigns',array('controller'=>'home','action'=>'prices','admin'=>true),array('escape'=>false)); ?></li>
          </ul>
        </li>
		
       <li class="treeview <?php if($this->name=='Home'  && in_array($this->action,array('admin_testimonials','admin_add_testimonial'))) echo 'active' ; ?>">
          <a href="javascript:void(0)">  
            <i class="fa fa-list"></i>   
            <span>Manage Testimonials</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul  class="treeview-menu <?php if($this->name=='Home' && in_array($this->action,array('admin_testimonials','admin_add_testimonial'))) echo 'menu-open' ; ?>">
            <li <?php if($this->action=='admin_add_testimonial') echo 'class="active"' ; ?>><?php echo $this->Html->link('<i class="fa fa-circle-o"></i> Add Testimonial',array('controller'=>'home','action'=>'add_testimonial','admin'=>true),array('escape'=>false)); ?></li>
            <li <?php if($this->action=='admin_testimonials') echo 'class="active"' ; ?>><?php echo $this->Html->link('<i class="fa fa-circle-o"></i> List Testimonials',array('controller'=>'home','action'=>'testimonials','admin'=>true),array('escape'=>false)); ?></li>
          </ul>
        </li> 
		
		
      <li class="treeview <?php if($this->name=='Home'  && in_array($this->action,array('admin_clients','admin_add_client'))) echo 'active' ; ?>">
          <a href="">  
            <i class="fa fa-list"></i>   
            <span>Manage Clients</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul  class="treeview-menu <?php if($this->name=='Home' && in_array($this->action,array('admin_clients','admin_add_client'))) echo 'menu-open' ; ?>">
            <li <?php if($this->action=='admin_add_client') echo 'class="active"' ; ?>><?php echo $this->Html->link('<i class="fa fa-circle-o"></i> Add Client',array('controller'=>'home','action'=>'add_client','admin'=>true),array('escape'=>false)); ?></li>
            <li <?php if($this->action=='admin_clients') echo 'class="active"' ; ?>><?php echo $this->Html->link('<i class="fa fa-circle-o"></i> List Clients',array('controller'=>'home','action'=>'clients','admin'=>true),array('escape'=>false)); ?></li>
          </ul>
        </li> 
        
		
		<li class="treeview <?php if($this->name=='Cms') echo 'active' ; ?>">
          <a href="">  
            <i class="fa fa-file-o"></i>   
            <span>Manage Cms</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul  class="treeview-menu <?php if($this->name=='Cms') echo 'menu-open' ; ?>">
            <li <?php if($this->action=='admin_add_cms') echo 'class="active"' ; ?>><?php echo $this->Html->link('<i class="fa fa-circle-o"></i> Add Content',array('controller'=>'cms','action'=>'add_cms','admin'=>true),array('escape'=>false)); ?></li>
            <li <?php if($this->action=='admin_index') echo 'class="active"' ; ?>><?php echo $this->Html->link('<i class="fa fa-circle-o"></i> List Content',array('controller'=>'cms','action'=>'index','admin'=>true),array('escape'=>false)); ?></li>
          </ul>
        </li> 

        
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
