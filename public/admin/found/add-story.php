<?php
include("record.php");
$rec=new Record;
if(isset($_POST['flag']))
{
    $flag=$_POST['flag'];
    if($flag=="successstory")
    {

         $boy=$_POST['boy'];
         $girl=$_POST['girl'];
         $content=$_POST['content'];

                  $imgFile = $_FILES['files']['name'];
                  $tmp_dir = $_FILES['files']['tmp_name'];
                  $imgSize = $_FILES['files']['size'];
                  $upload_dir = '../upload/story/';
                  $imgExt = strtolower(pathinfo($imgFile,PATHINFO_EXTENSION)); // get image extension
                  $valid_extensions = array('jpeg', 'jpg', 'png', 'gif');  // valid extensions
                  // rename uploading image
                  $userpic = rand(1000,1000000).".".$imgExt;

                  if(in_array($imgExt, $valid_extensions)){   
                    // Check file size '5MB'
                    if($imgSize < 1000000){
                    
                           if(move_uploaded_file($tmp_dir,$upload_dir.$userpic))
                           {
                                 $sql="insert into tb_story(boy,girl,content,image)values('$boy','$girl','$content','$userpic')";
                                 $conn=$rec->getrecordalldata($sql);
                                 if($conn)
                                 {
                                     header("location:../success_story.php?msg=done");
                                 }  
                                 else
                                 {
                                     header("location:../success_story.php?error=1");
                                 }  
                           }
         

          
    }
    else 
    {
             header("location:../success_story.php?error=2");
    }
}
else
    {
        header("location:../success_story.php?error=3");
    }
}
else
{
        header("location:../success_story.php?error=4");
}
}
else 
{
     header("location:../success_story.php?error=5");
}
?>