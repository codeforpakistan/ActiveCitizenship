<title><?php echo $title?></title>

<!-- Meta -->
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0">
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="black">

<!-- Bootstrap -->
<link href="<?php echo base_url()?>files/bootstrap/css/bootstrap.min.css?t=<?php echo time()?>" rel="stylesheet" />

<!-- Bootstrap Extended -->
<link href="<?php echo base_url()?>files/bootstrap/extend/jasny-bootstrap/css/jasny-bootstrap.min.css?t=<?php echo time()?> " rel="stylesheet">
<link href="<?php echo base_url()?>files/bootstrap/extend/jasny-bootstrap/css/jasny-bootstrap-responsive.min.css?t=<?php echo time()?> " rel="stylesheet">
<link href="<?php echo base_url()?>files/bootstrap/extend/bootstrap-wysihtml5/css/bootstrap-wysihtml5-0.0.2.css?t=<?php echo time()?> " rel="stylesheet">

<!-- Select2 -->
<link rel="stylesheet" href="<?php echo base_url()?>files/theme/scripts/select2/select2.css?t=<?php echo time()?> "/>

<!-- Notyfy -->
<link rel="stylesheet" href="<?php echo base_url()?>files/theme/scripts/notyfy/jquery.notyfy.css?t=<?php echo time()?> "/>
<link rel="stylesheet" href="<?php echo base_url()?>files/theme/scripts/notyfy/themes/default.css?t=<?php echo time()?> "/>

<!-- JQueryUI v1.9.2 -->
<link rel="stylesheet" href="<?php echo base_url()?>files/theme/scripts/jquery-ui-1.9.2.custom/css/smoothness/jquery-ui-1.9.2.custom.min.css?t=<?php echo time()?> " />

<!-- Glyphicons -->
<link rel="stylesheet" href="<?php echo base_url()?>files/theme/css/glyphicons.css?t=<?php echo time()?> " />

<!-- Bootstrap Extended -->
<link rel="stylesheet" href="<?php echo base_url()?>files/bootstrap/extend/bootstrap-select/bootstrap-select.css?t=<?php echo time()?> " />
<link rel="stylesheet" href="<?php echo base_url()?>files/bootstrap/extend/bootstrap-toggle-buttons/static/stylesheets/bootstrap-toggle-buttons.css?t=<?php echo time()?> " />

<!-- Uniform -->
<link rel="stylesheet" media="screen" href="<?php echo base_url()?>files/theme/scripts/pixelmatrix-uniform/css/uniform.default.css?t=<?php echo time()?> " />

<!-- JQuery v1.8.2 -->
<script src="<?php echo base_url()?>files/theme/scripts/jquery-1.8.2.min.js?t=<?php echo time()?> "></script>

<!-- Modernizr -->
<script src="<?php echo base_url()?>files/theme/scripts/modernizr.custom.76094.js?t=<?php echo time()?> "></script>

<!-- MiniColors -->
<link rel="stylesheet" media="screen" href="<?php echo base_url()?>files/theme/scripts/jquery-miniColors/jquery.miniColors.css?t=<?php echo time()?> " />

<!-- Theme -->
<link rel="stylesheet" href="<?php echo base_url()?>files/theme/css/style.min.css?1363027424" />

<!-- LESS 2 CSS -->
<script src="<?php echo base_url()?>files/theme/scripts/less-1.3.3.min.js?t=<?php echo time()?> "></script>
<script src="<?php echo base_url()?>files/js/jquery.autocomplete.js?t=<?php echo time()?> "></script>

<script type="text/javascript" src="<?php echo base_url()?>files/js/jquery.datepick.js?t=<?php echo time()?>"></script>
<script type="text/javascript">
$(function() {
	if($('#last_date').size()>0)$('#last_date').datepick();
	if($("#posted_date").size()>0)$("#posted_date").datepick();
	if($("#course_admissiondeadline").size()>0) $("#course_admissiondeadline").datepick();
	//$('#inlineDatepicker').datepick({onSelect: ''});
	
});
</script>
<!--[if IE]><script type="text/javascript" src="<?php echo base_url()?>files/theme/scripts/excanvas/excanvas.js?t=<?php echo time()?> "></script><![endif]-->
<!--[if lt IE 8]><script type="text/javascript" src="<?php echo base_url()?>files/theme/scripts/json2.js?t=<?php echo time()?> "></script><![endif]-->
<?php
		$this->load->view("includes/functions");
	?>
	
   <link rel="stylesheet" media="screen" href="<?php echo base_url()?>files/css/jquery.datepick.css?t=<?php echo time()?> " />