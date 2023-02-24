function show()
{
	var select = document.getElementById('pass').getAttribute('type');
	if(select=='password')
	{
		document.getElementById('pass').type = 'text';
	}
	else
	{
		document.getElementById('pass').type = 'password';
	}
}

function changestateoption()
{
	var opt = $('.anyoption').val();
	//alert(opt);
	if(opt=='1'){
		document.getElementById('inputstate').style.display  = "block"; 
		document.getElementById('inputimage').style.display  = "none"; 
	}else {
	    document.getElementById('inputimage').style.display  = "block"; 
	    document.getElementById('inputstate').style.display  = "none"; 
     }
	
}
function changedistoption()
{
	var opt = $('.anydistoption').val();
	//alert(opt);
	if(opt=='1'){
		document.getElementById('inputdist').style.display  = "block"; 
		document.getElementById('inputdiimage').style.display  = "none"; 
	}else {
	    document.getElementById('inputdiimage').style.display  = "block"; 
	    document.getElementById('inputdist').style.display  = "none"; 
     }
	
}

function changetehoption()
{
	var opt = $('.anytehoption').val();
	//alert(opt);
	if(opt=='1'){
		document.getElementById('inputteh').style.display  = "block"; 
		document.getElementById('inputtehimage').style.display  = "none"; 
	}else {
	    document.getElementById('inputtehimage').style.display  = "block"; 
	    document.getElementById('inputteh').style.display  = "none"; 
     }
	
}

function changecityoption()
{
	var opt = $('.anycityoption').val();
	//alert(opt);
	if(opt=='1'){
		document.getElementById('inputcity').style.display  = "block"; 
		document.getElementById('inputcityimage').style.display  = "none"; 
	}else {
	    document.getElementById('inputcityimage').style.display  = "block"; 
	    document.getElementById('inputcity').style.display  = "none"; 
     }
	
}


/*******Get All Country State Districts Tehshil And City Name By Id*******/
$(document).on("change",".getcountry",function(){	

	var id = $('.getcountry').val();
    //alert(id);
    $.ajax({
	url: "../include/getstatename.php",
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
	url: "../include/getdistname.php",
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
	url: "../include/gettehshilname.php",
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
	url: "../include/getcityname.php",
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
	url: "../include/getstatename.php",
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
	url: "../include/getdistname.php",
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
	url: "../include/gettehshilname.php",
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
	url: "../include/getcityname.php",
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
	url: "../include/getstatename.php",
	type: "POST",
	data:{id:id},
	success: function(result){
		//alert(result);
		   $(".getstate2").html(result);
	      }
	    })
    })
//}

$(document).on("change",".getstate2",function(){
	var id = $('.getstate2').val();
	//alert(id);
    $.ajax({
	url: "../include/getdistname.php",
	type: "POST",
	data:{id:id},
	success: function(result){

	    $(".getdist2").html(result);
	      }
	    })
})
$(document).on("change",".getdist2",function(){
	var id = $('.getdist2').val();
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