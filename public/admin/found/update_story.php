<?php
include("record.php");
$rec=new Record;
if(isset($_POST['flag']))
{
$flag=$_POST['flag'];
if($flag=="ustory")
{
    $data= explode('_',$_POST['id']);
    $id=base64_decode($data[0]);
    $tb=base64_decode($data[1]);


   $boy=$_POST['boy'];
   $girl=$_POST['girl'];
   $content=$_POST['content'];
   $image=$_POST['image'];

    $imgFile = $_FILES['files']['name'];
    $tmp_dir = $_FILES['files']['tmp_name'];
    $imgSize = $_FILES['files']['size'];
    $upload_dir = '../upload/story/';
    $imgExt = strtolower(pathinfo($imgFile,PATHINFO_EXTENSION)); // get image extension
    $valid_extensions = array('jpeg', 'jpg', 'png', 'gif');  // valid extensions
    // rename uploading image
    $userpic = rand(1000,1000000).".".$imgExt;

    if($imgFile=="")
    {
             $sql="update tb_story set boy='$boy',girl='$girl',content='$content' where id='$id'";
             $conn=$rec->getrecordalldata($sql);
             header("location:../success_story.php?msg=done");

    }
    else
    {

       if(in_array($imgExt, $valid_extensions)){   
              // Check file size '5MB'
          if($imgSize < 1000000){
          
             if(move_uploaded_file($tmp_dir,$upload_dir.$userpic))
             {

                  @$path='../upload/story/'.$image.'';
                  unlink($path);
                  $sql="update tb_story set boy='$boy',girl='$girl',content='$content',image='$userpic' where id='$id'";
                  $conn=$rec->getrecordalldata($sql);
                   if($conn)
                   {
                       header("location:../success_story.php");
                   }  
                   else
                   {
                       header("location:../success_story.php?error=1");
                   }  
             }
   
	    }
	    else 
	    {
	             header("location:../successstory.php?error=2");
	    }
	}
    }

}
else 
{
   header("location:../successstory.php");
}
}
else
{
header("location:successstory.php");
}
?>