<?php
include("record.php");
$rec=new Record;
if(isset($_POST['submit']))
{
              $date=date('Y-m-d');
			  $name=$_POST['name'];
			  $designation=$_POST['designation'];
			  $heading=$_POST['heading'];
			  
			  $imgFile = $_FILES['files']['name'];
			  $tmp_dir = $_FILES['files']['tmp_name'];
			  $imgSize = $_FILES['files']['size'];
			  $upload_dir = '../upload/gallery/';
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
					    $sql="insert into tb_gallery(fid,name,heading,image,s_key,date,status)values('$heading','$name','$designation','$userpic','mainmargdarshak','$date','1')";
					  
                       $conn=$rec->getrecordalldata($sql);
                       if($conn)
                       {
                           header("location:../main-margdarshak.php");
                       }  
                       else
                       {
                           header("location:../add-main-margdarshak.php");
						   $_SESSION['error']="Data Not Inserted";
                       }  
					} else {
				      header("location:../add-main-gallery.php");
					  $_SESSION['error']="File Uploading Problem";
						}
				 }
						  else 
						  {
								   header("location:../add-main-gallery.php");
								   $_SESSION['error']="File Size Larger..";
						  }
				  }
				  else{
							header("location:../add-main-gallery.php");
							$_SESSION['error']="File Format Error..";
				  }	

			  }else {

                    $userpic = 'noimage.jpg';
					$sql="insert into tb_gallery(fid,name,heading,image,s_key,date,status)values('$heading','$name','$designation','$userpic','mainmargdarshak','$date','1')";
					  
				   $conn=$rec->getrecordalldata($sql);
				   if($conn)
				   {
					   header("location:../main-margdarshak.php");
				   }  
				   else
				   {
					   header("location:../add-main-margdarshak.php");
					   $_SESSION['error']="Data Not Inserted";
				   }  


			  }
			  
              
			 
			          
}
else 
{
     header("location:../add-main-margdarshak.php");
	 $_SESSION['error']="Something Wrong Please Try Again..";
}
?>