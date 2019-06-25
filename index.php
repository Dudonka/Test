<?php
session_start();
if (isset($_SESSION['login'])==false){
    header("Location:enter.php");
}
include 'includes/header.php';
include 'includes/connection.php';
$page=$_GET['page'];
if($page==NULL){
    $page=1;
}
$art_count = mysqli_fetch_array(mysqli_query($connection,"SELECT COUNT(1) FROM `articles`"))[0];
$art_per_page=5;
$total_pages = ceil($art_count/$art_per_page);
$art_skip=$page*$art_per_page-$art_per_page;
echo $total_pages;
?>

<div class="container main bg_white">
    <h2>Статьи / Сообщения</h2>
    <?php
    $result = mysqli_query($connection,"SELECT * FROM `articles` ORDER BY `pubdate` DESC LIMIT $art_skip, $art_per_page");
    while (($articles=mysqli_fetch_assoc($result)))
    {
        echo '<div class="article"><a href="article_page.php?id='.$articles['id'].'"><h3>'.$articles['head'].'</h3></a>';
        echo '<p>'.mb_substr($articles['short'],0,420, 'utf-8'); echo "...".'</p></div>';
    }
    ?>
</div>
<div class="container " style="text-align: center; margin-top:1%;">
    <p>Страница <?php echo $page ?></p>
<?php
    for($i=1;$i<=$total_pages;$i++){
        echo '<a href="index.php?page='.$i.'" style="margin-right: 1%;">'.$i.'</a>';
    }
    ?>
</div>