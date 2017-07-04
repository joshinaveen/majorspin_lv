<?php
$class = 'message';
if (!empty($params['class'])) {
    $class .= ' ' . $params['class'];
}
?>
<!-- <div class="<?php // h($class) ?>"><?php // h($message) ?></div> -->
<div class="row auth-alerts <?= h($class) ?>" onclick="this.classList.add('hidden')">
  	<div class="col-md-12">
	<div class="box-body">
		<div class="alert alert-info alert-dismissible">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
			<h4><i class="icon fa fa-info"></i> Alert!</h4>
			<?= h($message) ?>
		</div>
	</div>
	</div>
</div>	

<script>
	setTimeout(function() {
		$('.auth-alerts').fadeOut( "slow" );
    }, 3000);
</script>