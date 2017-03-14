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
	<!--Index Page Script Ajax File-->
	<script src="bootstrap/js/index.js" type="text/javascript"></script>
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

<!-- Main Body Start =========================================== -->
<div id="mainBody">
  <div  class="container">
	<div class="row">
	  <div class="sidebardiv"></div>
	  <div id="uploadDetails" class="span9">
		<div id="feedback"></div>
		<form id="pUploadDetails" class="form-horizontal well" >
			<center><h4>Upload Product Details</h4></center>
			<hr class="soft"/>
		  <div class="control-group">
			<label class="control-label" for="producttitle">Product Title <sup>*</sup></label>
			<div class="controls">
			  <input type="text" id="producttitle" placeholder="Product Title" <!--onkeyup="validate()-->">
			</div>
		  </div>
		  <div class="control-group">
			<label class="control-label" for="shortdesc">Short Description <sup>*</sup></label>
			<div class="controls">
			  <input type="text" id="shortdesc" placeholder="One Line Description">
			</div>
		  </div>	  
		  <div class="control-group">
			<label class="control-label" for="price">Price <sup>*</sup></label>
			<div class="controls">
			  <input type="text" id="priceh" placeholder="Price Hourly">
			  <input type="text" id="priced" placeholder="Price Daily">
			  <input type="text" id="pricew" placeholder="Price Weakly">
			</div>
		  </div>
		  <div class="control-group">
			<label class="control-label" for="mainpic">Product Picture <sup>*</sup></label>
			<div class="controls">
			  <input type="file" id="mainpic" placeholder="Full Product Picture">
			</div>
		  </div>
		  <div class="control-group">
			<label class="control-label" for="discount">Discount</label>
			<div class="controls">
			  <input type="text" id="discount" placeholder="Discount" value="0">
			</div>
		  </div>
		  <div class="control-group">
			<label class="control-label" for="fulldesc">Full Description</label>
			<div class="controls">
			  <textarea id="fulldesc" placeholder="Full Description"></textarea>
			</div>
		  </div>
		  
		   <div class="control-group">
			<label class="control-label" for="brand">Brand</label>
			<div class="controls">
			  <input type="text" id="brand" placeholder="Product Brand">
			</div>
		  </div>
		  
		  <div class="control-group">
			<label class="control-label" for="pmodel">Model</label>
			<div class="controls">
			  <input type="text" id="pmodel" placeholder="Product Model">
			</div>
		  </div>
		  
		   <div class="control-group">
			<label class="control-label" for="sizedim">Size/Dimension</label>
			<div class="controls">
			  <input type="text" id="sizedim" placeholder="Product Size/ Dimension">
			</div>
		  </div>
		  
		   <div class="control-group">
			<label class="control-label" for="other">Other Details</label>
			<div class="controls">
			  <textarea id="other" placeholder="Other Details Of Product"></textarea>
			</div>
		  </div>
		  
		  <div class="control-group">
			<div class="controls">
				<input id="p_upload" class="btn btn-large btn-success" type="button" value="Upload" onclick="validate();" />
			</div>
		  </div>	

	<!--div class="alert alert-block alert-error fade in">
		<button type="button" class="close" data-dismiss="alert">×</button>
		<str ong>Lorem Ipsum is simply</strong> dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s
	 </div-->
	</form>
	  </div><!--span9 End-->
	</div><!--row End-->
  </div><!--container End-->
</div>
<!-- Main Body End =========================================== -->

<!-- Footer ================================================================== -->
<div class="footerdiv"></div>
