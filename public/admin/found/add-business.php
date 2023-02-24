<?php
include("record.php");
$rec=new Record;
if(isset($_POST['submit']))
{
              $date=date('Y-m-d');

               $name=$_POST['name'];
			   $time1=$_POST['time1'];
			   $time2=$_POST['time2'];
			   $email=$_POST['email'];
			   $website=$_POST['website'];
			   $contact=$_POST['contact'];
			  
			  $imgFile = $_FILES['files']['name'];
			  $tmp_dir = $_FILES['files']['tmp_name'];
			  $imgSize = $_FILES['files']['size'];
			  $upload_dir = '../upload/consultent/';
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
					    $sql="insert into tb_oconsultant(cid,name,time1,time2,email,website,contact,image,date,status)values('2','$name','$time1','$time2','$email','$website','$contact','$userpic','$date','1')";
					  
                       $conn=$rec->getrecordalldata($sql);
                       if($conn)
                       {
                           header("location:../business.php");
                       }  
                       else
                       {
                           header("location:../add-business.php");
                       }  
				 } else {
				      header("location:../add-business.php");
						}
              }
              else 
              {
                       header("location:../add-business.php");
              }
      }
      else{
				header("location:../add-business.php");
      }	
  }else {

  			$sql="insert into tb_oconsultant(cid,name,time1,time2,email,website,contact,image,date,status)values('2','$name','$time1','$time2','$email','$website','$contact','noimage.jpg','$date','1')";
					  
           $conn=$rec->getrecordalldata($sql);
           if($conn)
           {
               header("location:../business.php");
           }  
           else
           {
               header("location:../add-business.php");
           }  

  }
              
			 
			          
}
else 
{
     header("location:../add-education.php");
}
?>