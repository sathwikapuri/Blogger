<?php
include 'partials/header.php';
$query="SELECT * FROM categories";
$categories=mysqli_query($connection,$query);
$title=$_SESSION['add-post-data']['title'] ?? null;
$body=$_SESSION['add-post-data']['body'] ?? null;
unset($_SESSION['add-post-data']);
 ?>
    <section class="form_section">
      <div class="container form_section-container">
        <h2>Add Post</h2>
      <?php if(isset($_SESSION['add-post'])) : ?>

      <div class="alert_message error">
        <p><?= $_SESSION['add-post'];
        unset($_SESSION['add-post']);
        ?></p>

      </div>
      ?<?php endif ?>
  <form class="" action="<?=ROOT_URL?>add-post-logic.php" method="post" enctype="multipart/form-data">
        <input type="text" name="title" value="<?=$title ?>" placeholder="Title">
        <select class="" name="category">
          <?php while($category =mysqli_fetch_assoc($categories)): ?>
          <option value="<?= $category['id'] ?>"> <?=$category['title'] ?></option>
    <?php endwhile ?>

        </select>

      <textarea name="body"  rows="4"placeholder="Description"><?=$body ?></textarea>
      <div class="form_control inline">
        <?php if(isset($_SESSION['user_is_admin'])) : ?>
        <input type="checkbox" name="is_feautured" value="1" id="is_feautured" checked>
        <label for="is_feautured" checked>feautured</label>
        <?php endif ?>
      </div>

<div class="form_control">
  <label for="thumbnail">Add thumbnail</label>
  <input type="file" id="thumbnail" name="thumbnail" value="">
</div>
<button class="btn" type="submit" name="submit">Add Post</button>
            </form>

    </div>
    </section>
  </body>
</html>
