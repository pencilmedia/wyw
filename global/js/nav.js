var nav = {};

nav.init = function() 
{
	
	var navClicked   = $("#global_nav li a");
	var navHighlight = $("#global_nav li");
	
	navClicked.click( nav.selected );
	
}
nav.selected = function() 
{
	var about 		= $("body#about");
	var services 	= $("body#services");
	var contact		= $("body#contact");
	var history		= $("body#history");
	
	bTag = document.body.id;
	$(document).ready( function() { $('body').css({ color: "red", background: "blue" }); } );
	
	if (bTag == "about") {
		alert(bTag);
		bTag.css({ color: "red", background: "blue" });
		$(document).ready( function(){ jQuery("nav_about").addClass("selected"); } );
	}
	
	if (bTag == "services") {
		alert(bTag);
		bTag.css({ color: "red", background: "green" });
		$(document).ready( function(){ jQuery("nav_services").addClass("selected"); } );
	}
/*
switch ()
{
case "nav_about":
  alert('about');
  break;
case "nav_services":
  alert('services');
  break;
case "nav_contact":
  alert('contact');
  break;
default:
  
}
*/
	

}

$(document).ready( nav.init );