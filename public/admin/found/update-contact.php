<?php
include("record.php");
$rec=new Record;
if(isset($_POST['submit']))
{
    
              $data= explode('_',$_POST['id']);
              $id=base64_decode($data[0]);
              $tb=base64_decode($data[1]);
              $phone=$_POST['phone'];
              $email=$_POST['email'];
              $office=$_POST['address'];

              
             $date=date('Y-m-d');
             $sql="update $tb set phone='$phone',email='$email',office='$office',date='$date' where id='$id'";
             $conn=$rec->getrecordalldata($sql);
             if($conn)
             {
                 header("location:../contactus.php?msg=done");
             }  
             else
             {
                 header("location:../contactus.php?error=1");
             }  
                  

}
else 
{
     header("location:../contactus.php?error=5");
}
?>