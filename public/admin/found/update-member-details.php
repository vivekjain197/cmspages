<?php 
include "record.php";
$rec=new Record;

if(isset($_POST['submit1']))
{
     $data = explode('_',$_GET['data']);
     $id   = base64_decode($data[0]);
     $tb   = base64_decode($data[1]);
     $skey   = base64_decode($data[2]);
     $data1  = $_GET['data'];
     
         $hid = $_POST['hid'];
         $relation = $_POST['relation'];
         $name = str_replace(" ","_",$_POST['name1']);
         $fname = str_replace(" ","_",$_POST['fname1']);
         $gender = $_POST['gender1'];
         $bday = $_POST['bday1'];
 
         $marital = $_POST['marital1'];
         $mobile = $_POST['mobile1'];
         $email = $_POST['email1'];
         $house = $_POST['address1'];
         $gali = $_POST['gali1'];
         $city = $_POST['city1'];
         $pin = $_POST['pin1'];
         $district = $_POST['district1'];
         $tehshil = $_POST['tehshil1'];
         $state = $_POST['state1'];
         $country = $_POST['country1'];
         $previousplace = $_POST['native1'];
         $education = $_POST['education1'];
         $othereducation = $_POST['oeducation1'];
         $occupation = $_POST['occupation1'];
         $office = $_POST['office1'];
         $income = $_POST['income1'];
         $pan = $_POST['pan1'];
         $aadhar = $_POST['aadhar1'];
     $preimg = $_POST['preimg1'];
     $date=date('Y-m-d');
    
    $imgFile = $_FILES['files1']['name'];
    $tmp_dir = $_FILES['files1']['tmp_name'];
    $imgSize = $_FILES['files1']['size'];
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
          $sql="update tb_more_member set hid='$hid',relation='$relation',name='$name',fname='$fname',gender='$gender',dob='$bday',marital='$marital',mobile='$mobile',email='$email',house='$house',gali='$gali',city='$city',pin='$pin',dist='$district',state='$state',country='$country',tehshil='$tehshil',native='$previousplace',education='$education',other='$othereducation',occupation='$occupation',office='$office',income='$income',pan='$pan',aadhar='$aadhar',image='$userpic' where id = '$id'";
        
         $lastid=$rec->getrecordalldata($sql);
         if($lastid)
         {
         header("location:../jangarana-member-details.php");
         }  
         else
         {
           header("location:../edit-member-details.php?data=".base64_encode($data1)."");
           
         }  
         } else {
                 header("location:../edit-member-details.php?data=".base64_encode($data1)."");
          
        }
        } else  {
           header("location:../edit-member-details.php?data=".base64_encode($data1)."");
          
               }
      }
    else{
      header("location:../edit-member-details.php?data=".base64_encode($data1)."");
      
    }
    }else { 
      
          $sql="update tb_more_member set hid='$hid',relation='$relation',name='$name',fname='$fname',gender='$gender',dob='$bday',marital='$marital',mobile='$mobile',email='$email',house='$house',gali='$gali',city='$city',pin='$pin',dist='$district',state='$state',country='$country',tehshil='$tehshil',native='$previousplace',education='$education',other='$othereducation',occupation='$occupation',office='$office',income='$income',pan='$pan',aadhar='$aadhar' where id = '$id'";
       
         $lastid=$rec->getrecordalldata($sql);
         if($lastid)
         {
           header("location:../jangarana-member-details.php");
         }  
         else
         {
           header("location:../edit-member-details.php?data=".base64_encode($data1)."");
           
         } 
         
     }
}
else {
header("location:../edit-member-details.php?data=".base64_encode($data1)."");

} 
?>