<?php
include 'partials/header.php';
$title=$_SESSION['add-category-data']['title'] ?? null;
$description=$_SESSION['add-category-data']['description'] ?? null;
unset($_SESSION['add-category-data']);
?>
    <section class="form_section">
      <div class="container form_section-container">
        <h2>Add Category</h2>
        <?php if(isset($_SESSION['add-category'])):?>

      <div class="alert_message error">
        <p><?=$_SESSION['add-category'];
          unset($_SESSION['add-category']);
          ?>
        </p>
      </div>
  <?php endif ?>
      <form class=""  action="<?php ROOT_URL ?>add-category-logic.php" method="post" enctype="multipart/form-data">
        <input type="text" name="title" value="<?=$title ?>" placeholder="Title">
      <textarea name="description" rows="4" placeholder="Description"></textarea>


            <button class="btn" type="Submit" name="submit">Add Category</button>
            </form>

    </div>
    </section>
  </body>
</html>
