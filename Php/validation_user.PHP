<!DOCTYPE html>
<html lang="en">
<head>
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
        <form method="post" action="validationDB.php">
            <h3>Вход в систему METODOLOGY</h3>

            <label>Логин:</label>
            <input id="username" name="username" required>

            <label>Пароль:</label>
            <input id="password" name="password" required>

            <input type="submit" value="Войти">
        </form>

        <h3>На главную</h3>

        <form method="get" action="/Exam/index.html">
            <input type="submit" value="Выйти">
        </form> 
    </div>
</body>
</html>
