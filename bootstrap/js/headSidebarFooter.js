$(document).ready(function(){
	
	$(".navdiv").load("navbar.html");
	$(".sliderdiv").load("slider.html");
	$(".footerdiv").load("footer.html");
	$(".sidebardiv").load("sidebar.html");
	$.get("process.php","productCatagory=1", function(data){$('#productCatagory').html(data);});
	
	//$.get("process.php","userName=1",        function(data){$('.userdiv').html(data);});
});

function loadSearchResults(){
	//alert("Wait! Loading Search Results");
	if(document.getElementById('srchFld').value!=""){
	$('.sliderdiv').html("");
	$('#searchResult').html("");
	xmlhttp=xmlhttpget();
	xmlhttp.onreadystatechange= function(){
		if (xmlhttp.readyState ==4 && xmlhttp.status ==200){
			document.getElementById('searchResult').innerHTML=xmlhttp.responseText;
		}
	}		
	par="searchResults=1";
	par+="&s="+document.getElementById('srchFld').value;
	par+="&c="+document.getElementById('productCatagory').value;
	//alert(par);
	xmlhttp.open('POST', 'process.php');
	xmlhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
	xmlhttp.send(par);}
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