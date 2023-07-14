<?php
include 'partials/header.php';
if(isset($_GET['id']))
{
  $id=filter_var($_GET['id'],FILTER_SANITIZE_NUMBER_INT);
  $query="select * from posts where category_id=$id order by date_time desc";
  $posts=mysqli_query($connection,$query);
}
?>
<?php if(mysqli_num_rows($posts)>0) :?>
  <header class="category_title">
    <?php
        $category_id=$id;
        $category_query="select * from categories where id=$category_id";
        $category_result=mysqli_query($connection,$category_query);
        $category=mysqli_fetch_assoc($category_result);
        $category_title=$category['title'];
         ?>
    <h2><?=$category_title ?></h2>

  </header>
  <section class="posts">
    <div class="container posts_container">
      <?php while($post=mysqli_fetch_assoc($posts)) : ?>
      <article class="post">
        <div class="post_thumbnail">
          <img src="./images/<?= $post['thumbnail'] ?>" alt="">
        </div>
        <div class="post_info">


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
<?php else : ?>

    <p>No post found for this category</p>

<?php endif ?>
    <footer>
      <div class="footer_socials">
        <a href="#" target="_"><i class="uil uil-youtube"></i></a>
        <a href="#" target="_"><i class="uil uil-whatsapp"></i></a>
        <a href="#" target="_"><i class="uil uil-facebook-f"></i></a>
        <a href="#" target="_"><i class="uil uil-whatsapp"></i></a>
      </div>
      <div class="container footer_container">
        <article>
          <h4>
            Categories
          </h4>
          <ul>
            <li><a href="#">Art</a></li>
          <li><a href="#">Wild Life</a></li>
          <li><a href="#">Travel</a></li>
          <li><a href="#">Music</a></li>
          <li><a href="#">Science & Technology</a></li>
          <li><a href="#">Foof</a></li>
          </ul>
        </article>
        <article>
          <h4>
            Support
          </h4>
          <ul>
            <li><a href="#">Art</a></li>
          <li><a href="#">Wild Life</a></li>
          <li><a href="#">Travel</a></li>
          <li><a href="#">Music</a></li>
          <li><a href="#">Science & Technology</a></li>
          <li><a href="#">Foof</a></li>
          </ul>
        </article>
        <article>
          <h4>
            Blog
          </h4>
          <ul>
            <li><a href="#">Art</a></li>
          <li><a href="#">Wild Life</a></li>
          <li><a href="#">Travel</a></li>
          <li><a href="#">Music</a></li>
          <li><a href="#">Science & Technology</a></li>
          <li><a href="#">Foof</a></li>
          </ul>
        </article>
        <article>
          <h4>
            Permalinks
          </h4>
          <ul>
            <li><a href="#">Art</a></li>
          <li><a href="#">Wild Life</a></li>
          <li><a href="#">Travel</a></li>
          <li><a href="#">Music</a></li>
          <li><a href="#">Science & Technology</a></li>
          <li><a href="#">Foof</a></li>
          </ul>
        </article>

      </div>
    </footer>
    <script src="./main.js">

    </script>
  </body>
</html>
