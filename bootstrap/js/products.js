$(document).ready(function(){
	// On Change sortBy Elment
	$('#sortBy').on('change', function() {
		$sortby=$(this).find(":selected").val();
		//alert($sortby);
		
		//Block Wise - on Change
		$.get("process.php","sortBy="+$sortby,function(data){
			alert(data);
			placeData(data);
			$('#blockView').html(data);
			$.get("process.php","productFetched=1",  function(data){$('#totalProducts').html(data);});
			
		});
		//List Wsie- On Change
		$.get("process.php","sortByList="+$sortby,function(data){
			//alert(data);
			//placeData(data);
			$('#listView').html(data);
			$.get("process.php","productFetched=1",  function(data){$('#totalProducts').html(data);});
			
		});
	});
	
	// Block Wise - On Load
	$.get("process.php","latestProducts=1",  function(data){
		$('#blockView').html(data);
		$.get("process.php","productFetched=1",  function(data){$('#totalProducts').html(data);});
	});
	// List Wise - On Load
	$.get("process.php","latestProductsList=1",  function(data){
		//alert(data); Recieved Correctly
		placeData(data);
		//$('#listView').html(data);
		//$.get("process.php","productFetched=1",  function(data){$('#totalProducts').html(data);});
	});
	
});

function placeData(data){
	var myObj = JSON.parse(data);
	var x;
	//alert(myObj);
	for(x in myObj)
	{	
		//$('#test100').html("ajdga");
		/*<div class="row">	  
					<div class="span2">
						<img src="'.$row['p_pic'].'" alt=""/>
					</div>
					<div class="span4">
						<h4>'.$row['p_title'].'</h4>
						<hr class="soft"/>
						<p>'.$row['p_f_desc'].'</p>
						<a class="btn btn-small pull-right" href="product_details.html?pid='.$row['p_id'].'">View Details</a>
						<br class="clr"/>
					</div>
					<div class="span3 alignR">
					<form class="form-horizontal qtyFrm">
					<h3>Daily: '.$row['p_price_h'].'</h3>
					
					  <a href="#" class="btn btn-large btn-primary"> Add to <i class=" icon-shopping-cart"></i></a>
					  <a href="product_details.html?pid='.$row['p_id'].'" class="btn btn-large"><i class="icon-zoom-in"></i></a>
					
						</form>
					</div>
				</div>
				<hr class="soft"/>*/
		//$('.test100').append(myObj[i].pid);
		//$('.test100').append("<div class='annab'> "+myObj[x].pid+"</div>");
		//document.getElementById(".test100").innerHTML = "<div class='row'><div class='span2'><img src='"+myObj[x].ppic+"' alt=''/></div></div><hr class='soft'/>";
		$('.test100').append("<div class='row'><div class='span2'><img src='"+myObj[x].ppic+"' alt=''/></div>  <div class='span4'><h4>'"+myObj[x].ptitle+"'</h4><hr class='soft'/><p>'"+myObj[x].pfdesc+"'</p><a class='btn btn-small pull-right' href='product_details.html?pid="+myObj[x].pid+"'>View Details</a><br class='clr'/>	</div>  </div><hr class='soft'/>");
		/*
							  <div class='span3 alignR'> <form class='form-horizontal qtyFrm'>  <h3>Daily: "+myObj[x].pid+"</h3>   <a href='#' class='btn btn-large btn-primary'> Add to <i class=" icon-shopping-cart"></i></a>    <a href="product_details.html?pid='.$row['p_id'].'" class="btn btn-large"><i class="icon-zoom-in"></i></a></form></div>
		*/
	}
}