<?php
include("record.php");
$rec=new Record;
if(isset($_POST['submit']))
{
      $data = explode('_',$_GET['data']);
	  $data1= $_GET['data'];
		$id=base64_decode($data[0]);
		$tb=base64_decode($data[1]);
	  $country  = $_POST['country'];
      $state  = $_POST['state'];
      $dist = $_POST['dist'];
      $tehshil = $_POST['tehshil'];
	  
	   $sql="update tb_tehshil set cid='$country',sid='$state',did='$dist',name='$tehshil' where id='$id'";
	   $conn=$rec->getrecordalldata($sql);
	   if($conn)
	   {
	       header("location:../tehshil.php");
	   }  
	   else
	   {
	       header("location:../edit-tehshil.php?data=".$data1."");
		   $_SESSION['error']="Data Not Inserted";
	   }     
			 
			          
}
else 
{
     header("location:../tehshil.php");
	 $_SESSION['error']="Something Wrong Please Try Again..";
}
?>