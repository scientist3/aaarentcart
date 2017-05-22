$(document).ready(function(){
	//Checks If The User Is Loged Inn
	$.get("process.php","logedIn=1",  function(data){
		var json=JSON.parse(data);
		if(json.logedIn!="0"){
			//User Is Logged In
			$('#formRegDiv').html("<div class='well'>You Are Logged In As [ "+json.logedIn+" ]. Please Logout First</div>");	
		
		}else{
				//User Is Not Logged In
				//$('#cartItems').html("OoooopS!");
				// Register Page  Will Be Displayed Automatically When Not Logged In
		}
	});
	// Date Picker Setter
	$( "#datepicker" ).datepicker();
	
	//var a=$('#inputFname1');
	//alert(a.val());
	
	/*$('#regForm').submit(function(){
		alert("Jquery Sumb");
	});*/
	
	$('#registerBtn').click(function(){
		/*var a=$('#inputFname1').val();//personal
		var b=a+$('#inputLnam').val();
		var c=a+$('#input_email').val();
		var d=a+$('#inputPassword1').val();
		var e=a+$('#datepicker').val();
		var a=a+$('#company').val();
		var a=a+$('#address').val();
		var a=a+$('#address2').val();
		var a=a+$('#city').val();
		var a=a+$('#state').val();
		var a=a+$('#postcode').val();
		var a=a+$('#country').val();
		var a=a+$('#mobile').val();
		//var a+=$('#inputFname1').val();
		//var a+=$('#inputFname1').val();
		*/
		//alert("hoooo");
		/*if(isEmail($('#input_email').val())){
			document.getElementById("input_email").style.border="1px solid #dd4b39";
			$('#errEmail').html("");
		}
		else{
			$('#errEmail').html("Invalid Email Id");	
			document.getElementById("input_email").style.border="1px solid #dd4b39";
		}*/
	});
	
	// Check First Name
	$('#inputFname1').blur(function(){
		if($('#inputFname1').val().length==""){
			$('#errFname').html("First Name Empty");	
			document.getElementById("inputFname1").style.border="1px solid #dd4b39";		
		}
		else{
			document.getElementById("inputFname1").style.border="";
			$('#errFname').html("");
		}			
	});
	
	// Check User Name
	$('#username').blur(function(){
		if($('#username').val().length==""){
			$('#errUname').html("UserName Empty");	
			document.getElementById("username").style.border="1px solid #dd4b39";		
		}
		else{
			// Check Here Whether Anybody Has Taken This Username Or Not
			//----------------------------------------------------------------------Attention Needed
			var un=$('#username').val();
			$.get("process.php","takenUsername=1&un="+un,  function(data){
				//alert(data);
				var json=JSON.parse(data);
				if(json.error=="0"){
					//Username Is Valid/ No Duplicate
					$('#unique').html("");
					$('#unique').html(json.errDesc);	
				}else{
					//Username Is inValid/ Duplicate
					$('#unique').html("");
					$('#errUname').html(json.errDesc);
					$('#username').val("");
				}
			});
			document.getElementById("username").style.border="";
			$('#errUname').html("");
		}			
	});
	
	// Check Last Name
	$('#inputLnam').blur(function(){
		if($('#inputLnam').val().length==""){
			$('#errLname').html("Last Name Empty");	
			document.getElementById("inputLnam").style.border="1px solid #dd4b39";		
		}
		else{
			document.getElementById("inputLnam").style.border="";
			$('#errLname').html("");
		}			
	});
	
	// Check Email Id 
	$('#input_email').blur(function(){
		if(isEmail($('#input_email').val())){
			document.getElementById("input_email").style.border="";
			$('#errEmail').html("");
		}
		else{
			$('#errEmail').html("Invalid Email Id");	
			document.getElementById("input_email").style.border="1px solid #dd4b39";		
		}	
	});
	
	// Check Password
	$('#inputPassword1').blur(function(){
		if($('#inputPassword1').val().length<8){
			$('#errPass').html("Password Must Be Atlest 8 Chars Long");	
			document.getElementById("inputPassword1").style.border="1px solid #dd4b39";		
		}
		else{
			document.getElementById("inputPassword1").style.border="";
			$('#errPass').html("");
		}			
	});
	
	// Check Date
	$('#datepicker').blur(function(){
		if(isDate($('#datepicker').val())){
			document.getElementById("datepicker").style.border="";
			$('#errDOB').html("");
		}
		else{
			$('#errDOB').html("Invalid Dob");	
			document.getElementById("datepicker").style.border="1px solid #dd4b39";		
		}	
	});
	
	// Check Pincode
	$('#postcode').blur(function(){
		/*
		//var pinPatern=/^d{6}$/;
		//var pinPatern=/^([0-9](1,6))+$/;
		//alert("pinPar1");
		//var phonePattern=/^\d{10}$/;
		//var emailPattern=/^([a-z A-Z 0-9 _\.\-])+\@(([a-z A-Z 0-9\-])+\.)+([a-z A-Z 0-9]{3,3})+$/;
		//alert($('#postcode').val());
		if(!pinPatern.test($('#postcode').val())){
		*/
		//Check Length
		//alert($('#postcode').val()); Works Fine
		if($('#postcode').val().length!=6){
			$('#errPostcode').html("PinCode Must Be 6 Digits Long");	
			document.getElementById("postcode").style.border="1px solid #dd4b39";
			//$('#errPostcode').html("");
			$('#postcode').val("");
		}
		else{
			//Check Digits Only
			if(isNaN($('#postcode').val())){
				//alert("isnumeric");
				$('#errPostcode').html("It Is Not A Number");	
				document.getElementById("postcode").style.border="1px solid #dd4b39";
				$('#postcode').val("");
			}else{
				//alert("Not isnumeric");
				document.getElementById("postcode").style.border="";
				$('#errPostcode').html("");
			}			
		}			
	});
	
	//Check Mobile Number
	$('#mobile').blur(function(){
		if($('#mobile').val().length!=10){
			$('#errMobile').html("Less Than 10 Digit");	
			document.getElementById("mobile").style.border="1px solid #dd4b39";
			$('#mobile').val("");
		}else{
			if(isNaN($('#mobile').val())){
				$('#errMobile').html("Invalid Number");	
				document.getElementById("mobile").style.border="1px solid #dd4b39";
				$('#mobile').val("");
			}else{
				document.getElementById("mobile").style.border="";
				$('#errMobile').html("");
			}
		}
	});
	
	//Check Address
	$('#address').blur(function(){
		if($('#address').val().length==""){
			$('#errAddress').html("Address Empty");	
			document.getElementById("address").style.border="1px solid #dd4b39";		
			$('#mobile').val("");
		}
		else{
			document.getElementById("address").style.border="";
			$('#errAddress').html("");
		}			
	});
	
	//Check City
	$('#city').blur(function(){
		if($('#city').val().length==""){
			$('#errCity').html("City Empty");	
			document.getElementById("city").style.border="1px solid #dd4b39";		
		}
		else{
			document.getElementById("city").style.border="";
			$('#errCity').html("");
		}			
	});
	
	//Check State
	$('#state').blur(function(){
		if($('#state').val().length==""){
			$('#errState').html("State Empty");	
			document.getElementById("state").style.border="1px solid #dd4b39";		
		}
		else{
			document.getElementById("state").style.border="";
			$('#errState').html("");
		}			
	});
	//Check Country
	$('#country').blur(function(){
		if($('#country').val().length==""){
			$('#errCountry').html("Country Empty");	
			document.getElementById("country").style.border="1px solid #dd4b39";		
		}
		else{
			document.getElementById("country").style.border="";
			$('#errCountry').html("");
		}			
	});
});

function valRegForm(regForm){
	alert("Submitted"+regForm.inputFname1.value);
}

function isEmail(email) {
  var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
  return regex.test(email);
}
// Date Of Birth Check
function isDate(txtDate)
{
  var currVal = txtDate;
  if(currVal == '')
    return false;
  
  //Declare Regex  
  var rxDatePattern = /^(\d{1,2})(\/|-)(\d{1,2})(\/|-)(\d{4})$/; 
  var dtArray = currVal.match(rxDatePattern); // is format OK?

  if (dtArray == null)
     return false;
 
  //Checks for mm/dd/yyyy format.
  dtMonth = dtArray[1];
  dtDay= dtArray[3];
  dtYear = dtArray[5];

  if (dtMonth < 1 || dtMonth > 12)
      return false;
  else if (dtDay < 1 || dtDay> 31)
      return false;
  else if ((dtMonth==4 || dtMonth==6 || dtMonth==9 || dtMonth==11) && dtDay ==31)
      return false;
  else if (dtMonth == 2)
  {
     var isleap = (dtYear % 4 == 0 && (dtYear % 100 != 0 || dtYear % 400 == 0));
     if (dtDay> 29 || (dtDay ==29 && !isleap))
          return false;
  }
  return true;
}