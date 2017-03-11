$(document).ready(function(){
	
	$(".navdiv").load("navbar.html");
	$(".sliderdiv").load("slider.html");
	$(".footerdiv").load("footer.html");
	$(".sidebardiv").load("sidebar.html");
	$.get("process.php","productCatagory=1", function(data){$('#productCatagory').html(data);});
	
	//$.get("process.php","userName=1",        function(data){$('.userdiv').html(data);});
});
