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
			  $heading=$_POST['heading'];
			  $preimg=$_POST['preimg'];
			  
			  $imgFile = $_FILES['files']['name'];
			  $tmp_dir = $_FILES['files']['tmp_name'];
			  $imgSize = $_FILES['files']['size'];
			  $upload_dir = '../upload/gallery/jangarana/';
			  $imgExt = strtolower(pathinfo($imgFile,PATHINFO_EXTENSION)); // get image extension
			  $valid_extensions = array('jpeg', 'jpg', 'png', 'gif');  // valid extensions
			  // rename uploading image
			  $userpic = rand(1000,1000000).".".$imgExt;
			  $delete = "../upload/gallery/jangarana/".$preimg;	
				
			  if($imgFile!=''){

				if(in_array($imgExt, $valid_extensions))
				{   
				  // Check file size '5MB'
				  if($imgSize < 1000000)
				  {
              
					 if(move_uploaded_file($tmp_dir,$upload_dir.$userpic))
					 {
					    $sql="update $tb set name='$name',heading='$heading',image='$userpic' where id='$id' and s_key='$skey'";
					  
                       $conn=$rec->getrecordalldata($sql);
                       if($conn)
                       {
						   @unlink($delete); 
                           header("location:../jangarana-team.php");
                       }  
                       else
                       {
                           header("location:../edit-jangarana-team.php?data=".base64_encode($id)."_".base64_encode($tb)."_".base64_encode($skey)."");
						   $_SESSION['error']="Data Not Inserted";
                       }  
					} else {
				      header("location:../edit-jangarana-team.php?data=".base64_encode($id)."_".base64_encode($tb)."_".base64_encode($skey)."");
					  $_SESSION['error']="File Uploading Problem";
						}
				 }
						  else 
						  {
								   header("location:../edit-jangarana-team.php?data=".base64_encode($id)."_".base64_encode($tb)."_".base64_encode($skey)."");
								   $_SESSION['error']="File Size Larger..";
						  }
				  }
				  else{
							header("location:../edit-jangarana-team.php?data=".base64_encode($id)."_".base64_encode($tb)."_".base64_encode($skey)."");
							$_SESSION['error']="File Format Error..";
				  }	

			  }else {

                   $sql="update $tb set name='$name',heading='$heading' where id='$id' and s_key='$skey'";
				   $conn=$rec->getrecordalldata($sql);
				   if($conn)
				   {
					   header("location:../jangarana-team.php");
				   }  
				   else
				   {
					   header("location:../edit-jangarana-team.php?data=".base64_encode($id)."_".base64_encode($tb)."_".base64_encode($skey)."");
					   $_SESSION['error']="Data Not Inserted";
				   }  


			  }
			  
              
			 
			          
}
else 
{
     header("location:../edit-jangarana-team.php?data=".base64_encode($id)."_".base64_encode($tb)."_".base64_encode($skey)."");
	 $_SESSION['error']="Something Wrong Please Try Again..";
}
?>