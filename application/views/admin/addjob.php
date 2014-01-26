     
      <!-- Menu Toggle on mobile -->
      <button type="button" class="btn btn-navbar main"> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
      <div class="separator bottom"></div>
      <ul class="breadcrumb">
        <li><a href="<?php echo base_url()?>/welcome" class="glyphicons home"><i></i> Dashboard</a></li>
        <li class="divider"></li>
        <li>Jobs</li>
        <li class="divider"></li>
        <li><?php echo isset($subtitle)?$subtitle:""?></li>
      </ul>
      <div class="separator bottom"></div>
      <h3 class="glyphicons show_thumbnails_with_lines"><i></i><?php echo $subtitle?></h3>
      <form class="form-horizontal" action="<?php echo base_url()?>jobs/job/add/<?php echo isset($job_id)?$job_id:""?>" method="post" style="margin-bottom: 0;" id="validateOccupationForm" method="get" autocomplete="off" method="post" enctype="multipart/form-data">
        <h4>Please Fill Following Information Carefully</h4>
        <div class="row-fluid"> <?php echo validation_errors('<div class="error">', '</div>'); ?>
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
        <input class="span12" id="job_id" name="job_id" type="hidden" value="<?php echo set_value('job_id', isset($job_id)?$job_id:""); ?>"/>
          <div class="span11">
          	<div class="control-group">
              <label class="control-label" for="firstname">Job Title</label>
              
              <div class="controls">
                <input class="span12" id="job_title" name="job_title" type="text" value="<?php echo set_value('job_title', isset($job_title)?$job_title:""); ?>"/>
              </div>
            </div>
         	 <div class="control-group">
              <label class="control-label" for="firstname">Job Sector</label>
               
              <div class="controls">
               <?php echo form_dropdown('jobsector_id', $jobsectors, isset($jobsector_id)?$jobsector_id:"",'id="jobsector_id"'); ?>
              </div>
            </div>
            <div class="control-group">
              <label class="control-label" for="firstname">Positions</label>
              
              <div class="controls">
                <input class="span12" id="positions" name="positions" type="text" value="<?php echo set_value('positions', isset($positions)?$positions:""); ?>"/>
              </div>
            </div>
            
            <div class="control-group">
              <label class="control-label" for="firstname">Country</label>
               
              <div class="controls">
               <?php echo form_dropdown('country_id', $countries, isset($country_id)?$country_id:"",'id="country_id"'); ?>
              </div>
            </div>
            
            <div class="control-group">
              <label class="control-label" for="firstname">City</label>              
              <div class="controls">
               <?php echo form_dropdown('city_id', $cities, isset($city_id)?$city_id:"",'id="city_id"'); ?>
              </div>
            </div>
             <div class="control-group">
              <label class="control-label" for="firstname">Gender</label>              
              <div class="controls">
               <?php echo form_dropdown('gender', array("Male"=>"Male","Female"=>"Female"), isset($gender)?$gender:"",'id="city_id"'); ?>
              </div>
            </div>
             <div class="control-group">
              <label class="control-label" for="firstname">Age Group</label>              
              <div class="controls">
               <?php echo form_dropdown('agegroup_id', $agegroups, isset($agegroup_id)?$agegroup_id:"",'id="agegroup_id"'); ?>
              </div>
            </div>
             <div class="control-group">
              <label class="control-label" for="firstname">Required Education</label>              
              <div class="controls">
               <?php echo form_dropdown('education_id', $educations, isset($education_id)?$education_id:"",'id="education_id"'); ?>
              </div>
            </div>
             <div class="control-group">
              <label class="control-label" for="firstname">Qualification</label>
              
              <div class="controls">
                <input class="span12" id="qualification" name="qualification" type="text" value="<?php echo set_value('qualification', isset($qualification)?$qualification:""); ?>"/>
              </div>
            </div>
             <div class="control-group">
              <label class="control-label" for="firstname">Required Education</label>              
              <div class="controls">
               <?php echo form_dropdown('experience_id', $experiences, isset($experience_id)?$experience_id:"",'id="experience_id"'); ?>
              </div>
            </div>
           <div class="control-group">
              <label class="control-label" for="firstname">Salary Range</label>              
              <div class="controls">
               <?php echo form_dropdown('salaryrange_id', $salaries, isset($salaryrange_id)?$salaryrange_id:"",'id="experience_id"'); ?>
              </div>
            </div>
            <div class="control-group">
              <label class="control-label" for="firstname">Job Type</label>              
              <div class="controls">
               <?php echo form_dropdown('jobtype_id', $jobtypes, isset($jobtype_id)?$jobtype_id:"",'id="jobtype_id"'); ?>
              </div>
            </div>
            <div class="control-group">
              <label class="control-label" for="firstname">Job Posted Date</label>
              
              <div class="controls">
                <input class="span12" id="posted_date" name="posted_date" type="text" value="<?php echo set_value('posted_date', isset($posted_date)?$posted_date:""); ?>" class="popupDatepicker"/>
              </div>
            </div>
            <div class="control-group">
              <label class="control-label" for="firstname">Last Date</label>
              
              <div class="controls">
                <input class="span12" id="last_date" name="last_date" type="text" value="<?php echo set_value('last_date', isset($last_date)?$last_date:""); ?>" class="popupDatepicker"/>

              </div>
            </div>
             <div class="control-group">
              <label class="control-label" for="firstname">Organization</label>              
              <div class="controls">
               <?php echo form_dropdown('organization_id', $organizations, isset($organization_id)?$organization_id:"",'id="organization_id"'); ?>
              </div>
            </div>
             <div class="control-group">
              <label class="control-label" for="job_video">Where to Apply</label>
              
              <div class="controls">
                <input class="span12" id="where_to_apply" name="where_to_apply" type="text" value="<?php echo set_value('where_to_apply', isset($where_to_apply)?$where_to_apply:""); ?>"/>
              </div>
             </div>
              <div class="control-group">
                  <label class="control-label" for="firstname">Job Source</label>              
                  <div class="controls">
                   <?php echo form_dropdown('jobsource_id', $jobsources, isset($jobsource_id)?$jobsource_id:"",'id="organization_id"'); ?>
                  </div>
              </div>
              <div class="control-group">
                  <label class="control-label" for="firstname">Job Image</label>              
                  <div class="controls">
                   <input type="file" name="job_image" id="job_image" />
                  </div>
              </div>
               <div class="control-group">
                  <label class="control-label" for="firstname">Occupation</label>              
                  <div class="controls">
                   <?php echo form_dropdown('occupation_id', $occupations, isset($occupation_id)?$occupation_id:"",'id="organization_id"'); ?>
                  </div>
              </div>
               <div class="control-group">
                  <label class="control-label" for="firstname">Job Group</label>              
                  <div class="controls">
                   <?php echo form_dropdown('jobgroup_id', $jobgroups, isset($jobgroup_id)?$jobgroup_id:"",'id="organization_id"'); ?>
                  </div>
              </div>
              <div class="control-group">
                  <label class="control-label" for="firstname">Occupations Groups</label>              
                  <div class="controls">
                   <?php echo form_dropdown('occupationgroup_id', $occupationgroups, isset($occupationgroup_id)?$occupationgroup_id:"",'id="occupationgroup_id"'); ?>
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
  
