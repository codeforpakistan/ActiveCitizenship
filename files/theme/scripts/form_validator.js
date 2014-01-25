$.validator.setDefaults(
{
	/*submitHandler: function() { 
		$.ajax({
 				  // see the (*)
		   url: baseURL+"/welcome/country/add",
		   type: 'post',
		  // data: data,
		   success: function(response) {
			console.log(response);
			 //response=JSON.parse(response);
			//  console.log(response);
			 /* if(response.error_code==1){}
				//$("#loginerror").html(response.msg);
			  else{
					location.href=baseURL+'/welcome'
			  }
		   }
		  });
		  return false;
	 },*/
	showErrors: function(map, list) 
	{
		this.currentElements.parents('label:first, .controls:first').find('.error').remove();
		this.currentElements.parents('.control-group:first').removeClass('error');
		
		$.each(list, function(index, error) 
		{
			var ee = $(error.element);
			var eep = ee.parents('label:first').length ? ee.parents('label:first') : ee.parents('.controls:first');
			
			ee.parents('.control-group:first').addClass('error');
			eep.find('.error').remove();
			eep.append('<p class="error help-block"><span class="label label-important">' + error.message + '</span></p>');
		});
		//refreshScrollers();
	}
});

$(function()
{
	// validate signup form on keyup and submit
	$("#validateSubmitForm").validate({
		rules: {
			firstname: "required",
			lastname: "required",
			username: {
				required: true,
				minlength: 2
			},
			password: {
				required: true,
				minlength: 5
			},
			confirm_password: {
				required: true,
				minlength: 5,
				equalTo: "#password"
			},
			email: {
				required: true,
				email: true
			},
			topic: {
				required: "#newsletter:checked",
				minlength: 2
			},
			agree: "required"
		},
		messages: {
			firstname: "Please enter your firstname",
			lastname: "Please enter your lastname",
			username: {
				required: "Please enter a username",
				minlength: "Your username must consist of at least 2 characters"
			},
			password: {
				required: "Please provide a password",
				minlength: "Your password must be at least 5 characters long"
			},
			confirm_password: {
				required: "Please provide a password",
				minlength: "Your password must be at least 5 characters long",
				equalTo: "Please enter the same password as above"
			},
			email: "Please enter a valid email address",
			agree: "Please accept our policy"
		}
	});
	$("#validateCountryForm").validate({
		rules: {
			country_name: "required",
			country_code: "required",
			country_name: {
				required: true				
			},
			country_name: {
				required: true
			},
			
		},
		messages: {
			country_name: "Please enter Country Name",
			country_code: "Please enter Country Code",
					}
	});
	$("#validateCityForm").validate({
		rules: {
			country_id: "required",
			city_name: "required",
			country_id: {
				required: true				
			},
			city_name: {
				required: true
			},
			
		},
		messages: {
			country_id: "Please Select a Country First",
			city_name: "Please enter City Name",
					}
	});
	

	
});