<?php
require 'config/database.php';
if(isset($_POST['submit']))
$id=filter_var($_POST['id'],FILTER_SANITIZE_NUMBER_INT);
$title=filter_var($_POST['title'],FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$description=filter_var($_POST['description'],FILTER_SANITIZE_FULL_SPECIAL_CHARS);
if(!$title)
{
  $_SESSION['edit-category']="Invalid form input on edit category page";
}
else{
  $query="update categories SET title='$title',description='$description' where id=$id limit 1";
  $result=mysqli_query($connection,$query);
  if(mysqli_errno($connection))
  {
    $_SESSION['edit-category']="couldnt update category";
  }
  else{
    $_SESSION['edit-category-success']="category $title was updated successfully";
  }
}
header('location: '.ROOT_URL.'managage-categories.php');
die();

 ?>
