$(document).ready(function(){
	
	$.get("process.php","logedIn=1",        function(data){
		var json=JSON.parse(data);
		if(json.logedIn=="0")
		{
			// User Is Not Logged In
			//location.href
		}
		else
		{
			// User Is Logged Inn
			//$('#rowContainer').html(user.php);
			window.location = ("index.html");
		}
	});
	
	$('#signInBtn').click(function(){
		var email=document.getElementById('inputEmail1').value;
		var pass=document.getElementById('inputPassword1').value;
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
				window.location = ("myAccount.php");
			
			}
		});
	});	
});