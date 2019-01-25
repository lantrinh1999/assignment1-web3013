<?php 

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
            <th>Product Name</th>
            <th>Product Image</th>
            <th>Category Name</th>
            <th>
                <a href="<?= $baseUrl . "product-add" ?>">
                    Thêm mới
                </a>
            </th>
        </tr>
        <?php foreach($products as $item) :?>
            <tr>
                <td><?= $item->id ?></td>
                <td><?= $item->name ?></td>
                <td>
                    <img src="<?= "public/" . $item->image ?>" width="150">
                </td>
                <td><?= $item->getCate()->cate_name ?></td>
                <td>
                    <span class="">
                        <a href="<?= $baseUrl . "product-edit?id=" . $item->id?>">Sửa</a>
                    </span>

                    <span>
                        <a href="<?= $baseUrl . "product-remove?id=" . $item->id?>">Xóa</a>                        
                    </span>
                </td>

            </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>