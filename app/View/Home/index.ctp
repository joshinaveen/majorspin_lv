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