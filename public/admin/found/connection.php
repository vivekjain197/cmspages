<?php
/**
date:01/12/2016
description:connection for database
*/
class Connection
{
  
  public function getConnection()
  {
		$username="root";
		$password="";
		$dsn="mysql:host=localhost;dbname=mahasabha";
		$conn=new PDO($dsn,$username,$password);
		return $conn;

  }
 


}
?>