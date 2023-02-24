<?php
include("record.php");
$rec=new Record;
if(isset($_POST['submit']))
{
	  $name=$_POST['country'];
	  $data = explode('_',$_GET['data']);
	  $data1= $_GET['data'];
		$id=base64_decode($data[0]);
		$tb=base64_decode($data[1]);
	  
	   $sql="update $tb set name='$name' where id='$id'";
	   $conn=$rec->getrecordalldata($sql);
	   if($conn)
	   {
		   header("location:../country.php");
	   }  
	   else
	   {
		   header("location:../edit-country.php?data=".$data1."");
		   $_SESSION['error']="Data Not Inserted";
	   }
	  
	  	 
			          
}
else 
{
     header("location:../country.php");
	 $_SESSION['error']="Something Wrong Please Try Again..";
}
?>