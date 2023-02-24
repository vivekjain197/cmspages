<?php
include("record.php");
$rec=new Record;
if(isset($_POST['submit']))
{
              $date=date('Y-m-d');

              $heading = $_POST['heading'];
              $msg = $_POST['msg'];
              $by = $_POST['by'];
			  
			  $imgFile = $_FILES['files']['name'];
			  $tmp_dir = $_FILES['files']['tmp_name'];
			  $imgSize = $_FILES['files']['size'];
			  $upload_dir = '../upload/article/';
			  $imgExt = strtolower(pathinfo($imgFile,PATHINFO_EXTENSION)); // get image extension
			  $valid_extensions = array('jpeg', 'jpg', 'png', 'gif');  // valid extensions
			  // rename uploading image
			  $userpic = rand(1000,1000000).".".$imgExt;

			  if($imgFile!=""){
				
			  if(in_array($imgExt, $valid_extensions))
			  {   
              // Check file size '5MB'
              if($imgSize < 1000000)
              {
              
                 if(move_uploaded_file($tmp_dir,$upload_dir.$userpic))
                 {
					   $sql="insert into tb_article(heading,description,image,created_by,date)values('$heading','$msg','$userpic','$by','$date')";
					  
                       $conn=$rec->getrecordalldata($sql);
                       if($conn)
                       {
                           header("location:../main-article.php");
                       }  
                       else
                       {
                           header("location:../add-main-article.php");
                       }  
				 } else {
				      header("location:../add-main-article.php");
						}
              }
              else 
              {
                       header("location:../add-main-article.php");
              }
      }
      else{
				header("location:../add-main-article.php");
      }	
           

           }  else {

           			$image = "noimage.jpg";
       			    $sql="insert into tb_article(heading,description,image,created_by,date)values('$heading','$msg','$image','$by','$date')";
				  
                   $conn=$rec->getrecordalldata($sql);
                   if($conn)
                   {
                       header("location:../main-article.php");
                   }  
                   else
                   {
                       header("location:../add-main-article.php");
                   } 

           } 
			 
			          
}
else 
{
     header("location:../add-main-article.php");
}
?>