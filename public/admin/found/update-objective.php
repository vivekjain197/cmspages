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
			  
			 if($key=='1'){
				  
				  $description = $_POST['description'];
				  
				  $sql="update $tb set description='$description' where id='$id' and s_key='mainobjective'";
				  $conn=$rec->getrecordalldata($sql);
				  if($conn)
				  {
				   header("location:../main-objective.php");
				   $_SESSION['done']="Your About Data Updated Successfully..";
				  }  
				  else
				  {
				   header("location:../main-objective.php");
				   $_SESSION['error']="Data Not Inserted";
				  } 
				  
				}
			else if($key=='2'){

				 $description = $_POST['description'];
				  
				  $sql="update $tb set description='$description' where id='$id' and s_key='jangarnaobjective'";
				  $conn=$rec->getrecordalldata($sql);
				  if($conn)
				  {
				   header("location:../janaganana-objective.php");
				   $_SESSION['done']="Your About Data Updated Successfully..";
				  }  
				  else
				  {
				   header("location:../janaganana-objective.php");
				   $_SESSION['error']="Data Not Inserted";
				  } 	



			}	
			else{
				  
				  $address = $_POST['address'];
				  $website = $_POST['website'];
				  $mobile = $_POST['mobile'];
				  $title3 = $_POST['title3'];
				  $email = $_POST['email'];
				  $email1 = $_POST['email1'];
				  
				  $sql="update $tb set heading='$website',title1='$email',title2='$email1',mobile='$mobile',title3='$title3',description='$address' where id='$id' and s_key='contact'";
				  $conn=$rec->getrecordalldata($sql);
				  if($conn)
				  {
				   header("location:../contact.php");
				   $_SESSION['done']="Your Contact Data Updated Successfully..";
				  }  
				  else
				  {
				   header("location:../contact.php");
				   $_SESSION['error']="Data Not Inserted";
				  } 
				  
			  }
			
			  
			          
}
else 
{
     header("location:../".$key.".php");
	 $_SESSION['error']="Something Wrong Please Try Again..";
}
?>