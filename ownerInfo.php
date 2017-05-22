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
	if(!isset($_GET['owner']) && !isset($_GET['rentee'])){
		die("oops No Information Available");
	}
	
	if(isset($_GET['owner']))
	{
		$owner=$_GET['owner'];
		$sql = "SELECT * FROM `customer_registration` WHERE `cust_id`=".$owner;
	}
	if(isset($_GET['rentee']))
	{
		$rentee=$_GET['rentee'];
		$sql = "SELECT * FROM `customer_registration` WHERE `cust_id`=".$rentee;
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
	<div class="span3"></div>
<!-- Sidebar end=============================================== -->
	<div class="span9">
		<ul class="breadcrumb">
			<li><a href="index.html">Home</a> <span class="divider">/</span></li>
			<li class="active"> <?php if(isset($_GET['rentee'])){echo'Rentee';}else{echo'Owner';}?> Information</li>
		</ul>
		<hr class="soft"/>
		<?php
		  $row=mysqli_fetch_array(mysqli_query($con,$sql));
		  echo'<table class="table table-bordered">
			<tbody class="well">
				<tr><td> FName</td><td>'.$row['cust_fname'].'</td></tr>
				<tr><td> LName</td><td>'.$row['cust_lname'].'</td></tr>
				<tr><td> Address</td><td>'.$row['cust_address'].'</td></tr>
				<tr><td> City</td><td>'.$row['cust_city'].'</td></tr>
				<tr><td> State</td><td>'.$row['cust_state'].'</td></tr>
				<tr><td> Country</td><td>'.$row['cust_country'].'</td></tr>
				<tr><td> Pincode</td><td>'.$row['cust_pincode'].'</td></tr>
				<tr><td> Contact Number</td><td>'.$row['cust_contactno'].'</td></tr>
				<tr><td> Contact Email</td><td>'.$row['cust_email'].'</td></tr>
			</tbody>
		  </table>';
		?>
		<?php
		if(isset($_GET['owner']))
		{echo'
		<hr class="soft"/>			
		<h3> <center>Custom Message To Owner---Not Yet Implemented</center></h3>
		<div class="well">
			<form class="form-horizontal">
			  <div class="control-group">
				<label class="control-label" for="CustomMessage" >Message <sup>*</sup></label>
				<div class="controls">
					<textarea id="CustomMessage" placeholder="Type Your Message" required></textarea>
					
				</div>
				<span class="err" id="errCmessage"></span>
			  </div>
			  
			  <div class="control-group">
				<div class="controls">
					<input id="sentMsgBtn" class="btn btn-large btn-success" type="button" value="Send" onclick="alert(\'Sending To Owner\');" />
				</div>
			  </div>
			</form>
		</div>';
		}?>
	</div><!--span9 End--->
	</div><!--Row End9--->
  </div>
</div>
<!-- MainBody End ============================= -->
<!-- Footer ================================================================== -->
<div  class="footerdiv"></div>
