<div class="login-box-body">
    <p class="login-box-msg"></p>

    <?php   echo $this->Session->flash(); ?>
   <?php  echo $this->Form->create('User',array('url'=>array('controller'=>'users','action'=>'login')));?>
      <div class="form-group has-feedback">
      <input type="email" class="form-control" placeholder="Email" name="data[User][email]" value="<?= $email; ?>">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
       <input type="password" class="form-control" placeholder="Password" name="data[User][password]" value="<?= $password; ?>">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
    
    <div class="row">
        <div class="col-xs-8">
          <div class="checkbox icheck">
            <label class="">
              <div class="icheckbox_square-blue" style="position: relative;" aria-checked="false" aria-disabled="false">
                  <?= $this->Form->checkbox('remember_me', ['label' => false, 'hiddenField' => false, 'id' => 'remember_me','style'=>'position: absolute; top: -20%; left: -20%; display: block; width: 140%; height: 140%; margin: 0px; padding: 0px; background: rgb(255, 255, 255) none repeat scroll 0% 0%; border: 0px none; opacity: 0;']); ?>
                  <ins class="iCheck-helper" style="position: absolute; top: -20%; left: -20%; display: block; width: 140%; height: 140%; margin: 0px; padding: 0px; background: rgb(255, 255, 255) none repeat scroll 0% 0%; border: 0px none; opacity: 0;"></ins></div> Remember Me
            </label>
          </div>
        </div>
        <!-- /.col -->
        <div class="col-xs-4">
          <button type="submit" class="btn btn-primary btn-block btn-flat" type="submit">Sign In</button>
        </div>
        <!-- /.col -->
      </div>
    </form>

  </div>
  <!-- /.login-box-body -->