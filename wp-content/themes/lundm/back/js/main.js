jQuery(document).ready(function(){
	if(jQuery("#Quicklinks").length > 0){
		var html = "";
		var html1 = "";
		jQuery("#Quicklinks .entry-element").each(function(e, f){
			 html = jQuery("p:nth-child(3)", f).html();
			 html1 = jQuery("p:nth-child(2) a", f).html();
			 jQuery("p:nth-child(2) a", f).html("<span class=\"middle\"><span>"+html+" <br> <r>weiterlesen...</r></span></span>"+html1);
			 jQuery("p:nth-child(3)", f).remove();
			 html = "";
		});
	}

	jQuery(document).click(function(){
		if(jQuery("#footer .topLeft .formfield div[role=\"alert\"].wpcf7-mail-sent-ok").is(":visible")){
			jQuery("#footer .topLeft .formfield div[role=\"alert\"].wpcf7-mail-sent-ok").fadeOut();
		}
	});
	jQuery("#footer .topLeft .formfield div[role=\"alert\"].wpcf7-mail-sent-ok").click(function(){
		if(jQuery("#footer .topLeft .formfield div[role=\"alert\"].wpcf7-mail-sent-ok").is(":visible")){
			jQuery("#footer .topLeft .formfield div[role=\"alert\"].wpcf7-mail-sent-ok").fadeOut();
		}
	});
});