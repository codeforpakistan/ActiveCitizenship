     
      <!-- Menu Toggle on mobile -->
      <button type="button" class="btn btn-navbar main"> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
      <div class="separator bottom"></div>
      <ul class="breadcrumb">
        <li><a href="<?php echo base_url()?>/welcome" class="glyphicons home"><i></i> Dashboard</a></li>
        <li class="divider"></li>
        <li>Courses</li>
        <li class="divider"></li>
        <li><?php echo isset($subtitle)?$subtitle:""?></li>
      </ul>
      <div class="separator bottom"></div>
      <h3 class="glyphicons show_thumbnails_with_lines"><i></i><?php echo $subtitle?></h3>
      <form class="form-horizontal" action="<?php echo base_url()?>Courses/Course/add/<?php echo isset($course_id)?$course_id:""?>" method="post" style="margin-bottom: 0;" id="validateOccupationForm" method="get" autocomplete="off" method="post" enctype="multipart/form-data">
        
        <div class="row-fluid">
        	 <h3 class="glyphicons show_thumbnails"><i></i> Existing Courses</h3>
          <div class="widget widget-4 widget-body-white">
            
            <div class="widget-body" style="padding: 10px 0 0;">
                <table class="table table-bordered table-primary table-condensed">
                    <thead>
                        <tr>
                            <th class="center">Course Title.</th>
                            <th>City</th>
                            <th>Course Study Track</th>
                            <th>Course Fee</th>
                            <th>Course status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            if(count($courses->result_array())>0)
                            {
                                $sr=1;
                                foreach($courses->result_array() as $row)
                                {
                                    
                                    ?>
                                        <tr>
                                            
                                            <td title="<?php echo ucfirst(strtolower($row['course_name']))?>"><?php echo substr(ucfirst(strtolower($row['course_name'])),0,100)?>..</td>
                                            <td><?php echo $row['city_name']?></td>
                                            <td><?php echo $row['studytrack_title']?></td>
                                            <td><?php echo $row['course_fee']?></td>
                                            <td><?php echo $row['course_status']==1?"Active":"De-Active"?></td>
                                             <td>
                                                <a href="<?php echo base_url()?>/course/courses/edit/<?php echo $row['course_id']?>">Edit</a> | 
                                                <?php if($row['course_status']==1){ ?>
                                                <a href="<?php echo base_url()?>/course/courses/delete/<?php echo $row['course_id']?>">Delete</a>
                                                <?php } else { ?>
                                                     <a href="<?php echo base_url()?>/course/courses/active/<?php echo $row['course_id']?>">Active</a>
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
        
       
