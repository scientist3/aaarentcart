$(document).ready(function(){
	var productId=getParameterByName("pid");
	$.get("process.php","productId="+productId, function(data){
		var myObj = JSON.parse(data);
		$('.test2').html(data);
		
		$('#pTitle').html(myObj.p_title);
		$('#pSDesc').html(myObj.p_s_desc);
		//Full Image- Main
		$('#pPicA').attr("href", ""+myObj.p_pic);
		$('#pPicI').attr("src", ""+myObj.p_pic);
		// Back Side Image
		$('#backPicA').attr("href", ""+myObj.p_pic_back);
		$('#backPicI').attr("src", ""+myObj.p_pic_back);
		// Lside Image
		$('#LsidePicA').attr("href", ""+myObj.p_pic_lside);
		$('#LsidePicI').attr("src", ""+myObj.p_pic_lside);
		// Rside Image
		$('#RsidePicA').attr("href", ""+myObj.p_pic_rside);
		$('#RsidePicI').attr("src", ""+myObj.p_pic_rside);
		
		$('#pPicA').attr("title", ""+myObj.p_title);
		$('#pPicI').attr("alt", ""+myObj.p_title);
		
		$('#priceHour').html(myObj.p_price_h);
		$('#priceDay').html(myObj.p_price_d);
		$('#priceWeak').html(myObj.p_price_w);
		
		$('#pFDesc').html(myObj.p_f_desc);
		
		$('.brand').html(myObj.p_brand);
		$('.model').html(myObj.p_model);
		$('.dimen').html(myObj.p_size_dim);
		$('.other').html(myObj.p_other);
		$('#badgeup').html(myObj.p_like);
		$('#badgedown').html(myObj.p_dislike);
		
		
		});
	
});
// Get parameter value Of The Product Id Passed Along With Query String
function getParameterByName(name, url) {
    if (!url) {
      url = window.location.href;
    }
    name = name.replace(/[\[\]]/g, "\\$&");
    var regex = new RegExp("[?&]" + name + "(=([^&#]*)|&|#|$)"),
        results = regex.exec(url);
    if (!results) return null;
    if (!results[2]) return '';
    return decodeURIComponent(results[2].replace(/\+/g, " "));
}

// This Function IS Used To Check Which Ajax  Object Is Availabe The According Loads Ajax Object
function xmlhttpget(){
	if (window.XMLHttpRequest)
	{
		xmlhttp = new XMLHttpRequest();
		return xmlhttp;
	}else
	{
		xmlhttp = new ActiveXObject('Microsoft.XMLHTTP');
		return xmlhttp;
	}
}
