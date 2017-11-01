jQuery(document).ready(function() {
        
    jQuery("#link_schedule").click(function() {		
		jQuery.ajax({
			url: 'index.php?v=conferences',
			type: 'POST',              
			success : function(data, statut){                                
                            location.reload();
			}
		});
	})


	jQuery("#link_map").click(function() {		
		jQuery.ajax({
			url: 'index.php?v=map',
			type: 'POST',              
			success : function(data, statut){                                
                            location.reload();
			}
		});
	})


	jQuery("#link_admin").click(function() {		
		jQuery.ajax({
			url: 'index.php?v=admin',
			type: 'POST',              
			success : function(data, statut){                                
                            location.reload();
			}
		});
	})

	
});