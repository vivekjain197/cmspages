<?php 
include "record.php";
$rec=new Record;
if(isset($_POST['submit'])){
  
      $data=explode('_',$_GET['data']);
      $id=base64_decode($data[0]);
      $tb=base64_decode($data[1]);
      $skey=base64_decode($data[2]);

    
     $hid = $_POST['hid'];
     $name = str_replace(" ","_",$_POST['mname']);
     $fname = str_replace(" ","_",$_POST['mfname']);
     $occupation = $_POST['moccupation'];
     $gali = $_POST['mgali'];
     $house = $_POST['mhouse'];
     $country = $_POST['mcountry'];
     $state = $_POST['mstate'];
     $district = $_POST['mdistrict'];
     $tehshil = $_POST['mtehshil'];
     $city = $_POST['mcity'];
     $pin = $_POST['mpin'];

     $phone = $_POST['mphone'];
     $mobile = $_POST['mmobile'];
     $email = $_POST['memail'];
     $fees = $_POST['mfees'];
     $preimg = $_POST['preimg1'];
 
 
  $imgFile = $_FILES['files3']['name'];
  $tmp_dir = $_FILES['files3']['tmp_name'];
  $imgSize = $_FILES['files3']['size'];
  $upload_dir = '../../upload/moremember/';
  $imgExt = strtolower(pathinfo($imgFile,PATHINFO_EXTENSION)); // get image extension
  $valid_extensions = array('jpeg', 'jpg', 'png', 'gif');  // valid extensions
  // rename uploading image
  $userpic = rand(1000,1000000).".".$imgExt;
  $delete = "../../upload/moremember/".$preimg;
  
   if($imgFile!="")
   { 
      if(in_array($imgExt, $valid_extensions))
      {   
        if($imgSize < 1000000)
        {
    
        if(move_uploaded_file($tmp_dir,$upload_dir.$userpic))
        {
          @unlink($delete); 
           $sql="update tb_more_member set hid='$hid',name='$name',fname='$fname',occupation='$occupation',gali='$gali',house='$house',country='$country',state='$state',dist='$district',tehshil='$tehshil',city='$city',pin='$pin',phone='$phone',mobile='$mobile',email='$email',image='$userpic' where id='$id'";
        
         $current=$rec->getrecordalldata($sql);
         if($current)
         {
                header("location:../mahashabha-details.php");
         }  
         else
         {
          header("location:../mahashabha-details.php");
         }  
         } else {
            header("location:../mahashabha-details.php");
        }
        } else  {
            header("location:../mahashabha-details.php");
               }
      }
    else{
                  header("location:../mahashabha-details.php");  
    }
    }else { 
      
          $sql="update tb_more_member set hid='$hid',name='$name',fname='$fname',occupation='$occupation',gali='$gali',house='$house',country='$country',state='$state',dist='$district',tehshil='$tehshil',city='$city',pin='$pin',phone='$phone',mobile='$mobile',email='$email' where id='$id'";
         $current=$rec->getrecordalldata($sql);
         if($current)
         {
             header("location:../mahashabha-details.php");
         }  
         else
         {
           header("location:../mahashabha-details.php");
         } 
         
     }
}
else {
                 header("location:../mahashabha-details.php");
  
}  
  
?>