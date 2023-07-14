<?php
include 'partials/header.php';
if(isset($_GET['id']))
{
$id=filter_var($_GET['id'],FILTER_SANITIZE_NUMBER_INT);
$query="SELECT * FROM categories where id=$id";
$result=mysqli_query($connection,$query);
if(mysqli_num_rows($result)==1)
{
  $category=mysqli_fetch_assoc($result);
}
}
else{
  header('location: ' .ROOT_URL.'managage-categories.php');
}
 ?>
    <section class="form_section">
      <div class="container form_section-container">
        <h2>Edit Category</h2>


      <form action="<?=ROOT_URL ?>edit-category-logic.php" method="post" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?=$category['id'] ?>">
        <input type="text" name="title" value="<?=$category['title']?>" placeholder="Title">
      <textarea name="description"  value=" " rows="4"placeholder="Description"><?=$category['description'] ?></textarea>


            <button class="btn" type="submit" name="submit">Update Category</button>
            </form>

    </div>
    </section>
  </body>
</html>
