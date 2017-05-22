$(document).ready(function(){
	
	$(".navdiv").load("navbar.html");
	$(".sliderdiv").load("slider.html");
	$(".footerdiv").load("footer.html");
	$(".sidebardiv").load("sidebar.html");
	
	// Request To Find Total Items In Kart
	$.get("process.php","totalKartItems=1",  function(data){
		//alert(data);
		$('#totalItemsInKart').html(data);
		//$('#totalItemsInKartPrice').html(data);
	});
	
	//  Price Of All Karted Items
	$.get("process.php","totalItemsInKartPrice=1",  function(data){
		//alert(data);
		$('#totalItemsInKartPrice').html("Rs "+data);
	});
	
	// Loads Product Catagory In Dropdown List Of Search
	$.get("process.php","productCatagory=1", function(data){
		$('#productCatagory').html(data);
	});
	
	// Loads Product Catagory In Sidebar 
	$.get("process.php","productCatagorySideBar=1", function(data){
		//alert("Sidebar [productCatagorySideBar] ");
		$('#productCatagorySideBar').html(data);
	});
	
	//Checks If The User Is Logged Inn And Display Button Accordingly 
	$.get("process.php","logedIn=1",  function(data){
		var json=JSON.parse(data);
		if(json.logedIn!="0"){
				//User Is Logged In
				//$('#cartItems').html(json.logedIn+" headSid..js");
				$("#logoutBtnModel").removeClass("hidden");
				$("#loginBtnModel").addClass("hidden");
	
		}else{
				//User Is Not Logged In
				$('#cartItems').html("No Item In Cart!");
				$("#logoutBtnModel").addClass("hidden");
				$("#loginBtnModel").removeClass("hidden");

		}
	});
	//$.get("process.php","userName=1",        function(data){$('.userdiv').html(data);});
	$('#signInBtnModel').click(function(){
				var email=document.getElementById('inputEmail').value;
				var pass=document.getElementById('inputPassword').value;
				//alert($("input:text").val());
				$.get("process.php","signInCheck=1&email="+email+"&pass="+pass,  function(data){
					var json=JSON.parse(data);
					if(json.sucess==0){
						//$('#errEmail').html(data);
						$('#errEmail').html(json.remail);
						$('#errPass').html(json.rpass);	
					}
					else{
						$('#rowContainer').html("You Are Logged Inn");
						window.location = ("index.html");
					
					}
				});
			});
});

// Load Search
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
// Model Login Check
function checkLogin(){
	//alert('logiiin');
	var email=document.getElementById('inputEmail').value;
				var pass=document.getElementById('inputPassword').value;
				//alert($("input:text").val());
				$.get("process.php","signInCheck=1&email="+email+"&pass="+pass,  function(data){
					var json=JSON.parse(data);
					if(json.sucess==0){
						//$('#errEmail').html(data);
						$('#errEmailModel').html(json.remail);
						$('#errPassModel').html(json.rpass);	
					}
					else{
						$('#rowContainer').html("You Are Logged Inn");
						window.location = ("index.html");
					
					}
				});
}

// Logout Button Click Script
function logoutScript(){
	//alert("Logout");
	$.get("process.php","logoutBtn=1",  function(data){
		var json=JSON.parse(data);
		if(json.logout==1){
			location.reload();
		}
	});		
}