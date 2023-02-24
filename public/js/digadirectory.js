function createaccount() {
	 //alert('a');
	 
	 var name=$(".jname").val();
	 var mobile=$(".jmobile").val();
	 var email=$(".jemail").val();
	 var pass=$(".jpass").val();
	 var otp = $('.jotp').val();
	 if(name==""){
		 $(".jname").css("border","1px solid red");//more efficient
         return false;
	}else if(email==""){
		$(".jemail").css("border","1px solid red");//more efficient
		$(".jmobile").css("border","");
		$(".jname").css("border","");
        return false;
	}else if(pass==""){
		$(".jpass").css("border","1px solid red");//more efficient
		$(".jname").css("border","");
		$(".jemail").css("border","");
        return false;
	}else if(mobile==""){
		$(".jmobile").css("border","1px solid red");//more efficient
		$(".jname").css("border","");
		$(".jemail").css("border","");
		$(".jpass").css("border","");
        return false;
	}else if(isNaN(mobile)){
		$(".jmobile").css("border","1px solid red");//more efficient
		$(".jname").css("border","");
		$(".jemail").css("border","");
		$(".jpass").css("border","");
        return false;
	}else if(otp!=''){  
	    
	    
        $.ajax({
    		url: "./include/verifyotp.php",
    		type: "POST",
    		data:{otp:otp},
    		success: function(result){
    		    if(result==1){
    		        $(".jotp").css("border","1px solid green");
    		        
    		        $.ajax({
                		url: "./include/createaccount.php",
                		type: "POST",
                		data:$('#createregister').serialize(),
                		success: function(result){
                		     //alert(result);
                		    var data = result.split("_");
                		    var data1=data[0]; var data2=data[1];
            				var data3=data[2]; 
							
							if(data1=='1'){
            					window.location.href="conditate-registration.php?data="+data[1]+"_"+data[2];
            
            				}else {
            				 //	location.reload();
            				 window.location.href="registration-janaganana.php?data="+data[1]+"_"+data[2];
            					
            				}
                		}    
                	  })
                	  
    		        return true;
    		    }else {
    				$(".jotp").css("border","1px solid red");
    				return false;
    		      }
    		}    
    	  })
    	  
	    
	}
		
		
}

$(document).on("click",".feedsubmitdata",function(){

	$.ajax({
		url: "./include/feedbackrecord.php",
		type: "POST",
		data:$('#feedsubmitdata').serialize(),
		success: function(result){
				 if(result=='true'){
				 	document.getElementById('feedsubmitdata').reset();
				 	$('#feddsucmsg').html('<div class="alert alert-success alert-dismissible"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>  <strong>Success!</strong> Your Feedback Submmitted Successfully..</div>');
				 } else {
				 	$('#feddsucmsg').html('<div class="alert alert-warning alert-dismissible"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>  <strong>Warning!</strong> Something Wrong please Try Again..</div>');
			    }
		      }
	        })
})

$(document).on("submit","#logincontroller",function(){

	$.ajax({
	url: "./include/logincontroller.php",
	type: "POST",
	data:$('#logincontroller').serialize(),
	success: function(result){
			//alert(result);
			var data = result.split("-");
			var data1=data[0]; var data2=data[1]; var data3=data[2];
			if(data1==2){
			    
			     location.reload();
			    
			}else if(data1==0){
			    
			    $('.loginalert').html('Username and Password Wrong..');
 			    setTimeout(function(){  $('.loginalert').html(''); }, 1200 ); 

			}else{
			    
			   window.location.href="registration-janaganana.php?data="+data3+"_"+data2;
			    
			}

			
	      }
        })
})

function changeamountdata()
{
	var member = $('#amountfees3').val();
	document.getElementById('amount3').value = member;
}
function changeamountdata3()
{
	var member = $('#mamountfees3').val();
	document.getElementById('mamount3').value = member;
}
$(document).on("change",".otherdata",function(){
	var other = $('.otherdata').val();
	//alert(other);
	if(other=='other'){
		$(".othereducation").removeAttr('readOnly', false);
	}else {
	    $(".othereducation").attr('readOnly', true);
	    $(".othereducation").val('');
     }	
})
$(document).on("change",".otherdata1",function(){
	var other = $('.otherdata1').val();
	//alert(other);
	if(other=='other'){
		$(".othereducation1").removeAttr('readOnly', false);
	}else {
	    $(".othereducation1").attr('readOnly', true);
	    $(".othereducation1").val('');
     }	
})
/*******start logout coding *******/

function logout()
{
	//alert('logout');
	window.location.href="signout.php";
}

/*******start our profile edit coding*******/

function profile(id,rid)
{
	//alert('profile');
	window.location.href="condidate-profile.php?data="+id+"_"+rid;
}

/*******start newslatter coding*******/

function newslatter()
{
	var key = $('.news').val();
	var email = $('.email').val();

	$.ajax({
	url: "./include/newslatter.php",
	type: "POST",
	data:{key:key,email:email},
	success: function(result){

       $('.email').val('');
	      }
        })
}

/*******Check Allready Enter Email And Mobile *******/
function allreadyemail()
{
	var email = $('.jemail').val();
	$.ajax({
	url: "./include/checkemail.php",
	type: "POST",
	data:{email:email},
	success: function(result){
		if(result=='1'){  $('.jemail').val(''); alert('Email Id Already Register....'); }
		else {    }
				
	      }
        })
}

function allreadymobile()
{
	var mobile = $('.jmobile').val();

	$.ajax({
	url: "./include/checkmobile.php",
	type: "POST",
	data:{mobile:mobile},
	success: function(result){
		if(result=='1'){  $('.jmobile').val(''); alert('Mobile Already Register....');}
		else {  
		    
		    $('.showinput').show();
		
    		$.ajax({
    		url: "./include/sendotp.php",
    		type: "POST",
    		data:{mobile:mobile},
    		success: function(result){
    				 
    		      }
    	        })
		    
		    
		}
       
	      }
        })
}
// $('.jotp').keypress(function(){
//     var otp = $('.jotp').val();
//     $.ajax({
// 		url: "./include/verifyotp.php",
// 		type: "POST",
// 		data:{otp:otp},
// 		success: function(result){
// 		    if(result==1){
// 		        $(".jotp").css("border","1px solid green");
		        
// 		    }else {
// 				$(".jotp").css("border","1px solid red");
// 		      }
// 		}    
// 	  })
// })
/*******start our profile modal form update*******/
function forgetpass(data)
{
	$("#hidelogin").hide();
	$("#showforget").show();
}

/*******start our profile modal form update*******/

function showalertmsg(msg){

 $("#msgshow1").html(msg);
		     
}

/*********Change Password Code Here*****************/

// $(document).on("submit","#changepassword",function(){
// 	var email = $('.contact').val();
// 	var otp   = $('.otp').val();
// 	var pass  = $('.password').val();
// 	var repass = $('.rpassword').val();
// 	if(email==''){
// 		$('.email').css('border-color', 'red');
// 		return false;

// 	}else if(pass==''){
// 		$('.email').css('border-color', '');
// 		$('.password').css('border-color', 'red');
// 		return false;

// 	}else if(repass==''){
// 		$('.email').css('border-color', '');
// 		$('.password').css('border-color', '');
// 		$('.rpassword').css('border-color', 'red');
// 		return false;

// 	}else if(pass!=repass){
// 		$('.email').css('border-color', '');
// 		$('.password').css('border-color', '');
// 		$('.rpassword').css('border-color', 'red');
// 		return false;

// 	}else {
				
// 	$.ajax({
// 		url: "./include/changepassword.php",
// 		type: "POST",
// 		data:{email:email,pass:pass,repass:repass},
// 		success: function(result){
// 				//alert(result);
// 				if(result=='1'){
// 					$('.email').val('');$('.password').val('');$('.rpassword').val('');
// 					var msg = "<center><span><h3>✔ Your Password Successfully Update Please Login...</h3></span></center>";
// 					$('#forgotmsgshow').modal(open);
// 					$('#forgotmsgshow1').html(msg);
// 					$('#changepassword').reset();
// 				}else {
// 					var msg = "<center><span><h3>✘ Something Wrong Please Try Again...</h3></span></center>";
// 					$('#forgotmsgshow').modal(open);
// 					$('#forgotmsgshow1').html(msg);
// 				}
				
				
// 		      }
// 	        })
//     }
// })


$(document).on("submit","#changepassword",function(){
	var email = $('.contact').val();
	var otp   = $('.otp').val();
	
})
function checkmobilenumber()
{
	var mobile = $('.maincontact').val();

	$.ajax({
	url: "./include/checkmobile.php",
	type: "POST",
	data:{mobile:mobile},
	success: function(result){
		if(result=='1'){  
		    
		    $.ajax({
    		url: "./include/sendforgetotp.php",
    		type: "POST",
    		data:{mobile:mobile},
    		success: function(result){
    		    alert(result);
    		    if(result==''){	    }else{
    		        
    		        alert('done');
    		        
    		        
    		    }
    				 //$('.showmainforgotdata').html('<div class="col-md-12"><input name="password" class="password" type="text" placeholder="Password *" /></div><div class="col-md-12"><input name="rpassword" class="rpassword" type="text" placeholder="Re-enter Password *"/></div><div class="col-md-12"><button type="submit" name="submit" id="submit3" class="submit" data-toggle="modal" disabled>Submit</button></div>');
    		      }
    	        })
		}
		else {  
		    $('.maincontact').val(''); alert('Mobile Number Not Register....');
		    
		 }
       
	      }
        })
}

/*******Get All Country State Districts Tehshil And City Name By Id*******/
$(document).on("change",".getcountry",function(){	

	var id = $('.getcountry').val();
    //alert(id);
    $.ajax({
	url: "./include/getstatename.php",
	type: "POST",
	data:{id:id},
	success: function(result){
		//alert(result);
		   $(".getstate").html(result);
	      }
	    })
    })
//}

$(document).on("change",".getstate",function(){
	var id = $('.getstate').val();
	//alert(id);
    $.ajax({
	url: "./include/getdistname.php",
	type: "POST",
	data:{id:id},
	success: function(result){

	    $(".getdist").html(result);
	      }
	    })
})
$(document).on("change",".getdist",function(){
	var id = $('.getdist').val();
	//alert(id);
    $.ajax({
	url: "./include/gettehshilname.php",
	type: "POST",
	data:{id:id},
	success: function(result){

	    $(".gettehshil").html(result);
	      }
	    })
})

$(document).on("change",".gettehshil",function(){
	var id = $('.gettehshil').val();
	//alert(id);
    $.ajax({
	url: "./include/getcityname.php",
	type: "POST",
	data:{id:id},
	success: function(result){

	    $(".getcity").html(result);
	      }
	    })
})
/*******Get All Country State Districts Tehshil And City Name By Id*******/
$(document).on("change",".getcountry1",function(){	

	var id = $('.getcountry1').val();
   // alert(id);
    $.ajax({
	url: "./include/getstatename.php",
	type: "POST",
	data:{id:id},
	success: function(result){
		//alert(result);
		   $(".getstate1").html(result);
	      }
	    })
    })
//}

$(document).on("change",".getstate1",function(){
	var id = $('.getstate1').val();
	//alert(id);
    $.ajax({
	url: "./include/getdistname.php",
	type: "POST",
	data:{id:id},
	success: function(result){

	    $(".getdist1").html(result);
	      }
	    })
})
$(document).on("change",".getdist1",function(){
	var id = $('.getdist1').val();
	//alert(id);
    $.ajax({
	url: "./include/gettehshilname.php",
	type: "POST",
	data:{id:id},
	success: function(result){

	    $(".gettehshil1").html(result);
	      }
	    })
})

$(document).on("change",".gettehshil1",function(){
	var id = $('.gettehshil1').val();
	//alert(id);
    $.ajax({
	url: "./include/getcityname.php",
	type: "POST",
	data:{id:id},
	success: function(result){

	    $(".getcity1").html(result);
	      }
	    })
})
/*******Get All Country State Districts Tehshil And City Name By Id*******/
$(document).on("change",".getcountry2",function(){	

	var id = $('.getcountry2').val();
    //alert(id);
    $.ajax({
	url: "./include/getstatename.php",
	type: "POST",
	data:{id:id},
	success: function(result){
		//alert(result);
		   $(".getstate2").html(result);
	      }
	    })
    })


$(document).on("change",".getstate2",function(){
	var id = $('.getstate2').val();
	//alert(id);
    $.ajax({
	url: "./include/getdistname.php",
	type: "POST",
	data:{id:id},
	success: function(result){

	    $(".getdist2").html(result);
	      }
	    })
})
$(document).on("change",".getdist2",function(){
	var id = $('.dist2').val();
	//alert(id);
    $.ajax({
	url: "./include/gettehshilname.php",
	type: "POST",
	data:{id:id},
	success: function(result){

	    $(".gettehshil2").html(result);
	      }
	    })
})

$(document).on("change",".gettehshil2",function(){
	var id = $('.gettehshil2').val();
	//alert(id);
    $.ajax({
	url: "./include/getcityname.php",
	type: "POST",
	data:{id:id},
	success: function(result){

	    $(".getcity2").html(result);
	      }
	    })
})

/******************End Get Country,State,District,Tehshil And City Name Code********/