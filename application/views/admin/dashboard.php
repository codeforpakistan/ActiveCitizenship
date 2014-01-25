<!DOCTYPE html>
<!--[if lt IE 7]> <html class="lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>    <html class="lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>    <html class="lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!-->
<html>
<!--<![endif]-->
<head>
<?php
		$this->load->view("admin/head");
	?>
</head>
<body>

<!-- Start Content -->
<div class="container-fluid fixed left-menu">
  <div id="wrapper">
    <?php $this->load->view("admin/leftmenu"); ?>
    <div id="content"> 
      <?php $this->load->view("admin/".$view); ?>
    </div>
  </div>
</div>


 <?php $this->load->view("admin/footer"); ?>


</body>
</html>