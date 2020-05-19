<?php
	$db = new PDO('mysql:dbname=task_management;host:127.0.0.1;port=3306;charset=utf8mb4', 'root', 'nobita12');
	$statement = $db->prepare('update task set name = ?, description = ?, updated_at = now() where id = ?');

	$statement->bindParam(1, $_POST['name']);
	$statement->bindParam(2, $_POST['description']);
	$statement->bindParam(3, $_POST['id']);

	$statement->execute();

	header('Location: .');
?>