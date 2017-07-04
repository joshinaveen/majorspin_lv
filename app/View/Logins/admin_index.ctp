<div class="login-box-body">
    <p class="login-box-msg"></p>

    <?php  echo $this->Session->flash(); ?>
   <?php  echo $this->Form->create('User',array('url'=>array('controller'=>'Logins','action'=>'index','prefix'=>'admin')));?>
      <div class="form-group has-feedback">
      <input type="email" class="form-control" placeholder="Email" name="data[User][email]">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
       <input type="password" class="form-control" placeholder="Password" name="data[User][password]">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row">
        <!-- /.col -->
		
        <div class="col-xs-4 col-md-4 ">
        <button type="submit" class="btn btn-primary btn-block btn-flat login_btn"> Sign In</button>
        
        </div><div class="col-xs-12 txt_rgt"><a href="#">I forgot my password</a></div>
        <!-- /.col -->
      </div>
    </form>

  </div>
  <!-- /.login-box-body -->