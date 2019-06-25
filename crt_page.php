<?php
session_start();
if (isset($_SESSION['login'])==false){
    header("Location:enter.php");
}
include 'includes/header.php';
?>
<div class="container main bg_white" style="padding: 5%; width: 50%">
    <h2>Создание статьи</h2>
    <form class="container" action="includes/article_create.php" method="post">
        <p>Введите название статьи/сообщения</p>
        <input name="head"><br><br>
        <p>Введите краткое содержание статьи/сообщения</p>
        <textarea name="short" style="height: 20%"></textarea><br><br>
        <p>Введите текст статьи/сообщения</p>
        <textarea name="text"></textarea><br><br>
        <input type="submit" value="Создать">
    </form>
</div>