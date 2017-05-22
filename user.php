<?php session_start();
	//$_SESSION[]="";
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Rental Kart</title>
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
		<div class="sidebardiv"></div>
		<div id="rowContainer" class="span9">
			<ul class="breadcrumb">
				<li><a href="index.html">Home</a> <span class="divider">/</span></li>
				<li class="active">User</li>
			</ul>
			<?php 
				if(isset($_SESSION['user'])){ 
					echo"<h3> User Loged [".$_SESSION['username']."]";
					echo'<form  method="post" action="#"><input type="submit" name="LogoutBtn" value="Logout"></form></h3>';
					if(isset($_POST['LogoutBtn']))
					{
						session_unset();
						header('location:login.html');
					}
				}else{ 
					echo"Not SET SESSION";
					header('location:login.html');
				}
				
			?>
				
			<?php
				$host="127.0.0.1";
				$dbUsername="rentalkart";
				$dbPassword="rentalkart";
				$dbName="db_rentalkart";
				$con=mysqli_connect($host,$dbUsername,$dbPassword,$dbName);
				if(!$con)
				{
					die("Connection Failed");
				}
				
				//$sql = "SELECT * FROM `kart` LIMIT 0, 30 ";
				$sql = "SELECT * FROM `kart` WHERE `k_cust_id` = ".$_SESSION['user'];
				if($query_rundis = mysqli_query($con,$sql))	{
					echo'<table border="1"><tr><td>Kart Id</td> <td>Customer Id</td> <td>Product Id</td></tr>';
					
					while($row=mysqli_fetch_array($query_rundis)){
						echo'<tr>';
						//echo $row["p_title"];
						echo "<td>".$row[0]."</td>";
						echo "<td>".$row[1]."</td>";
						echo "<td>".$row[2]."</td>";
						echo'</tr>';
					}
					
					echo'</table>';
				}
			?>
			<hr class="soft"/>		
		</div>
	</div>
  </div>
</div>
<!-- MainBody End ============================= -->
<!-- Footer ================================================================== -->
<div class="footerdiv"></div>