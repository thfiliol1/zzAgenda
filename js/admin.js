/**
 * @author FILIOL Thomas / VALENTE Stéphane
 * This script manages the administration view
 */

var edit_id = 0;
var del_id = 0;

jQuery(document).ready(function() {
    /**
     * Function called when an administration edits a schedule
     */
    jQuery("#edit_button").click(function() {
    	var id = edit_id;
		var date = jQuery("#edit_date").val()
		var title = jQuery("#edit_title").val();
		var city = jQuery("#edit_city").val();
		var speaker = jQuery("#edit_speaker").val();
		var description = jQuery("#edit_description").html();
		console.log(description);
		
		
		jQuery.ajax({
			url: 'index.php?v=editConf',
			type: 'POST', 
			data: {
				"id":id,
				"date":date,
				"title":title,
				"city":city,
				"speaker":speaker,
				"description":description 
			},                
			success : function(data, statut){       
								var res = JSON.parse(data);
                                if(res != null){
                                    jQuery("#message_admin_modify").html("<div class='alert alert-danger' role='alert'>"+res.msg+"</div>");
                                }
                                else{
                                    location.reload();	
                                }	                         
                                	
			}
		});
	})
        /**
        * Function called when an administration adds a schedule
        */
	jQuery("#add_button").click(function() {

		var date = jQuery("#add_date").val()
		var title = jQuery("#add_title").val();
		var city = jQuery("#add_city").val();
		var speaker = jQuery("#add_speaker").val();
		var description = jQuery("#add_description").html();

		
		
		jQuery.ajax({
			url: 'index.php?v=addConf',
			type: 'POST', 
			data: {
				"date":date,
				"title":title,
				"city":city,
				"speaker":speaker,
				"description":description 
			},                
			success : function(data, statut){                             
                                var res = JSON.parse(data);
                                if(res != null){
                                    jQuery("#message_admin_add").html("<div class='alert alert-danger' role='alert'>"+res.msg+"</div>");
                                }
                                else{
                                    location.reload();	
                                }	 	
			}
		});
	})

        /**
        * Function called when an administration deletes a schedule
        */
	jQuery("#del_button").click(function() {
    	var id = del_id;
		console.log(id);
		jQuery.ajax({
			url: 'index.php?v=delConf',
			type: 'POST', 
			data: {
				"id":id
			},                
			success : function(data, statut){                                
                                location.reload();		
			}
		});
	})



        
    
});


/**
* function which fills out the edit forms based on the clicked schedule in the board
* @param clicked_id Schedule identifier
*/
function edit_click(clicked_id) {
	edit_id = document.getElementsByName('td_idConf'+clicked_id)[0].innerHTML;
    $("#edit_date").val(document.getElementsByName('td_date'+clicked_id)[0].innerHTML);
    $("#edit_title").val(document.getElementsByName('td_titre'+clicked_id)[0].innerHTML);
    $("#edit_city").val(document.getElementsByName('td_city'+clicked_id)[0].innerHTML);
    $("#edit_speaker").val(document.getElementsByName('td_speaker'+clicked_id)[0].innerHTML);
    $("#edit_description").html(document.getElementsByName('td_description'+clicked_id)[0].innerHTML);
}

/**
* function which recovers the identifier of the conference that the administrator wants to delete
* @param clicked_id Schedule identifier
*/
function del_click(clicked_id) {
	del_id = document.getElementsByName('td_idConf'+clicked_id)[0].innerHTML;
}

/**
* function which manages the font format into the add and edit pop-up
* @param name Name of the font modifier (bold,italic,underligned...)
*/
function commande(name, argument) {
  if (typeof argument === 'undefined') {
    argument = '';
  }
  
  document.execCommand(name, false, argument);
}