<?php
session_start();
require 'config/database.php';
if(isset($_POST['submit']))
{
  $author_id=$_SESSION['user-id'];
  $title=filter_var($_POST['title'],FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $body=filter_var($_POST['body'],FILTER_SANITIZE_FULL_SPECIAL_CHARS);
      $category=filter_var($_POST['category'],FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $category_id=filter_var($_POST['category'],FILTER_SANITIZE_NUMBER_INT);
        $is_feautured=filter_var($_POST['is_feautured'],FILTER_SANITIZE_NUMBER_INT) ?? 0;
        $thumbnail=$_FILES['thumbnail'];

        if(!$title)
        {
          $_SESSION['add-post']="enter post title";

        }
        elseif(!$body)
        {
          $_SESSION['add-post']="enter post body";
        }
        elseif(!$thumbnail['name'])
        {
          $_SESSION['add-post']="choose post thumbnail";
        }
        else{
          $time=time();
          $thumbnail_name=$time.$thumbnail['name'];
          $thumbnail_tmp_name=$thumbnail['tmp_name'];
          $thumbnail_destination_path='images/' . $thumbnail_name;
          $allowed_files=['png','jpg','jpeg'];
          $extension=explode('.',$thumbnail_name);
          $extension=end($extension);

            if($thumbnail['size']<1000000)
            {
              move_uploaded_file($thumbnail_tmp_name,$thumbnail_destination_path);
            }
            else{
              $_SESSION['add-post']="File size too big.Should be less than 2mb";
            }
        }
        if(isset($_SESSION['add-post']))
        {
          $_SESSION['add-post-data']=$_POST;
          header('location: '.ROOT_URL.'add-post.php');
          die();
        }
        else{
          if($is_feautured==1)
          {
            $Zero_all_is_feautured_query="UPDATE posts SET is_feautured=0";
            $Zero_all_is_feautured_result=mysqli_query($connection,$Zero_all_is_feautured_query);

          }
          $query="Insert into posts (title,body,thumbnail,category_id,author_id,is_feautured) values ('$title','$body','$thumbnail_name','$category_id','$author_id','$is_feautured')";
          $result=mysqli_query($connection,$query);
          if(!mysqli_errno($connection))
          {
            $_SESSION['add-post-success']="New post added successfully";
            header('location:'.ROOT_URL.'dashboard.php');
            die();
          }
        }
}

 ?>
