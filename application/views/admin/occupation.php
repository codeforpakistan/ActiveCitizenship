     
      <!-- Menu Toggle on mobile -->
      <button type="button" class="btn btn-navbar main"> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
      <div class="separator bottom"></div>
      <ul class="breadcrumb">
        <li><a href="<?php echo base_url()?>/welcome" class="glyphicons home"><i></i> Dashboard</a></li>
        <li class="divider"></li>
        <li>Occupation</li>
        <li class="divider"></li>
        <li><?php echo isset($subtitle)?$subtitle:""?></li>
      </ul>
      <div class="separator bottom"></div>
      <h3 class="glyphicons show_thumbnails_with_lines"><i></i><?php echo $subtitle?></h3>
      <form class="form-horizontal" action="<?php echo base_url()?>welcome/occupation/add/<?php echo isset($occupation_id)?$occupation_id:""?>" method="post" style="margin-bottom: 0;" id="validateOccupationForm" method="get" autocomplete="off" method="post" enctype="multipart/form-data">
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
              <label class="control-label" for="firstname">Occupation Group</label>
               <input class="span12" id="occupation_id" name="occupation_id" type="hidden" value="<?php echo set_value('occupation_id', isset($occupation_id)?$occupation_id:""); ?>"/>
              <div class="controls">
               <?php echo form_dropdown('occupationgroup_id', $occupationgroup, isset($occupationgroup_id)?$occupationgroup_id:"",'id="occupationgroup_id"'); ?>
              </div>
            </div>
            <div class="control-group">
              <label class="control-label" for="firstname">Field of Work</label>
               
              <div class="controls">
               <?php echo form_dropdown('fieldofwork_id', $fieldofwork, isset($fieldofwork_id)?$fieldofwork_id:"",'id="fieldofwork_id"'); ?>
              </div>
            </div>
            <div class="control-group">
              <label class="control-label" for="firstname">Career Track</label>              
              <div class="controls">
               <?php echo form_dropdown('careertrack_id', $careerTrack, isset($careertrack_id)?$careertrack_id:"",'id="careertrack_id"'); ?>
              </div>
            </div>
            <div class="control-group">
              <label class="control-label" for="firstname">Occupation Title</label>
              
              <div class="controls">
                <input class="span12" id="occupation_title" name="occupation_title" type="text" value="<?php echo set_value('occupation_name', isset($occupation_title)?$occupation_title:""); ?>"/>
              </div>
            </div>
            <div class="control-group">
              <label class="control-label" for="occupation_othertitles">Occupation Other Titles</label>
              
              <div class="controls">
                <textarea class="span12" id="occupation_othertitles" name="occupation_othertitles"><?php echo set_value('occupation_name', isset($occupation_othertitles)?$occupation_othertitles:""); ?> </textarea>
              </div>
            </div>
            <div class="control-group">
              <label class="control-label" for="occupation_video">Video Link</label>
              
              <div class="controls">
                <input class="span12" id="occupation_video" name="occupation_video" type="text" value="<?php echo set_value('occupation_name', isset($occupation_video)?$occupation_video:""); ?>"/>
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
     <h3 class="glyphicons show_thumbnails"><i></i> Existing Occupations</h3>
  <div class="widget widget-4 widget-body-white">
	
	<div class="widget-body" style="padding: 10px 0 0;">
		<table class="table table-bordered table-primary table-condensed">
			<thead>
				<tr>
					<th class="center">Occupation.</th>					
                   
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
                                    
                                    <td><?php echo ucfirst(strtolower($row['occupation_title']))?></td>
                                   
                                 
                                    <td><?php echo $row['occupation_status']==1?"Active":"De-Active"?></td>
                                     <td>
                                     	<a href="<?php echo base_url()?>/welcome/occupation/edit/<?php echo $row['occupation_id']?>">Edit</a> | 
                                        <?php if($row['occupation_status']==1){ ?>
                                        <a href="<?php echo base_url()?>/welcome/occupation/delete/<?php echo $row['occupation_id']?>">Delete</a>
                                        <?php } else { ?>
                                        	 <a href="<?php echo base_url()?>/welcome/occupation/active/<?php echo $row['occupation_id']?>">Active</a>
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
