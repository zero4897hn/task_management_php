<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <?php 
    $db = new PDO('mysql:dbname=task_management;host:127.0.0.1;port=3306;charset=utf8mb4', 'root', 'nobita12');
    $records = $db->query('select * from task');
  ?>
  <table>
    <thead>
      <tr>
        <th>Số thứ tự</th>
        <th>Tên tác vụ</th>
        <th>Mô tả</th>
        <th>Ngày tạo</th>
        <th>Ngày thay đổi</th>
      </tr>
    </thead>
    <tbody>
      <?php
        while ($record = $records->fetch()) {
      ?>
        <tr>
          <td></td>
          <td><?php echo $record['name'] ?></td>
          <td><?php echo $record['description'] ?></td>
          <td><?php echo $record['created_at'] ?></td>
          <td><?php echo $record['updated_at'] ?></td>
        </tr>
      <?php 
        }
      ?>
    </tbody>
  </table>
  <a href="add_task.php">Thêm mới tác vụ</a>
</body>
</html>