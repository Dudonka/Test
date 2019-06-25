<?php
session_start();
include 'connection.php';
$login=$_SESSION['login'];
$id=$_POST['id'];
$text=$_POST['comment'];
mysqli_query($connection," INSERT INTO `comments` (`id`, `author`, `text`, `article_id`, `pubdate`) VALUES (NULL, '$login', '$text', '$id', CURRENT_TIMESTAMP)");
header("Location:../article_page.php?id=$id");