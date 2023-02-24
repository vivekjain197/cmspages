<?php 
include("record.php");
$rec=new Record;
if(isset($_POST['flag']))
{
	$flag=$_POST['flag'];
	if($flag=="login")
	{

		 $role=1;
		 $user=$_POST['email'];
		 $password=$_POST['secure'];
		
		    $conn=$rec->login($user,$password,$role);
		    if($conn > 0 )
			{
                 header("location:../dashboard.php");
			}
			else
			{
				 header("location:../");
			}
    }
}
    
?>