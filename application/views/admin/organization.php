     
      <!-- Menu Toggle on mobile -->
      <button type="button" class="btn btn-navbar main"> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
      <div class="separator bottom"></div>
      <ul class="breadcrumb">
        <li><a href="<?php echo base_url()?>/welcome" class="glyphicons home"><i></i> Dashboard</a></li>
        <li class="divider"></li>
        <li>Organization</li>
        <li class="divider"></li>
        <li><?php echo isset($subtitle)?$subtitle:""?></li>
      </ul>
      <div class="separator bottom"></div>
      <h3 class="glyphicons show_thumbnails_with_lines"><i></i><?php echo $subtitle?></h3>
      <form class="form-horizontal" action="<?php echo base_url()?>welcome/organization/add/<?php echo isset($organization_id)?$organization_id:""?>" method="post" style="margin-bottom: 0;" id="validateOrganizationForm" method="get" autocomplete="off" method="post" enctype="multipart/form-data">
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
              <label class="control-label" for="firstname">Organization Name</label>
               <input class="span12" id="organization_id" name="organization_id" type="hidden" value="<?php echo set_value('organization_id', isset($organization_id)?$organization_id:""); ?>"/>
              <div class="controls">
                <input class="span12" id="organization_name" name="organization_name" type="text" value="<?php echo set_value('organization_name', isset($organization_name)?$organization_name:""); ?>"/>
              </div>
            </div>
            
            <div class="control-group">
              <label class="control-label" for="username">Logo</label>
              <div class="controls">
                <input class="span12" id="organization_logo" name="organization_logo" type="file" />
                <span style="display:inline-block; width:30px">
                	<?php if(isset($organization_logo)) { ?><img src="<?php echo base_url()?>/uploads/<?php echo $organization_logo?>" width="50" alt="flag" /><?php } ?>
                </span>
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
     <h3 class="glyphicons show_thumbnails"><i></i> Existing Organization</h3>
  <div class="widget widget-4 widget-body-white">
	
	<div class="widget-body" style="padding: 10px 0 0;">
		<table class="table table-bordered table-primary table-condensed">
			<thead>
				<tr>
					<th class="center">Organization.</th>
					
                    <th>Logo</th>
					<th>Status</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
            	<?php 
					if(count($organizations->result_array())>0)
					{
						$sr=1;
						foreach($organizations->result_array() as $row)
						{
							
							?>
                            	<tr>
                                    
                                    <td><?php echo ucfirst(strtolower($row['organization_name']))?></td>
                                    
                                    <td><?php if(isset($row['organization_logo'])) { ?><img src="<?php echo base_url()?>/uploads/<?php echo $row['organization_logo']?>" alt="flag" style="max-width:30px" /><?php } ?></td>
                                    <td><?php echo $row['organization_status']==1?"Active":"De-Active"?></td>
                                     <td>
                                     	<a href="<?php echo base_url()?>/welcome/organization/edit/<?php echo $row['organization_id']?>">Edit</a> | 
                                        <?php if($row['organization_status']==1){ ?>
                                        <a href="<?php echo base_url()?>/welcome/organization/delete/<?php echo $row['organization_id']?>">Delete</a>
                                        <?php } else { ?>
                                        	 <a href="<?php echo base_url()?>/welcome/organization/active/<?php echo $row['organization_id']?>">Active</a>
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
