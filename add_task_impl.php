<?php
	$db = new PDO('mysql:dbname=task_management;host:127.0.0.1;port=3306;charset=utf8mb4', 'root', 'nobita12');
	$statement = $db->prepare('insert into task values (null, ?, ?, now(), now())');

	$statement->bindParam(1, $_POST['name']);
	$statement->bindParam(2, $_POST['description']);

	$statement->execute();

	header('Location: .');
?>