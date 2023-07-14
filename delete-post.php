<?php
session_start();
require 'config/database.php';
if(isset($_GET['id']))
{
  $id=filter_var($_GET['id'],FILTER_SANITIZE_NUMBER_INT);
  $query="select * from posts where id=$id";
  $result=mysqli_query($connection,$query);
  if(mysqli_num_rows($result)==1)
  {
    $post=mysqli_fetch_assoc($result);
    $thumbnail_name=$post['thumbnail'];
    $thumbnail_path='images/' . $thumbnail_name;
    if($thumbnail_path)
    {
      unlink($thumbnail_path);
      $delete_post_query="DELETE FROM posts where id=$id limit 1";
      $delete_post_result=mysqli_query($connection,$delete_post_query);
      if(!mysqli_errno($connection))
      {
        $_SESSION['delete-post-success']="post deleted successfully";
      }
    }
  }

}
header('location: ',ROOT_URL.'dashboard.php')
 ?>
