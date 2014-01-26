     
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
        
        <div class="row-fluid">
        	 
          <div class="widget widget-4 widget-body-white">
            
            <div class="widget-body" style="padding: 10px 0 0;">
                <table class="table table-bordered table-primary table-condensed">
                    <thead>
                        <tr>
                            <th class="center">Job Tiltle.</th>
                            <th>City</th>
                            <th>Job Source</th>
                            <th>Job Sector</th>
                            <th>Job status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            if(count($jobs->result_array())>0)
                            {
                                $sr=1;
                                foreach($jobs->result_array() as $row)
                                {
                                    
                                    ?>
                                        <tr>
                                            
                                            <td title="<?php echo ucfirst(strtolower($row['job_title']))?>"><?php echo substr(ucfirst(strtolower($row['job_title'])),0,100)?>..</td>
                                            <td><?php echo $row['city_name']?></td>
                                            <td><?php echo $row['jobsource_title']?></td>
                                            <td><?php echo $row['jobsector_title']?></td>
                                            <td><?php echo $row['jobs_status']==1?"Active":"De-Active"?></td>
                                             <td>
                                              <a href="<?php echo base_url()?>/jobs/view/<?php echo $row['job_id']?>">View</a> | 
                                                <a href="<?php echo base_url()?>/jobs/job/edit/<?php echo $row['job_id']?>">Edit</a> | 
                                                <?php if($row['jobs_status']==1){ ?>
                                                <a href="<?php echo base_url()?>/jobs/job/delete/<?php echo $row['job_id']?>">Delete</a>
                                                <?php } else { ?>
                                                     <a href="<?php echo base_url()?>/jobs/job/active/<?php echo $row['job_id']?>">Active</a>
                                                <?php } ?>
                                             </td>
                                        </tr>
                                    <?php
                                }
                                
                            }
                        ?>
                        
                        
                    </tbody>
                </table>
                <hr class="seperator" />
                <div class="row pull-right">
               	 <?php echo $this->pagination->create_links(); ?>	
                </div>
            </div>
		</div>       
        
       
