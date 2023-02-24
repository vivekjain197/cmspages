<?php
include("record.php");
$rec=new Record;
if(isset($_POST['submit']))
{
              $date=date('Y-m-d');
              $skey=base64_decode($_GET['data']);
              $heading = $_POST['heading'];
			  
			  if($_FILES['images'])
			  {
			        $imagename1 = $_FILES['images']['name'];
			        $tpath1=$_FILES['images']['tmp_name'];
			        //echo count($imagename);

			      foreach ($imagename1 as $key => $name2) 
			      {
			        if(!empty($name2))
			        {
			          $name2 = uniqid().'.jpg';
			          $path2='../../upload/advertisement/'.$name2;
			          if(move_uploaded_file($tpath1[$key],$path2))
			          {
			              $file2 = $name2;
			          }
			          else
			          {
			              $file2 = "noimage.jpg";

			          }
			              $sql="insert into tb_advertisement(heading,skey,image,status)values('$heading','$skey','$file2','1')";
			              $conn=$rec->getrecordalldata($sql);
			          }  else { }  
			      } 

			      header("location:../advertisement.php?data=".base64_encode($skey)."");
			   }
			          
}
else 
{
     header("location:../add-advertisement.php?data=".base64_encode($skey)."");
}
?>