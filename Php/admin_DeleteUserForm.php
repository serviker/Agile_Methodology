<!DOCTYPE html>
<html lang="en">
<head>
    <style>
         body {
            font-family: Arial, sans-serif;
            margin: 0; /* Убираем отступы по умолчанию */
            padding: 0;
            background-image: url('/Exam/images/1.jpg'); /* Замените 'your-background-image.jpg' на путь к вашей фоновой картинке */
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
    color: #fff;
    padding: 20px;
    background-color: rgba(20, 20, 20, 0.6); 
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    margin-bottom: 50px;

}

        label {
            display: block;
            margin-bottom: 8px;
            text-align: center;
        }

        input, select {
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
        <form method="post" action="admin_DeleteUser.php">
            <h3>Удаление сотрудника</h3>

            <label>Выберите сотрудника:</label>
            <select name="id" required>
                <?php
                    // Открываем конфигурационный файл и получаем параметры соединения с БД
                    $handle = fopen("task_management.cfg", "r");
                    $filestr = fgets($handle, 4096);
                    $parts = explode(".", $filestr);
                    fclose($handle);

                    // Соединяемся с базой данных
                    $connection = new mysqli($parts[0], $parts[2], $parts[1], $parts[3]);

                    // Получаем список сотрудников из базы данных
                    $result = $connection->query("SELECT user_id, username FROM users");

                    // Выводим опции для выпадающего списка
                    while ($row = $result->fetch_assoc()) {
                        echo '<option value="' . $row['user_id'] . '">' . $row['username'] . '</option>';
                    }

                    // Закрываем соединение
                    $connection->close();
                ?>
            </select>

<input type="submit" value="Выполнить">
        </form>

        <h3>Управление персоналом</h3>

<form method="get" action="admin_users.php">
    <input type="submit" value="К персоналу">
</form> 
<form method="get" action="validation_user.php">
    <input type="submit" value="Выйти">
</form> 
    </div>
    
</body>
</html>