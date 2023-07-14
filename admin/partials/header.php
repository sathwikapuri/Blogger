<?php

require 'C:\xampp\htdocs\Blog1\partials\header.php';


if(!isset($_SESSION['user-id']))
{
  header('location: '. ROOT_URL . 'signin.php');
  die();
}

?>
