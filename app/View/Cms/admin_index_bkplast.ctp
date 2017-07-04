 <section class="content-header">
      <h1>
        CMS 
        <small>Management</small>
      </h1>
     
    </section>
	
	<style>
button.accordion {
    background-color: #367fa9;
    color: #fff;
    cursor: pointer;
    padding: 18px;
    width: 100%;
    border: none;
    text-align: left;
    outline: none;
    font-size: 15px;
    transition: 0.4s;
}

.formdata {
  border-bottom:1px #d2d6de !important;
    min-height: 400px !important;
    margin-top: 20px;
    width: auto;
}

button.accordion.active, button.accordion:hover {
    background-color: #367fa9;
}

button.accordion:after {
    content: '\002B';
    color: #fff;
    font-weight: bold;
    float: right;
    margin-left: 5px;
}

button.accordion.active:after {
    content: "\2212";
}

div.panel {
    padding: 0 18px;
    background-color: white;
    max-height: 0;
    overflow: hidden;
    transition: max-height 0.2s ease-out;
}
</style>

<style>
 /* Style the tab */
div.tab {
    overflow: hidden;
    border: 1px solid #ccc;
    background-color: #367fa9;
	color:white;
}

/* Style the buttons inside the tab */
div.tab button {
    background-color: inherit;
    float: left;
    border: none;
    outline: none;
    cursor: pointer;
    padding: 14px 16px;
    transition: 0.3s;
}

/* Change background color of buttons on hover */
div.tab button:hover {
    background-color: #ddd;
}

/* Create an active/current tablink class */
div.tab button.active {
    background-color: #ccc;
}

/* Style the tab content */
.tabcontent {
    display: none;
    padding: 1px 18px;
    border: 1px solid #ccc;
    border-top: none;
	background-color: white;
	    min-height: 630px;
} 
</style>

<section class="content">
      <div class="row">
        <div class="col-xs-12">


<button class="accordion">About us</button>
<div class="panel">
<div class="formdata">
  <?php echo $this->Form->create('Cms',array('type'=>'file','id'=>'aboutform','class'=>'form-horizontal','default'=>false)); ?>  
    
						<?php if(isset($aboutus)){ ?>
                        <input type="hidden" value="<?php echo $aboutus['Cms']['id']; ?>" id="about-id" name="data[Cms][id]">
						
                        <div class="form-group">

                                <label class="col-lg-2 col-sm-4 control-label">Page Name</label>

                                <div class="col-lg-10">
                                <?php echo $this->Form->input('page_name',array('type'=>'text','class' => 'form-control', 'label' => false,  'div' => false ,'autocomplete'=>'off','placeholder'=>'Page Name','value'=>$aboutus['Cms']['page_name']));  ?>
                                 </div>

                        </div>
                             <div class="form-group">

                                <label class="col-lg-2 col-sm-4 control-label">Url key</label>

                                <div class="col-lg-10">
                                <?php echo $this->Form->input('url_key',array('class' => 'form-control', 'label' => false,  'div' => false ,'autocomplete'=>'off','placeholder'=>'Url Key','value'=>$aboutus['Cms']['url_key']));  ?>
                                 </div>

                        </div>
                             <div class="form-group">

                                <label class="col-lg-2 col-sm-4 control-label">Content</label>

                                <div class="col-lg-10">
                                <?php echo $this->Form->input('content',array('class' => 'form-control  validate[required] ckeditor', 'label' => false,  'div' => false,'value'=>$aboutus['Cms']['content']));  ?>
                                 </div> 

                        </div>
						<div class="form-group">

                                <label class="col-lg-2 col-sm-4 control-label">Page Media Url</label>

                                <div class="col-lg-10">
                                <?php echo $this->Form->input('media_url',array('class' => 'form-control', 'label' => false,  'div' => false ,'autocomplete'=>'off','placeholder'=>'Media Url','value'=>$aboutus['Cms']['media_url']));  ?>
                                 </div>

                        </div>

                       
						
						<?php }else{ ?>
						
						<div class="form-group">

                                <label class="col-lg-2 col-sm-4 control-label">Page Name</label>

                                <div class="col-lg-10">
                                <?php echo $this->Form->input('page_name',array('type'=>'text','class' => 'form-control', 'label' => false,  'div' => false ,'autocomplete'=>'off','placeholder'=>'Page Name'));  ?>
                                 </div>

                        </div>
                         <div class="form-group">

                                <label class="col-lg-2 col-sm-4 control-label">Url key</label>

                                <div class="col-lg-10">
                                <?php echo $this->Form->input('url_key',array('class' => 'form-control', 'label' => false,  'div' => false ,'autocomplete'=>'off','placeholder'=>'Url Key'));  ?>
                                 </div>

                        </div>
                             <div class="form-group">

                                <label class="col-lg-2 col-sm-4 control-label">Content</label>

                                <div class="col-lg-10">
                                <?php echo $this->Form->input('content',array('class' => 'form-control  validate[required] ckeditor', 'label' => false,  'div' => false));  ?>
                                 </div>

                        </div>
						<div class="form-group">

                                <label class="col-lg-2 col-sm-4 control-label">Page Media Url</label>

                                <div class="col-lg-10">
                                <?php echo $this->Form->input('media_url',array('class' => 'form-control', 'label' => false,  'div' => false ,'autocomplete'=>'off','placeholder'=>'Media Url'));  ?>
                                 </div>

                        </div>
						
						<?php } ?>

                        <div class="form-group">

                                <div class="col-lg-offset-2 col-lg-10">
										<?php echo $this->Form->submit('Save Page',array('class'=>'btn btn-info','id'=>'edit-user','onclick'=>"addcontent('aboutform')")); ?>
                                </div>

                        </div>
						
						

                        <div id="result"></div>

						<?php echo $this->Form->end(); ?>
</div>						
</div>


<button class="accordion">Services</button>
<div class="panel">
<?php if(isset($subservices)){ $j=1; foreach($subservices as $service): 
$id  = 'service'.$j; ?>

<div class="formdata">
  <?php echo $this->Form->create('SubService',array('type'=>'file','id'=>$id,'class'=>'form-horizontal','default'=>false)); ?>         
						
                        <input type="hidden" value="<?php echo $service['SubService']['id']; ?>" id="about-id" name="data[SubService][id]">
						<input type="hidden" value="<?php echo $service['SubService']['cms_id']; ?>" id="about-id" name="data[SubService][cms_id]">
                        <div class="form-group">

                                <label class="col-lg-2 col-sm-4 control-label">Content</label>
								<div class="col-lg-10">
                                <?php echo $this->Form->input('content',array('class' => 'form-control  validate[required] ckeditor','style'=>'height:200px;', 'label' => false,  'div' => false,'value'=>$service['SubService']['content']));  ?>
                                 </div> 
						</div>
						
						
						
						
				<?php if(!empty($service['SubService']['image'])){ ?>
               <div class="form-group">
                <label class="col-lg-2 col-sm-4 control-label">Image</label>

                                <div class="col-lg-10">
                <?php echo $this->Form->input('image',array('type'=>'file','class' => 'form-control','label' => false,'onchange'=>'readURL(this,"'.$j.'")','div' => false));  
                ?>
                 
                  <img id='userimage<?php echo $j;?>' class="compPic img-thumbnail" style="margin-top:5px;" src="<?php echo $this->webroot; ?>img/services/<?php echo $service['SubService']['image']; ?>">
               </div>
              </div> 
			  <?php }else{ ?>
			  <div class="form-group">
                <label class="col-lg-2 col-sm-4 control-label">Image <span style="color:#f39c12;">*</span></label>
                  <div class="col-lg-10">
                <?php echo $this->Form->input('image',array('type'=>'file','class' => 'form-control','label' => false,'onchange'=>'readURL(this,"'.$j.'")', 'div' => false));  
                ?>
                 
                <img id='userimage<?php echo $j;?>' class="compPic img-thumbnail" style="margin-top:5px;">
                </div>
              </div> 
				<?php } ?>

                        <div class="form-group">

                                <div class="col-lg-offset-2 col-lg-10">
								<?php echo $this->Form->submit('Save Page',array('class'=>'btn btn-info','id'=>'edit-user','onclick'=>"addservice('".$id."','".$j."')")); ?>
                                </div>

                        </div>
						
						<div id="servicedata<?php echo $j; ?>"></div>
						<?php echo $this->Form->end(); ?>
</div>


<?php $j++; endforeach; } ?>
</div>

</section>



<script>
var acc = document.getElementsByClassName("accordion");
var i;

for (i = 0; i < acc.length; i++) {
  acc[i].onclick = function() {
    this.classList.toggle("active");
    var panel = this.nextElementSibling;
    if (panel.style.maxHeight){
      panel.style.maxHeight = null;
    } else {
      panel.style.maxHeight = panel.scrollHeight + "px";
    } 
  }
}
</script>
 <script>

	  
function addcontent(id){
    var url = '<?php echo $this->webroot; ?>cms/ajax_addcms'; // the script where you handle the form input.
	$.ajax({  
           type: "POST",
           url: url,
           data: $("#"+id).serialize(), // serializes the form's elements.
           success: function(data)
           {
			   $('#result').html(data);
              
           }
         });
} 

function addservice(id,value){
	var formData = new FormData($('#'+id)[0]);

    var url = '<?php echo $this->webroot; ?>cms/ajax_addservice'; // the script where you handle the form input.
	
    $.ajax({  
           type: "POST",
           url: url,
           data: formData, // serializes the form's elements.
		    contentType: false,
			processData: false,
           success: function(data)
           {	$('#servicedata'+value).html(data);
                // show response from the php script.
           }
         });
} 

function readURL(input,id){
      if(input.files && input.files[0]){
         var reader = new FileReader();

         reader.onload = function(e){
            $('#userimage'+id).attr('src',e.target.result);
         }

         reader.readAsDataURL(input.files[0]);
      }
    }

function openService(evt, service) {
    // Declare all variables
    var i, tabcontent, tablinks;

    // Get all elements with class="tabcontent" and hide them
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }

    // Get all elements with class="tablinks" and remove the class "active"
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
    }

    // Show the current tab, and add an "active" class to the button that opened the tab
    document.getElementById(service).style.display = "block";
    evt.currentTarget.className += " active";
} 

  
  </script>

 