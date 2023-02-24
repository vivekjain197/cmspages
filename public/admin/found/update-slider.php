<?php
include("record.php");
$rec=new Record;
if(isset($_POST['flag']))
{
  $flag=$_POST['flag'];
  if($flag=="editslider")
  {
      $data= explode('_',$_POST['id']);
      $id=base64_decode($data[0]);
      $tb=base64_decode($data[1]);


    $image=$_POST['image'];

    $imgFile = $_FILES['files']['name'];
    $tmp_dir = $_FILES['files']['tmp_name'];
    $imgSize = $_FILES['files']['size'];
    $upload_dir = '../upload/slider/';
    $imgExt = strtolower(pathinfo($imgFile,PATHINFO_EXTENSION)); // get image extension
    $valid_extensions = array('jpeg', 'jpg', 'png', 'gif');  // valid extensions
    // rename uploading image
    $userpic = rand(1000,1000000).".".$imgExt;

   
       if(in_array($imgExt, $valid_extensions)){   
              // Check file size '5MB'
          if($imgSize < 1000000){
          
             if(move_uploaded_file($tmp_dir,$upload_dir.$userpic))
             {

                  @$path='../upload/slider/'.$image.'';
                  unlink($path);
                  $sql="update tb_slider set image='$userpic' where id='$id'";
                  $conn=$rec->getrecordalldata($sql);
                   if($conn)
                   {
                       header("location:../slider.php?msg=done");
                   }  
                   else
                   {
                       header("location:../slider.php?error=1");
                   }  
             } } else {
	             header("location:../slider.php?error=2");
	    }  } } else { header("location:slider.php"); } }
?>