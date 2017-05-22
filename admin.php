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
	if(!isset($_SESSION['admin'])){
		//header('location:login.html');
		//echo'alert("admin Not Set");';
	}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Admin Rental Kart</title>
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
	<script src="bootstrap/js/admin.js" type="text/javascript"></script>
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
		<!--<center><div class="well">Logged In AS [<?php echo $_SESSION['username'];?>]</div></center>
		--->
		<div class="row">
			<!-----Sidebar Displays Menu----->
			<div id="sidebar" class="span3">
				<div class="well well-small">
					<center><h5>Admin Menu</h5></center>
					<hr class="soft"/>
					<?php
						if(isset($_SESSION['admin'])){
							echo'<ul style=""> <li><a href="?page=add">Add Catagory</a></li> <li><a href="?page=user">Approve User</a></li> <li><a href="?page=products">Approve Products</a></li> </ul>';
						}
					?>
				</div>
			</div>
			<!-----Content Body ----->
			<div class="span9">
				<!------------------------------------------------------------------------------->
				<?php
				if(!isset($_SESSION['admin']))
				{
				echo'<div class="span6" id="AdminLogin">
					<div class="well">
					<h5>Admin Login </h5>
					<form>
					  <div class="control-group">
						<label class="control-label" for="inputUsername">Username</label>
						<div class="controls">
						  <input class="span3"  type="text" id="inputUsername" placeholder="Username">
						</div>
						<div id="errEmail"></div>
					  </div>
					  <div class="control-group">
						<label class="control-label" for="inputPassword1">Password</label>
						<div class="controls">
						  <input type="password" class="span3"  id="inputPassword1" placeholder="Password">
						</div>
						<div id="errPass"></div>
					  </div>
					  <div class="control-group">
						<div class="controls">
						  <button id="signInBtnAdmin" type="button" class="btn">Sign in</button> <!--<a href="forgetpass.html">Forget password?</a>--->
						</div>
					  </div>
					</form>
					</div>
				</div>';}else{echo'<a href="#" onclick="logoutScriptAdmin()"role="button" style="padding-right:0"><span class="btn btn-large btn-warning">Logout Admin</span></a>';
				}?>
				<!------------------------------------------------------------------------------->
				<?php 
				if(!isset($_SESSION['admin'])){
					//echo'Login First';
				}else{	
				
				//By Default Executed
				if(!isset($_GET['page']) || ($_GET['page']=='add')){
					echo'Not Set Or Set To Add';
				}
				// Execute When user Approve page Needed
				if(isset($_GET['page']) && ($_GET['page']=='user')){
					echo'User Apppppp';
					$sql = "SELECT * FROM `customer_registration` WHERE `valid` = 0";
					$count=mysqli_num_rows(mysqli_query($con,$sql));
					echo '<span class="badge badge-warning pull-right" >'.$count.'</span>';
					$query=mysqli_query($con,$sql);
					if($count==0){
						echo"<div class='well well-small'>No New User Registared</div>";
					}else{
						echo'<table class="table table-bordered">
								<thead>
									<tr>
										  <th>Username</th>
										  <th>Email</th>
										  <th>F/L Name</th>
										  <th>Address</th>
										  <th>More Detail</th>
										  <th>Approved</th>
									</tr>
								</thead>
								<tbody >';
						while($row1=mysqli_fetch_array($query)){
							//echo $row1['msg_content'];
							echo'
									<tr>
										<td>'.$row1['username'].'</td>
										<td>'.$row1['cust_email'].'</td>
										<td>'.$row1['cust_fname'].' '.$row1['cust_lname'].'</td>
										<td>'.$row1['cust_address'].'</td>
										<td><a class="well well-small" role="button" href="ownerInfo.php?rentee='.$row1['cust_id'].'">Find</a></td>
										<td><button  id="yes" class="well well-small" onclick="approveUser('.$row1['cust_id'].');" role="button" >Yes</button></td>
									</tr>';
						}
						echo'
								</tbody>
							</table>';
					}
				}
				// Executed When product Approve Page Needed
				if(isset($_GET['page']) && ($_GET['page']=='products')){
					echo'Products';
					$sql = "SELECT * FROM `products` WHERE `valid` = 0";
					$count=mysqli_num_rows(mysqli_query($con,$sql));
					echo '<span class="badge badge-warning pull-right" >'.$count.'</span>';
					$query=mysqli_query($con,$sql);
					if($count==0){
						echo"<div class='well well-small'>No New Product</div>";
					}else{
						echo'<table class="table table-bordered">
								<thead>
									<tr>
										  <th>Picture</th>
										  <th>Product Title</th>
										  <th>Price</th>
										  <th>....</th>
										  <th>Approved</th>
									</tr>
								</thead>
								<tbody >';
						while($row1=mysqli_fetch_array($query)){
							//echo $row1['msg_content'];
							echo'
									<tr>
										<td><img width="60" src="'.$row1['p_pic'].'" alt=""/></td>
										<td>'.$row1['p_title'].'</td>
										<td>'.$row1['p_price_d'].'</td>
										<td>...</td>
										<td><button  id="yes" class="well well-small" onclick="approveProduct('.$row1['p_id'].');" role="button" >Yes</button></td>
									</tr>';
						}
						echo'
								</tbody>
							</table>';
					}
				}
				
			}	?>
			</div>
		</div>
		<?php?>
	</div>
</div>
<!-- MainBody End ============================= -->
<!-- Footer ================================================================== -->
<div class="footerdiv"></div>