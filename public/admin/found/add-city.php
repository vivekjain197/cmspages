<?php
include("record.php");
$rec=new Record;
if(isset($_POST['submit']))
{
      $date=date('Y-m-d');
	  $country  = $_POST['country'];
      $state  = $_POST['state'];
      $dist = $_POST['dist'];
      $tehshil = $_POST['tehshil'];
      $name = $_POST['city'];
      $option = $_POST['option'];
	  
	   if($option==1){
      		
      		$sqlcount1="select count(*) as cout from tb_city where name='$name'";
	   		$conncount1=$rec->getrecordalldata($sqlcount1);   
	   		foreach($conncount1 as $value1) {
	   		                           
	   			$cout1 = $value1['cout'];
	   			if($cout1 > 0){

	   			}else {
		      		$sql="insert into tb_city(cid,sid,did,tid,name)values('$country','$state','$dist','$tehshil','$name')";
				    $conn=$rec->getrecordalldata($sql);
				}
			}
	
				header("location:../city.php");
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
			    $sqlcount="select count(*) as cout from tb_city where name='$emapData[0]'";
		   		$conncount=$rec->getrecordalldata($sqlcount);   
		   		foreach($conncount as $value) {
		   		                           
		   			$cout = $value['cout'];

		   			if($cout == 0){

		   				  $sql = "INSERT into tb_city(cid,sid,did,tid,name)values('$country','$state','$dist','$tehshil','$emapData[0]')";
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

			    header("location:../city.php");
			}else {

				header("location:../add-city.php?msg=extension");

			}
			
		    
      }

}
else 
{
     header("location:../city.php");
	 $_SESSION['error']="Something Wrong Please Try Again..";
}
?>