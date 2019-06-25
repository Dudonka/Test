<?php
session_start();

?>

<link rel="stylesheet" href="css/main.css">
<div class="container">
    <div class="container">
        <div class="container main bg_white" style="padding: 2%">
            <div style="float: left">
                <form>
                <h3 style="margin: 0">Авторизация</h3>
                <input type="text" id="login"><br><br>
                <input type="password" id="password"><br><br>
                <input id="enter" type="button" value="Войти" onclick="">
                <p id="l_information"> </p>
                </form>
            </div>
            <div style="margin-left: 30%">
                <form style="margin-left: 30%">
                    <h3 style="margin: 0">Регистрация</h3>
                    <input type="text" id="r_login"><br><br>
                    <input type="password" id="r_password"><br><br>
                    <input id="registr" type="button" value="Зарегистрироваться" onclick="">
                    <p id="r_information"> </p>
                </form>
            </div>
        </div>
    </div>
</div>


<script src="includes/jquery-3.4.1.min.js"></script>
<script>

    $(document).ready(function () {
        $("#enter").bind("click",function () {
            $.ajax({
                url: "includes/enter_check.php",
                type: "POST",
                data: ({login: $("#login").val(),password:$("#password").val(),input: $("#enter").val()}),
                dataType: "html",
                beforeSend: function(){},
                success: function (data){
                    if(data=="Fail"){
                        alert(data);
                        $("#l_information").text("Неверный логин или пароль");
                    }else {
                        window.location.href="index.php";
                    }
                }
            })
        })
        $("#registr").bind("click",function () {
            $.ajax({
                url: "includes/enter_check.php",
                type: "POST",
                data: ({login: $("#r_login").val(),password:$("#r_password").val(),input: $("#registr").val()}),
                dataType: "html",
                beforeSend: function(){},
                success: function (data){
                    if(data=="Занято"){
                        $("#r_information").text("Такой логин уже занят");
                    }else {
                        $("#r_information").text("Вы успешно зарегистрировались");
                    }
                }
            })
        })
    })
</script>

