<!DOCTYPE html>
<html lang="en">
<head>
<style>
    body {
            font-family: Arial, sans-serif;
            margin: 0; /* Убираем отступы по умолчанию */
            padding: 0;
            background-image: url('/Exam/images/7.jpg'); /* Замените 'your-background-image.jpg' на путь к вашей фоновой картинке */
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
        <h3>Управление задачами</h3>

        <form method="get" action="user_Show_Task.php">
            <label>Просмотр своих задач</label>
            <input type="submit" value="Просмотр">
        </form>

        <form method="get" action="user_Update_TaskForm.php">
            <label>Удалить из списка задачу</label>
            <input type="submit" value="Удалить">
        </form>

    </div>

    <!-- <h3>Управление персоналом</h3> -->
<!-- <a href="admin_users.php">Перейти в панель пользователя</a>
<br><br> 
<a href="enter.php">Выйти</a>-->
</body>
</html>