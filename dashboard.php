<?php
include 'partials/header.php';
$current_user_id=$_SESSION['user-id'];
$query="select id,title,category_id from posts where author_id=$current_user_id order by id desc";
$posts=mysqli_query($connection,$query);

?>

<section class="dashboard">
  <?php if (isset($_SESSION['add-post-success'])) : ?>
    <div class="alert_message success container">
      <p>
        <?=$_SESSION['add-post-success'];
        unset($_SESSION['add-post-success']);

         ?>
      </p>
    </div>
  <?php endif ?>
  <div class="container dashboard_container">
    <button id="show_sidebar-btn" class="sidebar_toggle"><i class="uil uil-angle-right-b"></i></button>
    <button  id="hide_sidebar-btn" class="sidebar_toggle"><i class="uil uil-angle-left-b"></i></button>
    <aside class="">
      <ul>
        <li><a href="add-post.php"><i class="uil uil-pen"></i>
          <h5>Add Post</h5>
        </a>
      </li>

    <li><a href="dashboard.php" ><i class="uil uil-postcard"></i>
      <h5>Manage Posts</h5>
    </a>
  </li>
    <?php if(isset($_SESSION['user_is_admin'])): ?>
  <li><a href="add-user.php"><i class="uil uil-user-plus"></i>
    <h5>Add User</h5>
  </a>
</li>
<li><a href="manage-users.php" ><i class="uil uil-users-alt"></i>
  <h5>Manage Users</h5>
</a>
</li>
<li><a href="add-category.php"><i class="uil uil-edit"></i>
  <h5>Add Categories</h5>
</a>
</li>
<li><a href="managage-categories.php"  ><i class="uil uil-list-ul"></i>
  <h5>Manage Categories</h5>
</a>
</li>
<?php endif ?>
      </ul>
    </aside>
    <main>
      <h2>Manage Users</h2>
      <?php if (mysqli_num_rows($posts)>0) : ?>
      <table>
        <thead>
          <tr>
            <th>Title</th>
            <th>
              Category
            </th>
            <th>Edit</th>
            <th>Delete</th>

          </tr>
        </thead>
        <tbody>
          <?php while($post=mysqli_fetch_assoc($posts)) : ?>
            <?php
            $category_id=$post['category_id'];
            $category_query="SELECT title from categories where id=$category_id";
            $category_result=mysqli_query($connection,$category_query);
            $category=mysqli_fetch_assoc($category_result);
            ?>
          <tr>
            <td><?= $post['title'] ?></td>
            <td><?= $category['title']?></td>
            <td><a href="<?=ROOT_URL ?>edit-post.php ?id=<?=$post['id']?>" class="btn sm">Edit</a></td>
            <td><a href="<?=ROOT_URL ?>delete-post.php ?id=<?=$post['id']?>" class="btn sm danger">Delete</a></td>

          </tr>
        <?php endwhile ?>
        </tbody>
      </table>
    <?php else : ?>
      <div class="alert_message error">
        <?="No posts found" ?>
      </div>
      <?php endif ?>

    </main>
  </div>
</section>
<script src="./main.js">

</script>
</body>
</html>
