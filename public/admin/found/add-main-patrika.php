<?php
include("record.php");
$rec=new Record;
if(isset($_POST['submit']))
{
              $date=date('Y-m-d');
			  $date=$_POST['date'];
			  $imgFile = $_FILES['files']['name'];
			  $tmp_dir = $_FILES['files']['tmp_name'];
			  $imgSize = $_FILES['files']['size'];
			  $upload_dir = '../upload/epatrika/';
			  $imgExt = strtolower(pathinfo($imgFile,PATHINFO_EXTENSION)); // get image extension
			  $valid_extensions = array('jpeg', 'jpg', 'png', 'gif');  // valid extensions
			  // rename uploading image
			  $userpic = rand(1000,1000000).".".$imgExt;
				
			  if(in_array($imgExt, $valid_extensions))
			  {   
              // Check file size '5MB'
              if($imgSize < 1000000)
              {
              
                 if(move_uploaded_file($tmp_dir,$upload_dir.$userpic))
                 {
					    $sql="insert into tb_gallery(image,s_key,date1,status)values('$userpic','epatrika','$date','1')";
					  
                       $conn=$rec->getrecordalldata($sql);
                       if($conn)
                       {
                           header("location:../main-patrika.php");
                       }  
                       else
                       {
                           header("location:../add-main-patrika.php");
						   $_SESSION['error']="Data Not Inserted";
                       }  
				 } else {
				      header("location:../add-main-patrika.php");
					  $_SESSION['error']="File Uploading Problem";
						}
              }
              else 
              {
                       header("location:../add-main-patrika.php");
					   $_SESSION['error']="File Size Larger..";
              }
      }
      else{
				header("location:../add-main-patrika.php");
				$_SESSION['error']="File Format Error..";
      }	
              
			 
			          
}
else 
{
     header("location:../add-main-patrika.php");
	 $_SESSION['error']="Something Wrong Please Try Again..";
}
?>