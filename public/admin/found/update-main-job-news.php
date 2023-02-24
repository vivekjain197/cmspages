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
			  $link=$_POST['link'];
			  $desig=$_POST['desig'];
			  
			    
		    $sql="update $tb set heading='$name',description='$desig',link='$link' where id='$id'";
		  
           $conn=$rec->getrecordalldata($sql);
           if($conn)
           {
			   header("location:../main-job-news.php");
           }  
           else
           {
               header("location:../edit-main-job-news.php?data=".base64_encode($id)."_".base64_encode($tb)."_".base64_encode($skey)."");
			   $_SESSION['error']="Data Not Inserted";
           }  
					
			          
}
else 
{
     header("location:../edit-main-job-news.php?data=".base64_encode($id)."_".base64_encode($tb)."_".base64_encode($skey)."");
	 $_SESSION['error']="Something Wrong Please Try Again..";
}
?>