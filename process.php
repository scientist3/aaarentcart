<?php
	session_start();
	// Database Conection Variables
	//$_SESSION['user']="Aamir";
	//$_SESSION['admin']="admin";
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

// Check Whether User Signed In
if(isset($_REQUEST['logedIn'])){
	if(isset($_SESSION['user'])){
		echo'{"logedIn":"'.$_SESSION['username'].'"}';
	}
	else{
		echo'{"logedIn":"0"}';
	}	
}

// Check Whether Admin Signed In
if(isset($_REQUEST['AdminlogedIn'])){
	if(isset($_SESSION['admin'])){
		echo'{"logedIn":"'.$_SESSION['admin'].'"}';
	}
	else{
		echo'{"logedIn":"0"}';
	}	
}

// Check Whether User[Email]&[Password] Is Valid [y/n]
if(isset($_REQUEST['signInCheck'])){
	$email=$_REQUEST['email'];
	$pass=$_REQUEST['pass'];
	//echo"Hi [".$email."][".$pass."]";
	$sql = "SELECT `cust_id`,`username`,`cust_email`,`cust_password` FROM `customer_registration` WHERE cust_email=\"".$email."\" and cust_password=md5(".$pass.")";
	if($query_rundis = mysqli_query($con,$sql))	{
		$row=mysqli_fetch_array($query_rundis);
		if($row['cust_email']==$email && $row['cust_password']==md5($pass))
		{	
			echo'{"sucess":"1","remail":"Welcome '.$email.'","rpass":"Password Matched '.$pass.'"}';
			$_SESSION['user']=$row['cust_id'];
			$_SESSION['username']=$row['username'];
			
		}
		else{	
			echo'{ "sucess":"0","remail":"Worng EmailId","rpass":"Wrong Password"}';
		}
	}else{	
		echo'{"sucess":"0","remail":"Worng EmailId","rpass":"Wrong Password"}';
	}
}


// Check Whether Admin username and Password Is Valid [y/n]
if(isset($_REQUEST['signInCheckAdmin'])){
	$email=$_REQUEST['email'];
	$pass=$_REQUEST['pass'];
	//echo"Hi [".$email."][".$pass."]";
	//$sql = "SELECT `admin_id`,`username`,`password` FROM `admin` WHERE username=\"".$email."\" and password=md5(".$pass.")";
	$sql = "SELECT * FROM `admin` WHERE username='".$email."' AND password=md5('".$pass."')";
	if($query_rundis = mysqli_query($con,$sql))	{
		$row=mysqli_fetch_array($query_rundis);
		if($row['username']==$email && $row['password']==md5($pass))
		{	
			echo'{"sucess":"1","remail":"Welcome '.$email.'","rpass":"Password Matched '.$pass.'"}';
			$_SESSION['admin']=$row['username'];
			
		}
		else{	
			echo'{ "sucess":"0","remail":"Worng Username","rpass":"Wrong Password"}';
		}
	}else{	
		echo'{"sucess":"0","remail":"Worng EmailId","rpass":"Wrong Password"}';
	}
}
	
// If User Details Is Needed
if(isset($_REQUEST['userName'])){
	if(isset($_SESSION['user'])){
		echo $_SESSION["user"];
	}
	else{
		echo'Guest';
	}
}
	
// If Product Detail Is Uploaded---error
if (isset($_REQUEST['pTitleERRRRR'])){	
	//echo"Sucessfull-".$_POST['pTitle'];
	/*$pTitle=$_POST['pTitle'];
	$pSDesc=$_POST['pSDesc'];
	$pPriceD=$_POST['pPriceD'];
	$pFDesc=$_POST['pFDesc'];
	$pBrand=$_POST['pBrand'];
	$pModel=$_POST['pModel'];
	$pSizeDim=$_POST['pSizeDim'];
	$pOther=$_POST['pOther'];*/
	echo'Recieved';
}
// If Product Detail Is Uploaded
if (isset($_REQUEST['uploadProduct'])){	
	echo'Recieved';
	$pTitle=$_POST['pTitle'];
	$pSDesc=$_POST['pSDesc'];
	$pPriceD=$_POST['pPriceD'];
	$pFDesc=$_POST['pFDesc'];
	$pBrand=$_POST['pBrand'];
	$pModel=$_POST['pModel'];
	$pSizeDim=$_POST['pSizeDim'];
	$pOther=$_POST['pOther'];
	echo'Data='.$pTitle.$pSDesc.$pPriceD.$pFDesc.$pBrand.$pModel.$pSizeDim.$pOther;
	if($_FILES['mainpic']['type']!="application/pdf")
	{
		echo'Not PDF File';
	}else{
		$notifi_file_name=$_FILES['mainpic']['name']; // Stores actual image File Name 
								
		$temp=explode(".",$notifi_file_name);
		$temp=end($temp);
		$temp=".".$temp;
		$notifi_file_name=time().$temp; // Stores created image File Name 
		$copy=$notifi_file_name;
		$notifi_file_name="documents/".$notifi_file_name;
		move_uploaded_file($_FILES['mat_file']['tmp_name'],"documents/".$copy);
	}
	
}
// [Block Wise]Fetch Latest Products
if(isset($_REQUEST['latestProducts'])){
	
	$sql = "SELECT p_id,p_title, p_s_desc, p_price_d,p_pic FROM `products` WHERE valid=1  ORDER BY p_title ASC";
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
						  echo'<h4 style="text-align:center"><a class="btn" href="product_details.html?pid='.$row['p_id'].'"> <i class="icon-zoom-in"></i></a>  <a class="btn btn-primary" href="#">Rs '.$row['p_price_d'].'</a></h4>';
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
	$sql = "SELECT p_id,p_title, p_s_desc, p_f_desc, p_price_d,p_pic FROM `products` WHERE valid=1 ORDER BY p_title ASC";
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
	$sql = "SELECT p_id,p_title, p_s_desc, p_price_h,p_pic FROM `products` WHERE valid=1 AND p_like>1 ORDER BY p_like DESC";
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
	$sql = "SELECT p_id,p_title, p_s_desc, p_price_h,p_pic FROM `products` WHERE valid=1 AND `p_rented`=1 ORDER BY `p_last_rented` DESC";
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

// Fetch Catagory For SideBar
if(isset($_REQUEST['productCatagorySideBar'])){
	// Fetched All Details From Catagory 
	$sql = "SELECT * FROM catagory";
	/*
	
				
				<li><a class="active" href="products.html"><i class="icon-chevron-right"></i>Cameras (100) </a></li>
				<li><a href="products.html"><i class="icon-chevron-right"></i>Computers, Tablets & laptop (30)</a></li>
				<li><a href="products.html"><i class="icon-chevron-right"></i>Mobile Phone (80)</a></li>
				<li><a href="products.html"><i class="icon-chevron-right"></i>Sound & Vision (15)</a></li>
				
			
	*/
	if($query_rundis = mysqli_query($con,$sql))	{
		$flag=0;
		$flag2=0;
		while($row=mysqli_fetch_array($query_rundis)){
			if($flag==0){
				echo'<li class="subMenu open"><a> '.$row['c_title'].'</a>';
				$flag=1;
			}else{
				echo'<li class="subMenu"><a> '.$row['c_title'].' </a>';
			}
			///SubCatagory Values
			// Fetched All Details Of SubCatagory Where its c_id= c_id of catagory
			$sql = "SELECT *FROM `subcatagory` WHERE `subcatagory`.c_id=".$row['c_id'];
			if($query_rundis1 = mysqli_query($con,$sql)){
				$flag1=0;
				if($flag2==0){
					echo'<ul>';
					$flag2=1;
				}
				else{
					echo'<ul style="display:none">';
				}
				while($row1=mysqli_fetch_array($query_rundis1)){
					if($flag1==0){
						echo'<li><a class="active" href="products.html"><i class="icon-chevron-right"></i>'.$row1['sc_title'].' </a></li>';
						$flag=1;
					}else{
						echo'<li><a class="" href="products.html"><i class="icon-chevron-right"></i>'.$row1['sc_title'].' </a></li>';
					}
				}
				echo'</ul>';
			}else{
				echo'No SubCategory Retrieved';
			}
		}
		echo'</li>';
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
		$sql = "SELECT * FROM products WHERE valid=1 AND p_title LIKE '%$s%'";
	}else{
		$sql = "SELECT * FROM products WHERE valid=1 AND p_catagory=$c AND p_title LIKE '%$s%'";
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
	$sql = "SELECT * FROM `products` WHERE valid=1 AND p_id=".$_REQUEST['productId'];
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
	$sql = "SELECT * FROM `products` WHERE valid=1 LIMIT 0,10";
}

// [Block Wise] Sorted Fetch All Products Data for products.html page
if(isset($_REQUEST['sortBy'])){
	$val=$_REQUEST['sortBy'];
	$sql =getSql($val);
	//echo"Sorted Result [".$val."]";
	// Cancelled For A While
	/*if($query_rundis = mysqli_query($con,$sql))	{
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
	}*/	
	if($query_rundis = mysqli_query($con,$sql))	{
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
						  echo'<h4 style="text-align:center"><a class="btn" href="product_details.html?pid='.$row['p_id'].'"> <i class="icon-zoom-in"></i></a>  <a class="btn btn-primary" href="#">Rs '.$row['p_price_d'].'</a></h4>';
					echo'</div>';
				echo'</div>';
			echo'</li>';
		}
		echo'</ul>';
	}else{
		echo'<div class="well">No Item Returned</div>';
	}

	
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
			$sql = "SELECT * FROM `products` WHERE valid=1 ORDER BY `products`.`p_title` ASC";
			break;
		case "za":
			$sql = "SELECT * FROM `products` WHERE valid=1 ORDER BY `products`.`p_title` DESC";
			break;
		case "plt":
			$sql = "SELECT * FROM `products` WHERE valid=1 ORDER BY `products`.`p_like` DESC";
			break;
		case "plf":
			$sql = "SELECT * FROM `products` WHERE valid=1 ORDER BY `products`.`p_price_d` ASC";
			break;
		case "phf":
			$sql = "SELECT * FROM `products` WHERE valid=1 ORDER BY `products`.`p_price_d` DESC";
			break;
	}
	return $sql;
}

// Return the Total Number Of Rows From Last Query
if(isset($_REQUEST['productFetched'])){
	echo $_SESSION['Available'];
}

// Check Whether User[Email]&[Password] Is Valid [y/n]
if(isset($_REQUEST['signIn'])){
	$email=$trim($_REQUEST['email']);
	$pass=$_REQUEST['pass'];
	//echo"Hi [".$email."][".$pass."]";
	$sql = "SELECT `cust_id`,`cust_email`,`cust_password` FROM `customer_registration` WHERE cust_email=\"".$email."\" and cust_password=md5(".$pass.")";
	if($query_rundis = mysqli_query($con,$sql))	{
		$row=mysqli_fetch_array($query_rundis);
		if($row['cust_email']==$email && $row['cust_password']==md5($pass))
		{	
			echo'{"sucess":"1","remail":"Welcome '.$email.'","rpass":"Password Matched '.$pass.'"}';
			$_SESSION['user']=$row['cust_id'];
			
		}
		else{	
			echo'{"sucess":"0","remail":"Worng EmailId","rpass":"Wrong Password"}';
		}
	}else{	
		echo'{"sucess":"0","remail":"Worng EmailId","rpass":"Wrong Password"}';
	}
}


// Save User Details Into Customer Table
if(isset($_REQUEST['registationForm'])){
	echo'Data Reached To Server:';
	$fn=$_POST['RfName'];
	$ln=$_POST['RlName'];
	$em=$_POST['Remail'];
	$um=$_POST['Rusername'];
	$pwd=$_POST['Rpass'];
	$dob=$_POST['Rdob'];
	$cmpny=$_POST['Rcompany'];
	$adr1=$_POST['RadressL1'];
	$adr2=$_POST['RadressL2'];
	$cty=$_POST['Rcity'];
	$state=$_POST['Rstate'];
	$zip=$_POST['RpCode'];
	$cntry=$_POST['Rcountry'];
	$mobile=$_POST['Rmobile'];	
	//echo $em;
	$sql = "INSERT INTO `db_rentalkart`.`customer_registration` 
		   (`cust_id`, `username`,`cust_password`, `cust_email`, `cust_fname`, `cust_lname`, `cust_address`, `cust_city`, `cust_state`, `cust_pincode`, `cust_country`, `cust_contactno`, `cust_dob`, `cust_adhar_number`) 
	VALUES (NULL, '".$um."',MD5('".$pwd."'), '".$em."', '".$fn."', '".$ln."', '".$adr1."', '".$cty."', '".$state."', '".$zip."', '".$cntry."', '".$mobile."', '".$dob."', '1245789865321478');";
	
	if($query_rundis = mysqli_query($con,$sql))	{
		echo'Sucess';
		header("location:login.html");
	}
	else{
		echo'failed';
	}
}

// When User Clicks On Add To Cart Button
if(isset($_REQUEST['addToKart'])){
	$user=$_SESSION['user'];
	$from=$user;
	$for="";
	$msg="I Need This Product. You May Contact On This Number";
	$pid =$_REQUEST['addToKart'];
	//echo $user." ".$pid;
	// First Check Whether This Product Is Already Added To Kart Or Not
	$flag=0;
	$sql = "SELECT * FROM `kart` WHERE rented=0 AND`k_pid` = ".$pid." AND `k_cust_id` = ".$user;
	if($query_rundis = mysqli_query($con,$sql))	{
		if(mysqli_num_rows($query_rundis)!=0){
			$flag=1;
		}
	}
	// If This Product Its Own Product
	$sql = "SELECT user_id FROM `products` WHERE valid=1 AND p_id=".$pid;
	$row=mysqli_fetch_array(mysqli_query($con,$sql));
	$for=$row[0];
	if($row[0]==$user){
		echo'Cannot Add Your Own Products';
		exit();
	}
	if(!$flag){// if Not In Kart Already
		$sql = "INSERT INTO `db_rentalkart`.`kart` (`kart_id`, `k_pid`, `k_cust_id`) VALUES (NULL, '".$pid."','".$user."');";
		if($query_rundis = mysqli_query($con,$sql))	{
			echo'Added To Cart';
			//header("location:user.php");
			/// Insert Msg To Message Table
			$sql = "INSERT INTO `db_rentalkart`.`message` (`msg_id`, `msg_content`, `msg_for`, `msg_from`, `msg_product_id`) VALUES (NULL,'".$msg."', ".$for.", ".$from.", ".$pid.");";
			$query_rundis = mysqli_query($con,$sql);
		}
		else{
			echo'Failed To Add To cart';
		}
	}else{
		echo'This Item Is Already In Ur Kart';
	}
}

//Check Username Taken or Not
if(isset($_REQUEST['takenUsername'])){
	$un=$_REQUEST['un'];
	//echo $un;
	//$sql = "SELECT * FROM `customer_registration` WHERE `username` LIKE \'%sc%\'
	$sql = "SELECT * FROM `customer_registration` WHERE `username` LIKE '".$un."'";
	$flag=0;
	if($query_rundis = mysqli_query($con,$sql))	{
		while($row=mysqli_fetch_array($query_rundis)){
			if($row['username']==$un){
				$flag=1;
			}
		}
		if($flag==0){
			echo'{"error":"0","errDesc":"You Choose Unique Username"}';
		}else{
			echo'{"error":"1","errDesc":"Chose Other Username. Error Code [takenUsername]"}';
		}
		
	}else{
		//echo'Error In Reteriving Data From Data Base. Error Code [takenUsername] ';
		echo'{"error":"1","errDesc":"Error In Reteriving Data From Data Base. Error Code [takenUsername]"}';
	}
}

// Logout Check
if(isset($_REQUEST['logoutBtn'])){
	session_unset();
	//header('location:login.html');
	echo'{"logout":"1"}';
}
// Logout Check ADmin
if(isset($_REQUEST['logoutBtnAdmin'])){
	//session_unset();
	//$_SESSION['admin']="";
	unset($_SESSION['admin']);
	//header('location:login.html');
	echo'{"logout":"1"}';
}

// Total Kart Items
if(isset($_REQUEST['totalKartItems'])){
	$custId=$_SESSION['user'];
	$sql = "SELECT * FROM `kart` WHERE `k_cust_id` = ".$custId." AND `rented` = 0";
	if($query_rundis = mysqli_query($con,$sql))	{
		//header("location:user.php");
		$totalKartItems=mysqli_num_rows($query_rundis);
		echo $totalKartItems;
	}else{
		echo'Failed To Search Into Kart Table';
	}
}

//  Karted Items Details product_summary page
if(isset($_REQUEST['kartItem'])){
	$custId=$_SESSION['user'];                                      //rented=0
	$sql = "SELECT * FROM `kart` WHERE `k_cust_id` = ".$custId." AND `rented` = 0";
	if($query_rundis = mysqli_query($con,$sql))	{
		while($row=mysqli_fetch_array($query_rundis)){// To Get product_id
			$piid=$row['k_pid'];
			$sql = "SELECT * FROM `products` WHERE valid=1 AND `p_id`=".$piid;
			$row1=mysqli_fetch_array(mysqli_query($con,$sql));
			
			echo'<tr><!-- Product-->
					<td> <img width="60" src="'.$row1['p_pic'].'" alt=""/></td>
					<td>'.$row1['p_title'].'<br/>'.$row1['p_s_desc'].'</td>
					<td>Rs '.$row1['p_price_d'].'</td>
					<td>
						<a class="well well-small" role="button" href="product_details.html?pid='.$row1['p_id'].'">Detail</a>
					</td>
					<td>
						<a class="well well-small" role="button" href="ownerInfo.php?owner='.$row1['user_id'].'">Contact</a>
					</td>
					<td>
					<a class="well well-small" role="button" href="#" onclick="alert(\'Sent\');" name="requestBtn" id="requestBtn">Request</a>
					</td>
					<td>'.$row['rented'].'</td>
			</tr>';
		}// To Get Product_Id End
	}else{
		echo'Failed To Get Details From Kart Table';
	}
}

//  Price Of All Karted Items
if(isset($_REQUEST['totalItemsInKartPrice'])){
	$custId=$_SESSION['user'];
	$sql = "SELECT * FROM `kart` WHERE `k_cust_id` = ".$custId." AND `rented` = 0";
	if($query_rundis = mysqli_query($con,$sql))	{
		$totalPrice="";
		while($row=mysqli_fetch_array($query_rundis)){// To Get product_id
			$piid=$row['k_pid'];
			$sql = "SELECT * FROM `products` WHERE valid=1 AND `p_id`=".$piid;
			$row1=mysqli_fetch_array(mysqli_query($con,$sql));
			$totalPrice+=$row1['p_price_d'];
			
		}// To Get Product_Id End
		echo $totalPrice;
	}else{
		echo'Failed To Get Details From Kart Table';
	}
}

// Approve User 
if(isset($_REQUEST['approveUser'])){
	$cust_id=$_REQUEST['id'];
	//$sql = "UPDATE `customer_registration` SET `valid` = \'1\' WHERE `cust_id` =".$cust_id;
	$sql = "UPDATE `db_rentalkart`.`customer_registration` SET `valid` = 1 WHERE `customer_registration`.`cust_id` = ".$cust_id.";";
	if(mysqli_query($con,$sql)){echo'{"sucess":"1"}';}else{echo'{"sucess":"0"}';}
	
}

// Approve Product 
if(isset($_REQUEST['approveProduct'])){
	$p_id=$_REQUEST['id'];
	//$sql = "UPDATE `customer_registration` SET `valid` = \'1\' WHERE `cust_id` =".$cust_id;
	//$sql = "UPDATE `db_rentalkart`.`customer_registration` SET `valid` = 1 WHERE `customer_registration`.`cust_id` = ".$cust_id.";";
	$sql = "UPDATE `db_rentalkart`.`products` SET `valid` = 1 WHERE `products`.`p_id` = ".$p_id.";";
	if(mysqli_query($con,$sql)){echo'{"sucess":"1"}';}else{echo'{"sucess":"0"}';}
	
}

//// Updte Kart
if(isset($_REQUEST['updateKart'])){
	$cId=$_REQUEST['custId'];
	$pId=$_REQUEST['pId'];//custId="+userId+"&pId="+p
	$sql = "UPDATE `kart` SET `rented`=1 WHERE `k_pid`=".$pId." AND `k_cust_id`=".$cId;
	if(mysqli_query($con,$sql)){echo'{"sucess":"1"}';}else{echo'{"sucess":"0"}';}
	
}
//// Updte Product
if(isset($_REQUEST['updateProduct'])){
	$pId=$_REQUEST['pId'];//custId="+userId+"&pId="+p
	$rentedTo=$_REQUEST['rentedTo'];
	$sql = "UPDATE `products` SET `p_rented`=1, `p_rented_to`=".$rentedTo." WHERE `p_id`=".$pId;
	if(mysqli_query($con,$sql)){echo'{"sucess":"1"}';}else{echo'{"sucess":"0"}';}
	
}

//yes btn 
//// Updte Product
if(isset($_REQUEST['updateProduct1'])){
	$pId=$_REQUEST['pId'];//custId="+userId+"&pId="+p
	
	$sql = "UPDATE `products` SET `p_rented`=0 WHERE `p_id`=".$pId;
	if(mysqli_query($con,$sql)){echo'{"sucess":"1"}';}else{echo'{"sucess":"0"}';}
	
}
//// Delete Msg 
if(isset($_REQUEST['deleteMsg'])){
	$msgId=$_REQUEST['msgId'];//custId="+userId+"&pId="+p
	$sql = "DELETE FROM `message` WHERE `msg_id`=".$msgId;
	if(mysqli_query($con,$sql)){echo'{"sucess":"1"}';}else{echo'{"sucess":"0"}';}
	
}
?>