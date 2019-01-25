<?php 
$baseUrl = "http://localhost:81/web3013/assignment1/";
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <table border="solid">
        <tr>
            <th>ID</th>

            <th>Category Name</th>
            <th>
                <a href="<?= $baseUrl . "category-add" ?>">
                    Thêm mới
                </a>
            </th>
        </tr>
        <?php foreach($categories as $item) :?>
            <tr>
                <td><?= $item->id ?></td>
                <td><?= $item->cate_name ?></td>
                <td>
                    <span class="">
                        <a href="<?= $baseUrl . "category-edit?id=" . $item->id?>">Sửa</a>
                    </span>

                    <span>
                        <a href="<?= $baseUrl . "category-remove?id=" . $item->id?>">Xóa</a>                        
                    </span>
                </td>

            </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>