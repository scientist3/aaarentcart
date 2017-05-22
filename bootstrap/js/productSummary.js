$(document).ready(function(){
	
	//Checks If The User Is Loged Inn
	$.get("process.php","logedIn=1",  function(data){
		var json=JSON.parse(data);
		if(json.logedIn=="0"){
				//User Is Not Logged In
				header('location:login.html');
		}else{
				//User Is Logged In
				//$('#signInTable').html("LogedInUser");
		}
	});
	
	//  Price Of All Karted Items
	$.get("process.php","totalKartItems=1",  function(data){
		//alert(data);
		$('#totalItemsInKart').html(data);
	});
	
	// Request To Find Details Of Karted sssss tbody id="kartItem"
	$.get("process.php","kartItem=1",  function(data){
		//alert(data);
		$('#kartItem').html(data);
	});
});