     
      <!-- Menu Toggle on mobile -->
      <button type="button" class="btn btn-navbar main"> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
      <div class="separator bottom"></div>
      <ul class="breadcrumb">
        <li><a href="<?php echo base_url()?>/welcome" class="glyphicons home"><i></i> Dashboard</a></li>
        <li class="divider"></li>
        <li>Job Group</li>
        <li class="divider"></li>
        <li><?php echo isset($subtitle)?$subtitle:""?></li>
      </ul>
      <div class="separator bottom"></div>
      <h3 class="glyphicons show_thumbnails_with_lines"><i></i><?php echo $subtitle?></h3>
      <form class="form-horizontal" action="<?php echo base_url()?>welcome/jobgroup/add/<?php echo isset($jobgroup_id)?$jobgroup_id:""?>" method="post" style="margin-bottom: 0;" id="validateJob GroupForm" method="get" autocomplete="off" method="post" enctype="multipart/form-data">
        <h4>Please Fill Following Information Carefully</h4>
        <div class="row-fluid">
        <?php echo validation_errors('<div class="error" style="background:red; color:white; padding:10px;">', '</div>'); ?>
        <?php if(isset($error)){ ?>
        	<div class="error" style="background:red; color:white; padding:10px;">
            
            	<?php
						echo ($error);
				?>
				
            </div>
           <?php } ?>
		 <?php if(isset($messjobgroup)){ ?>
        	<div class="error" style="background:green; color:white; padding:10px;">
            	<?php
						echo ($messjobgroup);
				?>
				
            </div>
           <?php } ?>
        </div>
        <hr class="separator line" />
        <div class="row-fluid">
          <div class="span11">
         	
            <div class="control-group">
              <label class="control-label" for="firstname">Job Group Title</label>
               <input class="span12" id="jobgroup_id" name="jobgroup_id" type="hidden" value="<?php echo set_value('jobgroup_id', isset($jobgroup_id)?$jobgroup_id:""); ?>"/>
              <div class="controls">
                <input class="span12" id="jobgroup_title" name="jobgroup_title" type="text" value="<?php echo set_value('jobgroup_title', isset($jobgroup_title)?$jobgroup_title:""); ?>"/>
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
     <h3 class="glyphicons show_thumbnails"><i></i> Existing Entries</h3>
  <div class="widget widget-4 widget-body-white">
	
	<div class="widget-body" style="padding: 10px 0 0;">
		<table class="table table-bordered table-primary table-condensed">
			<thead>
				<tr>
					<th class="center">Job Group.</th>
					
                   
					<th>Status</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
            	<?php 
					if(count($jobgroups->result_array())>0)
					{
						$sr=1;
						foreach($jobgroups->result_array() as $row)
						{
							
							?>
                            	<tr>
                                    
                                    <td><?php echo ucfirst(strtolower($row['jobgroup_title']))?></td>
                                   
                                 
                                    <td><?php echo $row['jobgroup_status']==1?"Active":"De-Active"?></td>
                                     <td>
                                     	<a href="<?php echo base_url()?>/welcome/jobgroup/edit/<?php echo $row['jobgroup_id']?>">Edit</a> | 
                                        <?php if($row['jobgroup_status']==1){ ?>
                                        <a href="<?php echo base_url()?>/welcome/jobgroup/delete/<?php echo $row['jobgroup_id']?>">Delete</a>
                                        <?php } else { ?>
                                        	 <a href="<?php echo base_url()?>/welcome/jobgroup/active/<?php echo $row['jobgroup_id']?>">Active</a>
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
