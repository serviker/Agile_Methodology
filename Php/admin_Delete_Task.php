<html>
<body>


<?php

    /* Открываем конфигурационный файл и получаем параметры соединения с БД */
    $handle = fopen ("task_management.cfg", "r");
    $filestr = fgets($handle, 4096);
    $parts=explode(".",$filestr);
    fclose($handle);

    /* Соединяемся, выбираем базу данных */
	$connection = new mysqli($parts[0], $parts[2], $parts[1], $parts[3]);

    /* Выполняем SQL-запрос */
    $query = "delete from tasks where task_id='{$_POST["task_id"]}'";
	
    $connection->query($query) 
		or die("Query failed : " . mysqli_error($link));
	
    print('задача успешно удалена');
        echo '<br>';
    /* Закрываем соединение */
    $connection->close();
    header("Location: show_tasks.php");
?>
</body>
</html>