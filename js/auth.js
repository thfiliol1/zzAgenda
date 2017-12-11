jQuery(document).ready(function() {

    jQuery("#buttonAuth").click(function() {
		login();
	})

	 jQuery("#form").keyup(function(e) {
      if(e.keyCode == 13) {
            login();
       }
	});

        
    jQuery("#link_logout").click(function() {		
		jQuery.ajax({
			url: 'index.php?v=disconnect',
			type: 'POST',              
			success : function(data, statut){                                
                            location.reload();
			}
		});
	})
});

function login() {
	var email = jQuery("#field_email").val();
		var pwd = jQuery("#field_password").val();
		
		jQuery.ajax({
			url: 'index.php?v=connect',
			type: 'POST', 
			data: {
				"email":email,
				"pwd":pwd 
			},
			beforeSend : function() { // traitements JS à faire AVANT l'envoi
					jQuery('#result').html('<div id="chargement" class="container" align="center"><img src="images/ajax-loader.gif" alt="loader" id="ajax-loader" /></div>'); // ajout d'un loader pour signifier l'action
			},                 
			success : function(data, statut){                                
                                var res = JSON.parse(data);
                                jQuery("#result").remove();
                                if(res.error == 0){
                                    jQuery("#message").html("<div class='alert alert-success' role='alert'>"+res.msg+"</div>");

                                    window.location.replace('index.php?v=conferences');
                                }
                                else{
                                    jQuery("#message").html("<div class='alert alert-danger' role='alert'>"+res.msg+"</div>");
                                }				
			}
		});
}