     
      <!-- Menu Toggle on mobile -->
      <button type="button" class="btn btn-navbar main"> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
      <div class="separator bottom"></div>
      <ul class="breadcrumb">
        <li><a href="<?php echo base_url()?>/welcome" class="glyphicons home"><i></i> Dashboard</a></li>
        <li class="divider"></li>
        <li>Careers</li>
        <li class="divider"></li>
        <li><?php echo isset($subtitle)?$subtitle:""?></li>
      </ul>
      <div class="separator bottom"></div>
      <h3 class="glyphicons show_thumbnails_with_lines"><i></i><?php echo $subtitle?></h3>
      <form class="form-horizontal" action="<?php echo base_url()?>Careers/Career/add/<?php echo isset($career_id)?$career_id:""?>" method="post" style="margin-bottom: 0;" id="validateOccupationForm" method="get" autocomplete="off" method="post" enctype="multipart/form-data">
        
        <div class="row-fluid">
        	 <h3 class="glyphicons show_thumbnails"><i></i> Existing Careers</h3>
          <div class="widget widget-4 widget-body-white">
            
            <div class="widget-body" style="padding: 10px 0 0;">
                <table class="table table-bordered table-primary table-condensed">
                    <thead>
                        <tr>
                           <!-- <th class="center">Career Title.</th>-->
                            <th>Occupation</th>
                            <th>occupation Group</th>
                            
                            <th>Career status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            if(count($careers->result_array())>0)
                            {
                                $sr=1;
                                foreach($careers->result_array() as $row)
                                {
                                    
                                    ?>
                                        <tr>
                                            
                                           <!-- <td title="<?php echo ucfirst(strtolower($row['career_title']))?>"><?php echo substr(ucfirst(strtolower($row['career_title'])),0,100)?>..</td>-->
                                            <td><?php echo $row['occupation_title']?></td>
                                            <td><?php echo $row['occupationgroup_title']?></td>
                                           
                                            <td><?php echo $row['career_status']==1?"Active":"De-Active"?></td>
                                             <td>
                                             	<a href="<?php echo base_url()?>/career/view/<?php echo $row['career_id']?>" title="Add Sub Sections">View</a> | <a href="<?php echo base_url()?>/career/careers/edit/<?php echo $row['career_id']?>">Edit</a> | 
                                                <?php if($row['career_status']==1){ ?>
                                                <a href="<?php echo base_url()?>/career/careers/delete/<?php echo $row['career_id']?>">Delete</a>
                                                <?php } else { ?>
                                                     <a href="<?php echo base_url()?>/career/careers/active/<?php echo $row['career_id']?>">Active</a>
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
        
       
