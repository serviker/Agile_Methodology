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
    <h3>Управление персоналом</h3>

    <form method="get" action="show_users.php">
        <label>Просмотр всех сотрудников</label>
        <input type="submit" value="Просмотр">
    </form>

    <form method="get" action="admin_AddUserForm.php">
        <label>Зарегистрировать сотрудника</label>
        <input type="submit" value="Добавить">
    </form>

    <form method="get" action="admin_DeleteUserForm.php">
        <label>Удалить из списка сотрудника</label>
        <input type="submit" value="Удалить">
    </form>

    <!-- <form method="get" action="admin_task.php">
        <label>Изменение сотрудника</label>
        <input type="submit" value="Изменить">
    </form> -->


<h3>Управление задачами</h3>
  <form method="get" action="admin_task.php">
        <input type="submit" value="К задачам">
    </form> 
    <form method="get" action="validation_user.php">
        <input type="submit" value="Выйти">
    </form> 
</div>
</body>
</html>
