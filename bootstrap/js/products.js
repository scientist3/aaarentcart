$(document).ready(function(){
	//alert("Alerted");
	//$('#sortBy').change(function() {
	//alert(this.value);
	//alert( "Handler for .change() called.";
	$('#sortBy').on('change', function() {
		$sortby=$(this).find(":selected").val();
		//alert($sortby);
		$.get("process.php","sortBy="+$sortby,function(data){
			alert(data);
			var myObj = JSON.parse(data);
			//$('.test100').html(data);
			//employees[1].firstName + " " + employees[0].lastName;
			$('.text100').html(myObj.record[1].name);
		});
	});
});