<?php
session_start();  // старт сессии позволяет пользоваться массивом $_SESSION
?>

<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
    font-family: Arial, sans-serif;
    background-image: url('/Exam/images/kelly-sikkema-qxAxQW5CxP0-unsplash.jpg'); /* Путь к вашей фоновой картинке */
    background-size: cover;
    background-position: center;
    box-shadow: 0 10px 50px rgba(0, 0, 0, 1);
    text-align: center;
    margin: 50px;
    
            display: flex;
    flex-direction: column; /* Исправлено: flex-collumn на flex-direction */
    align-items: center;
    justify-content: center;
    margin: 100px 100px 100px 100px;
}

table {
    border-collapse: collapse;
    width: 100%;
    margin-top: 20px;
    box-shadow: 0 0 80px rgba(0, 0, 0, 1);
}

th, td {
    border: 1px solid #dddddd;
    text-align: center;
    padding: 8px;
    background-color: #FFE793;
}

th {
    background-color: #4CAF50;
    color: white;
}

a {
    text-decoration: none;
    color: #ffff;
}

    </style>
</head>
<body>

<h4>Список Задач:</h4>
<p>

<?php

/* Открываем конфигурационный файл и получаем параметры соединения с БД */
$handle = fopen("task_management.cfg", "r");
$filestr = fgets($handle, 4096);
$parts = explode(".", $filestr);
fclose($handle);

$connection = new mysqli($parts[0], $parts[2], $parts[1], $parts[3]);

/* function console_log($data) {
    $output = $data;
    if (is_array($output))
        $output = implode(',', $output);

    echo "<script>console.log('Debug Objects: " . $output . "' );</script>";
}*/

if (isset($_SESSION["user_id"])) {
    $user_id = $_SESSION["user_id"];

    /* Выполняем подготовленный SQL-запрос для выборки задач, принадлежащих текущему пользователю */
    $query = "SELECT * FROM tasks WHERE user_id = ?";
    $stmt = $connection->prepare($query);
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    if ($stmt->error) {
        die('Error: ' . $stmt->error);
    }

    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        echo '<table border="1">
                <tr>
                    <th>Номер задачи</th>
                    <th>Имя сотрудника</th>
                    <th>Название задачи</th>
                    <th>Дата начала задачи</th>
                    <th>Дата окончания задачи</th>
                    <th>Статус задачи</th>
                </tr>';
    
        foreach ($result as $line) {
            // Выполним еще один запрос, чтобы получить имя сотрудника по его user_id
            $user_id = $line['user_id'];
            $user_query = "SELECT username FROM users WHERE user_id = $user_id";
            $user_result = $connection->query($user_query);
    
            if ($user_result && $user_result->num_rows > 0) {
                $user_data = $user_result->fetch_assoc();
                $username = $user_data['username'];
            } else {
                $username = 'Неизвестный пользователь';
            }
    
            echo '<tr>';
            echo '<td>' . $line['task_id'] . '</td>';
            echo '<td>' . $username . '</td>';
            echo '<td>' . $line['title'] . '</td>';
            echo '<td>' . $line['start_date'] . '</td>';
            echo '<td>' . $line['end_date'] . '</td>';
            echo '<td>' . $line['status'] . '</td>';
            echo '</tr>';
        }

        echo '</table>';
    } else {
        echo 'Нет результатов.';
    }
} else {
    echo 'Ошибка: пользователь не аутентифицирован';
}

/* Закрываем соединение */
$connection->close();
?>


<p>
<a href="user_task.php">Продолжить работу с задачами</a>
<br><br>
<a href="validation_user.php">Выйти</a>

</body>
</html>