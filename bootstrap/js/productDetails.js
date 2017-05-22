$(document).ready(function(){
	
	$("#kartItem").click(function(){
		var p_ID=document.getElementById('k_pid').value;
		//alert("qw"+x);
		// First Check User Is Loged Inn Or Not
		$.get("process.php","logedIn=1",        function(data){
			var json=JSON.parse(data);
			if(json.logedIn=="0")
			{
				// User Is Not Logged In
				//location.href
				alert("Login First Please");
				window.location = ("login.html");
			}
			else
			{
				// User clicks on Add To Kart
				//$('#rowContainer').html(user.php);
				$.get("process.php","addToKart="+p_ID, function(data){
					alert(data);
					window.location = ("product_summary.php");
				});
				//window.location = ("user.php");
			}
		});		
	});
	var productId=getParameterByName("pid");
	if(productId==null)
	{	
		//No product Id is Given
		$('#productDetails').html("<div class='well'>Detail No Available Go Back</div>");
	}
	else{
		$.get("process.php","productId="+productId, function(data){
		if(data=='0')
		{
			$('#productDetails').html("<div class='well'>Detail No Available Go Back</div>");
		}
		else{
			//alert(data);
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
			/*$('#priceDay').html(myObj.p_price_d);
			$('#priceWeak').html(myObj.p_price_w);
			*/
			$('#k_pid').val(myObj.p_id);
			$('#pFDesc').html(myObj.p_f_desc);
			
			$('.pBrand').html(myObj.p_brand);
			$('.pModel').html(myObj.p_model);
			$('.pDimen').html(myObj.p_size_dim);
			$('.pOther').html(myObj.p_other);
			$('#badgeup').html(myObj.p_like);
			$('#badgedown').html(myObj.p_dislike);
			
		}
		});
	
	}
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

//When User Clicks On Add To Kart
function addToKart(){
	var x=document.getElementById('k_pid').value;
	//var x=document.getElementById('k_pid');
	alert('Added'+x);
	
}
