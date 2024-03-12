<?php
session_start();  // Старт сессии позволяет пользоваться массивом $_SESSION

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

echo $_SESSION["role"];
echo $_SESSION["username"];
echo $_SESSION["password"];

if (isset($_SESSION["role"]) && isset($_SESSION["username"]) && isset($_SESSION["password"])) {
    // Если пользователь уже залогинен, перенаправляем его на validation_role.php
    header('location:validation_user.php');
    exit(); // Обязательно вызовите exit() после header(),
    // чтобы избежать дальнейшего выполнения кода на текущей странице
    //header('location:login_form.php');
} else {
    header('location:validation_user.php');
    exit(); 
}

?>
