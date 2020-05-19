<?php
	$db = new PDO('mysql:dbname=task_management;host:127.0.0.1;port=3306;charset=utf8mb4', 'root', 'nobita12');
	$statement = $db->prepare('delete from task where id = ?');

	$statement->bindParam(1, $_REQUEST['id']);

	$statement->execute();

	header('Location: .');
?>