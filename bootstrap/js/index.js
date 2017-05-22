/*  Created On  : 22-Feb
	Creadted By : Aamir
	Index Ajax File
	This File Loads Index Page with Data Fetched From Database Using index.php File--Not Done Yet
	
*/
// When Document Is Ready This Code Gets Execited. It Loads Main Divs With Data
$(document).ready(function(){
	
	$.get("process.php","userName=1",        function(data){$('.userNameDiv').html(data);});
	$.get("process.php","featuredProducts=1",function(data){$('.featuredProducts').html(data);});	
	$.get("process.php","latestProducts=1",  function(data){$('.latestProducts').html(data);});
	//$('#searchButton').click(function(){alert("clicked");});
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
// Upload Script
function validate(){
	//alert('Validation Of Form');
		
	xmlhttp=xmlhttpget();
	xmlhttp.onreadystatechange= function(){
		if (xmlhttp.readyState ==4 && xmlhttp.status ==200){
				document.getElementById('uploadDetails').innerHTML=xmlhttp.responseText;
				//document.getElementById('feedback').innerHTML=xmlhttp.responseText;
			}
	}	
		
	par='pTitle='+document.getElementById('producttitle').value;
	par+='&pSDesc='+document.getElementById('shortdesc').value;
	par+='&pPriceH='+document.getElementById('priceh').value;
	par+='&pPriceD='+document.getElementById('priced').value;
	par+='&pPriceW='+document.getElementById('pricew').value;
	par+='&pFDesc='+document.getElementById('fulldesc').value;
	par+='&pBrand='+document.getElementById('brand').value;
	par+='&pModel='+document.getElementById('pmodel').value;
	par+='&pSizeDim='+document.getElementById('sizedim').value;
	par+='&pOther='+document.getElementById('other').value;
	
	
		
	xmlhttp.open('POST', 'process.php');
	xmlhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
	xmlhttp.send(par);
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

function aloadFeaturedProducts(){
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
	alert("latestProducts");
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

