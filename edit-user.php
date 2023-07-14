<?php
include 'partials/header.php';
if(isset($_GET['id']))
{
  $id=filter_var($_GET['id'],FILTER_SANITIZE_NUMBER_INT);
  $query="SELECT * FROM users where id=$id";

  $result=mysqli_query($connection,$query);
  $user=mysqli_fetch_assoc($result);
}
else{
  header('location: '.ROOT_URL.'manage-users.php');
}
 ?>
    <section class="form_section">
      <div class="container form_section-container">
        <h2>Edit User</h2>


      <form class="" action="<?=ROOT_URL?>edit-user-logic.php ?>" method="post" >
        <input type="hidden" name="id" value="<?=$user['id'] ?>" placeholder="First Name">
        <input type="text" name="firstname" value="<?=$user['firstname'] ?>" placeholder="First Name">
          <input type="text" name="lastname" value="<?=$user['lastname'] ?>" placeholder="Last Name">

            <select class="" name="userrole">
              <option value="0">Author</option>
              <option value="1">Admin</option>
            </select>

              <button class="btn" type="submit" name="submit">update user</button>
            </form>


    </div>
    </section>
  </body>
</html>
