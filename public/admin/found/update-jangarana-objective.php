<?php
session_start();
include("record.php");
$rec=new Record;
if(isset($_POST['submit']))
{
              $data=explode('_',$_GET['data']);
			  
			  $id=base64_decode($data[0]);
			  $tb=base64_decode($data[1]);
			  
				  
				  $description = $_POST['description'];
				  
				  $sql="update $tb set description='$description' where id='$id' and s_key='jangaranaobjective'";
				  $conn=$rec->getrecordalldata($sql);
				  if($conn)
				  {
				   header("location:../jangarana-objective.php");
				   $_SESSION['done']="Your Our Objective Data Updated Successfully..";
				  }  
				  else
				  {
				   header("location:../edit-jangarana-objective.php?data=".$_GET['data']."");
				   $_SESSION['error']="Data Not Inserted";
				  } 
				
			  
			          
}
else 
{
     header("location:../edit-jangarana-objective.php?data=".$_GET['data']."");
	 $_SESSION['error']="Something Wrong Please Try Again..";
}
?>