<?php 
include "record.php";
$rec=new Record;

if(isset($_POST['submit']))
{
     $data = explode('_',$_GET['data']);
     $id   = base64_decode($data[0]);
     $tb   = base64_decode($data[1]);
     $skey   = base64_decode($data[2]);
     $data1  = $_GET['data'];
     
     $hid = $_POST['hid'];
     $name = str_replace(" ","_",$_POST['name']);
     $wife = str_replace(" ","_",$_POST['wife']);
     $fname = str_replace(" ","_",$_POST['fname']);
     $mname = str_replace(" ","_",$_POST['mname']);
     $nijwansh = $_POST['nijwansh'];
     $gender = $_POST['gender'];
     $bday = $_POST['bday'];
     $marital = $_POST['marital'];
     $mobile = $_POST['mobile'];
     $phone = $_POST['phone'];
     $email = $_POST['email'];
     $house = $_POST['house'];
     $gali = $_POST['gali'];
     $country = $_POST['country'];
     $state = $_POST['state'];
     $district = $_POST['district'];
     $tehshil = $_POST['tehshil'];
     $city = $_POST['city'];
     $pin = $_POST['pin'];
     $previousplace = $_POST['previousplace'];
     $language = $_POST['language'];
     $education = $_POST['education'];
     $othereducation = $_POST['othereducation'];
     $occupation = $_POST['occupation'];
     $office = $_POST['office'];
     $income = $_POST['income'];
     $awash = $_POST['awash'];
     $garibirekha = $_POST['garibirekha'];
     $pan = $_POST['pan'];
     $aadhar = $_POST['aadhar'];

     $femalecond = $_POST['femalecond'];
     $malecond = $_POST['malecond'];
     $lead = $_POST['lead'];
     $leadphone = $_POST['leadphone'];
     
     $date=date('Y-m-d');
     $preimg = $_POST['preimg1'];
    
    $imgFile = $_FILES['files1']['name'];
    $tmp_dir = $_FILES['files1']['tmp_name'];
    $imgSize = $_FILES['files1']['size'];
    $upload_dir = '../../upload/janaganana/';
    $imgExt = strtolower(pathinfo($imgFile,PATHINFO_EXTENSION)); // get image extension
    $valid_extensions = array('jpeg', 'jpg', 'png', 'gif');  // valid extensions
    // rename uploading image
    $userpic = rand(1000,1000000).".".$imgExt;
    $delete = "../../upload/janaganana/".$preimg;
  
  
   if($imgFile!="")
   { 
      if(in_array($imgExt, $valid_extensions))
      {   
        if($imgSize < 1000000)
        {
    
        if(move_uploaded_file($tmp_dir,$upload_dir.$userpic))
        {
          @unlink($delete); 
          $sql="update tb_janaganana set hid='$hid',name='$name',fname='$fname',wife='$wife',mname='$mname',vans='$nijwansh',gender='$gender',dob='$bday',marital='$marital',mobile='$mobile',phone='$phone',email='$email',house='$house',gali='$gali',cityid='$city',pin='$pin',did='$district',sid='$state',cid='$country',tid='$tehshil',nativeplace='$previousplace',language='$language',education='$education',other='$othereducation',occupation='$occupation',office='$office',annualincome='$income',awash='$awash',garibirekha='$garibirekha',pan='$pan',aadhar='$aadhar',malecond='$malecond',femalecond='$femalecond',image='$userpic',lead='$lead',leadphone='$leadphone' where id = '$id'";
        
         $lastid=$rec->getrecordalldata($sql);
         if($lastid)
         {
         header("location:../jangarana-details.php");
         }  
         else
         {
           header("location:../edit-jangarana-details.php?data=".base64_encode($data1)."");
           
         }  
         } else {
                 header("location:../edit-jangarana-details.php?data=".base64_encode($data1)."");
          
        }
        } else  {
           header("location:../edit-jangarana-details.php?data=".base64_encode($data1)."");
          
               }
      }
    else{
      header("location:../edit-jangarana-details.php?data=".base64_encode($data1)."");
      
    }
    }else { 
      
         $sql="update tb_janaganana set hid='$hid',name='$name',fname='$fname',wife='$wife',mname='$mname',vans='$nijwansh',gender='$gender',dob='$bday',marital='$marital',mobile='$mobile',phone='$phone',email='$email',house='$house',gali='$gali',cityid='$city',pin='$pin',did='$district',sid='$state',cid='$country',tid='$tehshil',nativeplace='$previousplace',language='$language',education='$education',other='$othereducation',occupation='$occupation',office='$office',annualincome='$income',awash='$awash',garibirekha='$garibirekha',pan='$pan',aadhar='$aadhar',malecond='$malecond',femalecond='$femalecond',lead='$lead',leadphone='$leadphone' where id = '$id'";
       
         $lastid=$rec->getrecordalldata($sql);
         if($lastid)
         {
           header("location:../jangarana-details.php");
         }  
         else
         {
           header("location:../edit-jangarana-details.php?data=".base64_encode($data1)."");
           
         } 
         
     }
}
else {
header("location:../edit-jangarana-details.php?data=".base64_encode($data1)."");

} 
?>