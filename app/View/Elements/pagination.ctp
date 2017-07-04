<ul class="pagination">
	<?php 
		if($this->Paginator->hasPrev()){
		  echo $this->Paginator->prev(__('Previous'));
		}
	  ?>
	<?php 
		if($this->Paginator->hasPage()){
		  echo $this->Paginator->numbers();
		}
	  ?>
	<?php 
		if($this->Paginator->hasNext()){
		  echo $this->Paginator->next(__('Next'));
		}
	  ?>
</ul>