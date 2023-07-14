<?php

require 'config/database.php';
session_start();
if(isset($_SESSION['user-id']))
{
  $id=filter_var($_SESSION['user-id'],FILTER_SANITIZE_NUMBER_INT);
  $query="SELECT avatar FROM users WHERE id=$id";
  $result=mysqli_query($connection,$query);
  $avatar=mysqli_fetch_assoc($result);
}

?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Responsive Multipage</title>
 <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="./style.css"/>


    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;600;700;800&family=Roboto:ital,wght@0,100;1,100;1,300&display=swap" rel="stylesheet">
<link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.css"
    />
  </head>
  <body>
    <nav>
      <div class="container nav_container">
        <a href="index.php" class="nav_logo">Blogger</a>
        <ul class="nav_items">
          <li><a href="blog.php">blog</a></li>
          <li><a href="about.php">about</a></li>
          <li><a href="services.php">services</a></li>
          <li><a href="contact.php">contact</a></li>
          <?php if(isset($_SESSION['user-id'])): ?>
          <li class="nav_profile">
            <div class="avatar">
                <img src="<?=ROOT_URL . 'images/' . $avatar['avatar']?>" >
              </div>
            <ul>
              <li><a href="dashboard.php">dashboard</a></li>
              <li><a href="logout.php">Logout</a></li>
            </ul>

        </li>
      <?php else : ?>
          <li><a href="signin.php">sign-in</a></li>
        <?php endif ?>
        <button type="button" name="button" id="close-btn"><i class="uil uil-times"></i></button>
          <button type="button" name="button" id="open-btn"><i class="uil uil-bars"></i></button>
      </div>
    </nav>
