<?php
session_start();
require 'config/database.php';

 if(isset($_POST['submit']))
 {
   $id=filter_var($_POST['id'],FILTER_SANITIZE_NUMBER_INT);
   $previous_thumbnail_name=filter_var($_POST['previous_thumbnail_name'],FILTER_SANITIZE_FULL_SPECIAL_CHARS);
   $title=filter_var($_POST['title'],FILTER_SANITIZE_FULL_SPECIAL_CHARS);
   $body=filter_var($_POST['body'],FILTER_SANITIZE_FULL_SPECIAL_CHARS);
  $is_feautured=filter_var($_POST['is_feautured'],FILTER_SANITIZE_NUMBER_INT) ?? null;
$category_id=filter_var($_POST['category'],FILTER_SANITIZE_NUMBER_INT);
   $thumbnail=$_FILES['thumbnail'];
$is_feautured=$is_feautured==1 ?: 0;
if(!$title)
{
  $_SESSION['edit-post']="couldnt update post.Invalid form data on edit post page";

}

elseif(!$body){
  $_SESSION['edit-post']="couldnt update post";
}
else{
  if($thumbnail['name'])
  {
    $previous_thumbnail_path='images/' . $previous_thumbnail_name;
    if($previous_thumbnail_path)
    {
      unlink($previous_thumbnail_path);
    }
    $time=time();
    $thumbnail_name=$time.$thumbnail['name'];
    $thumbnail_tmp_name=$thumbnail['tmp_name'];
    $thumbnail_destination_path='images/' . $thumbnail_name;
    $allowed_files=['png','jpg','jpeg'];
    $extension=explode('.',$thumbnail_name);
    $extension=end($extension);
    if($thumbnail['size'] < 2000000)
    {
      move_uploaded_file($thumbnail_tmp_name,$thumbnail_destination_path);
    }
    else{
      $_SESSION['edit-post']="couldnt update post.thumbnail size too big.";
    }
  }
if($_SESSION['edit-post'])
{
  header('location: '.ROOT_URL.'dashboard.php');
  die();
}
else{
  if($is_feauterd==1)
  {
    $Zero_all_is_feautured_query="update posts set is_feauterd=0";
    $Zero_all_is_feautured_result=mysqli_query($connection,$Zero_all_is_feautured_query);
  }
$thumbnail_to_insert=$thumbnail_name ?? previous_thumbnail_name;
$query="update posts set title='$title',body='$body',thumbnail='$thumbnail_to_insert',category_id=$category_id,is_feautered=$is_feauterd where id=$id limit 1";
$result=mysqli_query($connection,$query);
if(!mysqli_errno($connection))
{
  $_SESSION['edit-post-sucess']="post updated successfully";
}
}

}
 }
