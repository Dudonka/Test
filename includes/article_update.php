<?php
include 'connection.php';
$id=$_POST['id'];
$head=$_POST['head'];
$short=$_POST['short'];
$text=$_POST['text'];

$result = mysqli_query($connection," UPDATE `articles` SET `head` = '$head', `short`='$short', `text` = '$text' WHERE `articles`.`id` = '$id';");
header("Location:../article_page.php?id=".$id);
