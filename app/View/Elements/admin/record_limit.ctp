<div class="dataTables_length" id="example1_length">
	<?php $limit = isset($_GET['limit']) ? $_GET['limit'] : '20'; ?>
	<form type="get">
		<label>Show 
		  <select name="limit" class="form-control input-sm" onchange="$(this).closest('form').submit();">
			<option value="20" <?= ($limit == '') ? 'selected' : '' ?>>Default</option>
			<option value="10" <?= ($limit == 10) ? 'selected' : '' ?>>10</option>
			<option value="25" <?= ($limit == 25) ? 'selected' : '' ?>>25</option>
			<option value="50" <?= ($limit == 50) ? 'selected' : '' ?>>50</option>
			<option value="100" <?= ($limit == 100) ? 'selected' : '' ?>>100</option>
		  </select> 
			entries
		</label>
	</form>
</div>