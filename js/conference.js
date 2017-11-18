function afficher_carte(i){
		jQuery.ajax({
                        dataType: 'jsonp',
			url: 'https://maps.googleapis.com/maps/api/js?key=AIzaSyDYquPRb7Zc_Jp405LMhQOFSuRP5VBPPgk',
			type: 'GET',              
			success : function(data, statut){     ;
                            var location = jQuery("#lien"+i).html();

                            jQuery.ajax({
                                    url: 'http://maps.googleapis.com/maps/api/geocode/json?address='+location,
                                    type: 'GET',              
                                    success : function(data, statut){     ;
                                         // console.log(data.results[0].geometry.location);
                                        var uluru = {lat:  data.results[0].geometry.location.lat, 
                                                     lng: data.results[0].geometry.location.lng};
                                        var map = new google.maps.Map(jQuery('#carte')[0], {
                                          zoom: 15,
                                          center: uluru
                                        });
                                        var marker = new google.maps.Marker({
                                          position: uluru,
                                          map: map
                                        });
                                    }
                            });
			}
		});    
}

jQuery(document).ready(function() {
    jQuery(".link_like").mouseover(function() {
        var id = jQuery(this).children('i').attr('id');
        jQuery("#"+id).attr('class','fa fa-heart-o');
    });
    
    jQuery(".link_like").mouseout(function() {
        var id = jQuery(this).children('i').attr('id');
        jQuery("#"+id).attr('class','fa fa-heart');
    });
    
    jQuery(".link_like").click(function() {
        var id = jQuery(this).children('i').attr('id');
        var res = id.split('_');
        var idConf = res[2];
        
        jQuery.ajax({
                url: 'index.php?v=delete_like',
                type: 'POST', 
                data: {
                        "id_conference":idConf 
                },                
                success : function(data, statut){              
                        location.reload();                      
                }
        });
    });    
    
    jQuery(".link_nolike").mouseover(function() {
        var id = jQuery(this).children('i').attr('id');
        jQuery("#"+id).attr('class','fa fa-heart');
    });
    
    jQuery(".link_nolike").mouseout(function() {
        var id = jQuery(this).children('i').attr('id');
        jQuery("#"+id).attr('class','fa fa-heart-o');
    });

    jQuery(".link_nolike").click(function() {
        var id = jQuery(this).children('i').attr('id');
        var res = id.split('_');
        var idConf = res[2];
        
        jQuery.ajax({
                url: 'index.php?v=add_like',
                type: 'POST', 
                data: {
                        "id_conference":idConf 
                },                
                success : function(data, statut){              
                       location.reload();                      
                }
        });
    });
    
});
/*
function afficher_carte(i){
    var location = jQuery("#lien"+i).html();

    jQuery.ajax({
            url: 'http://maps.googleapis.com/maps/api/geocode/json?address='+location,
            type: 'GET',              
            success : function(data, statut){     ;
                 // console.log(data.results[0].geometry.location);
                var uluru = {lat:  data.results[0].geometry.location.lat, 
                             lng: data.results[0].geometry.location.lng};
                var map = new google.maps.Map(jQuery('#carte')[0], {
                  zoom: 4,
                  center: uluru
                });
                var marker = new google.maps.Marker({
                  position: uluru,
                  map: map
                });
            }
    });


    
}*/