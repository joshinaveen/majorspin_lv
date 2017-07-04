<?php ?>
<div id="dialog-confirm" style="display:none;" title="Empty the recycle bin?">
<p><span class="ui-icon ui-icon-alert" style="float:left; margin:0 7px 20px 0;"></span>These items will be permanently deleted and cannot be recovered. Are you sure?</p>
</div>
<div id="header">
    <div id="head_lt">
    <!--Logo Start from Here-->
    <span class="floatleft">
	  <a href="#" class="brand">
		<h1>
		<span>tradesmen</span>
		
	</h1>
</a>
	</span><span class="slogan">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;administration suite</span>
    <!--Logo end  Here-->
    </div>
	<?php
	if ( isset( $admin) )
	{ 
	?>
		<div id="head_rt">Welcome <span>xicom</span>&nbsp;&nbsp;|&nbsp;&nbsp; <?php echo date('d M, Y h:i A'); ?></div>
	<?php
	} ?>
</div>
<?php if(!empty($_SESSION['Auth']['User'])) { ?>

<div class="menubg">
	<div class="nav">
		<ul id="navigation">
			<li onmouseout="this.className=''" onmouseover="this.className='hov'"><?php echo $this->Html->link('Home', array('controller' => 'users', 'action' => 'dashboard', 'admin' => 'true')); ?></li>
			<li onmouseout="this.className=''" onmouseover="this.className='hov'"><?php echo $this->Html->link('CMS Management', array('controller' => 'cms', 'action' => 'index', 'admin' => 'true')); ?>
				<div class="sub">
					<ul>
						<li>
							<?php echo $this->Html->link('List cms pages', array('controller' => 'cms', 'action' => 'index', 'admin' => true)); ?>
						</li>
						
					</ul>
				</div>
			</li>

			
			<li onmouseout="this.className=''" onmouseover="this.className='hov'">
				<?php echo $this->Html->link('Admin', array('controller' => 'users', 'action' => 'dashboard', 'admin' => 'true')); ?>
				<div class="sub">
					<ul>						
						<li>
                                       <?php echo $this->Html->link('Manage Email Template', array('controller' => 'emailtemplates', 'action' => 'manage', 'admin' => 'true')); ?>
					
						</li>
						
                                                 <li>
							  <?php echo $this->Html->link('Manage User', array('controller' =>'users', 'action' => 'index', 'admin' => 'true')); ?>
						</li>
					</ul>
				</div>
			</li>

                     <li onmouseout="this.className=''" onmouseover="this.className='hov'">
				<?php echo $this->Html->link('Services', array('controller' => 'services', 'action' => 'index', 'admin' => 'true')); ?>
				<div class="sub">
					<ul>						
						<li>
                                       <?php echo $this->Html->link('Manage Categories', array('controller' => 'services', 'action' => 'index', 'admin' => 'true')); ?>
					
						</li>
						
                                                 <li>
							  <?php echo $this->Html->link('Manage Sub Categories', array('controller' =>'services', 'action' => 'subcategories', 'admin' => 'true')); ?>
						</li>
					</ul>
				</div>
			</li>
			
			
		</ul>
	</div>
	<div class="logout">
		<?php
			echo $this->Html->image("admins/logout.gif", array(
					"alt" => "Logout",
					'url' => array('controller' => 'logins', 'action' => 'logout', 'admin' => false)
				)); 
		?>
	</div>
</div>
<?php } ?>



<script>
function local_changes(data){
    $.post(JS_SITE_URL+'/App/conversion/'+data,{code:data},function(d){
       if(d=='success'){
           location.reload(); 
       }
   });
}  
</script>
