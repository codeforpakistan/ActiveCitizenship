$(document).ready(function() {

	$().UItoTop({
		easingType : 'easeOutQuart'
	});

	//=================================== styled controls =================================//

	//$.jStyling({'fileButtonText': 'Browse file'})
	//$.jStyling.createSelect($('select'));
	$.jStyling.createCheckbox($('input[type=checkbox]'));
	$.jStyling.createRadio($('input[type=radio]'));
	//$.jStyling.createFileInput($('input[type=file]'));
	$('.selectpicker').selectpicker();



	//=================================== Hover Features CSS Animation =================================//
	$('.tips.first .item').hover(function() {
		$(this).toggleClass('animated shake');
	});
	
	
	//=================================== Hover pricing CSS Animation =================================//
	$('.pricing .item').hover(function() {
		$(this).toggleClass('animated pulse');
	});

	$('.btn-login a').click(function() {
		$(this).parent('.btn-login').toggleClass('show');
		return false
	});



	//=================================== grid gallery =====================================//
	$('#ri-grid').gridrotator({

		// number of rows
		rows : 3,

		// number of columns
		columns : 12,

		// rows/columns for different screen widths
		// i.e. w768 is for screens smaller than 768 pixels
		w1024 : {
			rows : 3,
			columns : 10
		},

		w768 : {
			rows : 3,
			columns : 7
		},

		w480 : {
			rows : 3,
			columns : 5
		},

		w320 : {
			rows : 2,
			columns : 4
		},

		w240 : {
			rows : 2,
			columns : 3
		},

		// step: number of items that are replaced at the same time
		// random || [some number]
		// note: for performance issues, the number should not be > options.maxStep
		step : 'random',
		maxStep : 3,

		// prevent user to click the items
		preventClick : true,

		// animation type
		// showHide || fadeInOut || slideLeft ||
		// slideRight || slideTop || slideBottom ||
		// rotateLeft || rotateRight || rotateTop ||
		// rotateBottom || scale || rotate3d ||
		// rotateLeftScale || rotateRightScale ||
		// rotateTopScale || rotateBottomScale || random
		animType : 'random',

		// animation speed
		animSpeed : 500,

		// animation easings
		animEasingOut : 'linear',
		animEasingIn : 'linear',

		// the item(s) will be replaced every 3 seconds
		// note: for performance issues, the time "can't" be < 300 ms
		interval : 3000,
		// if false the animations will not start
		// use false if onhover is true for example
		slideshow : true,
		// if true the items will switch when hovered
		onhover : false,
		// ids of elements that shouldn't change
		nochange : []

	});




	//=================================== Tooltips =====================================//

	if ($.fn.tooltip()) {
		$('.footer [class="tooltip_hover"]').tooltip({
			placement : "top"
		});
	}
	
	
	
	//=================================== Slider  =================================//

	$("#slider").responsiveSlides({
		auto : true, // Boolean: Animate automatically, true or false
		speed : 500, // Integer: Speed of the transition, in milliseconds
		timeout : 4000, // Integer: Time between slide transitions, in milliseconds
		pager : true, // Boolean: Show pager, true or false
		nav : false, // Boolean: Show navigation, true or false
		random : false, // Boolean: Randomize the order of the slides, true or false
		pause : false, // Boolean: Pause on hover, true or false
		pauseControls : true, // Boolean: Pause when hovering controls, true or false
		prevText : "Previous", // String: Text for the "previous" button
		nextText : "Next", // String: Text for the "next" button
		maxwidth : "", // Integer: Max-width of the slideshow, in pixels
		navContainer : "", // Selector: Where controls should be appended to, default is after the 'ul'
		manualControls : "", // Selector: Declare custom pager navigation
		namespace : "rslides", // String: Change the default namespace used
		before : function() {
		}, // Function: Before callback
		after : function() {
		} // Function: After callback
	});
	
	
	
	
	//=================================== Testimonials Slider  =================================//

	$("#slider2").responsiveSlides({
		auto : true, // Boolean: Animate automatically, true or false
		speed : 500, // Integer: Speed of the transition, in milliseconds
		timeout : 4000, // Integer: Time between slide transitions, in milliseconds
		pager : false, // Boolean: Show pager, true or false
		nav : true, // Boolean: Show navigation, true or false
		random : false, // Boolean: Randomize the order of the slides, true or false
		pause : false, // Boolean: Pause on hover, true or false
		pauseControls : true, // Boolean: Pause when hovering controls, true or false
		prevText : "Previous", // String: Text for the "previous" button
		nextText : "Next", // String: Text for the "next" button
		maxwidth : "", // Integer: Max-width of the slideshow, in pixels
		navContainer : "", // Selector: Where controls should be appended to, default is after the 'ul'
		manualControls : "", // Selector: Declare custom pager navigation
		namespace : "rslides", // String: Change the default namespace used
		before : function() {
		}, // Function: Before callback
		after : function() {
		} // Function: After callback
	});





	//=================================== Video responsive  =================================//
	$("#video").fitVids();
	


	//=================================== Newssleter Form =================================//
	$("#newsletter a.btn").click(function() {
		$("#newsletter").submit();
		return false
	});

	//=================================== Forms =================================//
	$("#newsletter, #joinForm").submit(function() {
		var elem = $(this);
		var urlTarget = $(this).attr("action");
		$.ajax({
			type : "POST",
			url : urlTarget,
			dataType : "html",
			data : $(this).serialize(),
			beforeSend : function() {
				elem.prepend("<div class='loading alert'>" + "<a class='close' data-dismiss='alert'>×</a>" + "Loading" + "</div>");
				//elem.find(".loading").show();
			},
			success : function(response) {
				elem.prepend(response);
				//elem.find(".response").html(response);
				elem.find(".loading").hide();
				elem.find("input[type='text'],input[type='email'],textarea").val("");
			}
		})
		return false;
	});




	//=================================== CSS Animations =================================//

		var lefts = $(".left"), rights = $(".right"), bottoms = $(".bottom"), rotates = $(".rotate"), 
		left_tops = lefts.map(function() {
			return $(this).offset().top;
		}), right_tops = rights.map(function() {
			return $(this).offset().top;
		}), bottom_tops = bottoms.map(function() {
			return $(this).offset().top;
		}), rotate_tops = rotates.map(function() {
			return $(this).offset().top;
		});

	$(window).load(function() {
		left_tops = lefts.map(function() {
			return $(this).offset().top;
		});
		right_tops = rights.map(function() {
			return $(this).offset().top;
		});
		bottom_tops = bottoms.map(function() {
			return $(this).offset().top;
		});
		rotate_tops = rotates.map(function() {
			return $(this).offset().top;
		});
	});

	$(window).scroll(function() {
		/*------------------------------------------------------------
		 All Template Animation
		 -------------------------------------------------------------*/
		var scrollVisible = $(window).scrollTop() + $(window).height();
		$(left_tops).each(function(i) {
			if (scrollVisible > this)
				$(lefts[i]).css({
					left : 0
				});
		});

		$(right_tops).each(function(i) {
			if (scrollVisible > this )
				$(rights[i]).css({
					right : 0
				});
		});

		$(bottom_tops).each(function(i) {
			if (scrollVisible > this - 1000)
				$(bottoms[i]).css({
					bottom : 0
				});
		});

		$(rotate_tops).each(function(i) {
			if (scrollVisible > this + 3000)
				$(rotates[i]).addClass("rotate-normal");
		});
		/*------------------------------------------------------------
		 End All Template Animation
		 -------------------------------------------------------------*/
	});

});

