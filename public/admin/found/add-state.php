<?php
include("record.php");
$rec=new Record;
if(isset($_POST['submit']))
{
      $date=date('Y-m-d');
      $country  = $_POST['country'];
      $option  = $_POST['option'];
      if($option==1){
      		$name  = $_POST['state'];

      		$sqlcount1="select count(*) as cout from tb_state where name='$name'";
	   		$conncount1=$rec->getrecordalldata($sqlcount1);   
	   		foreach($conncount1 as $value1) {
	   		                           
	   			$cout1 = $value1['cout'];
	   			if($cout1 > 0){

	   			}else {
		      		$sql="insert into tb_state(fid,name,status)values('$country','$name','1')";
				    $conn=$rec->getrecordalldata($sql);
				}
			}
	
				header("location:../state.php");
	}else{
			$imgFile = $_FILES['files']['name'];
      	  	$filename = $_FILES['files']['tmp_name'];
          	$file = fopen($filename, "r");
          	        
          	$imgExt = strtolower(pathinfo($imgFile,PATHINFO_EXTENSION)); // get image extension
			$valid_extensions = array('csv','CSV');  // valid extensions   
			if(in_array($imgExt, $valid_extensions))
			{                           
				//$count = 0;  
			while (($emapData = fgetcsv($file, 10000, ",")) !== FALSE)
			{
			    //print_r($emapData);
			    //$count++;       
			    $sqlcount="select count(*) as cout from tb_state where name='$emapData[0]'";
		   		$conncount=$rec->getrecordalldata($sqlcount);   
		   		foreach($conncount as $value) {
		   		                           
		   			$cout = $value['cout'];
		   			if($cout == 0){

		   				  $sql = "INSERT into tb_state(fid,name,status)values('$country','$emapData[0]','1')";
					      $conn=$rec->getrecordalldata($sql);

		   			}else {

		   				if($count==1){                                  
					      //  echo $sql = "INSERT into tb_state(fid,name,status)values('$country','$emapData[0]','1')";
					      // $conn=$rec->getrecordalldata($sql);
					    } else {

					    } 

		   			}
		   		}                            

			                                               
			} 

			     header("location:../state.php");
			}else {

				header("location:../add-state.php?msg=extension");

			}
			
		    
      }    
}
else 
{
     header("location:../state.php");
}
?>