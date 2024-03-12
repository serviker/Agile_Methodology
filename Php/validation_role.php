<?php
session_start();  // старт сессии позволяет пользоваться массивом $_SESSION
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Panel</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0; /* Убираем отступы по умолчанию */
            padding: 0;
            background-image: url('/Exam/images/matthew-henry-VviFtDJakYk-unsplash.jpg'); /* Замените 'your-background-image.jpg' на путь к вашей фоновой картинке */
            background-size: cover; /* Растягиваем фоновую картинку на весь экран */
            background-position: center; /* Центрируем фоновую картинку */
            text-align: center;
            height: 100vh; /* 100% высоты окна просмотра */
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .form-container {
    display: inline-block;
    text-align: center;
    padding: 20px;
    background-color: rgba(12, 12, 12, 0.7); 
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    margin-bottom: 50px;
    color:white;
}

        label {
            display: block;
            margin-bottom: 8px;
            text-align: center;
        }

        input {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            box-sizing: border-box;
            border-radius: 8px;
        }

        input[type="submit"] {
            background-color: #55acee;
            color: #fff;
            cursor: pointer;
            border-radius: 8px;
        }

        a {
            text-decoration: none;
            color: #007bff;
        }
    </style>
</head>
<body>
    <div class="form-container">
        <?php
//         $username = "Anna18";
//         $password = "Qwe_123";

// function console_log($data) {
//     $output = $data;
//     if (is_array($output))
//         $output = implode(',', $output);

//     echo "<script>console.log('Debug Objects: " . $output . "' );</script>";
//     }

//     $conn = mysqli_connect('localhost','root','','task_management');
//     if (!$conn) {
//     die("Connection failed: " . mysqli_connect_error());
//     }
//     $select = " SELECT * FROM users WHERE username = '$username' && password = '$password' ";
//     $result = mysqli_query($conn, $select); 

//     if(mysqli_num_rows($result) > 0){
//         $user= mysqli_fetch_array($result);
//         $_SESSION["role"] = $user["role"];
//         console_log($user["role"]);
//         $_SESSION["username"] = $user["username"];
//         console_log($user["username"]);
//         $_SESSION["password"] = $user["password"];
//         console_log($user["password"]);
//     }

        if (isset($_SESSION["username"], $_SESSION["password"], $_SESSION["role"])) {
        $userName = $_SESSION["username"];
        $password = $_SESSION["password"];
        $role = $_SESSION["role"];
    
        echo "Вы вошли в систему как:  " . $role;
        echo '<br><br>';
    
        if ($role == "teamlead" || $role == "senior") {
            ?>
            <form method="get" action="admin_users.php">
                <h3>Админская панель</h3>
                <label>Управление персоналом</label>
                <input type="submit" value="Перейти к управлению">
            </form>
    
            <form method="get" action="admin_task.php">
                <label>Управление задачами</label>
                <input type="submit" value="Перейти к управлению">
            </form>
        <?php } else { ?>
            <form method="get" action="user_task.php">
                <h3>Панель пользователя</h3>
                <label>Управление своими задачами</label>
                <input type="submit" value="Перейти к управлению">
            </form>
        <?php }
    } else {
        echo 'Сотрудник не зарегистрирован<br>';
        echo 'Обратитесь к старшему из разработчиков для регистрации<br>';
        // echo '<a href="Session5.php">Зарегистрироваться<a/>';
    }
    ?>
    
    <form method="get" action="validation_user.php">
        <label>Выйти в главное Меню</label>
        <input type="submit" value="Выйти">
    </form>
    </div>
</body>
</html>

