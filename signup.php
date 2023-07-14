<?php
session_start();
require 'config/constants.php';
$firstname=$_SESSION['signup-data']['firstname'] ?? null;
$lastname=$_SESSION['signup-data']['lastname'] ?? null;
$username=$_SESSION['signup-data']['username'] ?? null;
$email=$_SESSION['signup-data']['email'] ?? null;
$createpassword=$_SESSION['signup-data']['createpassword'] ?? null;
$confirmpassword=$_SESSION['signup-data']['confirmpassword'] ?? null;
unset($_SESSION['signup-data']);
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
        <h2>Sign up</h2>
    <?php
    if(isset($_SESSION['signup'])) : ?>

      <div class="alert_message error">
        <p><?=$_SESSION['signup'];
        unset($_SESSION['signup']);
        ?></p>
      </div>

    <?php endif ?>



      <form class="" action="<?=ROOT_URL?>signup-logic.php" method="post" enctype="multipart/form-data">
        <input type="text" name="firstname" value="<?=$firstname ?>" placeholder="First Name">
          <input type="text" name="lastname" value="<?=$lastname ?>" placeholder="Last Name">
            <input type="text" name="username" value="<?=$username ?>" placeholder=" UserName">
              <input type="text" name="email" value="<?=$email ?>" placeholder="Email">
            <input type="text" name="createpassword" value="<?=$createpassword ?>" placeholder="Create Password">
            <input type="text" name="confirmpassword" value="<?=$confirmpassword ?>" placeholder="Confirm Password">
            <div class="form_control">
              <label for="avatar">Use Avatar</label>
              <input type="file" name="avatar" id="avatar">
            </div>
            <button class="btn" type="Submit" name="submit">Sign Up</button>
            </form>
            <small>Already have an account??<a href="./signin.php">Sign in</a></small>
    </div>
    </section>
  </body>
</html>
