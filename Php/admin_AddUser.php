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
    $connection->query("SET NAMES 'cp1251'")
		or die("Query failed : " . mysqli_error($connection));
	
    $query = "insert into users set role='{$_POST["role"]}', username='{$_POST["username"]}', password='{$_POST["password"]}'";
    $connection->query($query) 
		or die("Query failed : " . mysqli_error($connection));

    print "Сотрудник успешно добавлен";
    
    /* Закрываем соединение */
	$connection->close();
    header("Location: show_users.php");
?>
</body>
</html>