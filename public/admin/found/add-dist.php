<?php
include("record.php");
$rec=new Record;
if(isset($_POST['submit']))
{
      $date=date('Y-m-d');
	  $country  = $_POST['country'];
      $state  = $_POST['state'];
      $name = $_POST['dist'];
      $option  = $_POST['option'];


      if($option==1){
      		
      		$sqlcount1="select count(*) as cout from tb_dist where name='$name'";
	   		$conncount1=$rec->getrecordalldata($sqlcount1);   
	   		foreach($conncount1 as $value1) {
	   		                           
	   			$cout1 = $value1['cout'];
	   			if($cout1 > 0){

	   			}else {
		      		$sql="insert into tb_dist(cid,sid,name,status)values('$country','$state','$name','1')";
				    $conn=$rec->getrecordalldata($sql);
				}
			}
	
				header("location:../dist.php");
	}else{
			$imgFile = $_FILES['files']['name'];
      	  	$filename = $_FILES['files']['tmp_name'];
          	$file = fopen($filename, "r");
          	//$count = 0;          
          	$imgExt = strtolower(pathinfo($imgFile,PATHINFO_EXTENSION)); // get image extension
			$valid_extensions = array('csv','CSV');  // valid extensions   
			if(in_array($imgExt, $valid_extensions))
			{                           
			while (($emapData = fgetcsv($file, 10000, ",")) !== FALSE)
			{
			    //print_r($emapData);
			    //$count++;       
			    $sqlcount="select count(*) as cout from tb_dist where name='$emapData[0]'";
		   		$conncount=$rec->getrecordalldata($sqlcount);   
		   		foreach($conncount as $value) {
		   		                           
		   			$cout = $value['cout'];
		   			if($cout == 0){
		   				 $sql = "INSERT into tb_dist(cid,sid,name,status)values('$country','$state','$emapData[0]','1')";
					      $conn=$rec->getrecordalldata($sql);

		   			}else {

		   				if($count==1){                                  
					     
					    } else {

					    } 

		   			}


		   		}                            

			                                               
			} 

			header("location:../dist.php");
			}else {

				header("location:../add-dist.php?msg=extension");

			}
			
		    
      }      
}
else 
{
     header("location:../dist.php");
	 $_SESSION['error']="Something Wrong Please Try Again..";
}
?>