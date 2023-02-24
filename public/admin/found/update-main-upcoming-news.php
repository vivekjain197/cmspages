<?php
include("record.php");
$rec=new Record;
if(isset($_POST['submit']))
{
	          $data=explode('_',$_GET['data']);
			  $id=base64_decode($data[0]);
			  $tb=base64_decode($data[1]);
			  $skey=base64_decode($data[2]);
              $date=date('Y-m-d');
			  $name=$_POST['name'];
			  $desig=$_POST['desig'];
			  $preimg=$_POST['preimg'];
			  $date=$_POST['date'];
			  
			  $imgFile = $_FILES['files']['name'];
			  $tmp_dir = $_FILES['files']['tmp_name'];
			  $imgSize = $_FILES['files']['size'];
			  $upload_dir = '../upload/upnews/';
			  $imgExt = strtolower(pathinfo($imgFile,PATHINFO_EXTENSION)); // get image extension
			  $valid_extensions = array('jpeg', 'jpg', 'png', 'gif');  // valid extensions
			  // rename uploading image
			  $userpic = rand(1000,1000000).".".$imgExt;
			  $delete = "../upload/upnews/".$preimg;	
				
			  if($imgFile!=''){

				if(in_array($imgExt, $valid_extensions))
				{   
				  // Check file size '5MB'
				  if($imgSize < 1000000)
				  {
              
					 if(move_uploaded_file($tmp_dir,$upload_dir.$userpic))
					 {
					    $sql="update $tb set name='$name',heading='$desig',image='$userpic',date1='$date' where id='$id' and s_key='$skey'";
					  
                       $conn=$rec->getrecordalldata($sql);
                       if($conn)
                       {
						   @unlink($delete); 
                           header("location:../main-upcoming-news.php");
                       }  
                       else
                       {
                           header("location:../edit-main-upcoming-news.php?data=".base64_encode($id)."_".base64_encode($tb)."_".base64_encode($skey)."");
						   $_SESSION['error']="Data Not Inserted";
                       }  
					} else {
				      header("location:../edit-main-upcoming-news.php?data=".base64_encode($id)."_".base64_encode($tb)."_".base64_encode($skey)."");
					  $_SESSION['error']="File Uploading Problem";
						}
				 }
						  else 
						  {
								   header("location:../edit-main-upcoming-news.php?data=".base64_encode($id)."_".base64_encode($tb)."_".base64_encode($skey)."");
								   $_SESSION['error']="File Size Larger..";
						  }
				  }
				  else{
							header("location:../edit-main-upcoming-news.php?data=".base64_encode($id)."_".base64_encode($tb)."_".base64_encode($skey)."");
							$_SESSION['error']="File Format Error..";
				  }	

			  }else {

                   $sql="update $tb set name='$name',heading='$desig',date1='$date' where id='$id' and s_key='$skey'";
				   $conn=$rec->getrecordalldata($sql);
				   if($conn)
				   {
					   header("location:../main-upcoming-news.php");
				   }  
				   else
				   {
					   header("location:../edit-main-upcoming-news.php?data=".base64_encode($id)."_".base64_encode($tb)."_".base64_encode($skey)."");
					   $_SESSION['error']="Data Not Inserted";
				   }  


			  }
			  
              
			 
			          
}
else 
{
     header("location:../edit-main-upcoming-news.php?data=".base64_encode($id)."_".base64_encode($tb)."_".base64_encode($skey)."");
	 $_SESSION['error']="Something Wrong Please Try Again..";
}
?>