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
      $name  = $_POST['state'];
	  
	   $sql="update $tb set fid='$country',name='$name' where id='$id'";
	   $conn=$rec->getrecordalldata($sql);
	   if($conn)
	   {
		   header("location:../state.php");
	   }  
	   else
	   {
		   header("location:../edit-state.php?data=".$data1."");
		   $_SESSION['error']="Data Not Inserted";
	   }      
			 
			          
}
else 
{
     header("location:../state.php");
	 $_SESSION['error']="Something Wrong Please Try Again..";
}
?>