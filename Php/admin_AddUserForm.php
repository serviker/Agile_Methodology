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
    text-align: left;
    padding: 20px;
    background-color: rgba(222, 222, 222, 0.6); 
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
    <form method="post" action="admin_AddUser.php">
        <h3>Регистрация нового сотрудника</h3>

        <label>Должность:</label>
        <input type="text" id="role" name="role" required>

        <label>Имя сотрудника:</label>
        <input type="text" id="username" name="username" required>

        <label>Пароль:</label>
        <input type="text" id="password" name="password" required>

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
