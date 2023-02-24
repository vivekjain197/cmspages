<?php
session_start();
include("record.php");
$rec=new Record;
if(isset($_POST['submit']))
{
              $data=explode('_',$_GET['data']);
			  
			  $id=base64_decode($data[0]);
			  $tb=base64_decode($data[1]);
			  
				  
				  $consultant = $_POST['consultant'];
				  $description = $_POST['description'];
				  
				  $sql="update $tb set cid='$consultant',description='$description' where id='$id'";
				  $conn=$rec->getrecordalldata($sql);
				  if($conn)
				  {
				   header("location:../our-consultant.php");
				   $_SESSION['done']="Your Our Objective Data Updated Successfully..";
				  }  
				  else
				  {
				   header("location:../edit-our-consultant.php?data=".$_GET['data']."");
				   $_SESSION['error']="Data Not Inserted";
				  } 
				
			  
			          
}
else 
{
     header("location:../edit-our-consultant.php?data=".$_GET['data']."");
	 $_SESSION['error']="Something Wrong Please Try Again..";
}
?>