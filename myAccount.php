<?php
	session_start();
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
    <title>My Account Rental Kart</title>
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
<!-- Google-Code-Prettify -->	
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
	<script src="bootstrap/js/myAccount.js" type="text/javascript"></script>
	<script >
		<!-- Begin

		var scrl = document.title;
		function scrlsts() {
		 scrl = scrl.substring(1, scrl.length) + scrl.substring(0, 1);
		 document.title = scrl;
		 setTimeout("scrlsts()", 300);
		 }
		//  End -->
	</script>
  </head>
<body onload="scrlsts();">
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
		<!--<center><div class="well">Logged In AS [<?php echo $_SESSION['username'];?>]</div></center>
		--->
		<div class="row">
			<!-----Sidebar Displays Menu----->
			<div id="sidebar" class="span3">
				<div class="well well-small">
					<center><h5>User Menu</h5></center>
					<hr class="soft"/>
					<ul style="">
						<li><a href="?page=msg">Cart Requests</a></li>
						<li><a href="?page=upload">Upload New Product</a></li>
						<li><a href="?page=products">Your Products</a></li>
					</ul>
				</div>
			</div>
			<!-----Content Body ----->
			<div class="span9">
				<ul class="breadcrumb">
					<li><a href="index.html">Home</a> <span class="divider">/</span></li>
					<li class="active">My Account [<?php echo $_SESSION['username'];?>]</li>
				
				</ul>
				<?php 
				
				/*if(!isset($_GET['page']) / *&& ($_GET['page']=='msg')* /){
					echo $_SESSION['user'];
					echo $_SESSION['username'];
					echo'Karted Items Msg Code';
				}*/
				
				if(!isset($_GET['page']) || ($_GET['page']=='msg')){
					$userId= $_SESSION['user'];
					$username= $_SESSION['username'];
					$sql = "SELECT * FROM `message` WHERE `msg_for` = ".$userId;
					$count=mysqli_num_rows(mysqli_query($con,$sql));
					echo '<span class="badge badge-warning pull-right" >'.$count.'</span>';
					$query=mysqli_query($con,$sql);
					if($count==0){
						echo"<div class='well well-small'>No New Messages/ Requests</div>";
					}else{
						echo'<table class="table table-bordered">
								<thead>
									<tr>
										  <th>Message Id</th>
										  <th>Message </th>
										  <th>Requester Detail</th>
										  <th>Product </th>
										  <th>Approved</th>
									</tr>
								</thead>
								<tbody >';
						while($row1=mysqli_fetch_array($query)){
							//echo $row1['msg_content'];
							echo'
									<tr>
										<td>'.$row1['msg_id'].'</td>
										<td>'.$row1['msg_content'].'</td>
										<td><a class="well well-small" role="button" href="ownerInfo.php?rentee='.$row1['msg_from'].'">Details</a></td>
										<td><a class="well well-small" role="button" href="product_details.html?pid='.$row1['msg_product_id'].'">Detail</a></td>
										<td><button  id="yes" class="well well-small" onclick="updateAvailibityM('.$row1['msg_id'].','.$row1['msg_product_id'].','.$row1['msg_for'].','.$row1['msg_from'].');" role="button" >Yes</button></td>
									</tr>';																		// for Kart,which pid,who user,who karted(to which pd is apprd)
						}
						echo'
								</tbody>
							</table>';
					}

					//echo'Karted Items Msg Code';
				}
				
				if(isset($_GET['page']) && ($_GET['page']=='upload')){
					//echo'Upload Code';
					echo'<div class="FromServer" style="height: 100px; width: 100px; background: none repeat scroll 0% 0% red;"></div>';
					include('uploadForm.php');
				}
				
				if(isset($_GET['page']) && ($_GET['page']=='products')){
					//echo'Existing Products';
					$userId= $_SESSION['user'];
					$username= $_SESSION['username'];
					
					$sql = "SELECT * FROM `products` WHERE `user_id` =".$userId;
					$count=mysqli_num_rows(mysqli_query($con,$sql));
					echo '<span class="badge badge-warning pull-right" >'.$count.'</span>';
					$query=mysqli_query($con,$sql);
					if($count==0){
						echo"<div class='well well-small'>No Uploaded</div>";
					}else{
						echo'<table class="table table-bordered">
							  <thead>
								<tr>
								  <th>Product</th>
								  <th>Description</th>
								  <th>Daily Price</th>
								  <th>Product Detail</th>
								  <th>Is Now Available</th>
								  <th>Last Rented To</th>
								</tr>
							  </thead>
							  <tbody >';
								while($row=mysqli_fetch_array($query)){
									echo'<tr><!-- Product-->
										<td> <img width="60" src="'.$row['p_pic'].'" alt=""/></td>
										<td>'.$row['p_title'].'<br/>'.$row['p_s_desc'].'</td>
										<td>Rs '.$row['p_price_d'].'</td>
										<td>
											<a class="well well-small" role="button" href="product_details.html?pid='.$row['p_id'].'">Detail</a>
										</td>
										<td>';
											if($row['p_rented']==0){
												echo 'Available';
											}
											else{
												echo'<button  id="yes" class="well well-small" onclick="updateAvailibity('.$row['p_id'].');" role="button" >Yes</button>';
											}
										echo'
										</td>
										<td>
											';
											/*if($row['p_rented']==0){
												echo 'Available';
												
											}
											else{*/
												//echo'Unavailable';
												echo $row['p_rented_to'];
											//}
											
										echo'
										</td>
									</tr>';
								}
						echo'  </tbody>
							</table>';
					}
				}
				
				?>
			</div>
		</div>
		<?php?>
	</div>
</div>
<!-- MainBody End ============================= -->
<!-- Footer ================================================================== -->
<div class="footerdiv"></div>