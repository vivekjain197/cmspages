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
      $name = $_POST['dist'];
	  
	   $sql="update tb_dist set cid='$country',sid='$state',name='$name' where id='$id'";
	   $conn=$rec->getrecordalldata($sql);
	   if($conn)
	   {
	       header("location:../dist.php");
	   }  
	   else
	   {
	       header("location:../edit-dist.php?data=".$data1."");
		   $_SESSION['error']="Data Not Inserted";
	   }     
			 
			          
}
else 
{
     header("location:../dist.php");
	 $_SESSION['error']="Something Wrong Please Try Again..";
}
?>