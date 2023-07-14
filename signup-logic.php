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
$avatar=$_FILES['avatar'];
if(!$firstname)
{
  $_SESSION['signup']="PLEASE ENTER YOUR FIRST NAME";
}
elseif(!$lastname)
{
  $_SESSION['signup']="PLEASE ENTER YOUR LAST NAME";
}
elseif(!$username)
{
  $_SESSION['signup']="PLEASE ENTER YOUR USER NAME";
}
elseif(!$email)
{
  $_SESSION['signup']="PLEASE ENTER A VALID EMAIL";
}
elseif(strlen($createpassword)<8)
{
  $_SESSION['signup']="PASSWORD MUST BE OF MIMIMUM 8 CHARACTERS";
}
elseif(!$avatar['name']) {
  // code..
  $_SESSION["signup"]="please add avatar";
}
else{
  if($createpassword !== $confirmpassword)
  {
    $_SESSION['signup']="passwords do not match";

  }
  else{
    $hashed_password=password_hash($createpassword,PASSWORD_DEFAULT);
    echo $createpassword,$hashed_password;
    $user_check_query="SELECT * FROM users WHERE username='$username' OR email='$email' ";
    $user_check_result=mysqli_query($connection,$user_check_query);
    if(mysqli_num_rows($user_check_result)>0)
    {
      $SESSION['signup']="username or Email already exist";
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
        $_SESSION['signup']='File size too big.Should be less than 1mb';
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
if(isset($_SESSION['signup']))
{
$_SESSION['signup-data']=$_POST;
  header('location: ' . ROOT_URL . 'signup.php');
  die();
}
else{
  $insert_user_query ="INSERT INTO users SET firstname='$firstname',lastname='$lastname',username='$username',email='$email',password='$hashed_password',avatar='$avatar_name',is_admin=0";
  $insert_user_result=mysqli_query($connection,$insert_user_query);
  if(!mysqli_errno($connection))
  {
    $_SESSION['signup-success']="Registration successful.please log in";
    header('location: ' .ROOT_URL .'signin.php');
    die();
  }
  else{
    header('location: '.ROOT_URL . 'signup.php');
    die();
  }
}
}

 ?>
