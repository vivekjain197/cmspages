<?php
session_start();
include("record.php");
$rec=new Record;
if(isset($_POST['submit']))
{
              $data=explode('_',$_GET['data']);
			  
			  $id=base64_decode($data[0]);
			  $tb=base64_decode($data[1]);
			  $key=base64_decode($data[2]);
			  
			 if($key=='main'){
				  
				  $description = $_POST['description'];
				  
				  $sql="update $tb set description='$description' where id='$id' and s_key='$key'";
				  $conn=$rec->getrecordalldata($sql);
				  if($conn)
				  {
				   header("location:../about.php?data=".base64_encode(1)."_".base64_encode($key)."");
				   $_SESSION['done']="Your About Data Updated Successfully..";
				  }  
				  else
				  {
				   header("location:../edit-about.php?data=".$_GET['data']."");
				   $_SESSION['error']="Data Not Inserted";
				  } 
				  
				}
			else if($key=='population'){

				 $description = $_POST['description'];
				  
				  $sql="update $tb set description='$description' where id='$id' and s_key='$key'";
				  $conn=$rec->getrecordalldata($sql);
				  if($conn)
				  {
				   header("location:../about.php?data=".base64_encode(2)."_".base64_encode($key)."");
				   $_SESSION['done']="Your About Data Updated Successfully..";
				  }  
				  else
				  {
				   header("location:../edit-about.php?data=".$_GET['data']."");
				   $_SESSION['error']="Data Not Inserted";
				  } 	



			}	else if($key=='wedding'){

				  $description = $_POST['description'];
				  
				  $sql="update $tb set description='$description' where id='$id' and s_key='$key'";
				  $conn=$rec->getrecordalldata($sql);
				  if($conn)
				  {
				   header("location:../about.php?data=".base64_encode(3)."_".base64_encode($key)."");
				   $_SESSION['done']="Your About Data Updated Successfully..";
				  }  
				  else
				  {
				   header("location:../edit-about.php?data=".$_GET['data']."");
				   $_SESSION['error']="Data Not Inserted";
				  } 


			}
			else{
				  
				  $description = $_POST['description'];
				  
				  $sql="update $tb set description='$description' where id='$id' and s_key='$key'";
				  $conn=$rec->getrecordalldata($sql);
				  if($conn)
				  {
				   header("location:../about.php?data=".base64_encode(4)."_".base64_encode($key)."");
				   $_SESSION['done']="Your About Data Updated Successfully..";
				  }  
				  else
				  {
				   header("location:../edit-about.php?data=".$_GET['data']."");
				   $_SESSION['error']="Data Not Inserted";
				  } 
				  
			  }
			
			  
			          
}
else 
{
     header("location:../edit-about.php?data=".$_GET['data']."");
	 $_SESSION['error']="Something Wrong Please Try Again..";
}
?>