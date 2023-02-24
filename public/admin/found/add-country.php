<?php
include("record.php");
$rec=new Record;
if(isset($_POST['submit']))
{
      $date=date('Y-m-d');
	  $name=$_POST['country'];
	  
	   $sql="insert into tb_country(name,status)values('$name','1')";
	   $conn=$rec->getrecordalldata($sql);
	   if($conn)
	   {
		   header("location:../country.php");
	   }  
	   else
	   {
		   header("location:../add-country.php");
		   $_SESSION['error']="Data Not Inserted";
	   }
	  
	  	 
			          
}
else 
{
     header("location:../country.php");
	 $_SESSION['error']="Something Wrong Please Try Again..";
}
?>