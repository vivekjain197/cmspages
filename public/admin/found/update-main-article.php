<?php
include("record.php");
$rec=new Record;
if(isset($_POST['submit']))
{
              $data=explode('_',$_GET['data']);
			  $id=base64_decode($data[0]);
			  $tb=base64_decode($data[1]);

			  $heading = $_POST['heading'];
              $msg = $_POST['msg'];
              $by = $_POST['by'];
			  $date=date('Y-m-d');
			  
			  $preimg=$_POST['preimg'];
			  
			  $imgFile = $_FILES['files']['name'];
			  $tmp_dir = $_FILES['files']['tmp_name'];
			  $imgSize = $_FILES['files']['size'];
			  $upload_dir = '../upload/article/';
			  $imgExt = strtolower(pathinfo($imgFile,PATHINFO_EXTENSION)); // get image extension
			  $valid_extensions = array('jpeg', 'jpg', 'png', 'gif');  // valid extensions
			  // rename uploading image
			  $userpic = rand(1000,1000000).".".$imgExt;
			  $delete = "../upload/article/".$preimg;

			  if($imgFile!=""){
				
			  if(in_array($imgExt, $valid_extensions))
			  {   
              // Check file size '5MB'
              if($imgSize < 1000000)
              {
              
                 if(move_uploaded_file($tmp_dir,$upload_dir.$userpic))
                 {
					 
					   $sql="update $tb set heading='$heading',created_by='$by',description='$msg',date='$date',image='$userpic' where id='$id'";
					   $conn=$rec->getrecordalldata($sql);
                       if($conn)
                       {
						   @unlink($delete); 
                           header("location:../main-article.php");
                       }  
                       else
                       {
                           header("location:../edit-main-article.php?data=".base64_encode($id)."_".base64_encode($tb)."");
                       }  
				 } else {
				      header("location:../edit-main-article.php?data=".base64_encode($id)."_".base64_encode($tb)."");
						}
              }
              else 
              {
                      header("location:../edit-main-article.php?data=".base64_encode($id)."_".base64_encode($tb)."");
              }
      }
      else{
				header("location:../edit-main-article.php?data=".base64_encode($id)."_".base64_encode($tb)."");
      }	
        }else {


           $sql="update $tb set heading='$heading',created_by='$by',description='$msg',date='$date' where id='$id'";
		   $conn=$rec->getrecordalldata($sql);
           if($conn)
           {
               header("location:../main-article.php");
           }  
           else
           {
               header("location:../edit-main-article.php?data=".base64_encode($id)."_".base64_encode($tb)."");
           }




        }      
			 
			          
}
else 
{
     header("location:../edit-main-article.php?data=".base64_encode($id)."_".base64_encode($tb)."");
}
?>