<?php
session_start();  // Старт сессии позволяет пользоваться массивом $_SESSION
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <style>
         body {
            font-family: Arial, sans-serif;
            margin: 0; /* Убираем отступы по умолчанию */
            padding: 0;
            background-image: url('/Exam/images/11.jpg'); /* Замените 'your-background-image.jpg' на путь к вашей фоновой картинке */
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
    background-color: rgba(22, 22, 22, 0.7); 
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
            background-color: #4caf50;
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
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Обработка формы входа
    $username = $_POST["username"];
    $password = $_POST["password"];

    /* Открываем конфигурационный файл и получаем параметры соединения с БД */
    $handle = fopen("task_management.cfg", "r");
    $filestr = fgets($handle, 4096);
    $parts = explode(".", $filestr);
    fclose($handle);

    /* Соединяемся, выбираем базу данных */
    $connection = new mysqli($parts[0], $parts[2], $parts[1], $parts[3]);

    // Используйте подготовленные запросы для безопасности
    $query = "SELECT * FROM users WHERE username = ? AND password = ?";
    $stmt = $connection->prepare($query);
    $stmt->bind_param("ss", $username, $password);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Пользователь найден, устанавливаем его в сессию
        $user = $result->fetch_assoc();
        $_SESSION["role"] = $user["role"];
        $_SESSION["user_id"] = $user["user_id"];
        $_SESSION["username"] = $user["username"];
        $_SESSION["password"] = $user["password"];

        // Перенаправляем на validation_role.php
        header("Location: validation_role.php");
    } else {
        // Неверные учетные данные
        echo "Неверный логин или пароль";
        echo "<br>";
    }

    $stmt->close();
    $connection->close();
} else {
    // Неверные учетные данные
    echo 'Сотрудник не зарегистрирован<br>';
}
?>

<form method="get" action="validation_user.php">
        <label>Выйти в главное Меню</label>
        <input type="submit" value="Выйти">
</form>
 </div>
</body>
</html>