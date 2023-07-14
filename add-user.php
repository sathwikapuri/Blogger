<?php
include 'partials/header.php';


$firstname=$_SESSION['add-user-data']['firstname'] ?? null;
$lastname=$_SESSION['add-user-data']['lastname'] ?? null;
$username=$_SESSION['add-user-data']['username'] ?? null;
$email=$_SESSION['add-user-data']['email'] ?? null;
$createpassword=$_SESSION['add-user-data']['createpassword'] ?? null;
$confirmpassword=$_SESSION['add-user-data']['confirmpassword'] ?? null;
$userrole=$_SESSION['add-user-data']['userrole'] ?? null;
unset($_SESSION['add-user-data']);
 ?>
    <section class="form_section">
      <div class="container form_section-container">
        <h2>Add User</h2>
      <?php if(isset($_SESSION['add-user'])) : ?>
        <div class="alert_message error">
          <p><?=$_SESSION['add-user'];
          unset($_SESSION['add-user']);
          ?>
        </p>
        </div>
      <?php endif ?>

      <form action="<?=ROOT_URL ?>add-user-logic.php"  method="post" enctype="multipart/form-data">
        <input type="text" name="firstname" value="<?=$firstname  ?>" placeholder="First Name">
          <input type="text" name="lastname" value="<?=$lastname ?>" placeholder="Last Name">
            <input type="text" name="username" value="<?= $username ?>" placeholder=" UserName">
              <input type="text" name="email" value="<?=$email ?>" placeholder="Email">
            <input type="text" name="createpassword" value="<?=$createpassword ?>" placeholder="Create Password">
            <input type="text" name="confirmpassword" value="<?=$confirmpassword?>" placeholder="Confirm Password">
            <select class="" name="userrole">
              <option value="0">Author</option>
              <option value="1">Admin</option>
            </select>
            <div class="form_control">
              <label for="avatar">Use Avatar</label>
              <input type="file" id="avatar" name="avatar">
            </div>
            <button class="btn" type="submit" name="submit">Add User</button>
            </form>


    </div>
    </section>
  </body>
</html>
