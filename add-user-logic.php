<?php
session_start();
require 'config/database.php';
if(isset($_POST['submit']))
{
$firstname=filter_var($_POST['firstname'],FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$lastname=filter_var($_POST['lastname'],FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$username=filter_var($_POST['username'],FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$email=filter_var($_POST['email'],FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$createpassword=filter_var($_POST['createpassword'],FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$confirmpassword=filter_var($_POST['confirmpassword'],FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$is_admin=filter_var($_POST['userrole'],FILTER_SANITIZE_NUMBER_INT);
$avatar=$_FILES['avatar'];
if(!$firstname)
{
  $_SESSION['add-user']="PLEASE ENTER YOUR FIRST NAME";
}
elseif(!$lastname)
{
  $_SESSION['add-user']="PLEASE ENTER YOUR LAST NAME";
}
elseif(!$username)
{
  $_SESSION['add-user']="PLEASE ENTER YOUR USER NAME";
}
elseif(!$email)
{
  $_SESSION['add-user']="PLEASE ENTER A VALID EMAIL";
}
elseif(strlen($createpassword)<8)
{
  $_SESSION['add-user']="PASSWORD MUST BE OF MIMIMUM 8 CHARACTERS";
}
elseif(!$avatar['name']) {
  // code..
  $_SESSION["add-user"]="please add avatar";
}

else{
  if($createpassword !== $confirmpassword)
  {
    $_SESSION['add-user']="passwords do not match";

  }
  else{
    $hashed_password=password_hash($createpassword,PASSWORD_DEFAULT);
    echo $createpassword,$hashed_password;
    $user_check_query="SELECT * FROM users WHERE username='$username' OR email='$email' ";
    $user_check_result=mysqli_query($connection,$user_check_query);
    if(mysqli_num_rows($user_check_result)>0)
    {
      $SESSION['add-user']="username or Email already exist";
    }
    else{
      $time=time();
      $avatar_name=$time . $avatar['name'];
      $avatar_tmp_name=$avatar['tmp_name'];
      $avatar_destination_path='images/' . $avatar_name;
      $allowed_files=['png','jpg','jpeg'];
    $extention=explode('.',$avatar_name);

    $extention=end($extention);

    //if(in_array($extension,$allowed_files))
    //{
      if($avatar['size']<1000000)
      {
        move_uploaded_file($avatar_tmp_name,$avatar_destination_path);
      }
      else{
        $_SESSION['add-user']='File size too big.Should be less than 1mb';
      }

    //}
    /*else {
      // code...
      $_SESSION['signup']="FILE type be png,jpg or jpeg";
    }
  }*/

  }
}
}
if(isset($_SESSION['add-user']))
{
$_SESSION['add-user-data']=$_POST;
  header('location: ' . ROOT_URL . 'add-user.php');
  die();
}
else{
  $insert_user_query ="INSERT INTO users SET firstname='$firstname',lastname='$lastname',username='$username',email='$email',password='$hashed_password',avatar='$avatar_name',is_admin='$is_admin'";
  $insert_user_result=mysqli_query($connection,$insert_user_query);
  if(!mysqli_errno($connection))
  {
    $_SESSION['add-success']="New User $firstname $lastname added succesfully";
    header('location: ' .ROOT_URL .'manage-users.php');
    die();
  }
  else{
    header('location: '.ROOT_URL . 'add-user.php');
    die();
  }
}
}

 ?>
