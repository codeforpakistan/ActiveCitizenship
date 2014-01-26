     
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
      <form class="form-horizontal" action="<?php echo base_url()?>course/courses/add/<?php echo isset($course_id)?$course_id:""?>" method="post" style="margin-bottom: 0;" id="validateOccupationForm" method="get" autocomplete="off" method="post" enctype="multipart/form-data">
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
        <input class="span12" id="course_id" name="course_id" type="hidden" value="<?php echo set_value('course_id', isset($course_id)?$course_id:""); ?>"/>
          <div class="span11">
          	<div class="control-group">
              <label class="control-label" for="firstname">Course Title</label>
              
              <div class="controls">
                <input class="span12" id="course_name" name="course_name" type="text" value="<?php echo set_value('course_name', isset($course_name)?$course_name:""); ?>"/>
              </div>
            </div>
            <div class="control-group">
              <label class="control-label" for="firstname">Level of Education</label>
              
              <div class="controls">
                <input class="span12" id="course_levelofeducation" name="course_levelofeducation" type="text" value="<?php echo set_value('course_levelofeducation', isset($course_levelofeducation)?$course_levelofeducation:""); ?>"/>
              </div>
            </div>
            <div class="control-group">
              <label class="control-label" for="firstname">Degree Program</label>
              
              <div class="controls">
                <input class="span12" id="course_degreeprogram" name="course_degreeprogram" type="text" value="<?php echo set_value('course_degreeprogram', isset($course_degreeprogram)?$course_degreeprogram:""); ?>"/>
              </div>
            </div>
            <div class="control-group">
              <label class="control-label" for="firstname">Course Duration</label>
              
              <div class="controls">
                <input class="span12" id="course_duration" name="course_duration" type="text" value="<?php echo set_value('course_duration', isset($course_duration)?$course_duration:""); ?>"/>
              </div>
            </div>
            <div class="control-group">
              <label class="control-label" for="firstname">Institution</label>
              
              <div class="controls">
                <input class="span12" id="course_institution" name="course_institution" type="text" value="<?php echo set_value('course_institution', isset($course_institution)?$course_institution:""); ?>"/>
              </div>
            </div>
         	 <div class="control-group">
              <label class="control-label" for="firstname">City</label>
               
              <div class="controls">
               <?php echo form_dropdown('city_id', $cities, isset($city_id)?$city_id:"",'id="city_id"'); ?>
              </div>
            </div>
            <div class="control-group">
              <label class="control-label" for="firstname">Field of Education</label>
              
              <div class="controls">
                <input class="span12" id="course_fieldofeducation" name="course_fieldofeducation" type="text" value="<?php echo set_value('course_fieldofeducation', isset($course_fieldofeducation)?$course_fieldofeducation:""); ?>"/>
              </div>
            </div>
            
            <div class="control-group">
              <label class="control-label" for="firstname">Study Track</label>
               
              <div class="controls">
               <?php echo form_dropdown('studytrack_id', $studytracks, isset($studytrack_id)?$studytrack_id:"",'id="studytrack_id"'); ?>
              </div>
            </div>
            <div class="control-group">
              <label class="control-label" for="firstname">Course Fee</label>
              
              <div class="controls">
                <input class="span12" id="course_fee" name="course_fee" type="text" value="<?php echo set_value('course_fee', isset($course_fee)?$course_fee:""); ?>"/>
              </div>
            </div>
            <div class="control-group">
              <label class="control-label" for="firstname">Admission Deadlines</label>
              
              <div class="controls">
                <input class="span12" id="course_admissiondeadline" name="course_admissiondeadline" type="text" value="<?php echo set_value('course_admissiondeadline', isset($course_admissiondeadline)?$course_admissiondeadline:""); ?>"/>
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
  
