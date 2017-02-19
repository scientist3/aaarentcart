function xmlhttpget(){
	if (window.XMLHttpRequest)
	{
		xmlhttp = new XMLHttpRequest();
		return xmlhttp;
	}else
	{
		xmlhttp = new ActiveXObject('Microsoft.XMLHTTP');
		return xmlhttp;
	}
}
	
function validate(){
	//alert('Validation Of Form');
		
	xmlhttp=xmlhttpget();
	xmlhttp.onreadystatechange= function(){
		if (xmlhttp.readyState ==4 && xmlhttp.status ==200){
				document.getElementById('uploadDetails').innerHTML=xmlhttp.responseText;
				//document.getElementById('feedback').innerHTML=xmlhttp.responseText;
			}
	}	
		
	par='pTitle='+document.getElementById('producttitle').value;
	par+='&pSDesc='+document.getElementById('shortdesc').value;
	par+='&pPriceH='+document.getElementById('priceh').value;
	par+='&pPriceD='+document.getElementById('priced').value;
	par+='&pPriceW='+document.getElementById('pricew').value;
	par+='&pFDesc='+document.getElementById('fulldesc').value;
	par+='&pBrand='+document.getElementById('brand').value;
	par+='&pModel='+document.getElementById('pmodel').value;
	par+='&pSizeDim='+document.getElementById('sizedim').value;
	par+='&pOther='+document.getElementById('other').value;
	
	
		
	xmlhttp.open('POST', 'update.php');
	xmlhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
	xmlhttp.send(par);
}
