<?php
include("record.php");
$rec=new Record;
if(isset($_POST['submit']))
{
              $date=date('Y-m-d');
			  $name=$_POST['name'];
			  $desig=$_POST['desig'];
			  $date=$_POST['date'];
			  
			  $imgFile = $_FILES['files']['name'];
			  $tmp_dir = $_FILES['files']['tmp_name'];
			  $imgSize = $_FILES['files']['size'];
			  $upload_dir = '../upload/upnews/';
			  $imgExt = strtolower(pathinfo($imgFile,PATHINFO_EXTENSION)); // get image extension
			  $valid_extensions = array('jpeg', 'jpg', 'png', 'gif');  // valid extensions
			  // rename uploading image
			  $userpic = rand(1000,1000000).".".$imgExt;
				
				
			  if($imgFile!=''){

				if(in_array($imgExt, $valid_extensions))
				{   
				  // Check file size '5MB'
				  if($imgSize < 1000000)
				  {
              
					 if(move_uploaded_file($tmp_dir,$upload_dir.$userpic))
					 {
					    $sql="insert into tb_gallery(name,heading,image,s_key,date1,status)values('$name','$desig','$userpic','upnews','$date','1')";
					  
                       $conn=$rec->getrecordalldata($sql);
                       if($conn)
                       {
                           header("location:../main-upcoming-news.php");
                       }  
                       else
                       {
                           header("location:../add-main-upcoming-news.php");
						   $_SESSION['error']="Data Not Inserted";
                       }  
					} else {
				      header("location:../add-main-upcoming-news.php");
					  $_SESSION['error']="File Uploading Problem";
						}
				 }
						  else 
						  {
								   header("location:../add-main-upcoming-news.php");
								   $_SESSION['error']="File Size Larger..";
						  }
				  }
				  else{
							header("location:../add-main-upcoming-news.php");
							$_SESSION['error']="File Format Error..";
				  }	

			  }else {
		

                    $userpic = 'noimage.jpg';
					$sql="insert into tb_gallery(name,heading,image,s_key,date1,status)values('$name','$desig','$userpic','upnews','$date','1')";
					  
				   $conn=$rec->getrecordalldata($sql);
				   if($conn)
				   {
					   header("location:../add-main-upcoming-news.php");
				   }  
				   else
				   {
					   header("location:../add-main-upcoming-news.php");
					   $_SESSION['error']="Data Not Inserted";
				   }  


			  }
			  
              
			 
			          
}
else 
{
     header("location:../add-main-upcoming-news.php");
	 $_SESSION['error']="Something Wrong Please Try Again..";
}
?>