
<div class="container-fluid">
  <div class="container-fluid video">
	<video poster="#" id="bgvid" playsinline autoplay muted loop>
	<!-- -->
	<source src="https://drive.google.com/uc?export=download&id=0B-ldJJbw0AnkTmZCT0E1S0pwZFk" type="video/mp4">
	</video>
  </div>
	

	<div id="polina" class="col-sm-6">
	<h4 class="text-center">Register as a New Seller</h4>
	<div class="social text-center">
	<div class="row">
	<div class="col-sm-6">
        <a class="btn btn-block btn-social btn-facebook" onclick="_gaq.push(['_trackEvent', 'btn-social', 'click', 'btn-facebook']);">
            <span class="fa fa-facebook"></span> Sign Up
        </a>
    </div>
    <div class="col-sm-6">
    <a class="btn btn-block btn-social btn-google" onclick="_gaq.push(['_trackEvent', 'btn-social', 'click', 'btn-google']);">
        <span class="fa fa-google"></span> Sign up
    </a>
    </div>
	</div>
	</div>
	<div class="text-center">
		<h5>OR</h5>
	</div>
	
	<?php echo  $this->Form->create('User',array('method'=>'POST','url'=>array('controller'=>'logins','action'=>'register'),'class'=>'form-horizontal')); ?>
    <div class="form-group has-success has-feedback">
      <div class="col-sm-12">
      
		<?php echo $this->Form->input('firstname',array('type'=>'text','class'=>'form-control','placeholder'=>'Name','required'=>true,'label'=>false)); ?>
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
    </div>
     <div class="form-group has-success has-feedback">
      <div class="col-sm-12">
       
		<?php echo $this->Form->input('email',array('type'=>'text','class'=>'form-control','placeholder'=>'Email','required'=>true,'label'=>false)); ?>
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
    </div>
     <div class="form-group has-success has-feedback">
      <div class="col-sm-12">
        
		<?php echo $this->Form->input('phone_no',array('type'=>'text','class'=>'form-control','placeholder'=>'Mobile Number','required'=>true,'label'=>false)); ?>
        <span class="glyphicon glyphicon-phone form-control-feedback"></span>
      </div>
    </div>
     <div class="form-group has-success has-feedback">
      <div class="col-sm-12">
       
		<?php echo $this->Form->input('password',array('type'=>'password','class'=>'form-control','placeholder'=>'Password','required'=>true,'label'=>false)); ?>
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
    </div>
  <div class="text-center">
  <p class="text-center">By signing up, you agree to our <a href="#">T&C</a> and <a href="#">privacy policy</a></p>
  
  <?php echo $this->Form->submit('START SELLING',array('class'=>'btn sellBtn btn-success')); ?>
  </div>
  <?php echo $this->Form->end(); ?>
  <br>
  <?php echo $this->session->flash();?>
   <div class="text-right">
   <p>Already Registered?<a href="#"> Login Here </a></p>
  </div>
  
</div>

<style>
@import url("https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css");

.logo{
  position: absolute;
  width: 200px;
  margin: -12px 0px 0px -12px;
  padding: 0px
}
.headText{
  font-family: Agenda-Light, Agenda Light, Agenda, Arial Narrow, sans-serif;
  font-weight:100; 
  margin: 15% auto 0 5%;
  color: white;
}
.headText h1:before{
    font-family: FontAwesome;
    content: "\f18c";
    color: green;
    margin: 5px;
}
.headText h1:after{
    font-family: FontAwesome;
    content: "\f18c";
    color: green;
    margin: 5px;
}
#polina {
    background: rgba(0, 0, 0, 0.7) none repeat scroll 0 0;
    color: white;
    float: right;
    font-family: Agenda-Light,Agenda Light,Agenda,Arial Narrow,sans-serif;
    font-weight: 100;
    margin: 3% 5% 5% auto;
    padding: 2%;
    position: absolute;
    right: -65px;
    top: 26px;
    width: 31%;
	z-index:99;
}
.btn-facebook{
	background-color: #3b5998;
	color: #fff;
}
.btn-facebook:hover{
	background-color: #fff;
	color: #3b5998;
}
.btn-google{
	background-color: #c23321;
	color: #fff;
}
.btn-google:hover{
	background-color: #fff;
	color: #c23321;
}

@media screen and (max-width: 500px) { 
  #polina{
    width:90%;
    margin-top: -50% !important;
  } 
  video{
    display: none;
  }
}
@media screen and (max-device-width: 800px) {
  #bgvid { display: none; }
}
</style>
<div class="about">
	<div class="container">
		<div class="heading">
			<h1 class="wow fadeIn"  data-wow-duration="1s">About us</h1>
		</div>
		<div class="row">
			<div class="col-md-6">
				<?php if(isset($about_content) && $about_content!=''){ echo $about_content['Cms']['content']; }?>

			</div>
			<div class="col-md-6">
				<iframe  data-wow-duration="1s" width="100%" height="300px" src="<?php echo $about_content['Cms']['media_url']; ?>" frameborder="0" allowfullscreen></iframe>
			</div>
		</div>
	</div>
</div>

<div class="service">
	<div class="container">
		<div class="heading">
			<h1 class="wow fadeIn"  data-wow-duration="1s">Our Services</h1>
		</div>
		<div class="row">
			<?php if(isset($services) && !empty($services) && sizeOf($services['SubPage']>0)){
				  foreach($services['SubPage'] as $service):
			?>
			<div class="col-md-3">
				<div class="icon wow rotateIn"  data-wow-duration=".5s"><img src="<?php echo $this->webroot;  ?>img/services/<?php echo $service['image'] ?>"></div>
				<p class="wow slideInUp"  data-wow-duration="1s"><?php echo $service['content']; ?></p>
			</div>
			
			<?php endforeach; }else{ ?>
			<p class="wow slideInUp"  data-wow-duration="1s">No Services Found</p>
			<?php } ?>
		</div>
	</div>
</div>

<div class="price">
	<div class="container">
		<div class="heading">
			<h1 class="wow fadeIn"  data-wow-duration="1s">Price Details</h1>
		</div>
		<div class="row">
			<div class="col-md-10 col-md-offset-1">
				<div class="row">
				<?php if(isset($prices) && !empty($prices) && sizeOf($prices>0)){
				  foreach($prices as $price): $class=strtolower($price['Price']['title']);
					?>
					<div class="col-md-4">
						<div class="price-box wow zoomIn <?php echo $class; ?>"  data-wow-duration="1s">
							<h1><?php echo $price['Price']['title']; ?></h1>
							<?php echo $price['Price']['content']; ?>
							<div class="cost">$<?php echo $price['Price']['price']; ?></div>
						</div>
						<center><a href="" class="wow fadeIn"  data-wow-duration="1s">BUY</a></center>
					</div>
					
					
				<?php endforeach; } ?>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="testimonials">
	<div class="container">
		<div class="heading">
			<h1 class="wow fadeIn"  data-wow-duration="1s">Testimonials</h1>
		</div>
		<div class="testimonials-slider wow zoomIn"  data-wow-duration="1s">
			<div id="testimonials" class="owl-carousel owl-theme">
			<?php if(isset($testimonials) && !empty($testimonials) && sizeOf($testimonials>0)){
				  foreach($testimonials as $testi):
					?>
				<div class="item">
					<figure>
						<img src="<?php echo $this->webroot;  ?>img/testimonialPics/<?php echo $testi['Testimonial']['user_image']; ?>">
						<h2><?php echo $testi['Testimonial']['name']; ?></h2>
						<h3><?php echo date('j F Y',strtotime($testi['Testimonial']['created'])); ?></h3>
					</figure>
					<div class="right">
						<i class="fa fa-quote-left" aria-hidden="true"></i> <i class="fa fa-quote-right" aria-hidden="true"></i>
						<p><?php echo $testi['Testimonial']['content']; ?></p>
					</div>
				</div>
			<?php endforeach; } ?>
			
			</div>
			<div class="prev" id="next1"><a href="javascript:void(0)"><i class="fa fa-angle-left"></i></a></div>
			<div class="next" id="prev1"><a href="javascript:void(0)"><i class="fa fa-angle-right"></i></a></div>
		</div>
	</div>
</div>
<div class="clients">
	<div class="container">
		<div class="heading">
			<h1 class="wow fadeIn"  data-wow-duration="1s">Our Clients</h1>
		</div>
		<div class="clients-slider wow zoomIn"  data-wow-duration="1s">
			<div id="clients" class="owl-carousel owl-theme">
			<?php if(isset($clients) && !empty($clients) && sizeOf($clients>0)){
				  foreach($clients as $client):
					?>
				<div class="item"><a href="<?php echo $client['Client']['url'];?>"><img src="<?php echo $this->webroot;  ?>img/clientsLogo/<?php echo $client['Client']['logo'];?>" alt="<?php echo $client['Client']['name'];?>" title="<?php echo $client['Client']['name'];?>" /></a></div>
			<?php endforeach; } ?>	
			</div>
			<div class="prev" id="prev"><a href="javascript:void(0)"><i class="fa fa-angle-left"></i></a></div>
			<div class="next" id="next"><a href="javascript:void(0)"><i class="fa fa-angle-right"></i></a></div>
		</div>
	</div>
</div>