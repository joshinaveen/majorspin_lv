 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
       <?php echo $page;; ?>
      </h1>
    
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- SELECT2 EXAMPLE -->
      <div class="box box-default">
        <div class="box-header with-border">
          <h3 class="box-title"></h3>

          <div class="box-tools pull-right">
          
          </div>
        </div>
        <!-- /.box-header -->
        <?php echo $this->Form->create('Cms',array('type'=>'file','id'=>'form')); ?>
        <div class="box-body">
          <div class="row">
            <div class="col-md-6">
            
              <div class="form-group">
                <label>Page Name</label>
             <?php echo $this->Form->input('page_name',array('class' => 'form-control  validate[required]', 'label' => false,  'div' => false));  ?>
              </div> 
                <div class="form-group">
                <label>Page Url</label>
             <?php echo $this->Form->input('url_key',array('class' => 'form-control  validate[required]', 'label' => false,  'div' => false));  ?>
              </div> 
                <div class="form-group" style="width:1000px">
                <label>Content</label>
             <?php echo $this->Form->input('content',array('class' => 'form-control  validate[required] ckeditor', 'label' => false,  'div' => false,'style'=>'width:1000px'));  ?>
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

    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <script>
  $(function(){
      $('.ckeditor').ckeditor({   width: "1000px",}); 
  });
  </script>
      
      
  