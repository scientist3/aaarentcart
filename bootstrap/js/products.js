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
			placeData(data);
			
		});
	});
});
function placeData(data){
	var myObj = JSON.parse(data);
	var x;
	for(x in myObj)
	{	
		//$('.test100').append(myObj[i].pid);
		$('.test100').append(" "+myObj[x].pid);
		$('.test100').append(" "+myObj[x].ptitle);
		
	}
}