<?php
include 'partials/header.php' ;
if(isset($_GET['id']))
{
  $id=filter_var($_GET['id'],FILTER_SANITIZE_NUMBER_INT);
  $query="select * from posts where id=$id";
  $result=mysqli_query($connection,$query);
  $post=mysqli_fetch_assoc($result);



}
 ?>
    <section class="singlepost">
      <div class="container singlepost_container">
        <h2><?=$post['title']?></h2>
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
        <div class="singlepost_thumbnail">
          <img src="./images/<?=$post['thumbnail'] ?>" alt="">
        </div>
      <p>
        <?=$post['body'] ?>
      </p>
      </div>
    </section>
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
