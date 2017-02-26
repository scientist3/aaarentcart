/*  Created On  : 22-Feb
	Creadted By : Aamir
	Index Ajax File
	This File Loads Index Page with Data Fetched From Database Using index.php File--Not Done Yet
	
*/
// When Document Is Ready This Code Gets Execited. It Loads Main Divs With Data
$(document).ready(function(){
	
	$.get("process.php","userName=1",function(data){
		$('.userdiv').html(data);
	});
	$.get("process.php","featuredProducts=1",function(data){
		$('.featuredProducts').html(data);
	});
	
	$.get("process.php","latestProducts=1",function(data){
		$('.latestProducts').html(data);
	});
});

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

// This Function return UserName If It is Set Or Return Guest ANd Loads That into userNameDiv span
function loadUserName(){
	//alert("Load User Name Function In Call Back Of Load userNameDiv");
	xmlhttp=xmlhttpget();
	xmlhttp.onreadystatechange= function(){
		if (xmlhttp.readyState ==4 && xmlhttp.status ==200){
			//alert(xmlhttp.responseText);
			document.getElementById('userdiv').innerHTML=xmlhttp.responseText;
		}
	}		
	par="userName=1";
	xmlhttp.open('POST', 'process.php');
	xmlhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
	xmlhttp.send(par);
}

function loadFeaturedProducts(){
	alert("featuredProducts");
	xmlhttp=xmlhttpget();
	xmlhttp.onreadystatechange= function(){
		if (xmlhttp.readyState ==4 && xmlhttp.status ==200){
			//alert(xmlhttp.responseText);
			document.getElementById('featuredProducts').innerHTML=xmlhttp.responseText;
		}
	}		
	par="featuredProducts=1";
	xmlhttp.open('POST', 'process.php');
	xmlhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
	xmlhttp.send(par);		
}

function loadLatestProducts(){
	//alert("latestProducts");
	xmlhttp=xmlhttpget();
	xmlhttp.onreadystatechange= function(){
		if (xmlhttp.readyState ==4 && xmlhttp.status ==200){
			//alert(xmlhttp.responseText);
			document.getElementById('latestProducts').innerHTML=xmlhttp.responseText;
		}
	}		
	par="latestProducts=1";
	xmlhttp.open('POST', 'process.php');
	xmlhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
	xmlhttp.send(par);	
}

