     
      <!-- Menu Toggle on mobile -->
      <button type="button" class="btn btn-navbar main"> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
      <div class="separator bottom"></div>
      <ul class="breadcrumb">
        <li><a href="<?php echo base_url()?>/welcome" class="glyphicons home"><i></i> Dashboard</a></li>
        <li class="divider"></li>
        <li>City</li>
        <li class="divider"></li>
        <li><?php echo isset($subtitle)?$subtitle:""?></li>
      </ul>
      <div class="separator bottom"></div>
      <h3 class="glyphicons show_thumbnails_with_lines"><i></i><?php echo $subtitle?></h3>
      <form class="form-horizontal" action="<?php echo base_url()?>welcome/authorities/add/<?php echo isset($authorities_id)?$authorities_id:""?>" method="post" style="margin-bottom: 0;" id="validateCityForm" method="get" autocomplete="off" method="post" enctype="multipart/form-data">
        <h4>Please Fill Following Information Carefully</h4>
        <div class="row-fluid">
        <?php if(isset($error)){ ?>
        	<div class="error" style="background:red; color:white; padding:10px;">
            	<?php
						echo ($error);
				?>
				
            </div>
           <?php } ?>
		 <?php if(isset($message)){ ?>
        	<div class="error" style="background:green; color:white; padding:10px;">
            	<?php
						echo ($message);
				?>
				
            </div>
           <?php } ?>
        </div>
        <hr class="separator line" />
        <div class="row-fluid">
          <div class="span11">
         	 <div class="control-group">
              
               <input class="span12" id="authorities_id" name="authorities_id" type="hidden" value="<?php echo set_value('authorities_id', isset($authorities_id)?$authorities_id:""); ?>"/>
              
            </div>
            <div class="control-group">
              <label class="control-label" for="firstname">Authority Name</label>
             	<div class="controls">
               <input class="span12" id="authorities_name" name="authorities_name" type="text" value="<?php echo set_value('authorities_name', isset($authorities_name)?$authorities_name:""); ?>"/>
            </div>
           </div>
            <div class="control-group">
              <label class="control-label" for="firstname">Keywords</label>            
               
              <div class="controls">
                <input class="span12" id="authorities_keywords" name="authorities_keywords" type="text" value="<?php echo set_value('authorities_keywords', isset($authorities_keywords)?$authorities_keywords:""); ?>"/>
              </div>
            </div>  
            
             <div class="control-group">
              <label class="control-label" for="firstname">Contact Number</label>            
               
              <div class="controls">
                <input class="span12" id="authorities_number" name="authorities_number" type="text" value="<?php echo set_value('authorities_number', isset($authorities_number)?$authorities_number:""); ?>"/>
              </div>
            </div>
             <div class="control-group">
              <label class="control-label" for="firstname">Address</label>            
               
              <div class="controls">
                <input class="span12" id="authorities_address" name="authorities_address" type="text" value="<?php echo set_value('authorities_address', isset($authorities_address)?$authorities_address:""); ?>"/>
              </div>
            </div>
             <div class="control-group">
              <label class="control-label" for="firstname">Twitter</label>            
               
              <div class="controls">
                <input class="span12" id="authorities_twitter" name="authorities_twitter" type="text" value="<?php echo set_value('authorities_twitter', isset($authorities_twitter)?$authorities_twitter:""); ?>"/>
              </div>
            </div>
             <div class="control-group">
              <label class="control-label" for="firstname">Facebook</label>            
               
              <div class="controls">
                <input class="span12" id="authorities_facebook" name="authorities_facebook" type="text" value="<?php echo set_value('authorities_facebook', isset($authorities_facebook)?$authorities_facebook:""); ?>"/>
              </div>
            </div>
          </div>
          
        </div>
        <hr class="separator line" />
        
        <div class="separator"></div>
        <div class="form-actions">
          <button type="submit" class="btn btn-icon btn-primary glyphicons circle_ok"><i></i>Save</button>
          <button type="button" class="btn btn-icon btn-default glyphicons circle_remove"><i></i>Cancel</button>
        </div>
      </form>
     <h3 class="glyphicons show_thumbnails"><i></i> Existing Authorities</h3>
  <div class="widget widget-4 widget-body-white">
	
	<div class="widget-body" style="padding: 10px 0 0;">
		<table class="table table-bordered table-primary table-condensed">
			<thead>
				<tr>
					<th class="center">City.</th>
					<th>Authority Name</th>
                   
					<th>Status</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
            	<?php 
					if(count($authorities->result_array())>0)
					{
						$sr=1;
						foreach($authorities->result_array() as $row)
						{
							
							?>
                            	<tr>
                                    
                                    <td><?php echo ucfirst(strtolower($row['authorities_name']))?></td>
                                    <td><?php //echo $row['country_name']?></td>
                                 
                                    <td><?php //echo $row['authorities_status']==1?"Active":"De-Active"?></td>
                                     <td>
                                     	<a href="<?php echo base_url()?>/welcome/constiuency/edit/<?php echo $row['authorities_id']?>">Edit</a> | 
                                       <!-- <?php if($row['constiuency_status']==1){ ?>
                                        <a href="<?php echo base_url()?>/welcome/constiuency/delete/<?php echo $row['authorities_id']?>">Delete</a>
                                        <?php } else { ?>
                                        	 <a href="<?php echo base_url()?>/welcome/constiuency/active/<?php echo $row['authorities_id']?>">Active</a>
                                        <?php } ?>-->
                                     </td>
                                </tr>
                            <?php
						}
						
					}
				?>
				
				
			</tbody>
		</table>
	</div>
</div>
