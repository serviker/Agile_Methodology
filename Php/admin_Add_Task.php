

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Проверяем, что данные были отправлены методом POST

    /* Открываем конфигурационный файл и получаем параметры соединения с БД */
    $handle = fopen ("task_management.cfg", "r");
    $filestr = fgets($handle, 4096);
    $parts=explode(".",$filestr);
	fclose($handle);

    /* Соединяемся, выбираем базу данных */
	$connection = new mysqli($parts[0], $parts[2], $parts[1], $parts[3]);

    // Проверка соединения
    if ($connection->connect_error) {
        die("Connection failed: " . $connection->connect_error);
    }

    // Получаем данные из формы
    $user_id = $_POST["user_id"];
    $title = $_POST["title"];
    $start_date = $_POST["start_date"];
    $end_date = $_POST["end_date"];
    $status = $_POST["status"];

    // Подготавливаем SQL-запрос с использованием подготовленных выражений
    $stmt = $connection->prepare("INSERT INTO tasks (user_id, title, start_date, end_date, status) VALUES (?, ?, ?, ?, ?)");

    // Привязываем параметры
    $stmt->bind_param("issss", $user_id, $title, $start_date, $end_date, $status);

    // Выполняем запрос
    $stmt->execute();

    // Проверяем успешность выполнения запроса
    if ($stmt->affected_rows > 0) {
        echo "Задача успешно добавлена";

    } else {
        echo "Ошибка добавления задачи";
    }

    // Закрываем подготовленное выражение и соединение
    $stmt->close();
    $connection->close();

    header("Location: show_tasks.php");
}
?>
