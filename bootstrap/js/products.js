$(document).ready(function(){
	// On Change sortBy Elment
	$('#sortBy').on('change', function() {
		$sortby=$(this).find(":selected").val();
		//alert($sortby);
		
		//Block Wise - on Change
		$.get("process.php","sortBy="+$sortby,function(data){
			//alert(data);
			//placeData(data);// change to line no 26-29 
			//$('#blockView').html(data);
			$('#blockView').html(data);
			$.get("process.php","productFetched=1",  function(data){$('#totalProducts').html(data);});
			
		});
		//List Wsie- On Change--- Not Done Yet
		$.get("process.php","sortByList="+$sortby,function(data){
			//alert(data);
			//placeData(data);
			//$('#listView').html(data);
			//$.get("process.php","productFetched=1",  function(data){$('#totalProducts').html(data);});
			
		});
	});
	
	// Block Wise - On Load
	$.get("process.php","latestProducts=1",  function(data){
		$('#blockView').html(data);
		$.get("process.php","productFetched=1",  function(data){$('#totalProducts').html(data);});
	});
	
	// List Wise - On Load--- Not Done Yet
	$.get("process.php","latestProductsList=1",  function(data){
		//alert(data); Recieved Correctly
		placeData(data,"list");
		//$('#listView').html(data);
		$.get("process.php","productFetched=1",  function(data){$('#totalProducts').html(data);});
	});
	
});

function placeData(data,view){
	var myObj = JSON.parse(data);
	var x;
	//alert(myObj);
	for(x in myObj)
	{	
		$('#listView').append("<div class='row'><div class='span2'><img src='"+myObj[x].ppic+"' alt=''/></div>  <div class='span4'><h4>'"+myObj[x].ptitle+"'</h4><hr class='soft'/><p>'"+myObj[x].pfdesc+"'</p><a class='btn btn-small pull-right' href='product_details.html?pid="+myObj[x].pid+"'>View Details</a><br class='clr'/></div> <div class='span3 alignR'> <form class='form-horizontal qtyFrm'>  <h3>Daily: "+myObj[x].pdprice+"</h3>   <a href='#' class='btn btn-large btn-primary'> Add to <i class=' icon-shopping-cart'></i></a>    <a href='product_details.html?pid="+myObj[x].pid+"' class='btn btn-large'><i class='icon-zoom-in'></i></a></form></div> </div><hr class='soft'/>");
	}
}