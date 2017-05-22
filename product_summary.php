<?php session_start();
	$host="127.0.0.1";
	$dbUsername="rentalkart";
	$dbPassword="rentalkart";
	$dbName="db_rentalkart";
	$con=mysqli_connect($host,$dbUsername,$dbPassword,$dbName);
	if(!$con)
	{
		die("Connection Failed");
	}
	if(!isset($_SESSION['user'])){
		header('location:login.html');
	}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Online Rental Kart</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
<!--Less styles -->
   <!-- Other Less css file //different less files has different color scheam
	<link rel="stylesheet/less" type="text/css" href="themes/less/simplex.less">
	<link rel="stylesheet/less" type="text/css" href="themes/less/classified.less">
	<link rel="stylesheet/less" type="text/css" href="themes/less/amelia.less">  MOVE DOWN TO activate
	-->
	<!--<link rel="stylesheet/less" type="text/css" href="themes/less/bootshop.less">
	<script src="themes/js/less.js" type="text/javascript"></script> -->
	
<!-- Bootstrap style --> 
    <link id="callCss" rel="stylesheet" href="themes/bootshop/bootstrap.min.css" media="screen"/>
    <link href="themes/css/base.css" rel="stylesheet" media="screen"/>
<!-- Bootstrap style responsive -->	
	<link href="themes/css/bootstrap-responsive.min.css" rel="stylesheet"/>
	<link href="themes/css/font-awesome.css" rel="stylesheet" type="text/css">
<!-- Google-code-prettify -->	
	<link href="themes/js/google-code-prettify/prettify.css" rel="stylesheet"/>
<!-- fav and touch icons -->
    <link rel="shortcut icon" href="themes/images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="themes/images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="themes/images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="themes/images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="themes/images/ico/apple-touch-icon-57-precomposed.png">
	<style type="text/css" id="enject"></style>
	<!-- Jquery -->
	<script src="bootstrap/jquery/jquery.min.js" type="text/javascript"></script>
	<script src="bootstrap/js/headSidebarFooter.js" type="text/javascript"></script>
	<script src="bootstrap/js/productSummary.js" type="text/javascript"></script>
	
  </head>
<body>
<!-- Header Start =============================================== -->
<div id="header">
	<div class="container">
		<div class="userdiv"></div>
		<!-- Navbar ================================================== -->
		<div class="navdiv"></div>
	</div>
</div>
<!-- Header End=================================================== -->
<div id="mainBody">
  <div class="container">
	<div class="row">
<!-- Sidebar ================================================== -->
	<div class="sidebardiv"></div>
<!-- Sidebar end=============================================== -->
	<div class="span9">
		<ul class="breadcrumb">
			<li><a href="index.html">Home</a> <span class="divider">/</span></li>
			<li class="active"> SHOPPING CART</li>
		</ul>
		<h3>  SHOPPING CART [ <small><span id="totalItemsInKart"></span> Item(s) </small>]<a href="products.html" class="btn btn-large pull-right"><i class="icon-arrow-left"></i> Continue Shopping </a></h3>	
		<hr class="soft"/>		
		<table class="table table-bordered">
			<thead>
				<tr>
					  <th>Product</th>
					  <th>Description</th>
					  <th>Daily Price</th>
					  <th>Product Detail</th>
					  <th>Owner Detail</th>
					  <th>Message</th>
					  <th>Approved</th>
				</tr>
			</thead>
			<tbody id="kartItem">
				<tr><!-- Product Is Dummy Actuial Fetched from Process Page isset('kartItems')-->
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
					<td></>
				</tr>
			</tbody>
		</table>			
					
	</div><!--span9 End--->
	</div><!--Row End9--->
  </div>
</div>
<!-- MainBody End ============================= -->
<!-- Footer ================================================================== -->
<div  class="footerdiv"></div>
