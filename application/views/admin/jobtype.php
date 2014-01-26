     
      <!-- Menu Toggle on mobile -->
      <button type="button" class="btn btn-navbar main"> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
      <div class="separator bottom"></div>
      <ul class="breadcrumb">
        <li><a href="<?php echo base_url()?>/welcome" class="glyphicons home"><i></i> Dashboard</a></li>
        <li class="divider"></li>
        <li>Job Type</li>
        <li class="divider"></li>
        <li><?php echo isset($subtitle)?$subtitle:""?></li>
      </ul>
      <div class="separator bottom"></div>
      <h3 class="glyphicons show_thumbnails_with_lines"><i></i><?php echo $subtitle?></h3>
      <form class="form-horizontal" action="<?php echo base_url()?>welcome/jobtype/add/<?php echo isset($jobtype_id)?$jobtype_id:""?>" method="post" style="margin-bottom: 0;" id="validateJob TypeForm" method="get" autocomplete="off" method="post" enctype="multipart/form-data">
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
		 <?php if(isset($messjobtype)){ ?>
        	<div class="error" style="background:green; color:white; padding:10px;">
            	<?php
						echo ($messjobtype);
				?>
				
            </div>
           <?php } ?>
        </div>
        <hr class="separator line" />
        <div class="row-fluid">
          <div class="span11">
         	
            <div class="control-group">
              <label class="control-label" for="firstname">Job Type Title</label>
               <input class="span12" id="jobtype_id" name="jobtype_id" type="hidden" value="<?php echo set_value('jobtype_id', isset($jobtype_id)?$jobtype_id:""); ?>"/>
              <div class="controls">
                <input class="span12" id="jobtype_title" name="jobtype_title" type="text" value="<?php echo set_value('jobtype_title', isset($jobtype_title)?$jobtype_title:""); ?>"/>
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
					<th class="center">Job Type.</th>
					
                   
					<th>Status</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
            	<?php 
					if(count($jobtypes->result_array())>0)
					{
						$sr=1;
						foreach($jobtypes->result_array() as $row)
						{
							
							?>
                            	<tr>
                                    
                                    <td><?php echo ucfirst(strtolower($row['jobtype_title']))?></td>
                                   
                                 
                                    <td><?php echo $row['jobtype_status']==1?"Active":"De-Active"?></td>
                                     <td>
                                     	<a href="<?php echo base_url()?>/welcome/jobtype/edit/<?php echo $row['jobtype_id']?>">Edit</a> | 
                                        <?php if($row['jobtype_status']==1){ ?>
                                        <a href="<?php echo base_url()?>/welcome/jobtype/delete/<?php echo $row['jobtype_id']?>">Delete</a>
                                        <?php } else { ?>
                                        	 <a href="<?php echo base_url()?>/welcome/jobtype/active/<?php echo $row['jobtype_id']?>">Active</a>
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
