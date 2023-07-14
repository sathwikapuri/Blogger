<?php
include 'partials/header.php';
$category_query="SELECT * FROM categories";
$categories=mysqli_query($connection,$category_query);
if(isset($_GET['id']))
{
  $id=filter_var($_GET['id'],FILTER_SANITIZE_NUMBER_INT);
  $query="SELECT * FROM posts where id=$id";
  $result=mysqli_query($connection,$query);
  $post=mysqli_fetch_assoc($result);

}
else{
  header('location: '.ROOT_URL.'dashboard.php');
  die();
}
 ?>
    <section class="form_section">
      <div class="container form_section-container">
        <h2>Edit Post</h2>


      <form class="" action="<?=ROOT_URL ?>edit-post-logic.php" method="post" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?=$post['id'] ?>" placeholder="Title">
        <input type="hidden" name="previous_thumbnail_name" value="<?=$post['thumbnail'] ?>">
        <input type="text" name="title" value="<?=$post['title'] ?>" placeholder="Title">
        <select class="" name="category">
          <?php while($category = mysqli_fetch_assoc($categories)) : ?>
          <option value="<?=$category['id'] ?>"><?=$category['title']?></option>


        <?php endwhile ?>
        </select>

      <textarea name="body" rows="10"placeholder="Description"><?=$post['body'] ?></textarea>
      <div class="form_control inline">
        <input type="checkbox"  value="1" id="is_feautured" checked>
        <label for="is_feautured" name="is_feautured" checked>feautured</label>
      </div>
<div class="form_control">
  <label for="thumbnail">change thumbnail</label>
  <input type="file" id="thumbnail" name="thumbnail" value="">
</div>
  <button class="btn" type="submit" name="submit">update Post</button>
            </form>

    </div>
    </section>
  </body>
</html>
