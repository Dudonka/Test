<?php
session_start();
include 'connection.php';
$head=$_POST['head'];
$author=$_SESSION['login'];
$short=$_POST['short'];
$text=str_replace("\n",'<br>',$_POST['text']);

mysqli_query($connection,"INSERT INTO `articles` (`id`, `head`, `author`, `short`, `text`, `pubdate`) VALUES (NULL, '$head', '$author', '$short', '$text', CURRENT_TIMESTAMP)");
$id=(string)mysqli_insert_id($connection);
header("Location:../article_page.php?id=".$id);
