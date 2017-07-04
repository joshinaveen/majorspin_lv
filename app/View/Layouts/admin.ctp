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

$cakeDescription = __d('cake_dev', 'CakePHP: the rapid development php framework');
$cakeVersion = __d('cake_dev', 'CakePHP %s', Configure::version())
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
 <?php echo $this->Html->charset(); ?>
	<title>
	
		<?php echo $this->fetch('title'); ?>
	</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	
	<?php
		echo $this->Html->meta('icon');

		echo $this->Html->css(array('bootstrap/css/bootstrap.min.css','AdminLTE.min','style','responsive','skins/_all-skins.min.css','flat/blue','morris/morris.css','dataTables.bootstrap','validationEngine.jquery'));
                 ?>
                 <!-- Font Awesome -->
		  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
		  <!-- Ionicons -->
		  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
                 
                   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.css">
                     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/css/bootstrap-datepicker.css">
                   
		<!-- Morris.js charts --> <link rel="stylesheet" href="<?php echo $this->webroot;?>js/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
		
                <?php
                echo $this->Html->script(array('jquery-2.2.3.min'));?>
		<script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
		<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
		<script>
		  $.widget.bridge('uibutton', $.ui.button);
		</script>
               <?php echo $this->Html->script(array('bootstrap/bootstrap.min','dataTables.bootstrap.min','jquery.slimscroll.min','fastclick','jquery.validationEngine','jquery.validationEngine-en','admin_script','ckeditor/ckeditor'));
		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>
		
		
		
		<!-- AdminLTE App -->
		<script src="<?php echo $this->webroot; ?>js/app.js"></script>
		<!-- AdminLTE for demo purposes -->
		<script src="<?php echo $this->webroot; ?>js/demo.js"></script>
                <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.js"></script>
                 <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/js/bootstrap-datepicker.js"></script>
</head>

<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <?php echo $this->element('admin/admin-header'); ?>
  <!-- Left side column. contains the logo and sidebar -->
  <?php echo $this->element('admin_left_nav'); ?>

  <div class="content-wrapper">
       <?php echo $this->Session->flash(); ?>  
  <?php echo $this->fetch('content'); ?>
   
  </div>
   <?php echo $this->element('admin/admin-footer'); ?> 
</div>
<!-- ./wrapper -->

</body>
</html>
<script>
    $(function(){
       
       //$('#form').validationEngine();
     });
function delete_row(rowId,controllerName,actionName){
    swal({
    title: "Are you sure?",
    text: "You want to delete it ?",
    type: "warning",
    showCancelButton: true,
    confirmButtonClass: "btn-danger",
    confirmButtonText: "Yes, delete it!",
    closeOnConfirm: false
  },
  function(){
    swal("Deleted!", "Please wait...", "success");
    window.location.href='<?php echo $this->webroot; ?>admin/'+controllerName+'/'+actionName+'/'+rowId;
  });
}

function delete_review(rowId,doctorId,controllerName,actionName){
    swal({
    title: "Are you sure?",
    text: "You want to delete it ?",
    type: "warning",
    showCancelButton: true,
    confirmButtonClass: "btn-danger",
    confirmButtonText: "Yes, delete it!",
    closeOnConfirm: false
  },
  function(){
    swal("Deleted!", "Please wait...", "success");
    window.location.href='<?php echo $this->webroot; ?>admin/'+controllerName+'/'+actionName+'/'+rowId+'/'+doctorId;
  });
}
</script>

