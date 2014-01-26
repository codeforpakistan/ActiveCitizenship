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
   
    <!-- End Slider -->
    <!-- Features -->
	<section class="items tips first generic-section text-center">
		<div class="container">    	
        	
		<h2 style="display:block"><?php echo $report->reports_title?></h2>
		<p class="intro-text"><em><?php echo $report->reports_description?></em></p>
		<div class="clear"></div>
		<div class="row-fluid span12">
        	<table class="table table-border">
            	<tr>
                	<th style="background:white">Reported Date</th>
                    <td style="background:#ccc"><?php echo date("d-m-Y",strtotime($report->reports_date))?></td>
                </tr>
                <tr>
                	<th style="background:white">Reported Status</th>
                    <td style="background:#ccc">In Progress</td>
                </tr>
                <tr>
                	<th style="background:white">Reported Response</th>
                    <td style="background:#ccc">Not Yet Received</td>
                </tr>
                
            </table>
        </div>
        </div>
	</section><!-- .container -->
    
	<!-- end Features -->
    

    <!-- Why -->
	
	<!-- end Why -->


     <!--Testimonials-->
     <!--<section class="testimonials">
     	<?php		//$this->load->view("includes/testimonial")	?>
     </section>-->
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
<script type="text/javascript">
					
				</script>