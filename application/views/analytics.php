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
		<h2 style="display:block">Serarch Your Analytics Here</h2>
		<p class="intro-text"><em>Please select appropriate Section you want to search</em></p>
		<div class="clear"></div>
		<div class="row-fluid">
        	<form action="<?php echo base_url()?>home/analytics/" method="post" id="searchform">
            	<div class="span4 first">
                	<div class="row-fluid">
                                     <?php echo form_dropdown('area',$areas, isset($area_id)?$area_id:"",'id="area_id",onchange="$(\'#searchform\').submit()"'); ?>
									   
					</div>
                </div>
                <div class="span3  second">
                	<div class="row-fluid">
                                     <?php echo form_dropdown('city',$cities, isset($city_id)?$city_id:"",'id="city_id"'); ?>
									   
					</div>
                </div>
                <div class="span3 item third">
               	 <div class="row-fluid">
                                     <?php echo form_dropdown('constituency',$constiuencies, isset($constituency_id)?$constituency_id:"",'id="constituency_id"'); ?>
									   
					</div>
                </div>
                <div class="span2">
                	<input class="btn" type="submit" value="Serach">
                </div>
            </form>
        </div>
        <div class="row-fluid">
        	<div class="span4 item first">
            	<div class="completed" id="completed"></div>
            </div>
            <div class="span4 item second">
            	<div class="completed" id="inprogress"></div>
            </div>
            <div class="span4 item third">
            	<div class="completed" id="failed"></div>
            </div>
            
        </div>
        </div>
	</section><!-- .container -->
    <div class="row-fluid">
    	<div id="map4">
        	<iframe width="1600" height="350" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?f=q&amp;source=s_q&amp;hl=en&amp;geocode=&amp;q=Lahore,+Punjab,+Pakistan&amp;aq=0&amp;oq=lahore+&amp;sll=37.0625,-95.677068&amp;sspn=40.001301,86.572266&amp;ie=UTF8&amp;hq=&amp;hnear=Lahore,+Lahore+District,+Punjab,+Pakistan&amp;t=m&amp;z=10&amp;ll=31.54505,74.340683&amp;output=embed"></iframe>
        </div>
    </div>
	<!-- end Features -->
    

    <!-- Why -->
	<section class="items tips first generic-section text-center">
		<div class="container">    		
		<h2 style="display:block">Reports</h2>
		
		<div class="clear"></div>
		<div class="row-fluid">
          <div class="span12" style="margin:auto">
          		<?php
					if(count($issues)>0)
					{
						$i=1;
						?>
                        	 
	
                                <div class="widget-body" style="padding: 10px 0 0;">
                                    <table class="table table-bordered table-primary table-condensed">
                                        <thead>
                                            <tr style="background:white; color:black">
                                                <th class="center">ID.</th>
                                                <th>Title</th>
                                               
                                                <th>Status</th>
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                        	<?php foreach($issues->result_array() as $val){?>
                                            	<tr style="background:white">
                                                	<td><?php echo $val['reports_id']?></td>
                                                    <td><?php echo $val['reports_title']?></td>
                                                    <td><a href="<?php echo base_url()?>/home/view/<?php echo $val['reports_id']?>">View</a></td>
                                                    
                                                </tr>
                                            <?php } ?>
											
                                        </tbody>
                                    </table>
                                </div>
                        <?
					}
				?>
          </div>
         </div>
		<?php		//$this->load->view("includes/categories")	?>
      	</div>
        </div>
	</section><!-- .container -->
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