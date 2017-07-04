<!-- Content Header (Page header) -->
    <section class="content-header">
      <h1><?php echo $page; ?>
        <div class="box-tools pull-right">
          <?php
          echo $this->Html->link('<i class="fa fa-list"></i> View All', 
                                ['action' => 'admin_prices'], 
                                ['escape' =>false, 'class' => 'btn btn-primary btn-sm']);
        ?>
          </div>
      </h1>
    
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- SELECT2 EXAMPLE -->
      <div class="box box-warning">
        <div class="box-header with-border">
          <h3 class="box-title"></h3>

          
        </div>
        <!-- /.box-header -->
        <?php echo $this->Form->create('Price',array('type'=>'file','id'=>'form')); ?>
        <div class="box-body">
          <div class="row">
            <div class="col-md-6">
            
              <div class="form-group">
                <label>Title <span style="color:#f39c12;">*</span></label>
             <?php echo $this->Form->input('title',array('class' => 'form-control  validate[required]', 'label' => false,  'div' => false));  ?>
              </div> 
                
                <div class="form-group" style="width:1000px">
                <label>Content <span style="color:#f39c12;">*</span></label>
             <?php echo $this->Form->input('content',array('type'=>'textarea','class' => 'form-control  validate[required] ckeditor', 'label' => false,  'div' => false,'style'=>'width:1000px'));  ?>
              </div> 
			  
			  <div class="form-group">
                <label>Price <span style="color:#f39c12;">*</span></label>
             <?php echo $this->Form->input('price',array('class' => 'form-control  validate[required]', 'label' => false,  'div' => false));  ?>
              </div> 
              
              <div class="form-group">
              <label>Show <span style="color:#f39c12;">*</span></label>
             <?php echo $this->Form->input('show_at_home',array('type'=>'select','class' => 'form-control validate[required]', 'label' => false,'div' => false,'options'=>array('1'=>'Yes','0'=>'No')));  ?>
              </div>
           
            </div></div>
            <!-- /.col -->
            <div class="col-md-6">
              
           <div class="row">
        <div class="col-xs-8">
          <div class="checkbox icheck">
            <label>
              <div class="icheckbox_square-blue" style="position: relative;" aria-checked="false" aria-disabled="false"><input type="checkbox" style="position: absolute; top: -20%; left: -20%; display: block; width: 140%; height: 140%; margin: 0px; padding: 0px; background: rgb(255, 255, 255) none repeat scroll 0% 0%; border: 0px none; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: -20%; left: -20%; display: block; width: 140%; height: 140%; margin: 0px; padding: 0px; background: rgb(255, 255, 255) none repeat scroll 0% 0%; border: 0px none; opacity: 0;"></ins></div>
            </label>
          </div>
        </div>
        <!-- /.col -->
        <div class="col-xs-4">
          <button class="btn btn-primary btn-block btn-flat" type="submit">Submit</button>
        </div>
        <!-- /.col -->
      </div>
          </div>
            <!-- /.box-body -->
            <div class="box-footer">
           
            </div>
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col (right) -->
    </section>
      <!-- /.row -->