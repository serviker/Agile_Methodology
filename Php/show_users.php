<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
    font-family: Arial, sans-serif;
    background-image: url('/Exam/images/kelly-sikkema-qxAxQW5CxP0-unsplash.jpg');
    background-size: cover;
    background-position: center;
    box-shadow: 0 10px 50px rgba(0, 0, 0, 1);
    text-align: center;
    margin: 100px 100px 100px 100px;
    color: #ffff;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
}

table {
    border-collapse: collapse;
    width: 200%; /* Уменьшаем ширину таблицы до 100% */
    margin-top: 20px;
    margin-left: -50%; /* Устанавливаем отрицательный отступ слева на половину ширины таблицы */
    box-shadow: 0 0 80px rgba(0, 0, 0, 1);
}

th, td {
    border: 1px solid #dddddd;
    text-align: center;
    padding: 8px;
    background-color: #977F43;
}

th {
    background-color: #285A2A;
    color: white;
}

a {
    text-decoration: none;
    color: #ffff;
}
    </style>
</head>
<body>

<h4>Список Сотрудников:</h4>
<p>
<?php

    /* Открываем конфигурационный файл и получаем параметры соединения с БД */
    $handle = fopen ("task_management.cfg", "r");
    $filestr = fgets($handle, 4096);
    $parts=explode(".",$filestr);
	fclose($handle);

    /* Соединяемся, выбираем базу данных */
    $connection = new mysqli($parts[0], $parts[2], $parts[1], $parts[3]);

    /* Выполняем SQL-запрос */
    $connection->query("SET NAMES 'cp1251'")
		or die("Query failed : " . mysqli_error($connection));
	
    $query = "select * from users";

    $result = $connection->query($query, MYSQLI_STORE_RESULT) 
		or die("Query failed : " . mysqli_error($connection));

    if ($result) {
        echo '<table border="1">
                <tr>
                    <th>ID Cотрудника</th>
                    <th>Логин</th>
                    <th>Пароль</th>
                    <th>Должность</th>
                </tr>';
    
        foreach ($result as $line) {
            echo '<tr>';
            echo '<td>' . $line['user_id'] . '</td>';
            echo '<td>' . $line['username'] . '</td>';
            echo '<td>' . $line['password'] . '</td>';
            echo '<td>' . $line['role'] . '</td>';
            echo '</tr>';
        }
    
        echo '</table>';
    } else {
        echo 'Нет результатов.';
    }

    /* Освобождаем память от результата */
    $result->close();

    /* Закрываем соединение */
    $connection->close();

?>
<p>
<br>
<a href="admin_users.php">Продолжить работу с сотрудниками</a>
<br><br>
<a href="validation_user.php">Выйти</a>
</body>
</html>