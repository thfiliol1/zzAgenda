/**
 * @author FILIOL Thomas / VALENTE Stéphane
 * This script manages the schedule view
 */


/**
* Function which manage the maps display based on the line number
* @param i line number
*/
function display_map(i){
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

/**
* Function which manage the heart display on a schedule
*/
jQuery(document).ready(function() {
    jQuery(".link_like").mouseover(function() {
        var id = jQuery(this).children('i').attr('id');
        jQuery("#"+id).attr('class','fa fa-heart-o');
    });
    
/**
* Function which manage the heart display on a schedule
*/    
jQuery(".link_like").mouseout(function() {
        var id = jQuery(this).children('i').attr('id');
        jQuery("#"+id).attr('class','fa fa-heart');
    });

/**
* Function which send a request to the server when you want to like a schedule
*/    
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

/**
* Function which manage the heart display on a schedule
*/ 
jQuery(".link_nolike").mouseover(function() {
        var id = jQuery(this).children('i').attr('id');
        jQuery("#"+id).attr('class','fa fa-heart');
    });

/**
* Function which manage the heart display on a schedule
*/ 
jQuery(".link_nolike").mouseout(function() {
        var id = jQuery(this).children('i').attr('id');
        jQuery("#"+id).attr('class','fa fa-heart-o');
    });


/**
* Function which send a request to the server when you want to dislike a schedule
*/  
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