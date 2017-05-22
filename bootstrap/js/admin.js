$(document).ready(function(){
	
	//Checks If The User Is Loged Inn
	$.get("process.php","AdminlogedIn=1",  function(data){
		var json=JSON.parse(data);
		if(json.logedIn=="0"){
				//User Is Not Logged In
				//header('location:login.html');
				
		}else{
				//User Is Logged In
				//$('#signInTable').html("LogedInUser");
				$('#AdminLogin').html("");
				//alert('logged Inn');
		}
	});
	
	// When Admin Press Login Btn
	$('#signInBtnAdmin').click(function(){
		var email=document.getElementById('inputUsername').value;
		var pass=document.getElementById('inputPassword1').value;
		//alert($("input:text").val());
		$.get("process.php","signInCheckAdmin=1&email="+email+"&pass="+pass,  function(data){
			var json=JSON.parse(data);
			if(json.sucess==0){
				//$('#errEmail').html(data);
				$('#errEmail').html(json.remail);
				$('#errPass').html(json.rpass);	
			}
			else{
				$('#AdminLogin').html("");
				location.reload();
			}
		});
	});

	
});
// Script To Aprove User
function approveUser(cust_id){
	$.get("process.php","approveUser=1&id="+cust_id,  function(data){
		//alert(data);
		var json=JSON.parse(data);
		if(json.sucess==1){
			location.reload();
		}else{
		}
	});	
}

// Script To Aprove Products
function approveProduct(p_id){
	$.get("process.php","approveProduct=1&id="+p_id,  function(data){
		//alert(data);
		var json=JSON.parse(data);
		if(json.sucess==1){
			location.reload();
		}else{
		}
	});	
}

// Logout Button Click Script Admin
function logoutScriptAdmin(){
	alert("Logout Admin");
	$.get("process.php","logoutBtnAdmin=1",  function(data){
		var json=JSON.parse(data);
		if(json.logout==1){
			location.reload();
		}
	});		
}