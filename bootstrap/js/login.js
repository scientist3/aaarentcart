$(document).ready(function(){
	$('#signInBtn').click(function(){
		var email=document.getElementById('inputEmail1').value;
		var pass=document.getElementById('inputPassword1').value;
		//alert($("input:text").val());
		$.get("process.php","signInCheck=1&email="+email+"&pass="+pass,  function(data){
			var json=JSON.parse(data);
			//$('#errEmail').html(data);
			$('#errEmail').html(json.remail);
			$('#errPass').html(json.rpass);			
		});
	});	
});