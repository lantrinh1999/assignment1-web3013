



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
    <style type="text/css">
        em{
            color: red;
            margin-left: 10px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="panel panel-default">
            <div class="panel-heading">

            </div>
            <div class="panel-body">               
                <form name="myForm" id="signupForm" action="<?= $baseUrl . "category-save-edit"?>" method="post" class="form-horizontal">
                    <div class="row mt-3 mb-3">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="">Tên danh mục</label>
                                <input type="text" name="cate_name" id="" class="form-control" value="<?= $category->cate_name ?>">
                                <input type="hidden" name="id" value="<?= $category->id ?>">
                                    <?php if(isset($_GET['nameerr'])):?>
                                        <span class="text-danger err"><?= $_GET['nameerr'] ?></span>
                                    <?php endif?>                                
                                
                            </div>

                            <div class="form-group">
                                <label for="">Mô tả</label>
                                <textarea name="desc" id="" rows="3" class="form-control"><?= $category->description ?></textarea>
                                    <?php if(isset($_GET['descerr'])):?>
                                        <span class="text-danger err"><?= $_GET['descerr'] ?></span>
                                    <?php endif?>
                            </div>
                            <div class="justify-content-end">
                                <button type="submit" class="btn btn-sm btn-primary">Lưu</button>
                                <a href="<?= $baseUrl ."category" ?>" class="btn btn-sm btn-danger">Hủy</a>
                            </div>
                        </div>
                        
                    </div>
                </form>
            </div>
        </div>
    </div>













    <script src="plugins/jquery/jquery.min.js"></script>
    <script src="plugins/jquery/jquery.validate.min.js"></script>
    <script src="plugins/jquery/jquery.mockjax.js"></script>    
    <script src="plugins/bootstrap/js/bootstrap.min.js"></script>

</body>
</html>