<?php
session_start();
include 'connection.php';
$login=$_POST['login'];
$password=$_POST['password'];

if ($_POST['input']=="Войти"){
    $count = mysqli_query($connection,"SELECT * FROM `users` WHERE `login`='$login' AND `password`='$password'");
    if (mysqli_num_rows($count)==0){
        echo "Fail";
    }
    else{
        ($user=mysqli_fetch_assoc($count));
        $_SESSION['login']=$login;
        $_SESSION['password']=$password;
        $_SESSION['type']=$user['type'];
        exit();
    }
}
if ($_POST['input']=="Зарегистрироваться"){
    $count = mysqli_query($connection,"SELECT * FROM `users` WHERE `login`='$login'");
    if (mysqli_num_rows($count)==0){
        mysqli_query($connection," INSERT INTO `users` (`id`, `login`, `password`, `type`) VALUES (NULL, '$login', '$password', 'user')");
        echo 'Зарегистрировались';
    }
    else{
        echo "Занято";
    }
}
