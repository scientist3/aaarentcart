<form id="pUploadDetails" class="form-horizontal well" enctype="multipart/form-data" >
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
			  <input type="text" id="priced" placeholder="Price Daily" >
			  <!---<input type="text" id="priceh" placeholder="Price Hourly" class="hidden">
			  <input type="text" id="pricew" placeholder="Price Weakly" class="hidden">--->
			</div>
		  </div>
		  <div class="control-group">
			<label class="control-label" for="mainpic">Product Picture <sup>*</sup></label>
			<div class="controls">
			  <input type="file" id="mainpic" placeholder="Full Product Picture" accept="image/*"/>
			</div>
		  </div>
		  <!---<div class="control-group">
			<label class="control-label" for="discount">Discount</label>
			<div class="controls">
			  <input type="text" id="discount" placeholder="Discount" value="0">
			</div>
		  </div>-->
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

</form>
