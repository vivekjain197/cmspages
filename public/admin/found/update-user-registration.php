<?php
session_start();
include("record.php");
$rec=new Record;
if(isset($_POST['submit']))
{
              $data=explode('_',$_GET['data']);
			  
			  $id=base64_decode($data[0]);
			  $tb=base64_decode($data[1]);
			  
		 	  $name = $_POST['username'];
		 	  $email = $_POST['email'];
		 	  $mobile = $_POST['mobile'];
		 	  $password = $_POST['password'];

			  $sql="update $tb set name='$name',email='$email',mobile='$mobile',password='$password' where id='$id'";
			  $conn=$rec->getrecordalldata($sql);
			  if($conn)
			  {
			   header("location:../registration.php");
			   $_SESSION['done']="Your About Data Updated Successfully..";
			  }  
			  else
			  {
			   header("location:../edit-registration.php?data=".base64_encode($id)."_".base64_encode($tb)."");
			   $_SESSION['error']="Data Not Inserted";
			  } 
				
			
			  
			          
}
else 
{
     header("location:../edit-registration.php?data=".base64_encode($id)."_".base64_encode($tb)."");
	 $_SESSION['error']="Something Wrong Please Try Again..";
}
?>