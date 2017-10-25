$(document).ready(function(){
		var fraImgLink = "http://www.roemheld.de/IT/Data/Images/Address/Frankreich.gif";
    	var engImgLink = "http://www.roemheld.de/IT/Data/Images/Address/Grossbritanien.gif";
		

		var imgBtnSel = $('#imgBtnSel');
		var imgBtnFra = $('#imgBtnFra');
		var imgBtnEng = $('#imgBtnEng');

		var imgNavSel = $('#imgNavSel');
		var imgNavFra = $('#imgNavFra');
		var imgNavEng = $('#imgNavEng');
		

		var spanNavSel = $('#lanNavSel');
		var spanBtnSel = $('#lanBtnSel');

		imgBtnSel.attr("src",fraImgLink);
		imgBtnFra.attr("src",fraImgLink);
		imgBtnEng.attr("src",engImgLink);

		imgNavSel.attr("src",fraImgLink);
		imgNavFra.attr("src",fraImgLink);
		imgNavEng.attr("src",engImgLink);

		$( ".language" ).on( "click", function( event ) {
			var currentId = $(this).attr('id');

			if (currentId == "navFra") {
				imgNavSel.attr("src",fraImgLink);
				spanNavSel.text("FRA");
			} else if (currentId == "navEng") {
				imgNavSel.attr("src",engImgLink);
				spanNavSel.text("ENG");
			}

			if (currentId == "btnFra") {
				imgBtnSel.attr("src",fraImgLink);
				spanBtnSel.text("FRA");
			} else if (currentId == "btnEng") {
				imgBtnSel.attr("src",engImgLink);
				spanBtnSel.text("ENG");
			}
			
		});
});
