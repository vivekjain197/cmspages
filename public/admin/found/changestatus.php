<?php 
include("connection.php");
$c=new Connection;
$conn=$c->getConnection();

$tid=$_GET['tid'];
$id=$_GET['id'];
$tb=$_GET['tb'];
$status=$_GET['status'];

if($status=='0'){
	$status1=1;
}else{
	$status1=0;
}
$sql="update $tb set `status`='$status1' where `id`='$id'";
$record=$conn->exec($sql);

?>
<button class="btn btn-xs btn-<?php if($status1==0){ echo "warning"; }else{ echo "success"; }?>" title="status" onclick="changeStatus('<?php echo $tid; ?>','<?php echo $id; ?>','<?php echo $status1; ?>','<?php echo $tb;?>')"><?php if($status1==0){ echo "Pending"; }else{ echo "Active"; }?></button>