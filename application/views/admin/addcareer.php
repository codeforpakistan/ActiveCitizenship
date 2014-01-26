     
      <!-- Menu Toggle on mobile -->
      <button type="button" class="btn btn-navbar main"> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
      <div class="separator bottom"></div>
      <ul class="breadcrumb">
        <li><a href="<?php echo base_url()?>/welcome" class="glyphicons home"><i></i> Dashboard</a></li>
        <li class="divider"></li>
        <li>course</li>
        <li class="divider"></li>
        <li><?php echo isset($subtitle)?$subtitle:""?></li>
      </ul>
      <div class="separator bottom"></div>
      <h3 class="glyphicons show_thumbnails_with_lines"><i></i><?php echo $subtitle?></h3>
      <form class="form-horizontal" action="<?php echo base_url()?>career/careers/add/<?php echo isset($career_id)?$career_id:""?>" method="post" style="margin-bottom: 0;" id="validateOccupationForm" method="get" autocomplete="off" method="post" enctype="multipart/form-data">
        <h4>Please Fill Following Information Carefully</h4>
        <div class="row-fluid">
            <?php echo validation_errors('<div class="error">', '</div>'); ?>
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
        <input class="span12" id="career_id" name="career_id" type="hidden" value="<?php echo set_value('career_id', isset($career_id)?$career_id:""); ?>"/>
          <div class="span11">
          	<!--<div class="control-group">
              <label class="control-label" for="firstname">Career Title</label>
              
              <div class="controls">
                <input class="span12" id="career_title" name="career_title" type="text" value="<?php echo set_value('career_title', isset($career_title)?$career_title:""); ?>"/>
              </div>
            </div>-->
             <div class="control-group">
              <label class="control-label" for="firstname">Occupation</label>
               
              <div class="controls">
               <?php echo form_dropdown('occupation_id', $occupations, isset($occupation_id)?$occupation_id:"",'id="occupation_id"'); ?>
              </div>
            </div>
            <div class="control-group">
              <label class="control-label" for="firstname">Work Summary</label>
              
              <div class="controls">
              <textarea class="span12" name="career_worksummary" id="career_worksummary"><?php echo isset($career_worksummary)?$career_worksummary:""?></textarea>
              </div>
            </div>
            <div class="control-group">
              <label class="control-label" for="firstname">Related Work Environments</label>
              
              <div class="controls">
                <input class="span12" id="career_relatedenvironment" name="career_relatedenvironment" type="text" value="<?php echo set_value('career_relatedenvironment', isset($career_relatedenvironment)?$career_relatedenvironment:""); ?>"/>
              </div>
            </div>
             <div class="control-group">
              <label class="control-label" for="firstname">Typical Duties</label>
              
              <div class="controls">
              <textarea class="span12" name="career_duties" id="career_duties"><?php echo isset($career_duties)?$career_duties:""?></textarea>
              </div>
            </div>
             <div class="control-group">
              <label class="control-label" for="firstname">Context</label>
              
              <div class="controls">
              <textarea class="span12" name="career_context" id="career_context"><?php echo isset($career_context)?$career_context:""?></textarea>
              </div>
            </div>
             <div class="control-group">
              <label class="control-label" for="firstname">Knowledge Required</label>
              
              <div class="controls">
              <textarea class="span12" name="career_knowledgeRequired" id="career_knowledgeRequired"><?php echo isset($career_knowledgeRequired)?$career_knowledgeRequired:""?></textarea>
              </div>
            </div>
             <div class="control-group">
              <label class="control-label" for="firstname">Skills Required</label>
              
              <div class="controls">
              <textarea class="span12" name="career_skillsRequired" id="career_skillsRequired"><?php echo isset($career_skillsRequired)?$career_skillsRequired:""?></textarea>
              </div>
            </div>
             <div class="control-group">
              <label class="control-label" for="firstname">Abilities Required</label>
              
              <div class="controls">
              <textarea class="span12" name="career_abilitiesrequired" id="career_abilitiesrequired"><?php echo isset($career_abilitiesrequired)?$career_abilitiesrequired:""?>
              </textarea></div>
            </div>
            <div class="control-group">
              <label class="control-label" for="firstname">Occupation Group</label>
               
              <div class="controls">
               <?php echo form_dropdown('occupationgroup_id', $occupationgroups, isset($occupationgroup_id)?$occupationgroup_id:"",'id="occupationgroup_id"'); ?>
              </div>
            </div>
            <div class="control-group">
              <label class="control-label" for="career_photo">Picture</label>
              
              <div class="controls">
                <input class="span12" id="career_photo" name="career_photo" type="file" value="<?php echo set_value('career_photo', isset($career_photo)?$career_photo:""); ?>"/><?php echo isset($career_photo)?$career_photo:""?>
              </div>
            </div>
            <div class="control-group">
              <label class="control-label" for="firstname">Video</label>
              
              <div class="controls">
                <input class="span12" id="career_video" name="career_video" type="text" value="<?php echo set_value('career_video', isset($career_video)?$career_video:""); ?>"/>
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
  
