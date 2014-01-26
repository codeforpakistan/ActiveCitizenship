<!DOCTYPE html>
<html lang="en">

<head>
   	<?php		$this->load->view("includes/header");	?>


</head>


<body>

	<header>
			<?php		$this->load->view("includes/topsection")	?>    	
    </header>
    
		    
    <!-- Slider -->
    <section class="join-form">
    	<div class="slider-container">
		    <ul class="rslides" id="slider">
			  <li><img src="<?php echo base_url()?>files/img/slider/1.jpg"  alt="//"/></li>
			  <li><img src="<?php echo base_url()?>files/img/slider/2.jpg"  alt="//"/></li>
			  <!--<li><img src="<?php echo base_url()?>files/img/slider/img-3.jpg"  alt="//"/></li>-->
		    </ul>
	    </div>
	    <div class="container">
	    	<div class="row-fluid">
	    		<div class="span12">
	    			<div class="form-container pull-right box animated pulse">
                 
		    			<form id="" action="<?php echo base_url()?>home/add/" method="post" accept-charset="utf-8">
						   <fieldset>
						    
						    <legend class="text-center nb nm"><span>Your Voice</span></legend>
						    <p class="text-center">Please Submit your Issue Here</p>
						     <div class="row-fluid">
						       <?php
									if(isset($message) && $message!="")
										echo ' <div style="background:white; text-align:center; color:black; padding:10px;font-family:arial; font-size:16px display:block">'.urldecode($message).'</div>';
								?>
								</div>
						   
                            
						    <div class="row-fluid">
						    	<div class="span12">	
						    		<div class="row-fluid">
                                     <?php echo form_dropdown('area_id', $areas, isset($area_id)?$area_id:"",'id="country_id"'); ?>
									   
									</div>
						    	</div>
						    </div>
                              <div class="row-fluid">
						    	<div class="span12">	
						    		<div class="row-fluid">
                                     <?php echo form_dropdown('reports_type',array(''=>'Issue Type','Personal'=>'Personal' ,'Community'=>'Community','Development'=>'Development'), isset($area_id)?$area_id:"",'id="country_id"'); ?>
									   
									</div>
						    	</div>
						    </div>
                             <div class="row-fluid">
						    	<div class="span12">
								    <label class="no">What Problem you have faced?</label>
								    <input type="text" name="reports_title" placeholder="What Problem you have faced?">
						    	</div>
						    </div>
                             <div class="row-fluid">
						    	<div class="span12">
								    <label class="no">Any Details ?</label>
								    <textarea name="reports_description" placeholder="Any Details ?" rows="4"></textarea> 
						    	</div>
						    </div>
                              <div class="row-fluid">
	                            <div class="span12">	
						    		<div class="row-fluid">
                                     <?php echo form_dropdown('report_section', $sections, isset($report_section)?$report_section:"",'id="country_id"'); ?>
									   
									</div>
						    	</div>
                               </div>
                            
                             <div class="row-fluid">
						    	<div class="span12">
								    <label class="no">Contact Number</label>
								    <input type="text" name="reports_contact" placeholder="Contact Number">
						    	</div>
						    </div>
                             <div class="row-fluid">
						    	<div class="span12">
								    <label class="no">Image</label>
								    <input type="file" name="reports_image" placeholder="Contact Number">
						    	</div>
						    </div>
						    
                            
						   
						    
						    		
				    		<div class="formFoot">
				    			<button type="submit" class="btn">Submit Complaint</button>
				    			<span class="leftSide">
				    				
				    			</span>
				    			<span class="rightSide">
				    				
				    			</span>
				    		</div>
				    		
								    
						    <span class="help-block text-center footForm"></span>

						  </fieldset>
						</form>
	    			</div>	    			
	    		</div>
	    	</div>
	    </div>
    </section>
    <!-- End Slider -->
    
    
    <!-- Features -->
	<section class="items tips first generic-section  text-center">
		<div class="container">    		
		<h2 class="left">Now You Can Record your Voice Online</h2>
		<p class="intro-text right"><em>You just need to submit your complaint and that complaint will be available online to all public, moreover your complaints will be forwarded to concerned authorities periodically.</em></p>
		<div class="clear"></div>
		<div class="row-fluid bottom">
        	<div class="span3 item first">
            	<span class="ico"><img src="<?php echo base_url()?>files/img/features/ico1.png" alt="icon" /></span>
                <h4>1. Submit Complaint </h4>
                <p>You can submit your complaint online. we will not expose your personal details.</p>
            </div>
            <div class="span3 item second">
            	<span class="ico"><img src="<?php echo base_url()?>files/img/features/ico2.png" alt="icon" /></span>
                <h4>2.Report Acknowledgement </h4>
                <p> Lorem ipsum dolor sit amet, consecteturo eiusmod tempor.</p>
            </div>
            <div class="span3 item third">
            	<span class="ico"><img src="<?php echo base_url()?>files/img/features/ico3.png" alt="icon" /></span>
                <h4>3. View Stats Online</h4>
                <p>Track Progress of your complaint online</p>
            </div>
            <div class="span3 item last">
            	<span class="ico"><img src="<?php echo base_url()?>files/img/features/ico4.png" alt="icon" /></span>
                <h4>4. Start Sharing</h4>
                <p>Be a part with us to spread aware and empower citizen.</p>
            </div>
        </div>
        </div>
	</section><!-- .container -->
	<!-- end Features -->
    

    <!-- Why -->
	<section class="items tips why generic-section  text-center">
		<?php		//$this->load->view("includes/categories")	?>
	</section><!-- .container -->
	<!-- end Why -->


     <!--Testimonials-->
     <section class="testimonials">
     	<?php		$this->load->view("includes/testimonial")	?>
     </section>
     <!--End Testimonials-->
    
    
    
    
	<!--Video List-->
     <section class="video generic-section  text-center">
     	<?php	//	$this->load->view("includes/video")	?>
     </section>  
     <!--End Video List-->    
    
    
    
	<!--Image Gallery-->
	<!--<section class="generic-section wall text-center">
		<?php	//	$this->load->view("includes/wall")	?>
	</section>-->
	<!-- End Image Gallery-->
    
       
    
    <!--Pricing-->
   <!-- <section class="pricing text-center generic-section">
    	<?php	//	$this->load->view("includes/pricing");	?>
    </section>-->
    <!-- end pricing --> 
    
    
    
    
    <!--Newsletter-->
     <section class="newsletter">
     	<?php		$this->load->view("includes/newsletter");	?>
     </section>
     <!--End Newsletter-->
    
    <!--Footer-->
	 <div class="footer">
		 	<?php		$this->load->view("includes/generic");	?>
	</div>
	<!-- End Footer -->  
        	
    
    <!--Copyright-->
	 <div class="copy">
     	<?php		$this->load->view("includes/copyrights");	?>
	</div>
    <!--End Copyright-->
 
	    
<?php		$this->load->view("includes/footer");	?>

</body>
</html>