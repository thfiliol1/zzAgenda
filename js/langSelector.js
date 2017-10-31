$(document).ready(function(){
		var fraImgLink = "http://www.roemheld.de/IT/Data/Images/Address/Frankreich.gif";
                var engImgLink = "http://www.roemheld.de/IT/Data/Images/Address/Grossbritanien.gif";
		
                var lang = getCookie("lang");
    
		var imgBtnSel = $('#imgBtnSel');
		var imgBtnFra = $('#imgBtnFra');
		var imgBtnEng = $('#imgBtnEng');

		var imgNavSel = $('#imgNavSel');
		var imgNavFra = $('#imgNavFra');
		var imgNavEng = $('#imgNavEng');
		

		var spanNavSel = $('#lanNavSel');
		var spanBtnSel = $('#lanBtnSel');

                if (lang == "en"){
                    imgNavSel.attr("src",engImgLink);
                    spanNavSel.text("ENG");
                    imgBtnSel.attr("src",engImgLink);
                    spanBtnSel.text("ENG");
                    
                } else if (lang == "fr"){
                    imgNavSel.attr("src",fraImgLink);
                    spanNavSel.text("FRA");
                    imgBtnSel.attr("src",fraImgLink);
                    spanBtnSel.text("FRA");
                }else{
                    imgNavSel.attr("src",fraImgLink);
                    spanNavSel.text("FRA");
                    imgBtnSel.attr("src",fraImgLink);
                    spanBtnSel.text("FRA");
                }

		
		imgBtnEng.attr("src",engImgLink);
                imgBtnFra.attr("src",fraImgLink);
		
		imgNavEng.attr("src",engImgLink);
                imgNavFra.attr("src",fraImgLink);

		$( ".language" ).on( "click", function( event ) {
			var currentId = $(this).attr('id');

			if (currentId == "navFra") {
				imgNavSel.attr("src",fraImgLink);
				spanNavSel.text("FRA");
                                setCookie("lang","fr");
			} else if (currentId == "navEng") {
				imgNavSel.attr("src",engImgLink);
				spanNavSel.text("ENG");
                                setCookie("lang","en");
			}

			if (currentId == "btnFra") {
				imgBtnSel.attr("src",fraImgLink);
				spanBtnSel.text("FRA");
			} else if (currentId == "btnEng") {
				imgBtnSel.attr("src",engImgLink);
				spanBtnSel.text("ENG");
			}
			location.reload();
		});
});

function setCookie(sName, sValue) {
        var today = new Date(), expires = new Date();
        expires.setTime(today.getTime() + (20*24*60*60*1000));
        document.cookie = sName + "=" + encodeURIComponent(sValue) + ";expires=" + expires.toGMTString();
}

function getCookie(sName) {
        var cookContent = document.cookie, cookEnd, i, j;
        var sName = sName + "=";
 
        for (i=0, c=cookContent.length; i<c; i++) {
                j = i + sName.length;
                if (cookContent.substring(i, j) == sName) {
                        cookEnd = cookContent.indexOf(";", j);
                        if (cookEnd == -1) {
                                cookEnd = cookContent.length;
                        }
                        return decodeURIComponent(cookContent.substring(j, cookEnd));
                }
        }       
        return null;
}