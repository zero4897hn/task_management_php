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

        $page = 0;

        $limit = 5;

        if (isset($_REQUEST['page'])) {
            $page = $_REQUEST['page'];
        }

        if ($page < 0) {
            $page = 0;
        }

        $totalSize = $db->query('select count(1) as count from task')->fetchColumn();

        $totalPage = ceil((int) $totalSize / $limit);

        if ($page > $totalPage - 1) {
            $page = $totalPage - 1;
        }

        $statement = $db->prepare('select * from task limit ? offset ?');
        $statement->bindValue(1, (int) $limit, PDO::PARAM_INT);
        $statement->bindValue(2, (int) ($page * $limit), PDO::PARAM_INT);
        $statement->execute();
    ?>
    <table>
        <thead>
            <tr>
                <th>Số thứ tự</th>
                <th>Tên tác vụ</th>
                <th>Mô tả</th>
                <th>Ngày tạo</th>
                <th>Ngày thay đổi</th>
                <th>Thao tác</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $index = 0;
                while ($record = $statement->fetch()) {
            ?>
                <tr>
                    <td><?php echo $index + 1 + ($page * $limit) ?></td>
                    <td><?php echo $record['name'] ?></td>
                    <td><?php echo $record['description'] ?></td>
                    <td><?php echo $record['created_at'] ?></td>
                    <td><?php echo $record['updated_at'] ?></td>
                    <td>
                        <a href="edit_task.php?id=<?php echo $record['id'] ?>">Sửa</a>
                        <a onclick="if (!confirm('Bạn có chắc chắn muốn xóa tác vụ này')) return false;" href="remove_task_impl.php?id=<?php echo $record['id'] ?>">Xóa</a>
                    </td>
                </tr>
            <?php
                $index++;
                }
            ?>
        </tbody>
    </table>
    <a href=".?page=<?php echo $page - 1; ?>"> << </a> <?php echo $page + 1; ?> <a href=".?page=<?php echo $page + 1; ?>"> >> </a><br>
    <a href="add_task.php">Thêm mới tác vụ</a>
</body>
</html>