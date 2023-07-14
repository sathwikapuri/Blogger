<?php
session_start();
require 'config/database.php';
$username_email=$_SESSION['signin-data']['username_email'] ?? null;
$password=$_SESSION['signin-data']['password'] ?? null;
unset($_SESSION['signin-data']);
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
    <section class="form_section">
      <div class="container form_section-container">

        <h2>Sign in</h2>
       <?php if(isset($_SESSION['signup-success'])) : ?>
         <div class="alert_message success">
           <p><?=$_SESSION['signup-success'];
           unset($_SESSION['signup-success']);
           ?></p>
         </div>

     <?php elseif(isset($_SESSION['signin'])) : ?>
         <div class="alert_message error">
           <p><?=$_SESSION['signin'];
           unset($_SESSION['signin']);
           ?></p>
         </div>
       <?php endif ?>

      <form action="<?= ROOT_URL ?>signin-logic.php" method="post">
        <input type="text" name="username_email" value="<?=$username_email ?>" placeholder="Username or Email">
          <input type="password" name="password" value="<?=$password ?>" placeholder="password">


            <button class="btn" type="submit" name="submit">Sign In</button>
            </form>
          <small>Dont have Account ? <a href="./signup.php">Sign Up</a></small>
    </div>
    </section>
  </body>
</html>
