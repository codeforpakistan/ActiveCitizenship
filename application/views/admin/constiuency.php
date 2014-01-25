     
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
      <form class="form-horizontal" action="<?php echo base_url()?>welcome/constituency/add/<?php echo isset($constiuency_id)?$constiuency_id:""?>" method="post" style="margin-bottom: 0;" id="validateCityForm" method="get" autocomplete="off" method="post" enctype="multipart/form-data">
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
              <label class="control-label" for="firstname">City Name</label>
               <input class="span12" id="constiuency_id" name="constiuency_id" type="hidden" value="<?php echo set_value('constiuency_id', isset($constiuency_id)?$constiuency_id:""); ?>"/>
              <div class="controls">
               <?php echo form_dropdown('city_id', $cities, isset($city_id)?$city_id:"",'id="city_id"'); ?>
              </div>
            </div>
            <div class="control-group">
              <label class="control-label" for="firstname">Constituency Type</label>
             	<div class="controls">
              <?php echo form_dropdown('constiuency_type', array("MNA"=>"MNA","MPA"=>"MPA"), isset($constiuency_type)?$constiuency_type:"",'id="constiuency_type"'); ?>
            </div>
           </div>
            <div class="control-group">
              <label class="control-label" for="firstname">Constitution Number</label>            
               
              <div class="controls">
                <input class="span12" id="constiuency_num" name="constiuency_num" type="text" value="<?php echo set_value('constiuency_num', isset($constiuency_num)?$constiuency_num:""); ?>"/>
              </div>
            </div>  
            <div class="control-group">
              <label class="control-label" for="firstname">Elected Member</label>            
               
              <div class="controls">
                <input class="span12" id="constiuency_name" name="constiuency_name" type="text" value="<?php echo set_value('constiuency_name', isset($constiuency_name)?$constiuency_name:""); ?>"/>
              </div>
            </div>
             <div class="control-group">
              <label class="control-label" for="firstname">Contact Number</label>            
               
              <div class="controls">
                <input class="span12" id="constiuency_number" name="constiuency_number" type="text" value="<?php echo set_value('constiuency_number', isset($constiuency_number)?$constiuency_number:""); ?>"/>
              </div>
            </div>
             <div class="control-group">
              <label class="control-label" for="firstname">Address</label>            
               
              <div class="controls">
                <input class="span12" id="constiuency_address" name="constiuency_address" type="text" value="<?php echo set_value('constiuency_address', isset($constiuency_address)?$constiuency_address:""); ?>"/>
              </div>
            </div>
             <div class="control-group">
              <label class="control-label" for="firstname">Twitter</label>            
               
              <div class="controls">
                <input class="span12" id="constiuency_twitter" name="constiuency_twitter" type="text" value="<?php echo set_value('constiuency_twitter', isset($constiuency_twitter)?$constiuency_twitter:""); ?>"/>
              </div>
            </div>
             <div class="control-group">
              <label class="control-label" for="firstname">Facebook</label>            
               
              <div class="controls">
                <input class="span12" id="constiuency_facebook" name="constiuency_facebook" type="text" value="<?php echo set_value('constiuency_facebook', isset($constiuency_facebook)?$constiuency_facebook:""); ?>"/>
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
     <h3 class="glyphicons show_thumbnails"><i></i> Existing Constituencies</h3>
  <div class="widget widget-4 widget-body-white">
	
	<div class="widget-body" style="padding: 10px 0 0;">
		<table class="table table-bordered table-primary table-condensed">
			<thead>
				<tr>
					<th class="center">City.</th>
					<th>City Name</th>
                   
					<th>Status</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
            	<?php 
					if(count($cities->result_array())>0)
					{
						$sr=1;
						foreach($cities->result_array() as $row)
						{
							
							?>
                            	<tr>
                                    
                                    <td><?php echo ucfirst(strtolower($row['constiuency_name']))?></td>
                                    <td><?php echo $row['country_name']?></td>
                                 
                                    <td><?php echo $row['constiuency_status']==1?"Active":"De-Active"?></td>
                                     <td>
                                     	<a href="<?php echo base_url()?>/welcome/constiuency/edit/<?php echo $row['constiuency_id']?>">Edit</a> | 
                                        <?php if($row['constiuency_status']==1){ ?>
                                        <a href="<?php echo base_url()?>/welcome/constiuency/delete/<?php echo $row['constiuency_id']?>">Delete</a>
                                        <?php } else { ?>
                                        	 <a href="<?php echo base_url()?>/welcome/constiuency/active/<?php echo $row['constiuency_id']?>">Active</a>
                                        <?php } ?>
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
