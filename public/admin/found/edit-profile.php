<?php 
session_start();
include("record.php");
$rec=new Record;
if(isset($_POST['submit']))
{
	  $id=$_POST['id'];
	  $name=$_POST['name'];
	  $password=$_POST['password'];
	  $mobile=$_POST['mobile'];

      $imgFile = $_FILES['files']['name'];
      $tmp_dir = $_FILES['files']['tmp_name'];
      $imgSize = $_FILES['files']['size'];
      $upload_dir = '../upload/admin/';
      $imgExt = strtolower(pathinfo($imgFile,PATHINFO_EXTENSION)); // get image extension
      $valid_extensions = array('jpeg', 'jpg');  // valid extensions // rename uploading image
      $userpic = rand(1000,1000000).".".$imgExt;

      if($imgFile=='')
	  {
		 $sql="update tb_admin set username='$name',password='$password',mobile='$mobile' where id='$id'";
		 $conn=$rec->getrecordalldata($sql);
		 if($conn){
			 header("location:../dashboard.php");
			 $_SESSION['deluxuser']=$name;
		 }else{
			 header("location:../edit-profile.php?error=11");
		 } 

      }else{
			if(in_array($imgExt, $valid_extensions))
           {   
              // Check file size '5MB'
              if($imgSize < 1000000)
              {
              
                 if(move_uploaded_file($tmp_dir,$upload_dir.$userpic))
                 {
					    $sql="update tb_admin set username='$name',password='$password',mobile='$mobile',image='$userpic' where id='$id'";
                       $conn=$rec->getrecordalldata($sql);
                       if($conn)
                       {
                           header("location:../dashboard.php");
						   $_SESSION['deluxuser']=$name;
                       }  
                       else
                       {
                           header("location:../edit-profile.php");
						   $_SESSION['error1']="Something Problem Please Try Again..";
                       }  
                 }
              }
              else 
              {
                       header("location:../edit-profile.php");
					   $_SESSION['error1']="Something Problem Please Try Again..";
              }
      }
      else{

      }
      }
}
else
{
		header("location:../edit-profile.php");
		$_SESSION['error1']="Something Problem Please Try Again..";
}
?>