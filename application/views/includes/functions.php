<script>
var baseURL='<?php echo base_url()?>'
$(document).ready(function () {
	
 $('form.form-signin').on('submit', function() {
  var obj = $(this), // (*) references the current object/form each time
   url = obj.attr('action'),
   method = obj.attr('method'),
   data = {};

  obj.find('[name]').each(function(index, value) {
   // console.log(value);
   var obj = $(this),
    name = obj.attr('name'),
    value = obj.val();

   data[name] = value;
  });

  $.ajax({
   // see the (*)
   url: url,
   type: method,
   data: data,
   success: function(response) {
    console.log(response);
	 response=JSON.parse(response);
	  console.log(response);
	  if(response.error_code==1)
     	$("#loginerror").html(response.msg);
	  else{
		  	location.href=baseURL+'/welcome'
	  }
   }
  });
  return false; //disable refresh
 });
}); 
</script>