<?php
require 'config/database.php';
session_start();
if(isset($_GET['id']))
{
  $id=filter_var($_GET['id'],FILTER_SANITIZE_NUMBER_INT);
  $update_query="update posts set category_id=6 where category_id=$id";
  $update_result=mysqli_query($connection,$update_query);
  $query="DELETE FROM categories Where id=$id Limit 1";
  $result=mysqli_query($connection,$query);
  $_SESSION['delete-category-success']="Category deleted successfully";
}
header('location:'.ROOT_URL.'managage-categories.php');
die();
 ?>
