$(document).ready(function(){
	
	//Checks If The User Is Loged Inn
	$.get("process.php","logedIn=1",  function(data){
		var json=JSON.parse(data);
		if(json.logedIn=="0"){
				//User Is Not Logged In
				header('location:login.html');
				//alert('User Is Not Logged In');
		}else{
				//User Is Logged In
				//alert('User Is Logged In'+json.logedIn);
		}
	});
	
	/*$.get("process.php","example=1",  function(data){
	}); */	
});
// Upload Form Submit
function validate(){
	//alert('Validation Of Form [pic]:'+document.getElementById('mainpic').value);
	//alert("Validateeeee"+$('mainpic').val());	
	/*xmlhttp=xmlhttpget();
	xmlhttp.onreadystatechange= function(){
		if (xmlhttp.readyState ==4 && xmlhttp.status ==200){
				document.getElementById('FromServer').innerHTML=xmlhttp.responseText;
				//document.getElementById('feedback').innerHTML=xmlhttp.responseText;
			}
	}*/	
	//var input=document.querySelector('input[type=file]'),file=input.files[0];
	alert("Sent");
	//if(!file || !file.type.match(/image.*/)) return;
	//var fd=new FormData();
	//fd.append('file',file);
	//par="uploadProduct=1";
	par='&pTitle='+document.getElementById('producttitle').value;
	par+='&pSDesc='+document.getElementById('shortdesc').value;
	par+='&pPriceD='+document.getElementById('priced').value;
	par+='&pPic='+document.getElementById('mainpic').value;
	
	par+='&pFDesc='+document.getElementById('fulldesc').value;
	par+='&pBrand='+document.getElementById('brand').value;
	par+='&pModel='+document.getElementById('pmodel').value;
	par+='&pSizeDim='+document.getElementById('sizedim').value;
	par+='&pOther='+document.getElementById('other').value;
		
	$.post("process.php","uploadProduct=1"+par,  function(data){
		$('FromServer').html();
		alert(data);
	});
	
}

function updateAvailibityM(msgId,pId,ownerId,userId){
	//var x=$('yes').attr('role');
	alert('MsgId:'+msgId+'; PId :'+pId+'; OwnerId:'+ownerId+';KarterId:'+userId+';');
	/*
	myAcc.js------>Msg Products
	prod_sum------>kart
	*/
	//delete this msg
	$.get("process.php","deleteMsg=1&msgId="+msgId,  function(data){
		var json=JSON.parse(data);
		if(json.success=="0"){
				//Updated Sucessfully
				//header('location:login.html');
				//alert('User Is Not Logged In');
		}else{
				//User Is Logged In
				//alert('User Is Logged In'+json.logedIn);
		}
	});
	//product set p_rented=1
	$.get("process.php","updateProduct=1&pId="+pId+"&rentedTo="+userId,  function(data){
		var json=JSON.parse(data);
		if(json.success=="0"){
				//Updated Sucessfully
				//header('location:login.html');
				//alert('User Is Not Logged In');
		}else{
				//User Is Logged In
				//alert('User Is Logged In'+json.logedIn);
		}
	});
	//kart set rented=1
	$.get("process.php","updateKart=1&custId="+userId+"&pId="+pId,  function(data){
		var json=JSON.parse(data);
		if(json.success=="0"){
				//Updated Sucessfully
				//header('location:login.html');
				//alert('User Is Not Logged In');
		}else{
				//User Is Logged In
				//alert('User Is Logged In'+json.logedIn);
		}
	});
}
// yes btn of myAccount.php?page=product line no 176
function updateAvailibity(pId){
	//var x=$('yes').attr('role');
	//alert('MsgId:'+msgId+'; PId :'+pId+'; OwnerId:'+ownerId+';KarterId:'+userId+';');
	//alert("rennnnnn");
	/*
	myAcc.js------>Msg Products
	prod_sum------>kart
	*/
	//product set p_rented=1
	$.get("process.php","updateProduct1=1&pId="+pId,  function(data){
		var json=JSON.parse(data);
		if(json.success=="0"){
				//Updated Sucessfully
				//header('location:login.html');
				//alert('failed To Update');
		}else{
				//User Is Logged In
				//alert('Updated Sucess');
				location.reload();
		}
	});
}