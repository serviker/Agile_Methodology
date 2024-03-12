<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Обработка формы обновления задачи
    $task_id = $_POST["task_id"];
    $user_id = $_POST["user_id"];
    $title = $_POST["title"];
    $start_date = $_POST["start_date"];
    $end_date = $_POST["end_date"];
    $status = $_POST["status"];

    /* Открываем конфигурационный файл и получаем параметры соединения с БД */
    $handle = fopen("task_management.cfg", "r");
    $filestr = fgets($handle, 4096);
    $parts = explode(".", $filestr);
    fclose($handle);

    /* Соединяемся, выбираем базу данных */
    $connection = new mysqli($parts[0], $parts[2], $parts[1], $parts[3]);

    // Используйте подготовленные запросы для безопасности
    $query = "UPDATE tasks SET user_id=?, title=?, start_date=?, end_date=?, status=? WHERE task_id=?";
    $stmt = $connection->prepare($query);
    $stmt->bind_param("issssi", $user_id, $title, $start_date, $end_date, $status, $task_id);
    $stmt->execute();

    $stmt->close();
    $connection->close();

    // После успешного обновления данных, можно перенаправить пользователя на другую страницу
    header("Location: show_tasks.php");
    exit();
}
?>
