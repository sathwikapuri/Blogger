<?php
include 'C:\xampp\htdocs\Blog1\admin\partials\header.php';
$feautured_query="select * from posts where is_feautured=1";
$feautured_result=mysqli_query($connection,$feautured_query);

$feautured=mysqli_fetch_assoc($feautured_result);
$query="SELECT * from posts order by date_time desc";
$posts=mysqli_query($connection,$query);
 ?>
    <section class="search__bar">
      <form class="container search__bar-container" action="" method="">
        <div>
          <i class="uil uil-search">

          </i>
          <input type="search" name="" value="" placeholder="Search">

        </div>
        <button type="button" class="btn" name="button">Go3</button>
      </form>
    </section>
    <section class="posts">
      <div class="container posts_container">
        <?php while($post=mysqli_fetch_assoc($posts)) : ?>
        <article class="post">
          <div class="post_thumbnail">
            <img src="./images/<?= $post['thumbnail'] ?>" alt="">
          </div>
          <div class="post_info">
            <?php
            $category_id=$post['category_id'];
            $category_query="select * from categories where id=$category_id";
            $category_result=mysqli_query($connection,$category_query);
            $category=mysqli_fetch_assoc($category_result);
            $category_title=$category['title'];
             ?>
            <a href="<?=ROOT_URL ?>category-posts.php?id=<?=$category_id?>" class="category_button"><?=$category['title'] ?></a>
            <h3 class="post_title"><a href="<?=ROOT_URL ?>post.php?id=<?=$post['id'] ?>"><?=$post['title'] ?>.</a></h3>
            <p class="post_body"><?=substr($post['body'],0,300 )?></p>
            <div class="post_author">
              <?php
              $author_id=$post['author_id'];
              $author_query="SELECT * FROM users where id=$author_id";
              $author_result=mysqli_query($connection,$author_query);
              $author=mysqli_fetch_assoc($author_result);
               ?>
              <div class="post_author-avatar">
                <img src="./images/<?=$author['avatar'] ?>" alt="">
              </div>
              <div class="post_author-info">
  <h5>By:<?="{$author['firstname']} {$author['lastname']}" ?></h5>
                <small><?=date("M d, Y - H:i",strtotime($post['date_time'])) ?></small>
              </div>
            </div>
          </div>

        </article>
      <?php endwhile ?>
      </div>
    </section>
    <section class="category_buttons">
      <div class="container butttons">

          <?php
          $all_categories_query="SELECT * FROM categories";
          $all_categories=mysqli_query($connection,$all_categories_query);
           ?>
           <?php while($category=mysqli_fetch_assoc($all_categories)) :?>
              <a href="<?=ROOT_URL ?>category-posts.php?id=<?=$category['id'] ?>" class="category_button"><?= $category['title'] ?></a>
            <?php endwhile ?>
      </div>
    </section>
    <script src="./main.js">

    </script>
  </body>
</html>
