<?php 
	$keyword = isset($_GET['keyword']) ? $_GET['keyword'] : '';
	$page = isset($this->request->query['page']) ? $this->request->query['page'] : '1';
	$limit = isset($this->request->query['limit']) ? $this->request->query['limit'] : '20';
?>
<section class="content-header">
      <h1>Clients
        <div class="box-tools pull-right">
          <?php
          echo $this->Html->link('<i class="fa fa-plus"></i> Add New', 
                                ['prefix'=>'admin', 'action' => 'add_client'], 
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
      <?php echo $this->Form->create('Client',['class'=>'dataListing']);?>
	  <table id="example1" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">
		  <thead>
			  <tr role="row">
				<th><input type="checkbox" value="check_all" class="check_all" name="check_all"></th>
				<th class="sorting"><?php echo $this->Paginator->sort('id', 'S.No'); ?></th>
				<th class="sorting"><?php echo $this->Paginator->sort('logo', 'Company Logo'); ?></th>
				<th class="sorting"><?php echo $this->Paginator->sort('name', 'Company Name'); ?></th>
				<th class="sorting"><?php echo $this->Paginator->sort('url', 'Url'); ?></th>
				<th class="sorting"><?php echo $this->Paginator->sort('show_at_home', 'Show'); ?></th>
				<th class="sorting"><?php echo $this->Paginator->sort('created'); ?></th>
				<th class="sorting"><?php echo $this->Paginator->sort('modified'); ?></th>
				<th class="sorting"><?php echo __('Action'); ?></th>
				
			  </tr>
		  </thead>  
      <tbody>
      <?php 
      if(!empty($clients))
      {
		
        foreach($clients as $client)
        { if($client['Client']['show_at_home']==0){ $show = 'No';}else{ $show = 'Yes';}
          ?>
            <tr role="row">
              <td valign="middle"><input class = "check-box-select" type="checkbox" value="<?php echo $client['Client']['id']; ?>" name="ids[]"></td>
			  <td><?php echo $client['Client']['id']?></td>
              <td><?php if(isset($client['Client']['logo']) && $client['Client']['logo'] !=''){ ?>
                
                       <img src="<?php echo $this->webroot; ?>img/clientsLogo/<?php echo $client['Client']['logo']; ?>" class="img-rounded img-thumbnail" alt="<?php echo $client['Client']['logo'] ; ?>" width="50" height="50">
                  
                    <?php 
                  }else{ ?>  
                       <img src="<?php echo $this->webroot; ?>img/clientsLogo/no_image.png" class="img-rounded img-thumbnail" alt="<?php echo $client['Client']['logo'] ; ?>" width="50" height="50"><?php 
                  }?></td>
              <td><?php echo $client['Client']['name']?></td>
              <td><?php echo $client['Client']['url']?></td>
              <td><?php if($show=='Yes'){echo '<span class="btn btn-success btn-flat">Yes</span>';}
                elseif($show=='No'){ echo '<span class="btn btn-warning btn-flat">No</span>';}
                ?></td>
              <td><?php echo date('d-m-Y',strtotime($client['Client']['created'])); ?></td>
			  <td><?php echo date('d-m-Y',strtotime($client['Client']['modified'])); ?></td>
                         
			  <td valign="middle" >&nbsp;
				<?php 
					echo $this->Html->link('<span class="glyphicon glyphicon-pencil"></span>', 
					array('prefix' => 'admin', 'action' => 'add_client',$client['Client']['id']), 
					array('escape' => false,'data-original-title'=>'Edit Client','data-toggle'=>'tooltip')); 
				?>
				&nbsp;&nbsp;
				<a href="#" data-original-title="Remove this client" data-toggle="tooltip" onclick="delete_row('<?php echo $client['Client']['id']; ?>','home','delete_client')"><i class="fa fa-trash"></i></a>
                               
                               
				  
				</td>
				
            </tr>
          <?php
		 // $start ++;
        }  
      }else
      { 
        ?>
          <tr>
            <td colspan="10">No testimonial found</td>
          </tr>
        <?php
      }
      ?>
        </tbody>
      <tfoot>
      <tr role="row">
				<th><input type="checkbox" value="check_all" class="check_all" name="check_all"></th>
				<th class="sorting"><?php echo $this->Paginator->sort('id', 'S.No'); ?></th>
				<th class="sorting"><?php echo $this->Paginator->sort('logo', 'Company Logo'); ?></th>
				<th class="sorting"><?php echo $this->Paginator->sort('name', 'Company Name'); ?></th>
				<th class="sorting"><?php echo $this->Paginator->sort('url', 'Url'); ?></th>
				<th class="sorting"><?php echo $this->Paginator->sort('show_at_home', 'Show'); ?></th>
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
					<option value="show"><?php echo __('Show'); ?></option>
					<option value="hide"><?php echo __('Hide'); ?></option>
					<option value="delete"><?php echo __('Delete'); ?></option>
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
                $('.datepicker').datepicker();
         $('#refresh').click(function(){
          $('#search').val('');
          window.location.replace("<?php echo $this->webroot; ?>admin/home/clients"); 
         
      });       
	});
        
        
</script>
