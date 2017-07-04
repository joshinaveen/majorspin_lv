<div class="row auth-alerts " onclick="this.classList.add('hidden')">
  <div class="col-md-12">
  <div class="box-body">
    <div class="alert alert-danger alert-dismissible">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		<h4><i class="icon fa fa-ban"></i> Alert!</h4>
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