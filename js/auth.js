jQuery(document).ready(function() {

    jQuery("#buttonAuth").click(function() {
		var email = jQuery("#field_email").val();
		var pwd = jQuery("#field_password").val();
		console.log(pwd);
		console.log(email);
		
		jQuery.ajax({
			url: 'index.php?v=connexion',
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
                                }
                                else{
                                    jQuery("#message").html("<div class='alert alert-danger' role='alert'>"+res.msg+"</div>");
                                }
                                console.log(res);
				
			}
		});
	})
});