<?php
include("record.php");
$rec=new Record;
if(isset($_POST['submit']))
{
              $data = explode('_',$_GET['data']);
			  $id=base64_decode($data[0]);
			  $skey=base64_decode($data[1]);
			  $data1=$_GET['data'];

              $heading = $_POST['heading'];
              $preimg = $_POST['preimg1'];
			  
			  $imgFile = $_FILES['files']['name'];
			  $tmp_dir = $_FILES['files']['tmp_name'];
			  $imgSize = $_FILES['files']['size'];
			  $upload_dir = '../../upload/advertisement/';
			  $imgExt = strtolower(pathinfo($imgFile,PATHINFO_EXTENSION)); // get image extension
			  $valid_extensions = array('jpeg', 'jpg');  // valid extensions
			  // rename uploading image
			  $userpic = rand(1000,1000000).".".$imgExt;
			  $delete = "../../upload/moremember/".$preimg;
				
			  if(in_array($imgExt, $valid_extensions))
			  {   
              // Check file size '5MB'
              if($imgSize < 1000000)
              {
              
                 if(move_uploaded_file($tmp_dir,$upload_dir.$userpic))
                 {
					  @unlink($delete); 
			    	  $sql="update tb_advertisement set heading='$heading',image='$userpic' where id='$id'";
					  
                       $conn=$rec->getrecordalldata($sql);
                       if($conn)
                       {
                           header("location:../advertisement.php?data=".base64_encode($skey)."");
                       }  
                       else
                       {
                             header("location:../add-advertisement.php?data=".$data1."");
                       }  
				 } else {
				            header("location:../add-advertisement.php?data=".$data1."");
						}
              }
              else 
              {
                       header("location:../add-advertisement.php?data=".$data1."");
              }
      }
      else{
				 header("location:../add-advertisement.php?data=".$data1."");
      }	
			          
}
else 
{
     header("location:../add-advertisement.php?data=".base64_encode($skey)."");
}
?>