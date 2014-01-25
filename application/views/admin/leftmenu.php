<div id="menu" class="hidden-phone"> 
    <span class="profile"> <span class="img"><!--<img src="" alt="Mr. Awesome" />--></span> <span> <strong><?php echo isset($admin['username'])?></strong> <a class="glyphicons user" href="form_demo.html?lang=en&amp;menu_position=left-menu"><i></i>Edit account</a> <a class="glyphicons lock" href="login.html?lang=en&amp;menu_position=left-menu"><i></i>Logout</a> </span> </span>
      <ul>
      <li class="active"><a href="<?php echo base_url()?>welcome"><span>Dashboard</span></a></li>
        <li class="hasSubmenu"> <a data-toggle="collapse" href="#menu_forms"><span>Localization</span></a>
          <ul class="collapse" id="menu_forms" style="margin-left:10px">
           <li><a href="<?php echo base_url()?>welcome/country"><span>Country</span></a></li>
        	 <li><a href="<?php echo base_url()?>welcome/city"><span>City</span></a></li>
              <li><a href="<?php echo base_url()?>welcome/constituency"><span>Consituents</span></a></li>
               <li><a href="<?php echo base_url()?>welcome/authorities"><span>Consituents</span></a></li>
          </ul>
        </li>
         <li class="hasSubmenu"> <a data-toggle="collapse" href="#general_options"><span>General</span></a>
          <ul class="collapse" id="general_options">
           	<li><a href="<?php echo base_url()?>welcome/age"><span>Age Group</span></a></li>
            <li><a href="<?php echo base_url()?>welcome/careertrack"><span>Career Track</span></a></li>
            <li><a href="<?php echo base_url()?>welcome/education"><span>Education</span></a></li>
        	 <li><a href="<?php echo base_url()?>welcome/experience"><span>Experience</span></a></li>
             <li><a href="<?php echo base_url()?>welcome/jobgroup"><span>Job Group</span></a></li>
              <li><a href="<?php echo base_url()?>welcome/fieldofwork"><span>Field of Work</span></a></li>
             <li><a href="<?php echo base_url()?>welcome/jobsector"><span>Job Sector</span></a></li>
             <li><a href="<?php echo base_url()?>welcome/jobtype"><span>Job Type</span></a></li>
             <li><a href="<?php echo base_url()?>welcome/jobsource"><span>Job Source</span></a></li>
             <li><a href="<?php echo base_url()?>welcome/occupation"><span>Occupation</span></a></li>
             <li><a href="<?php echo base_url()?>welcome/occupationgroup"><span>Occupation Group</span></a></li>
             <li><a href="<?php echo base_url()?>welcome/organization"><span>Organization</span></a></li>
             <li><a href="<?php echo base_url()?>welcome/salaryrange"><span>Salary Range</span></a></li>
             <li><a href="<?php echo base_url()?>welcome/studytrack"><span>Study Track</span></a></li>
          </ul>
        </li>
        <li class="hasSubmenu"> <a data-toggle="collapse" href="#job_menu"><span>Jobs</span></a>
          <ul class="collapse" id="job_menu" style="margin-left:10px">
           <li><a href="<?php echo base_url()?>jobs/index"><span>Add Jobs</span></a></li>
        	 <li><a href="<?php echo base_url()?>jobs/manage"><span>Manage Jobs</span></a></li>
          </ul>
        </li>
         <li class="hasSubmenu"> <a data-toggle="collapse" href="#course_menu"><span>Courses</span></a>
          <ul class="collapse" id="course_menu" style="margin-left:10px">
           <li><a href="<?php echo base_url()?>course/index"><span>Add Courses</span></a></li>
        	 <li><a href="<?php echo base_url()?>course/manage"><span>Manage Courses</span></a></li>
          </ul>
        </li>
         <li class="hasSubmenu"> <a data-toggle="collapse" href="#career_menu"><span>Career</span></a>
          <ul class="collapse" id="career_menu" style="margin-left:10px">
           <li><a href="<?php echo base_url()?>career/index"><span>Add Careers</span></a></li>
        	 <li><a href="<?php echo base_url()?>career/manage"><span>Manage Careers</span></a></li>
          </ul>
        </li>
       
        <!--<li><a href="charts.html?lang=en&amp;menu_position=left-menu"><span>Charts</span></a></li>
        <li class="hasSubmenu"> <a data-toggle="collapse" href="#menu_forms"><span>Forms</span></a>
          <ul class="collapse" id="menu_forms">
            <li class=""><a href="form_demo.html?lang=en&amp;menu_position=left-menu"><span>My Account</span></a></li>
            <li class=""><a href="form_elements.html?lang=en&amp;menu_position=left-menu"><span>Form Elements</span></a></li>
            <li class=""><a href="form_validator.html?lang=en&amp;menu_position=left-menu"><span>Form Validator</span></a></li>
            <li class=""><a href="file_managers.html?lang=en&amp;menu_position=left-menu"><span>File Managers</span></a></li>
          </ul>
        </li>
        <li><a href="tables.html?lang=en&amp;menu_position=left-menu"><span>Tables</span></a></li>
        <li><a href="calendar.html?lang=en&amp;menu_position=left-menu"><span>Calendar</span></a></li>
        <li><a href="login.html?lang=en&amp;menu_position=left-menu"><span>Login</span></a></li>
        <li><a href="#themer" class="btn btn-large btn-inverse btn-block btn-themer" data-toggle="collapse"><span>Themer</span></a></li>
-->      </ul>
      <!--<ul>
        <li class="heading"><span>Sections</span></li>
        <li><a href="finances.html?lang=en&amp;menu_position=left-menu"><span>Finances</span></a></li>
        <li class="hasSubmenu"> <a data-toggle="collapse" href="#menu_ecommerce"><span>Online Shop</span></a>
          <ul class="collapse" id="menu_ecommerce">
            <li class=""><a href="products.html?lang=en&amp;menu_position=left-menu"><span>Products</span></a></li>
            <li class=""><a href="product_edit.html?lang=en&amp;menu_position=left-menu"><span>Add product</span></a></li>
          </ul>
        </li>
        <li><a href="pages.html?lang=en&amp;menu_position=left-menu"><span>Site Pages</span></a></li>
        <li><a href="gallery.html?lang=en&amp;menu_position=left-menu"><span>Photo Gallery</span></a></li>
        <li><a href="bookings.html?lang=en&amp;menu_position=left-menu"><span>Bookings</span></a></li>
      </ul>-->
    </div>