//class name for insert data
//id for update data

$(document).on("submit",".joinmember",function(event){
		//alert('joinmember');
	event.preventDefault();
	$.ajax({
	url: "include/join-member.php",
	type: "POST",
	data:  new FormData(this),
    contentType: false,
         cache: false,
    processData:false,
	success: function(result){

		//alert(result);
		if(result=='1'){  alert("Your Form Submit Successfully.."); location.reload();
		$(".joinmember").trigger("reset");
		}else if(result=='2'){ 	alert("Something Wrong..");	
		}else if(result=='3'){ $(".fileerror").html('File Problem');
		}else if(result=='4'){ $(".fileerror").html('File Size Problem');
		}else if(result=='5'){ $(".fileerror").html('File Extension Problem');
		}else if(result=='6'){ alert("Your Form Submit Successfully.."); location.reload();
		$(".joinmember").trigger("reset");
		}else {	alert("Something Wrong..");	}

			//$('#exampleModal-1').hide();
			//location.reload();
			
	      }
        })
})

$(document).on("submit",".joinshaadi",function(event){
	//alert('joinshaadi');
	event.preventDefault();
	$.ajax({
	url: "include/join-shaadi-member.php",
	type: "POST",
	data:  new FormData(this),
    contentType: false,
         cache: false,
    processData:false,
	success: function(result){

		//alert(result);
		if(result=='done1' || result==''){  alert("Your Form Submit Successfully.."); 	
		$(".joinshaadi").trigger("reset"); location.reload();
	    }else if(result=='wrong2'){ $(".fileerror").html('File Problem');
		}else if(result=='wrong3'){ alert("Something Wrong2.."); 
		}else if(result=='wrong4'){ $(".fileerror").html('File Size Problem');
		}else if(result=='wrong5'){ $(".fileerror").html('File Extension Problem');
		}else if(result=='wrong6'){	alert("Something Wrong3..");	
		}else if(result=='done2'){	alert("Your Form Submit Successfully.."); 
		$(".joinshaadi").trigger("reset");	location.reload(); }
		

			//$('#exampleModal-1').hide();
			//location.reload();
			
	      }
        })
})

$(document).on("submit",".joinmahasbha",function(event){
	//alert('joinshaadi');
	event.preventDefault();
	$.ajax({
	url: "include/join-mahashabha.php",
	type: "POST",
	data:  new FormData(this),
    contentType: false,
         cache: false,
    processData:false,
	success: function(result){

		//alert(result);
		if(result=='1'){  alert("Your Form Submit Successfully.."); location.reload();	
		$(".joinmahasbha").trigger("reset");
	    }else if(result=='2'){ $(".fileerror").html('File Problem');
		}else if(result=='3'){ $(".fileerror").html('File Uploading Problem');
		}else if(result=='4'){ $(".fileerror").html('File Size Problem');
		}else if(result=='5'){ $(".fileerror").html('File Extension Problem');
		}else if(result=='7'){	alert("Something Wrong3..");	
		}else if(result=='6'){	alert("Your Form Submit Successfully.."); location.reload();
		$(".joinmahasbha").trigger("reset");	}
		

			//$('#exampleModal-1').hide();
			//location.reload();
			
	      }
        })
})

/************open updation form details page***********/
function openfamilyheaddata(id){

    $.ajax({
		url: "./include/family-headmodal.php",
		type: "POST",
		data:{id:id},
		success: function(result){

	        $("#familyhead").modal(open);
	        $("#heademodal").html(result);
		      }
        })

}
$(document).on("submit","#janagananadata",function(event){
		
	event.preventDefault();
	$.ajax({
	url: "include/familyheadaction.php",
	type: "POST",
	data:  new FormData(this),
    contentType: false,
         cache: false,
    processData:false,
	success: function(result){ 

		if(result=='1'){  alert("Your Form Updated Successfully.."); location.reload();	
		}else if(result=='2'){ $(".fileerror").html('File Problem');
		}else if(result=='3'){ $(".fileerror").html('File Uploading Problem');
		}else if(result=='4'){ $(".fileerror").html('File Size Problem');
		}else if(result=='5'){ $(".fileerror").html('File Extension Problem');
		}else if(result=='7'){	alert("Something Wrong3..");	
		}else if(result=='6'){	alert("Your Form Updated Successfully.."); location.reload();
		}
	} 
   })
})

function openfamilymemberdata(id){

    $.ajax({
		url: "./include/family-membermodal.php",
		type: "POST",
		data:{id:id},
		success: function(result){

	        $("#familymemberdata").modal(open);
	        $("#familymembermodal").html(result);
		      }
        })

}

$(document).on("submit","#updatememberdata",function(event){
		
	event.preventDefault();
	$.ajax({
	url: "include/familymemberaction.php",
	type: "POST",
	data:  new FormData(this),
    contentType: false,
         cache: false,
    processData:false,
	success: function(result){ 
		if(result=='1'){  alert("Your Form Updated Successfully.."); location.reload();	
		}else if(result=='2'){ $(".fileerror").html('File Problem');
		}else if(result=='3'){ $(".fileerror").html('File Uploading Problem');
		}else if(result=='4'){ $(".fileerror").html('File Size Problem');
		}else if(result=='5'){ $(".fileerror").html('File Extension Problem');
		}else if(result=='7'){	alert("Something Wrong3..");	
		}else if(result=='6'){	alert("Your Form Updated Successfully.."); location.reload();
		}
	} })
})

function openfamilymahashabhadata(id){

    $.ajax({
		url: "./include/family-mahashabhamodal.php",
		type: "POST",
		data:{id:id},
		success: function(result){

	        $("#familymahashabhadata").modal(open);
	        $("#familymahashabhamodal").html(result);
		      }
        })

}
$(document).on("submit","#updatemahashabhadata",function(event){
	event.preventDefault();
	$.ajax({
	url: "include/familymahashabhaaction.php",
	type: "POST",
	data:  new FormData(this),
    contentType: false,
         cache: false,
    processData:false,
	success: function(result){ 
		if(result=='1'){  alert("Your Form Updated Successfully.."); location.reload();	
		}else if(result=='2'){ $(".fileerror").html('File Problem');
		}else if(result=='3'){ $(".fileerror").html('File Uploading Problem');
		}else if(result=='4'){ $(".fileerror").html('File Size Problem');
		}else if(result=='5'){ $(".fileerror").html('File Extension Problem');
		}else if(result=='7'){	alert("Something Wrong3..");	
		}else if(result=='6'){	alert("Your Form Updated Successfully.."); location.reload();
		}
	} })
})


function openfamilyshaadidata(id){

	$.ajax({
		url: "./include/family-shaadimodal.php",
		type: "POST",
		data:{id:id},
		success: function(result){

	        $("#familyweddingdata").modal(open);
	        $("#familyweddingmodal").html(result);
		      }
        })
}
$(document).on("submit","#updateshaadidata",function(event){
		
	event.preventDefault();
	$.ajax({
	url: "include/familyshaadiaction.php",
	type: "POST",
	data:  new FormData(this),
    contentType: false,
         cache: false,
    processData:false,
	success: function(result){ 
		if(result=='1'){  alert("Your Form Updated Successfully.."); location.reload();	
		}else if(result=='2'){ $(".fileerror").html('File Problem');
		}else if(result=='3'){ $(".fileerror").html('File Uploading Problem');
		}else if(result=='4'){ $(".fileerror").html('File Size Problem');
		}else if(result=='5'){ $(".fileerror").html('File Extension Problem');
		}else if(result=='7'){	alert("Something Wrong3..");	
		}else if(result=='6'){	alert("Your Form Updated Successfully.."); location.reload();
		}
		} 
	})
})
/************Form Updatation Process*******************/