<?php
session_start();
if (isset($_SESSION['login'])==false){
    header("Location:enter.php");
}
include 'includes/header.php';
$id=$_GET['id'];
?>

<div class="container main bg_white">
    <?php
    include 'includes/connection.php';
    $result = mysqli_query($connection,"SELECT * FROM `articles` WHERE `id`='$id'");
    while (($articles=mysqli_fetch_assoc($result)))
    {   if ($articles['author']==$_SESSION['login']){
        echo '<a style="float:right;" href="article_redact.php?id='.$articles['id'].'">Редактировать статью</a>';
        }
        echo '<div><h3>'.$articles['head'].'</h3>';
        echo '<p>Автор: '.$articles['author'].'</p>';
        echo '<h4>Краткое содержание</h4>';
        echo '<p style="word-wrap: break-word;">'.str_replace("\n",'<br>',$articles['short']).'</p>';
        echo '<h4>Полное содержание</h4>';
        echo '<p style="word-wrap: break-word;">'.str_replace("\n",'<br>',$articles['text']).'</p></div>';
        echo $articles['pubdate'];
    }
    ?>

    <div class="article">
        <br>
        <form action="includes/comment_add.php" method="post">
            <input type="hidden" name="id" value="<?php echo $id?>">
            <textarea style="width: 40%; height: 25%;" placeholder="Оставить комментарий" name="comment"></textarea><br><br>
            <input type="submit">
        </form>
        <div class="article">
            <?php
            $result = mysqli_query($connection,"SELECT * FROM `comments` WHERE `article_id`='$id' ORDER BY `pubdate` DESC");
            while (($comment=mysqli_fetch_assoc($result)))
            {
                echo '<div><h3>'.$comment['author'].'</h3>';
                echo '<p>'.str_replace("\n",'<br>',$comment['text']).'</p></div>';
            }
            ?>
        </div>
    </div>

</div>
