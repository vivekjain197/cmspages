<?php
include("record.php");
$rec=new Record;
if(isset($_POST['flag']))
{
$flag=$_POST['flag'];
if($flag=="editevent")
{
    $data= explode('_',$_POST['id']);
    $id=base64_decode($data[0]);
    $tb=base64_decode($data[1]);


   $heading=$_POST['heading'];
   $content=$_POST['description'];
   $image=$_POST['image'];

    $imgFile = $_FILES['files']['name'];
    $tmp_dir = $_FILES['files']['tmp_name'];
    $imgSize = $_FILES['files']['size'];
    $upload_dir = '../upload/newsevent/';
    $imgExt = strtolower(pathinfo($imgFile,PATHINFO_EXTENSION)); // get image extension
    $valid_extensions = array('jpeg', 'jpg', 'png', 'gif');  // valid extensions
    // rename uploading image
    $userpic = rand(1000,1000000).".".$imgExt;
    
    
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
          $path2='../upload/gallery/gallery2/'.$name2;
          if(move_uploaded_file($tpath1[$key],$path2))
          {
              $file2 = $name2;
          }
          else
          {
              $file2 = "noimage.jpg";

          }
              $sql="insert into tb_events_image(fk_id,image)values('$id','$file2')";
              $conn=$rec->getrecordalldata($sql);
          }  else { }  
      } 
    }

    if($imgFile=="")
    {
             $sql="update tb_events set heading='$heading',content='$content' where id='$id'";
             $conn=$rec->getrecordalldata($sql);
             header("location:../news_event.php?msg=done");

    }
    else
    {

       if(in_array($imgExt, $valid_extensions)){   
              // Check file size '5MB'
          if($imgSize < 1000000){
          
             if(move_uploaded_file($tmp_dir,$upload_dir.$userpic))
             {

                  @$path='../upload/newsevent/'.$image.'';
                  unlink($path);
                  $sql="update tb_events set heading='$heading',content='$content',image='$userpic' where id='$id'";
                  $conn=$rec->getrecordalldata($sql);
                   if($conn)
                   {
                       header("location:../news_event.php?msg=done");
                   }  
                   else
                   {
                       header("location:../news_event.php?error=1");
                   }  
             }
   
	    }
	    else 
	    {
	             header("location:../news_event.php?error=2");
	    }
	}
    }


	 
}
else 
{
   header("location:../news_event.php");
}
}
else
{
header("location:news_event.php");
}
?>