<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
	<?php
		$id = $_REQUEST['id'];
		if (!is_numeric($id) || $id <= 0) {
			print('Trang bạn yêu cầu không hợp lệ');
			die();
		}
		$db = new PDO('mysql:dbname=task_management;host:127.0.0.1;port=3306;charset=utf8mb4', 'root', 'nobita12');
		$statement = $db->prepare('select * from task where id = ?');
		$statement->execute(array($id));
		$memo = $statement->fetch();
	?>
    <form action="edit_task_impl.php" method="post">
    	<input type="hidden" name="id" value="<?php echo $memo['id']; ?>">
        Tên tác vụ: <input type="text" name="name" value="<?php echo $memo['name']; ?>"> <br>
        Mô tả: <textarea name="description"><?php echo $memo['description']; ?></textarea> <br>
        <button type="submit">Sửa</button>
    </form>
    <a href=".">Quay lại</a>
</body>
</html>