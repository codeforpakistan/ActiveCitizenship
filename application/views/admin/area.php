     
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
      <form class="form-horizontal" action="<?php echo base_url()?>welcome/area/add/<?php echo isset($area_id)?$area_id:""?>" method="post" style="margin-bottom: 0;" id="validateCityForm" method="get" autocomplete="off" method="post" enctype="multipart/form-data">
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
              <label class="control-label" for="firstname">Constituency Name</label>
               <input class="span12" id="area_id" name="area_id" type="hidden" value="<?php echo set_value('area_id', isset($area_id)?$area_id:""); ?>"/>
              <div class="controls">
               <?php echo form_dropdown('constiuency_id', $constiuencies, isset($constiuency_id)?$constiuency_id:"",'id="constiuency_id"'); ?>
              </div>
            </div>
            <div class="control-group">
              <label class="control-label" for="firstname">Area Name</label>
             	<div class="controls">
              <input class="span12" id="area_title" name="area_title" type="text" value="<?php echo set_value('area_title', isset($area_title)?$area_title:""); ?>"/>
            </div>
           </div>
            <div class="control-group">
              <label class="control-label" for="firstname">Longitude</label>            
               
              <div class="controls">
                <input class="span12" id="area_longitude" name="area_longitude" type="text" value="<?php echo set_value('area_longitude', isset($area_longitude)?$area_longitude:""); ?>"/>
              </div>
            </div>  
            <div class="control-group">
              <label class="control-label" for="firstname">Latitude</label>            
               
              <div class="controls">
                <input class="span12" id="area_latitude" name="area_latitude" type="text" value="<?php echo set_value('area_latitude', isset($area_latitude)?$area_latitude:""); ?>"/>
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
	
	<!--<div class="widget-body" style="padding: 10px 0 0;">
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
                                    
                                    <td><?php echo ucfirst(strtolower($row['area_name']))?></td>
                                    <td><?php echo $row['country_name']?></td>
                                 
                                    <td><?php echo $row['area_status']==1?"Active":"De-Active"?></td>
                                     <td>
                                     	<a href="<?php echo base_url()?>/welcome/constiuency/edit/<?php echo $row['area_id']?>">Edit</a> | 
                                        <?php if($row['area_status']==1){ ?>
                                        <a href="<?php echo base_url()?>/welcome/constiuency/delete/<?php echo $row['area_id']?>">Delete</a>
                                        <?php } else { ?>
                                        	 <a href="<?php echo base_url()?>/welcome/constiuency/active/<?php echo $row['area_id']?>">Active</a>
                                        <?php } ?>
                                     </td>
                                </tr>
                            <?php
						}
						
					}
				?>
				
				
			</tbody>
		</table>
	</div>-->
</div>
