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
    $query = "delete from users where user_id='{$_POST["id"]}'";
	
    $connection->query($query) 
		or die("Query failed : " . mysqli_error($link));
	
    print('Cотрудник успешно удален');
        echo '<br>';
    /* Закрываем соединение */
    $connection->close();
    header("Location: show_users.php");
?>
</body>
</html>