<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

//$cakeDescription = __d('cake_dev', 'CakePHP: the rapid development php framework');
//$cakeVersion = __d('cake_dev', 'CakePHP %s', Configure::version())
?>
<!DOCTYPE html>
<html>
<head>
	<?php echo $this->Html->charset(); ?>
	<title><?php echo $this->fetch('title'); ?>
	</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
	<?php
		echo $this->Html->meta('icon');
		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
		echo $this->Html->css(array("animate","flexslider","style-new",'owl.carousel','owl.theme'));
		echo $this->Html->script(array('jquery.vide','animation','jquery.flexslider','owl.carousel','owl.theme'));
	?>
</head>
<body>
	<div id="container">
		
		<?php echo $this->element('header'); ?>
		<div id="content">

			<?php echo $this->Flash->render(); ?>

			<?php echo $this->fetch('content'); ?>
		</div>
		<?php echo $this->element('footer'); ?>
		
	</div>
	<?php //echo $this->element('sql_dump'); ?>
	
	<script type="text/javascript">
	$(document).ready(function() {
		var owl = $("#clients");
		owl.owlCarousel({
		  items : 5,
		  itemsDesktop : [1200,5], 
		  itemsDesktopSmall : [900,3], 
		  itemsTablet: [600,2], 
		  itemsMobile : [480,1] 
		});
		$("#next").click(function(){
			owl.trigger('owl.next');
		})
		$("#prev").click(function(){
			owl.trigger('owl.prev');
		})

		
	});

</script>
<script type="text/javascript">
	$(document).ready(function() {
		var owl = $("#testimonials");
		owl.owlCarousel({
		  items : 2,
		  itemsDesktop : [1200,2], 
		  itemsDesktopSmall : [900,2], 
		  itemsTablet: [600,1], 
		  itemsMobile : [480,1] 
		});
		$("#next1").click(function(){
			owl.trigger('owl.next');
		})
		$("#prev1").click(function(){
			owl.trigger('owl.prev');
		})
	});
</script>
</body>
</html>
