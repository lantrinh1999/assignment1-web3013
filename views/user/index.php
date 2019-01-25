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

            <th>Name</th>
            <th>Email</th>
            <th>Role</th>
            <th>
                <a href="<?= $baseUrl . "user-add" ?>">
                    Thêm mới
                </a>
            </th>
        </tr>
        <?php foreach($users as $item) :?>
            <tr>
                <td><?= $item->id ?></td>
                <td><?= $item->name ?></td>
                <td><?= $item->email ?></td>
                <td>
                    <?php 
                        if ($item->role >= 900) {
                            echo "admin";
                        }  elseif ($item->role >= 700) {
                            echo "mod";
                        } else {
                            echo "member";
                        }
                    ?>                    
                </td>
                <td>
                    <span class="">
                        <a href="<?= $baseUrl . "user-edit?id=" . $item->id?>">Sửa</a>
                    </span>

                    <span>
                        <a href="<?= $baseUrl . "user-remove?id=" . $item->id?>">Xóa</a>                        
                    </span>
                </td>

            </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>