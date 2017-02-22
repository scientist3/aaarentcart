<?php
	session_start();
	// Database Conection Variables
	$host="127.0.0.1";
	$dbUsername="rentalkart";
	$dbPassword="rentalkart";
	$dbName="db_rentalkart";
	
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
	
	//if Product Detail Is Uploaded
	if (isset($_REQUEST['pTitle']))
{
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
</div>
</div>
';
}

	
?>