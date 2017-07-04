

    <!-- Content Header (Page header) -->
    <?php echo $this->session->flash();?>
    <section class="content-header">
	<?php $id = $this->params['pass']['0']; ?>
      <h1>Manage SubPages 
      <div class="box-tools pull-right">
        <?php
          echo $this->Html->link('<i class="fa fa-plus"></i> Add New', 
                                ['action' => 'add_subpage',$id], 
                                ['escape' =>false, 'class' => 'btn btn-primary btn-sm']);
        ?>
		<?php
          echo $this->Html->link('<i class="fa fa-list"></i> View Cms', 
                                ['action' => 'admin_index'], 
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
			
        </div>
      </div>
      </div>
           
      <div class="row">
      <div class="col-sm-12">
      <?php echo $this->Form->create('SubPage',['class'=>'dataListing']);?>
	  <table id="example1" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">
		  <thead>
			  <tr role="row">
				<th><input type="checkbox" value="check_all" class="check_all" name="check_all"></th>
				
				<th class="sorting"><?php echo $this->Paginator->sort('page_name', 'Page Name'); ?></th>
				<th class="sorting"><?php echo $this->Paginator->sort('image','Image'); ?></th>
				<th class="sorting"><?php echo $this->Paginator->sort('show_at_home','Show On Frontend'); ?></th>
				
				<th class="sorting"><?php echo __('Action'); ?></th>
				
			  </tr>  
		  </thead>
      <tbody>
      <?php 
      if(!empty($subpages))
      {
		
        foreach($subpages as $subpage)
        { 
			if($subpage['SubPage']['show_at_home']==1){ $show = 'Yes';}else{ $show = 'No';}
          ?>
            <tr role="row">
              <td valign="middle"><input class = "check-box-select" type="checkbox" value="<?php echo $subpage['SubPage']['id']; ?>" name="ids[]"></td>
           
			 <td><?php echo $subpage['Cms']['page_name']?></td>
               <td><?php if(isset($subpage['SubPage']['image']) && $subpage['SubPage']['image'] !=''){ ?>
                
                       <img src="<?php echo $this->webroot; ?>img/services/<?php echo $subpage['SubPage']['image']; ?>" class="img-rounded img-thumbnail" alt="<?php echo $subpage['SubPage']['image'] ; ?>" width="50" height="50">
                  
                    <?php 
                  }else{ ?>  
                       <img src="<?php echo $this->webroot; ?>img/services/no_image.png" class="img-rounded img-thumbnail" alt="<?php echo $subpage['SubPage']['image'] ; ?>" width="50" height="50"><?php 
                  }?></td>
              <td><?php if($show=='Yes'){echo '<span class="label label-success">Yes</span>';}
                elseif($show=='No'){ echo '<span class="label label-warning">No</span>';}
                ?></td>
             
                         
			  <td valign="middle" >&nbsp;
				<?php 
					echo $this->Html->link('<span class="glyphicon glyphicon-pencil"></span>', 
					array('prefix' => 'admin', 'action' => 'edit_subpage',$subpage['SubPage']['id'],$subpage['SubPage']['cms_id']), 
					array('escape' => false,'data-original-title'=>'Edit SubPage','data-toggle'=>'tooltip')); 
				?>
				
				
				&nbsp;&nbsp;
				<!--<a href="<?php echo $this->webroot; ?>admin/cms/delete_section/<?php echo $subpage['SubPage']['id']; ?>" data-original-title="Remove Section" data-toggle="tooltip" ><i class="fa fa-trash"></i></a>-->
				<a class="viewclass" data-toggle="tooltip" data-original-title="Remove subpage" onclick="delete_row(<?php echo  $subpage['SubPage']['id'] ; ?>,'cms','delete_section')" href="javascript:void(0)"><i class="fa fa-trash"></i></a>
                               
                               
				  
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
				
				<th class="sorting"><?php echo $this->Paginator->sort('page_name', 'Page Name'); ?></th>
				<th class="sorting"><?php echo $this->Paginator->sort('image','Image'); ?></th>
				<th class="sorting"><?php echo $this->Paginator->sort('show_at_home','Show On Frontend'); ?></th>
				
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

		$('#refresh').click(function(){
	        $('#search').val('');
	        window.location.replace("<?php echo $this->webroot; ?>admin/cms/page_section"); 
       
    	});
	});
</script>