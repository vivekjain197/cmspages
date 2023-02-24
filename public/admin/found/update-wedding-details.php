<?php 
include "record.php";
$rec=new Record;

if(isset($_POST['submit2']))
{
   $data = explode('_',$_GET['data']);
   $id  = base64_decode($data[0]);
   $tb  = base64_decode($data[1]);
   $skey   = base64_decode($data[2]);

   $data1=$_GET['data'];
  
    
   $hid = $_POST['hid'];
   $name1 = str_replace(" ","_",$_POST['sname']);
   $gender2 = $_POST['gender2'];
   $phone = $_POST['sphone'];          $mobile = $_POST['smobile'];
   $education1 = $_POST['seducation']; $occupation1 = $_POST['socupation'];
   $other = $_POST['seducation1']; $income1 = $_POST['sincome'];
   $dob = $_POST['sdob']; 

   $bday = $_POST['sbday']; 
   $btime = $_POST['sbirthtime'];$bplace = $_POST['sbirthplace'];
   $age = $_POST['sage']; $height = str_replace("'","#",$_POST['sheight']);
   $weight = $_POST['sweight']; $color = $_POST['scolor'];
   $kundali = $_POST['skundali'];
     $mangalik = $_POST['smangalik'];
   $upperjati = $_POST['supprajati'];
   $jatiband = $_POST['supjati'];
   $self = $_POST['sselfvansh'];
   $mamavansh = $_POST['smamavansh'];
   $nachatra = $_POST['snachatra'];
   $bgroup = $_POST['sblood'];
   $handicaped = $_POST['sphysical'];
   $selection = $_POST['sselect'];
   $fname = str_replace(" ","_",$_POST['sfname']);
   $mname = str_replace(" ","_",$_POST['smname']);

   $shouse = $_POST['shouse'];
   $sgali = $_POST['sgali'];

   $scountry1 = $_POST['scountry1'];
   $sstate1 = $_POST['sstate1'];
   $sdistrict1 = $_POST['sdistrict1'];
   $stehshil1 = $_POST['stehshil1'];
   $scity1 = $_POST['scity1'];
     $pin = $_POST['spin'];
   $phone2 = $_POST['sphone1'];
   $mobile2 = $_POST['smobile1'];

   $occupation2 = $_POST['soccupation2'];
   $income2 = $_POST['sincome2'];
   $awash = $_POST['sawash'];

   $bshadi1 = $_POST['bmerraige1'];
   $bshadi2 = $_POST['bmerraige2'];
   $sshadi1 = $_POST['smerraige1'];
   $sshadi2 = $_POST['smerraige2'];

   $name2 = str_replace(" ","_",$_POST['sname1']);
   $address2 = $_POST['saddress1'];
   $mobile3 = $_POST['smobile2'];
   $phone3 = $_POST['sphone2'];
   $name3 = str_replace(" ","_",$_POST['sname2']);
   $address3 = $_POST['saddress2'];
   $phone4 = $_POST['sphone3'];
   $mobile4 = $_POST['smobile3'];
   $date1 = $_POST['sdate'];
   $preimg = $_POST['preimg1'];
 
 
  $imgFile = $_FILES['files2']['name'];
  $tmp_dir = $_FILES['files2']['tmp_name'];
  $imgSize = $_FILES['files2']['size'];
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
           $sql = "update tb_more_member set hid='$hid',name='$name1',fname='$fname',gender='$gender2',dob='$dob',age='$age',phone='$phone',mobile='$mobile',house='$shouse',gali='$sgali',country='$scountry1',state='$sstate1',dist='$sdistrict1',tehshil='$stehshil1',city='$scity1',pin='$pin',education='$education1',other='$other',occupation='$occupation1',income='$income1',image='$userpic',bday='$bday',btime='$btime',bplace='$bplace',height='$height',weight='$weight',color='$color',kundali='$kundali',manglik='$mangalik',upperjati='$upperjati',jatiband='$jatiband',self='$self',mamavansh='$mamavansh',nachatra='$nachatra',bgroup='$bgroup',handicaped='$handicaped',selection='$selection',mname='$mname',phone2='$phone2',mobile2='$mobile2',occupation2='$occupation2',income2='$income2',awash='$awash',bshadi1='$bshadi1',bshadi2='$bshadi2',sshadi1='$sshadi1',sshadi2='$sshadi2',name2='$name2',address2='$address2',mobile3='$mobile3',phone3='$phone3',name3='$name3',address3='$address3',phone4='$phone4',mobile4='$mobile4',date1='$date1',terms='$terms' where id='$id'";
        
         $current=$rec->getrecordalldata($sql);
         if($current)
         {
            header("location:../wedding-details.php");
         }  
         else
         {
            header("location:../edit-wedding-details.php?data=".base64_encode($data1)."");
         }  
         } else {
             header("location:../edit-wedding-details.php?data=".base64_encode($data1)."");
        }
        } else  {
            header("location:../edit-wedding-details.php?data=".base64_encode($data1)."");
               }
      }
    else{
       header("location:../edit-wedding-details.php?data=".base64_encode($data1)."");
    }
    }else { 
      
       $sql = "update tb_more_member set hid='$hid',name='$name1',fname='$fname',gender='$gender2',dob='$dob',age='$age',phone='$phone',mobile='$mobile',house='$shouse',gali='$sgali',country='$scountry1',state='$sstate1',dist='$sdistrict1',tehshil='$stehshil1',city='$scity1',pin='$pin',education='$education1',other='$other',occupation='$occupation1',income='$income1',bday='$bday',btime='$btime',bplace='$bplace',height='$height',weight='$weight',color='$color',kundali='$kundali',manglik='$mangalik',upperjati='$upperjati',jatiband='$jatiband',self='$self',mamavansh='$mamavansh',nachatra='$nachatra',bgroup='$bgroup',handicaped='$handicaped',selection='$selection',mname='$mname',phone2='$phone2',mobile2='$mobile2',occupation2='$occupation2',income2='$income2',awash='$awash',bshadi1='$bshadi1',bshadi2='$bshadi2',sshadi1='$sshadi1',sshadi2='$sshadi2',name2='$name2',address2='$address2',mobile3='$mobile3',phone3='$phone3',name3='$name3',address3='$address3',phone4='$phone4',mobile4='$mobile4',date1='$date1',terms='$terms' where id='$id'";
         $current=$rec->getrecordalldata($sql);
         if($current)
         {
            header("location:../wedding-details.php");
        }  
         else
         {
           header("location:../edit-wedding-details.php?data=".base64_encode($data1)."");   
         } 
         
     }
}
else {
 header("location:../edit-wedding-details.php?data=".base64_encode($data1)."");
} 
?>