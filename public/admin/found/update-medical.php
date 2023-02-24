<?php
include("record.php");
$rec=new Record;
if(isset($_POST['submit']))
{
              $date=date('Y-m-d');
              $data=explode('_',$_GET['data']);
			  $id=base64_decode($data[0]);
			  $tb=base64_decode($data[1]);

               $name=$_POST['name'];
			   $time1=$_POST['time1'];
			   $time2=$_POST['time2'];
			   $email=$_POST['email'];
			   $website=$_POST['website'];
			   $contact=$_POST['contact'];
			   $preimg=$_POST['preimg'];
			  
			  $imgFile = $_FILES['files']['name'];
			  $tmp_dir = $_FILES['files']['tmp_name'];
			  $imgSize = $_FILES['files']['size'];
			  $upload_dir = '../upload/consultent/';
			  $imgExt = strtolower(pathinfo($imgFile,PATHINFO_EXTENSION)); // get image extension
			  $valid_extensions = array('jpeg', 'jpg', 'png', 'gif');  // valid extensions
			  // rename uploading image
			  $userpic = rand(1000,1000000).".".$imgExt;
			   $delete = "../upload/consultent/".$preimg;
				
			if($imgFile!=''){	
			  if(in_array($imgExt, $valid_extensions))
			  {   
              // Check file size '5MB'
              if($imgSize < 1000000)
              {
              
                 if(move_uploaded_file($tmp_dir,$upload_dir.$userpic))
                 {
					    $sql="update tb_oconsultant set name='$name',time1='$time1',time2='$time2',email='$email',website='$website',contact='$contact',image='$userpic' where id='$id'";
					  
                       $conn=$rec->getrecordalldata($sql);
                       if($conn)
                       {
                       	   @unlink($delete); 
                           header("location:../medical.php");
                       }  
                       else
                       {
                           header("location:../edit-medical.php?data=".base64_encode($id)."_".base64_encode($tb)."");
                       }  
				 } else {
				      header("location:../edit-medical.php?data=".base64_encode($id)."_".base64_encode($tb)."");
						}
              }
              else 
              {
                       header("location:../edit-medical.php?data=".base64_encode($id)."_".base64_encode($tb)."");
              }
      }
      else{
				header("location:../edit-medical.php?data=".base64_encode($id)."_".base64_encode($tb)."");
      }	
  }else {

  			$sql="update tb_oconsultant set name='$name',time1='$time1',time2='$time2',email='$email',website='$website',contact='$contact' where id='$id'";
					  
           $conn=$rec->getrecordalldata($sql);
           if($conn)
           {
               header("location:../medical.php");
           }  
           else
           {
               header("location:../edit-medical.php?data=".base64_encode($id)."_".base64_encode($tb)."");
           }  

  }
              
			 
			          
}
else 
{
     header("location:../edit-medical.php?data=".base64_encode($id)."_".base64_encode($tb)."");
}
?>