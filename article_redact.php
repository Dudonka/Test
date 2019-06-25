<?php
session_start();
if (isset($_SESSION['login'])==false){
    header("Location:enter.php");
}
include 'includes/header.php';
$id=$_GET['id'];
?>
    <div class="container main bg_white" style="padding: 5%; width: 50%">
        <h2>Редактирование статьи</h2>
        <form class="container" action="includes/article_update.php" method="post">
            <?php
            include 'includes/connection.php';
            $result = mysqli_query($connection,"SELECT * FROM `articles` WHERE `id`='$id'");
            while (($articles=mysqli_fetch_assoc($result)))
            {?>
                <input hidden="hidden" value="<?php echo $id?>" name="id">
                <p>Введите название статьи/сообщения</p>
                <input name="head" value="<?php echo $articles['head']?>"><br><br>
                <p>Введите краткое содержание статьи/сообщения</p>
                <textarea name="short" style="height: 20%"></textarea><br><br>
                <p>Введите текст статьи/сообщения</p>
                <textarea name="text"><?php echo str_replace("<br>","\n",$articles['text']);?></textarea><br><br>
                <input type="submit" value="Изменить"><?
            }
            ?>
        </form>
    </div>

