<?php
session_start();  // старт сессии позволяет пользоваться массивом $_SESSION
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Success</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            text-align: center;
            margin: 50px;
        }

        .success-container {
            display: inline-block;
            text-align: left;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
        }

        a {
            text-decoration: none;
            color: #007bff;
        }
    </style>
</head>
<body>
    <div class="success-container">
    <?php
    session_destroy();      //уничтожить массив $_SESSION для данного пользователя
    echo  'Сессия окончена<br>';
    echo  '<a href="Session5.php">Регистрация<a/>';
    ?>
    </div>
</body>
</html>