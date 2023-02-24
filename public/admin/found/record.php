<?php
include "connection.php";
class Record
{
public function login($user,$password,$role)
{
	$c=new Connection;
	$conn=$c->getConnection();
	$sql="select * from `tb_admin` where `status`='$role'";
	$record=$conn->query($sql);
	$count=0;
	foreach($record as $rs)
	{
		if($user==$rs['username'] && $password==$rs['password'])
		{
			$count=1;
			session_start();
			$_SESSION['deluxuser']=$user;
			$_SESSION['delux@123']=$rs['id'];
			
		}
		else
		{   
			 session_start();
			 $count=0;
			 $_SESSION['loginWrong']="Username And Password Wrong!!!";
		}
	}
	return $count;
}
/*
date:17-08-2017
description:editprofile.
*/
public function editprofile($id)
{
	$c=new Connection;
	$conn=$c->getConnection();
	$sql="select * from tb_admin where id='$id'";
	$record=$conn->query($sql);
	return $record;	
}
/*--------------------Insert All Record Query Start Here----------------------*/
public function getrecordalldata($sql)
{
	$c=new Connection;
	$conn=$c->getConnection();
	$record=$conn->query($sql);
	return $record;	
}
public function recordlastid($sql)
{
	$c=new Connection;
	$conn=$c->getConnection();
	$record=$conn->query($sql);
	$lastid=$conn->lastInsertId();
	return $lastid;	
}
/*--------------------Update All Record Query Start Here----------------------*/
}
?>