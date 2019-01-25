<!DOCTYPE html>
<html lang="en">
<head>
    <base href="<?= $baseUrl . "public/" ?>">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="plugins/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/main.css">
</head>
<body>
    <div class="container">
        <form action="<?= $baseUrl . "category-save-add"?>" method="post" enctype="multipart/form-data">
            <div class="row mt-3 mb-3">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="">Tên danh mục</label>
                        <input type="text" name="cate_name" id="" class="form-control">
                        
                    </div>

                    <div class="form-group">
                        <label for="">Mô tả</label>
                        <textarea name="desc" id="" rows="3" class="form-control"></textarea>
                    </div>
                    <div class="justify-content-end">
                        <button type="submit" class="btn btn-sm btn-primary">Lưu</button>
                        <a href="<?= $baseUrl ."category" ?>" class="btn btn-sm btn-danger">Hủy</a>
                    </div>
                </div>
                
            </div>
        </form>
    </div>
    <script src="plugins/jquery/jquery.min.js"></script>
    <script src="plugins/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>