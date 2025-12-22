var common = {};

common.init = function() 
{
	common.pagination();
	common.homeBtn();
}

common.homeBtn = function()
{
	var navHome = $("#logo a");
	navHome.mouseover( function() { navHome.after("<em class='homeBtn'>Back to Homepage</em>"); } );
	navHome.mouseout( function() { jQuery(".homeBtn").hide(); } );
}

common.pagination = function() 
{
	var pg1Div   = jQuery("#page1");
	var pg2Div   = jQuery("#page2");
	var pg1		 = jQuery(".pg1");
	var pg2		 = jQuery(".pg2");
	
	pg2Div.hide();	
	pg1.hide();
	
	pg2.click(
		function () {
			jQuery(pg1Div).hide();	
			jQuery(pg2Div).show();
			jQuery(pg2).hide();
			jQuery(pg1).show();
		}		  
	);
	pg1.click(
		function () {
			jQuery(pg2Div).hide();
			jQuery(pg1Div).show();	
			jQuery(pg1).hide();
			jQuery(pg2).show();
		}		  
	);
}

	
$(document).ready( common.init );