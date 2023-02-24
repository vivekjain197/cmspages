<?php
include("record.php");
$rec=new Record;
if(isset($_POST['flag']))
{
    $flag=$_POST['flag'];
    if($flag=="newsevents")
    {

          $heading=$_POST['heading'];
          $content=strip_tags($_POST['description']);
          //$content = $textarea;

          $imgFile = $_FILES['files1']['name'];
          $tmp_dir = $_FILES['files1']['tmp_name'];
          $imgSize = $_FILES['files1']['size'];
          $upload_dir = '../upload/newsevent/';
          $imgExt = strtolower(pathinfo($imgFile,PATHINFO_EXTENSION)); // get image extension
          $valid_extensions = array('jpeg', 'jpg', 'png', 'gif');  // valid extensions
          // rename uploading image
          $userpic = rand(1000,1000000).".".$imgExt;

                  

                  if(in_array($imgExt, $valid_extensions)){   
                    // Check file size '5MB'
                    if($imgSize < 1000000){
                    
                           if(move_uploaded_file($tmp_dir,$upload_dir.$userpic))
                           {
                                 $sql="insert into tb_events(heading,content,image)values('$heading','$content','$userpic')";
                                 $lastid=$rec->recordlastid($sql);

                                 if($_FILES['images']){
                                   $imagename = $_FILES['images']['name'];
                                   $tpath=$_FILES['images']['tmp_name'];
                                       //echo count($imagename);
                                    foreach ($imagename as $key => $name1) 
                                    {
                                     // print_r($name1);
                                      if(!empty($name1))
                                      {
                                        $name1 = uniqid().'.jpg';
                                        $path1='../upload/gallery/gallery2/'.$name1;
                                        if(move_uploaded_file($tpath[$key],$path1))
                                        {
                                            $file1 = $name1;
                                        }
                                        else
                                        {
                                            $file1 = "noimage.jpg";
                                        }
                                      echo  $sql="insert into tb_events_image(fk_id,image)values('$lastid','$file1')";
                                        $conn=$rec->getrecordalldata($sql);
                                        header("location:../news_event.php?msg=done");
                                      }else {
                                            header("location:../add-newsevent.php?error=6");
                                      } 
                                    }
                                }else {
                                    header("location:../add-newsevent.php?error=7");
                                    echo 'hi';
                                }
                                 
                                 
                               
                                 
                           }else { echo 'hi'; } 
         

          
    }
    else 
    {
             header("location:../add-newsevent.php?error=2");
    }
}
          else
          {
              header("location:../add-newsevent.php?error=3");
          }

                  
                
}
else
{
        header("location:../add-newsevent.php?error=4");
}
}
else 
{
     header("location:../add-newsevent.php?error=5");
}
?>