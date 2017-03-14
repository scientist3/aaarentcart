<?php
	session_start();
	// Database Conection Variables
	//$_SESSION['user']="";
	//session_unset();
	$host="127.0.0.1";
	$dbUsername="rentalkart";
	$dbPassword="rentalkart";
	$dbName="db_rentalkart";
	$con=mysqli_connect($host,$dbUsername,$dbPassword,$dbName);
	if(!$con)
	{
		die("Connection Failed");
	}

// If User Details Is Needed
if(isset($_REQUEST['userName'])){
	if(isset($_SESSION['user'])){
		echo'<div id="welcomeLine" class="row">
				<div class="span6">Welcome! 
				  <strong>
					<span id="userNameDiv" class="userNameDiv">'.$_SESSION["user"].'</span>
				  </strong>
				</div>
				<div class="span6"></div>
			</div>';
	}
	else{
		echo'<div id="welcomeLine" class="row">
				<div class="span6">Welcome! 
				  <strong>
					<span id="userNameDiv" class="userNameDiv">Guesttt</span>
				  </strong>
				</div>
				<div class="span6"></div>
			</div>';
	}
}
	
// If Product Detail Is Uploaded
if (isset($_REQUEST['pTitle'])){	
	//echo"Sucessfull-".$_POST['pTitle'];
	$pTitle=$_POST['pTitle'];
	$pSDesc=$_POST['pSDesc'];
	$pPriceH=$_POST['pPriceH'];
	$pPriceD=$_POST['pPriceD'];
	$pPriceW=$_POST['pPriceW'];
	$pFDesc=$_POST['pFDesc'];
	$pBrand=$_POST['pBrand'];
	$pModel=$_POST['pModel'];
	$pSizeDim=$_POST['pSizeDim'];
	$pOther=$_POST['pOther'];
	
	
	echo'<div class="span9">
		  <div class="well"><h4><center>Uploaded Product Details</center></h4></div>
			<div class="row">	  
			<div id="gallery" class="span3">
            <a href="themes/images/products/large/f1.jpg" title="Fujifilm FinePix S2950 Digital Camera">
				<img src="themes/images/products/large/3.jpg" style="width:100%" alt="Fujifilm FinePix S2950 Digital Camera"/>
            </a>
			<div id="differentview" class="moreOptopm carousel slide">
                <div class="carousel-inner">
                  <div class="item active">
                   <a href="themes/images/products/large/f1.jpg"> <img style="width:29%" src="themes/images/products/large/f1.jpg" alt=""/></a>
                   <a href="themes/images/products/large/f2.jpg"> <img style="width:29%" src="themes/images/products/large/f2.jpg" alt=""/></a>
                   <a href="themes/images/products/large/f3.jpg" > <img style="width:29%" src="themes/images/products/large/f3.jpg" alt=""/></a>
                  </div>
                  <div class="item">
                   <a href="themes/images/products/large/f3.jpg" > <img style="width:29%" src="themes/images/products/large/f3.jpg" alt=""/></a>
                   <a href="themes/images/products/large/f1.jpg"> <img style="width:29%" src="themes/images/products/large/f1.jpg" alt=""/></a>
                   <a href="themes/images/products/large/f2.jpg"> <img style="width:29%" src="themes/images/products/large/f2.jpg" alt=""/></a>
                  </div>
                </div>
              <!--  
			  <a class="left carousel-control" href="#myCarousel" data-slide="prev">‹</a>
              <a class="right carousel-control" href="#myCarousel" data-slide="next">›</a> 
			  -->
              </div>
			  
			 <div class="btn-toolbar">
			  <div class="btn-group">
				<span class="btn" ><i class="icon-zoom-in"></i></span>
				<span class="btn" ><i class="icon-thumbs-up"></i></span>
				<span class="btn" ><i class="icon-thumbs-down"></i></span>
			  </div>
			</div>
			</div>
			<div class="span6">
				<h3>'.$pTitle.'</h3>
				<small>- '.$pSDesc.'</small>
				<hr class="soft"/>
				<form class="form-horizontal qtyFrm">
				  <div class="control-group"><!-- DISPLAY PRICE In 3 Formats-->
					<label class="control-label">Hourly : <span>'.$pPriceH.'</span></label>
					<label class="control-label">Daily : <span>'.$pPriceD.'</span></label>
					<label class="control-label">Weakly : <span>'.$pPriceW.'</span></label>
					<div class="controls">
					  <button type="submit" class="btn btn-large btn-primary pull-right"> Add to cart <i class="icon-shopping-cart"></i></button>
					</div>
				  </div>
				</form>
				
				<hr class="soft clr"/>
				<p>'.$pFDesc.'</p>
				<a class="btn btn-small pull-right" href="#detail">More Details</a>
				<br class="clr"/>
			<a href="#" name="detail"></a>
			<hr class="soft"/>
			</div>
			
			<div class="span9">
            <ul id="productDetail" class="nav nav-tabs">
              <li class="active"><a href="#home" data-toggle="tab">Product Details</a></li>
              <li><a href="#profile" data-toggle="tab">Related Products</a></li>
            </ul>
            <div id="myTabContent" class="tab-content">
              <div class="tab-pane fade active in" id="home">
			  <h4>Product Information</h4>
                <table class="table table-bordered">
				<tbody>
				<tr class="techSpecRow"><th colspan="2">Product Details</th></tr>
				<tr class="techSpecRow"><td class="techSpecTD1">Brand: </td><td class="techSpecTD2">'.$pBrand.'</td></tr>
				<tr class="techSpecRow"><td class="techSpecTD1">Model:</td><td class="techSpecTD2">'.$pModel.'</td></tr>
				<tr class="techSpecRow"><td class="techSpecTD1">Dimensions:</td><td class="techSpecTD2">'.$pSizeDim.'</td></tr>
				<tr class="techSpecRow"><td class="techSpecTD1">Other Details:</td><td class="techSpecTD2">'.$pOther .'</td></tr>
				</tbody>
				</table>
              </div>
			  
			  <div class="tab-pane fade in" id="profile">
			  <h4>Related Product</h4>
					<div class="well">Not Implemented Yet</div>
              </div>
		</div>
          </div>

		</div>
	</div>';
}

// [Block Wise]Fetch Latest Products
if(isset($_REQUEST['latestProducts'])){
	
	$sql = "SELECT p_id,p_title, p_s_desc, p_price_h,p_pic FROM `products` ORDER BY p_title ASC";
	if($query_rundis = mysqli_query($con,$sql))	{
		$_SESSION['Available']=mysqli_num_rows($query_rundis);
		echo'<ul class="thumbnails">';	
		while($row=mysqli_fetch_array($query_rundis)){
			//echo $row["p_title"];
			echo'<li class="span3">';
				echo'<div class="thumbnail">';
					echo'<a  href="product_details.html?pid='.$row['p_id'].'"><img src="'.$row['p_pic'].'" alt=""/></a>';
					echo'<div class="caption">';
						echo'<h5>'.substr($row['p_title'],0,30).'...</h5>';
						  echo'<p>'.substr($row['p_s_desc'],0,30).'...</p>';
						  echo'<h4 style="text-align:center"><a class="btn" href="product_details.html?pid='.$row['p_id'].'"> <i class="icon-zoom-in"></i></a> <a class="btn" href="#">Add to <i class="icon-shopping-cart"></i></a> <a class="btn btn-primary" href="#">'.$row['p_price_h'].'</a></h4>';
					echo'</div>';
				echo'</div>';
			echo'</li>';
		}
		echo'</ul>';
	}else{
		echo'<div class="well">No Item Returned</div>';
	}
	//echo'Latest Products Fetched';
}

// [ListWise] Fetch Latest Products 
if(isset($_REQUEST['latestProductsList'])){
	$sql = "SELECT p_id,p_title, p_s_desc, p_f_desc, p_price_d,p_pic FROM `products` ORDER BY p_title ASC";
	//echo'reached Here';
	if($query_rundis = mysqli_query($con,$sql))	{
		$_SESSION['Available']=mysqli_num_rows($query_rundis);
		$res='[';
		$count=0;
		$last=mysqli_num_rows($query_rundis)-1;
		//echo $last;
		while($row=mysqli_fetch_assoc($query_rundis))
		{	
			if($count<$last)
				$res=$res.'{"pid":"'.$row['p_id'].'","ptitle":"'.$row['p_title'].'","ppic":"'.$row['p_pic'].'","pfdesc":"'.$row['p_f_desc'].'","pdprice":"'.$row['p_price_d'].'"},';
			else
				$res=$res.'{"pid":"'.$row['p_id'].'","ptitle":"'.$row['p_title'].'","ppic":"'.$row['p_pic'].'","pfdesc":"'.$row['p_f_desc'].'","pdprice":"'.$row['p_price_d'].'"}';
			$count++;
		}
		$res=$res."]";
		echo $res;
	}	
	/*if($query_rundis = mysqli_query($con,$sql))	{
		$_SESSION['Available']=mysqli_num_rows($query_rundis);
		while($row=mysqli_fetch_array($query_rundis)){
			echo'<div class="row">	  
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
				<hr class="soft"/>
			';
		}
	}else{
		echo'<div class="well">No Item Returned</div>';
	}*/
}

// Fetch Featured Products
if(isset($_REQUEST['featuredProducts'])){
	$count=0;// Only Four Item Per Slide
	//$sql = "SELECT p_id,p_title, p_s_desc, p_price_h,p_pic FROM `products`";
	$sql = "SELECT p_id,p_title, p_s_desc, p_price_h,p_pic FROM `products` WHERE p_like>1 ORDER BY p_like DESC";
	if($query_rundis = mysqli_query($con,$sql))	{
		echo'<div class="row-fluid">
			<div id="featured" class="carousel slide">
			  <div class="carousel-inner">
				<div class="item active">
					<ul class="thumbnails">';
					
		while($row=mysqli_fetch_array($query_rundis)){
			//echo $row["p_title"];
			$count++;
			if($count>4){
				$count=0;
				echo'</ul>
				</div>
				<div class="item">
					<ul class="thumbnails">';
			}
			echo'<li class="span3">
					<div class="thumbnail">
						<i class="tag"></i>
						<a  href="product_details.html?pid='.$row['p_id'].'"><img src="'.$row['p_pic'].'" alt=""/></a>
						<div class="caption">
						  <h5>'.substr($row['p_title'],0,30).'</h5>
						  <h4><a class="btn" href="product_details.html?pid='.$row['p_id'].'">VIEW</a> <span class="pull-right">$222.00</span></h4>
						</div>
					</div>
				</li>';
		}
		         echo'</ul>
				</div>
			  </div>
			  <a class="left carousel-control" href="#featured" data-slide="prev">‹</a>
			  <a class="right carousel-control" href="#featured" data-slide="next">›</a>
		    </div>
		    </div>';
	}else{
		echo'<div class="well">No Item Returned'.$count.'</div>';
	}
}

// Fetch Recently Rented
if(isset($_REQUEST['recentlyRented'])){
	$sql = "SELECT p_id,p_title, p_s_desc, p_price_h,p_pic FROM `products` WHERE `p_rented`=1 ORDER BY `p_last_rented` DESC";
	$sql = "SELECT * FROM products,catagory WHERE products.p_catagory=catagory.c_id";
}

// Fetch Catagory
if(isset($_REQUEST['productCatagory'])){
	$sql = "SELECT * FROM catagory";
	if($query_rundis = mysqli_query($con,$sql))	{
		echo'<option value="1">All</option>';
		while($row=mysqli_fetch_array($query_rundis)){
			echo'<option value="'.$row['c_id'].'">'.$row['c_title'].'</option>';
		}
	}else{
		echo'No Catagory Retrieved';
	}
}

// Fetch Search Results
if(isset($_REQUEST['searchResults'])){
	$s=$_REQUEST['s'];
	$c=$_REQUEST['c'];
	echo'<ul class="breadcrumb">
			<li><a href="index.html">Home</a> <span class="divider">/</span></li>
			<li class="active">Best Matched Products</li>
		</ul>';
	if($c==1){
		$sql = "SELECT * FROM products WHERE p_title LIKE '%$s%'";
	}else{
		$sql = "SELECT * FROM products WHERE p_catagory=$c AND p_title LIKE '%$s%'";
	}
	//echo$sql;
	if($query_rundis = mysqli_query($con,$sql))	{
		$rowcount=mysqli_num_rows($query_rundis);
		echo'<h3> Products Name <small class="pull-right"> '.$rowcount.' products are available </small></h3><hr class="soft"/>';
		echo'<p>Nowadays the lingerie industry is one of the most successful business spheres.We always stay in touch with the latest fashion tendencies - that is why our goods are so popular and we have a great number of faithful customers all over the country.</p>';
		/*echo'<hr class="soft"/>
			<form class="form-horizontal span6">
				<div class="control-group">
				  <label class="control-label alignL">Sort By </label>
					<select>
					  <option>Priduct name A - Z</option>
					  <option>Priduct name Z - A</option>
					  <option>Priduct Stoke</option>
					  <option>Price Lowest first</option>
					</select>
				</div>
			  </form>';*/
		echo'<div id="myTab" class="pull-right">
		 <a href="#listView" data-toggle="tab"><span class="btn btn-large"><i class="icon-list"></i></span></a>
		 <a href="#blockView" data-toggle="tab"><span class="btn btn-large btn-primary"><i class="icon-th-large"></i></span></a>
		</div>
		<br class="clr"/>';
		echo'<div class="tab-content">
			   <div class="tab-pane" id="listView">';
			   while($row=mysqli_fetch_array($query_rundis)){
				echo'<div class="row">	  
				  <div class="span2"> <img src="'.$row['p_pic'].'" alt=""/> </div>
					<div class="span4">
						<h3>New | Available</h3>				
						<hr class="soft"/>
						<h5>'.substr($row['p_title'],0,30).'...</h5>
						<p>'.substr($row['p_s_desc'],0,30).'...</p>
						<a class="btn btn-small pull-right" href="product_details.html?pid='.$row['p_id'].'">View Details</a>
						<br class="clr"/>
					</div>
					<div class="span3 alignR">
						<form class="form-horizontal qtyFrm">
						  <h3>&#8377; '.$row['p_price_h'].' Hourly</h3>
						  <a href="product_details.html" class="btn btn-large btn-primary"> Add to <i class=" icon-shopping-cart"></i></a>
						  <a href="product_details.html" class="btn btn-large"><i class="icon-zoom-in"></i></a>
						</form>
					</div>
				</div><!--row End-->
				<hr class="soft"/>
				';
			   }
			  echo'</div>
			  <div class="tab-pane  active" id="blockView">
			     <ul class="thumbnails">';
				 $query_rundis = mysqli_query($con,$sql);
			     while($row=mysqli_fetch_array($query_rundis)){
					echo'<li class="span3">
					  <div class="thumbnail">
						<a href="product_details.html?pid='.$row['p_id'].'"><img src="'.$row['p_pic'].'" alt=""/></a>
						<div class="caption">
						  <h5>'.substr($row['p_title'],0,30).'...</h5>
						  <p>'.substr($row['p_s_desc'],0,30).'...</p>
						   <h4 style="text-align:center"><a class="btn" href="product_details.html?pid='.$row['p_id'].'"> <i class="icon-zoom-in"></i></a> <a class="btn" href="#">Add to <i class="icon-shopping-cart"></i></a> <a class="btn btn-primary" href="#">&#8377; '.$row['p_price_h'].'</a></h4>
						</div>
					  </div>
					</li>';
				 }
				 echo' </ul>
			<hr class="soft"/>
			</div>
			 </div>';
		
		
	}else{
		echo'Nothing Matches';
	}
}

// Fetch Product Details
if(isset($_REQUEST['productId'])){
	$sql = "SELECT * FROM `products` WHERE p_id=".$_REQUEST['productId'];
	//echo"Reached ".$_REQUEST['productId'];
	if($query_rundis = mysqli_query($con,$sql))	{
		$row=mysqli_fetch_assoc($query_rundis);
		if(mysqli_num_rows($query_rundis)<1)
			echo '0';
		else
		{
		    echo $myJSON = '{ 	"p_id":"'.$row['p_id'].'", 
							"p_s_desc":"'.$row['p_s_desc'].'",
							
							"p_price_h":"'.$row['p_price_h'].'", 
							"p_price_d":"'.$row['p_price_d'].'", 
							"p_price_w":"'.$row['p_price_w'].'", 
							
							"p_pic":"'.$row['p_pic'].'", 
							"p_pic_back":"'.$row['p_pic_back'].'", 
							"p_pic_lside":"'.$row['p_pic_lside'].'", 
							"p_pic_rside":"'.$row['p_pic_rside'].'", 
							
							"p_discount":"'.$row['p_discount'].'", 
							"p_f_desc":"'.$row['p_f_desc'].'", 
							
							"p_brand":"'.$row['p_brand'].'", 
							"p_model":"'.$row['p_model'].'", 
							"p_other":"'.$row['p_other'].'", 
	
							"p_like":"'.$row['p_like'].'", 
							"p_dislike":"'.$row['p_like'].'", 
							"p_size_dim":"'.$row['p_size_dim'].'",
							
							"p_title":"'.$row['p_title'].'"
						}';	
						/*, 
							 
							"p_upload_date":"'.$row['p_upload_date'].'",
							"p_last_rented":"'.$row['p_last_rented'].'",
							"p_rented":"'.$row['p_rented'].'",
							"p_catagory":"'.$row['p_catagory'].'",
							"sc_id":"'.$row['sc_id'].'",
							"user_id":"'.$row['user_id'].'"*/
		}
	}
}

// Fetch All Products Data for products.html page
if(isset($_REQUEST['allProducts'])){
	$sql = "SELECT * FROM `products` LIMIT 0,10";
}

// [Block Wise] Sorted Fetch All Products Data for products.html page
if(isset($_REQUEST['sortBy'])){
	$val=$_REQUEST['sortBy'];
	$sql =getSql($val);
	//echo"Sorted Result [".$val."]";
	// Cancelled For A While
	if($query_rundis = mysqli_query($con,$sql))	{
		$res='[';
		$count=0;
		$last=mysqli_num_rows($query_rundis)-1;
		//echo $last;
		while($row=mysqli_fetch_assoc($query_rundis))
		{	
			if($count<$last)
				$res=$res.'{"pid":"'.$row['p_id'].'","ptitle":"'.$row['p_title'].'"},';
			else
				$res=$res.'{"pid":"'.$row['p_id'].'","ptitle":"'.$row['p_title'].'"}';
			$count++;
		}
		$res=$res."]";
		echo $res;
	}	
	/*if($query_rundis = mysqli_query($con,$sql))	{
		echo'<ul class="thumbnails">';
		$_SESSION['Available']=mysqli_num_rows($query_rundis);
		while($row=mysqli_fetch_array($query_rundis)){
			//echo $row["p_title"];
			echo'<li class="span3">';
				echo'<div class="thumbnail">';
					echo'<a  href="product_details.html?pid='.$row['p_id'].'"><img src="'.$row['p_pic'].'" alt=""/></a>';
					echo'<div class="caption">';
						echo'<h5>'.substr($row['p_title'],0,30).'...</h5>';
						  echo'<p>'.substr($row['p_s_desc'],0,30).'...</p>';
						  echo'<h4 style="text-align:center"><a class="btn" href="product_details.html?pid='.$row['p_id'].'"> <i class="icon-zoom-in"></i></a> <a class="btn" href="#">Add to <i class="icon-shopping-cart"></i></a> <a class="btn btn-primary" href="#">'.$row['p_price_h'].'</a></h4>';
					echo'</div>';
				echo'</div>';
			echo'</li>';
		}
		echo'</ul>';
	}else{
		echo'<div class="well">No Item Returned</div>';
	}*/

	
	/*echo'
		[ 	
			{"name":"aamir"},
			{"name":"Nad"}
		]';*/
}

// [List Wise] Sorted Fetch All Products Data for products.html page
if(isset($_REQUEST['sortByList'])){
	$val=$_REQUEST['sortByList'];
	$sql =getSql($val);
	if($query_rundis = mysqli_query($con,$sql))	{
		$_SESSION['Available']=mysqli_num_rows($query_rundis);
		while($row=mysqli_fetch_array($query_rundis)){
			echo'<div class="row">	  
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
				<hr class="soft"/>
			';
		}
	}else{
		echo'<div class="well">No Item Returned</div>';
	}
}

// Gets the Sql According to user Choice of Sort
function getSql($sortBy){
	$sql="";
	switch($sortBy){
		case "az":
			$sql = "SELECT * FROM `products` ORDER BY `products`.`p_title` ASC";
			break;
		case "za":
			$sql = "SELECT * FROM `products` ORDER BY `products`.`p_title` DESC";
			break;
		case "plt":
			$sql = "SELECT * FROM `products` ORDER BY `products`.`p_like` DESC";
			break;
		case "plf":
			$sql = "SELECT * FROM `products` ORDER BY `products`.`p_price_d` ASC";
			break;
		case "phf":
			$sql = "SELECT * FROM `products` ORDER BY `products`.`p_price_d` DESC";
			break;
	}
	return $sql;
}
// Return the Total Number Of Rows From Last Query
if(isset($_REQUEST['productFetched'])){
	echo $_SESSION['Available'];
}

// Check Whether User[Email]&[Password] Is Valid [y/n]
if(isset($_REQUEST['signInCheck'])){
	$email=$_REQUEST['email'];
	$pass=$_REQUEST['pass'];
	//echo"Hi [".$email."][".$pass."]";
	$sql = "SELECT * FROM `customer_registration` WHERE cust_email=\"".$email."\" and cust_password=md5(".$pass.")";
	if($query_rundis = mysqli_query($con,$sql))	{
		echo'{"remail":"Welcome '.$email.'","rpass":"Password Matched '.$pass.'"}';
	}else{	
		echo'{"remail":"Worng EmailId","rpass":"Wrong Password"}';
	}
}
?>