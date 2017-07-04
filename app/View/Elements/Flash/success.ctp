<div class="row auth-alerts " onclick="this.classList.add('hidden')">
  <div class="col-md-12">
	<div class="box-body">	
      <div class="alert alert-success alert-dismissible">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
      <h4><i class="icon fa fa-check"></i> Alert!</h4>
      <?= h($message) ?>
    </div>
	</div>
  </div>
</div>
<!-- <div class="message success" onclick="this.classList.add('hidden')"><?php // h($message) ?></div> -->

<script>
	setTimeout(function() {
		$('.auth-alerts').fadeOut( "slow" );
    }, 3000);
</script>