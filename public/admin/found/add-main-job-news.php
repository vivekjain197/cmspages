<?php
include("record.php");
$rec=new Record;
if(isset($_POST['submit']))
{
              $date=date('Y-m-d');
			  $name=$_POST['name'];
			  $link=$_POST['link'];
			  $desig=$_POST['desig'];
			  
			  
	    	   $sql="insert into tb_yojana(heading,link,description,s_key,date)values('$name','$link','$desig','jobnews','$date')";
			  
               $conn=$rec->getrecordalldata($sql);
               if($conn)
               {
                   header("location:../main-job-news.php");
               }  
               else
               {
                   header("location:../add-main-job-news.php");
				   $_SESSION['error']="Data Not Inserted";
               }  
			
			  
              
			 
			          
}
else 
{
     header("location:../add-main-job-news.php");
	 $_SESSION['error']="Something Wrong Please Try Again..";
}
?>