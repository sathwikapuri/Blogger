<?php
session_start();
require 'config/database.php';
if(isset($_POST['submit']))
{
  $title=filter_var($_POST['title'],FILTER_SANITIZE_FULL_SPECIAL_CHARS);
  $description=filter_var($_POST['description'],FILTER_SANITIZE_FULL_SPECIAL_CHARS);

  if(!$title)
  {
  $_SESSION['add-category']="enter title";

  }
  else if(!$description)
  {
    $_SESSION['add-category']="Enter Description";
  }
  if(isset($_SESSION['add-category']))
  {
    $_SESSION['add-category-data']=$_POST;
    header('location: ' .ROOT_URL.'add-category.php');
    die();
  }
  else{

    $query="Insert Into categories(title,description) values('$title','$description')";
    $result=mysqli_query($connection,$query);
    if(mysqli_errno($connection))
    {
      $_SESSION['add-category']="couldnt add category";
      header('location: '.ROOT_URL.'add-category.php');
      die();
    }
    else{
      $_SESSION['add-category-success']="category $title added successfully";
      header('location:'.ROOT_URL.'managage-categories.php');
      die();
    }
  }
}
 ?>
