     
      <!-- Menu Toggle on mobile -->
      <button type="button" class="btn btn-navbar main"> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
      <div class="separator bottom"></div>
      <ul class="breadcrumb">
        <li><a href="<?php echo base_url()?>/welcome" class="glyphicons home"><i></i> Dashboard</a></li>
        <li class="divider"></li>
        <li>Country</li>
        <li class="divider"></li>
        <li><?php echo isset($subtitle)?$subtitle:""?></li>
      </ul>
      <div class="separator bottom"></div>
      <h3 class="glyphicons show_thumbnails_with_lines"><i></i><?php echo $subtitle?></h3>
      <form class="form-horizontal" action="<?php echo base_url()?>welcome/country/add/<?php echo isset($country_id)?$country_id:""?>" method="post" style="margin-bottom: 0;" id="validateCountryForm" method="get" autocomplete="off" method="post" enctype="multipart/form-data">
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
              <label class="control-label" for="firstname">Country Name</label>
               <input class="span12" id="country_id" name="country_id" type="hidden" value="<?php echo set_value('country_id', isset($country_id)?$country_id:""); ?>"/>
              <div class="controls">
                <input class="span12" id="country_name" name="country_name" type="text" value="<?php echo set_value('country_name', isset($country_name)?$country_name:""); ?>"/>
              </div>
            </div>
            <div class="control-group">
              <label class="control-label" for="lastname">Country Code</label>
              <div class="controls">
                <input class="span12" id="country_code" name="country_code" type="text" value="<?php echo set_value('country_code', isset($country_code)?$country_code:""); ?>" />
              </div>
            </div>
            <div class="control-group">
              <label class="control-label" for="username">Logo</label>
              <div class="controls">
                <input class="span12" id="country_logo" name="country_logo" type="file" />
                <span style="display:inline-block; width:30px">
                	<?php if(isset($country_logo)) { ?><img src="<?php echo base_url()?>/uploads/<?php echo $country_logo?>" width="50" alt="flag" /><?php } ?>
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
     <h3 class="glyphicons show_thumbnails"><i></i> Existing Countries</h3>
          <div class="widget widget-4 widget-body-white">
            
            <div class="widget-body" style="padding: 10px 0 0;">
                <table class="table table-bordered table-primary table-condensed">
                    <thead>
                        <tr>
                            <th class="center">Country.</th>
                            <th>Country Code</th>
                            <th>Logo</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            if(count($countries->result_array())>0)
                            {
                                $sr=1;
                                foreach($countries->result_array() as $row)
                                {
                                    
                                    ?>
                                        <tr>
                                            
                                            <td><?php echo ucfirst(strtolower($row['country_name']))?></td>
                                            <td><?php echo $row['country_code']?></td>
                                            <td><?php if(isset($row['country_logo'])) { ?><img src="<?php echo base_url()?>/uploads/<?php echo $row['country_logo']?>" alt="flag" style="max-width:30px" /><?php } ?></td>
                                            <td><?php echo $row['country_status']==1?"Active":"De-Active"?></td>
                                             <td>
                                                <a href="<?php echo base_url()?>/welcome/country/edit/<?php echo $row['country_id']?>">Edit</a> | 
                                                <?php if($row['country_status']==1){ ?>
                                                <a href="<?php echo base_url()?>/welcome/country/delete/<?php echo $row['country_id']?>">Delete</a>
                                                <?php } else { ?>
                                                     <a href="<?php echo base_url()?>/welcome/country/active/<?php echo $row['country_id']?>">Active</a>
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
