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
<h3><?php echo $job->job_title?></h3>

<div class="separator line"></div>
<!----------     Field Of Work --------->
<h4 class="glyphicons show_thumbnails_with_lines"><i></i>Related Field of Work</h4>
<form class="form-horizontal" action="<?php echo base_url()?>jobs/jobfields/add/<?php echo isset($job->job_id)?$job->job_id:""?>" method="post" style="margin-bottom: 0;" id="validateOccupationForm" method="get" autocomplete="off" method="post" enctype="multipart/form-data">
<div class="row-fluid"> <?php echo validation_errors('<div class="error">', '</div>'); ?>
 
</div>
<div class="row-fluid">
  <div class="span6">
    <div class="control-group">
      <label class="control-label" for="firstname">Related Field of Work</label>
      <div class="controls"> <?php echo form_dropdown('fieldofwork_id', $fieldofworks, isset($fieldofwork_id)?$fieldofwork_id:"",'id="fieldofwork_id"'); ?> </div>
    </div>
  </div>
  <div class="span6">
    <?php
                    if(isset($JF)){
                     // echo '<pre>'; print_r($CO->result_array());
                        ?>
    <table class="table table-bordered">
      <tr>
        <th>Field of Work</th>
        <th>Action</th>
      </tr>
      <?php
                                foreach($JF->result_array() as $ckey=>$cval){ ?>
      <tr>
        <td><?php echo $cval['fieldofwork_title']?></td>
        <td><a href="<?php echo base_url()?>/jobs/jobfields/delete/<?php echo $job->job_id ?>/<?php echo $cval['jf_id']?>">
        Delete</a></td>
      </tr>
      <?php }
                              ?>
    </table>
    <?
                    }
                    
                ?>
  </div>
</div>
<hr class="separator" />
<div class="form-actions">
  <button type="submit" class="btn btn-icon btn-primary glyphicons circle_ok"><i></i>Save</button>
  <button type="button" class="btn btn-icon btn-default glyphicons circle_remove"><i></i>Cancel</button>
</div>
</form>
<div class="separator line"></div>
<h4 class="glyphicons show_thumbnails_with_lines"><i></i>Related Career Tracks</h4>
<form class="form-horizontal" action="<?php echo base_url()?>jobs/jobtrack/add/<?php echo isset($job->job_id)?$job->job_id:""?>" method="post" style="margin-bottom: 0;" id="validateOccupationForm" method="get" autocomplete="off" method="post" enctype="multipart/form-data">
<div class="row-fluid"> <?php echo validation_errors('<div class="error">', '</div>'); ?>
  <?php if(isset($message)){ ?>
  <div class="error" style="background:green; color:white; padding:10px;">
    <?php
      						echo ($message);
      				?>
  </div>
  <?php } ?>
</div>
<div class="row-fluid">
  <div class="span6">
    <div class="control-group">
      <label class="control-label" for="firstname">Related Career Track</label>
      <div class="controls"> <?php echo form_dropdown('careertrack_id', $careertracks, isset($careertrack_id)?$careertrack_id:"",'id="careertrack_id"'); ?> </div>
    </div>
  </div>
  <div class="span6">
    <?php
                    if(isset($JT)){
                     // echo '<pre>'; print_r($CO->result_array());
                        ?>
                        <table class="table table-bordered">
                          <tr>
                            <th>Career Tracks</th>
                            <th>Action</th>
                          </tr>
                          <?php
                                                    foreach($JT->result_array() as $ckey=>$cval){ ?>
                          <tr>
                            <td><?php echo $cval['careertrack_title']?></td>
                            <td><a href="<?php echo base_url()?>/jobs/jobtrack/delete/<?php echo $job->job_id ?>/<?php echo $cval['jc_id']?>">Delete</a></td>
                          </tr>
                          <?php }
                                                  ?>
                        </table>
                        <?
                    }
                    
                ?>
  </div>
</div>
<hr class="separator" />
<div class="form-actions">
  <button type="submit" class="btn btn-icon btn-primary glyphicons circle_ok"><i></i>Save</button>
  <button type="button" class="btn btn-icon btn-default glyphicons circle_remove"><i></i>Cancel</button>
</div>
</form>
<div class="separator line"></div>

