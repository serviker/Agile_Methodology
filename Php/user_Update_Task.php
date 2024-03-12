<?php
session_start();

$handle = fopen("task_management.cfg", "r");
$filestr = fgets($handle, 4096);
$parts = explode(".", $filestr);
fclose($handle);

$connection = new mysqli($parts[0], $parts[2], $parts[1], $parts[3]);

if (isset($_SESSION["user_id"])) {
    $user_id = $_SESSION["user_id"];
    
    if (isset($_POST["task_id"]) && !empty($_POST["task_id"])) {
        $task_id = $_POST["task_id"];

        // Выполняем SQL-запрос для обновления статуса задачи на 'completed'
        $query = "UPDATE tasks SET status = 'completed' WHERE task_id = ? AND user_id = ?";
        
        $stmt = $connection->prepare($query);
        $stmt->bind_param("ii", $task_id, $user_id);
        $stmt->execute();
        $stmt->close();

        if ($connection->affected_rows > 0) {
            print('Задача успешно завершена');
            echo '<br>';
            header("Location:user_Show_Task.php");
        } else {
             print('Ошибка завершения задачи');
        }
    } else {
        print('Ошибка: Некорректные параметры запроса');
    }
} else {
    print('Ошибка: пользователь не аутентифицирован');
}

$connection->close();
?>
