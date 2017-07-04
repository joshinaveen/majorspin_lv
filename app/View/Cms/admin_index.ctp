<?php 
	$keyword = isset($_GET['keyword']) ? $_GET['keyword'] : '';
	$page = isset($this->request->query['page']) ? $this->request->query['page'] : '1';
	$limit = isset($this->request->query['limit']) ? $this->request->query['limit'] : '20';
?>
<section class="content-header">
      <h1>Cms <small>Pages</small>
        <div class="box-tools pull-right">
           <?php
          echo $this->Html->link('<i class="fa fa-plus"></i> Add Cms', 
                                ['prefix'=>'admin', 'action' => 'add_cms'], 
                                ['escape' =>false, 'class' => 'btn btn-primary btn-sm']);
        ?>
          </div>
      </h1>
    
    </section>

<section class="content">
  <div class="box box-warning">
    
    <div class="box-header with-border">
      <h3 class="box-title"></h3>
      <div class="box-tools pull-right">
      </div>
     
    </div>
      
    <div class="box-body">
        
      <div id="example1_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
          
      <div class="row">
          
      <div class="col-sm-6">
        <?= $this->element('record_limit');?>
      </div>
      <div class="col-sm-6">
        <div id="example1_filter" class="dataTables_filter">
			<form type="get">
				<label>Search:<input type="search" autofocus class="form-control input-sm" placeholder="" name="keyword" value="<?= $keyword; ?>"></label>
				<a href="javascript:void(0)" class="btn btn-small btn-primary"><i class="fa fa-refresh" style="float:right !important" id="refresh"></i></a>
			</form>
        </div>
      </div>
      </div>
           
      <div class="row">
      <div class="col-sm-12">
      <?php echo $this->Form->create('Cms',['class'=>'dataListing']);?>
	  <table id="example1" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">
		  <thead>
			  <tr role="row">
				<th><input type="checkbox" value="check_all" class="check_all" name="check_all"></th>
				<th class="sorting"><?php echo $this->Paginator->sort('id', 'S.No'); ?></th>
				<th class="sorting"><?php echo $this->Paginator->sort('page_name', 'Page Name'); ?></th>
				<th class="sorting"><?php echo $this->Paginator->sort('url_key','Slug'); ?></th>
				<th class="sorting"><?php echo $this->Paginator->sort('status','Status'); ?></th>
				<th class="sorting"><?php echo $this->Paginator->sort('created'); ?></th>
				<th class="sorting"><?php echo $this->Paginator->sort('modified'); ?></th>
				<th class="sorting"><?php echo __('Action'); ?></th>
				
			  </tr>  
		  </thead>
      <tbody>
      <?php 
      if(!empty($contents))
      {
		
        foreach($contents as $content)
        { 
			if($content['Cms']['status']=='Active'){ $status = 'Active';}else{ $status = 'Inactive';}
          ?>
            <tr role="row">
              <td valign="middle"><input class = "check-box-select" type="checkbox" value="<?php echo $content['Cms']['id']; ?>" name="ids[]"></td>
             <td><?php echo $content['Cms']['id']?></td>
			 <td><?php echo $content['Cms']['page_name']?></td>
              <td><?php echo $content['Cms']['url_key']?></td>
              <td><?php if($content['Cms']['status']=='active'){echo '<span class="btn btn-success btn-flat">Active</span>';}
                elseif($content['Cms']['status']=='inactive'){ echo '<span class="btn btn-warning btn-flat">Inactive</span>';}
                ?></td>
              <td><?php echo date('d-m-Y H:i:s',strtotime($content['Cms']['created'])); ?></td>
			  <td><?php echo date('d-m-Y H:i:s',strtotime($content['Cms']['modified'])); ?></td>
                         
			  <td valign="middle" >&nbsp;
				<?php 
					echo $this->Html->link('<span class="glyphicon glyphicon-pencil"></span>', 
					array('prefix' => 'admin', 'action' => 'edit_cms',$content['Cms']['id']), 
					array('escape' => false,'data-original-title'=>'Edit Cms','data-toggle'=>'tooltip')); 
				?>
				
				
				&nbsp;&nbsp;
				<a href="<?php echo $this->webroot; ?>admin/cms/page_section/<?php echo $content['Cms']['id']; ?>" data-original-title="show sub pages" data-toggle="tooltip" ><i class="fa fa-object-group"></i></a>
				
                               
                               
				  
				</td>
				
            </tr>
          <?php
		 // $start ++;
        }  
      }else
      { 
        ?>
          <tr>
            <td colspan="10">No Price found</td>
          </tr>
        <?php
      }
      ?>
        </tbody>
      <tfoot>
      <tr role="row">
				<th><input type="checkbox" value="check_all" class="check_all" name="check_all"></th>
				<th class="sorting"><?php echo $this->Paginator->sort('id', 'S.No'); ?></th>
				<th class="sorting"><?php echo $this->Paginator->sort('page_name', 'Page Name'); ?></th>
				<th class="sorting"><?php echo $this->Paginator->sort('url_key','Slug'); ?></th>
				<th class="sorting"><?php echo $this->Paginator->sort('status','Status'); ?></th>
				<th class="sorting"><?php echo $this->Paginator->sort('created'); ?></th>
				<th class="sorting"><?php echo $this->Paginator->sort('modified'); ?></th>
				<th class="sorting"><?php echo __('Action'); ?></th>
				
			  </tr>  
	  <tr>
		<td colspan="10">
			<div class="col-sm-12 text-right">
			<div class="col-sm-11">
				<select name="option" class="form-control selectAction">
					<option value=""><?php echo __('Select Option'); ?></option>
					<option value="active"><?php echo __('Activate'); ?></option>
					<option value="deactive"><?php echo __('Deactivate'); ?></option>
					
				</select>
			</div>
			<div class="col-sm-1">
				<div class="black_btn2">
					<span class="upper">
						<input type="submit" value="SUBMIT" name="" class="btn submit_action">
					</span>
				</div>
			</div>
			</div>
		</td>
	  </tr>
      </tfoot>
      </table>
	  <?php echo $this->Form->end();?>
      </div>
      </div>
        <div class="row">
          <div class="col-sm-5">
            <div class="dataTables_info" id="example1_info" role="status" aria-live="polite">Showing <?php echo $this->Paginator->counter(['format'=>'range']); ?> entries</div>
          </div>
          <div class="col-sm-7">
            <div class="dataTables_paginate paging_simple_numbers" id="example1_paginate">
            <?php echo $this->element('pagination'); ?>
            </div>
          </div>
        </div>
      </div>
    </div>
      <div class="box-footer">&nbsp;</div>
    </div>
 
</section>
<style>
    .glyphicon.glyphicon-calendar {
    float: right;
    left: 89%;
    position: absolute;
    top: 29px;
}
    </style>
<script>
	$(document).ready(function() {
		$('.submit_action').click(function(){
			if(!triggerAction("dataListing"))
			{
				return false;
			}
		});

		$('#refresh').click(function(){
	        $('#search').val('');
	        window.location.replace("<?php echo $this->webroot; ?>admin/cms/index"); 
       
    	});
	});
</script>