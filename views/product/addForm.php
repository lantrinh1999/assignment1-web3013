
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
        em, .err{
            color: red;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="panel panel-default">
            <div class="panel-heading">
            </div>
            <div class="panel-body">
                <form name="myForm" id="signupForm" action="<?= $baseUrl . "product-save-add"?>" method="post" enctype="multipart/form-data" class="form-horizontal">
            <div class="row mt-3 mb-3">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="">Tên sp</label> 
                        <input type="text" name="name" id="" class="form-control">

                        <?php if(isset($_GET['nameerr'])):?>
                            <span class="text-danger err"><?= $_GET['nameerr'] ?></span>
                        <?php endif?>

                    </div>
                    <div class="form-group">
                        <label for="">Danh mục</label>
                        <select name="cate_id" id="" class="form-control">
                            <?php foreach ($cates as $c):?>
                                <option value="<?= $c->id?>"><?= $c->cate_name?></option>
                            <?php endforeach;?>
                        </select>
                        <?php if(isset($_GET['cateerr'])):?>
                            <span class="text-danger err"><?= $_GET['cateerr'] ?></span>
                        <?php endif?>

                    </div>
                    <div class="form-group">
                        <label for="">Giá sp</label>
                        <input type="number" name="price" id="" class="form-control">
                        <?php if(isset($_GET['priceerr'])):?>
                            <span class="text-danger err"><?= $_GET['priceerr'] ?></span>
                        <?php endif?>

                    </div>
                    <div class="form-group">
                        <label for="">Sao đánh giá sp</label>
                        <input type="number" name="star" id="" class="form-control">
                        <?php if(isset($_GET['starerr'])):?>
                            <span class="text-danger err"><?= $_GET['starerr'] ?></span>
                        <?php endif?>

                    </div>
                    <div class="form-group">
                        <label for="">Lượt xem sp</label>
                        <input type="number" name="views" id="" class="form-control">
                        <?php if(isset($_GET['viewerr'])):?>
                            <span class="text-danger err"><?= $_GET['viewerr'] ?></span>
                        <?php endif?>

                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="img-preview mt-5">
                        <img src="images/default-img.png" alt="" class="img-fluid">
                    </div>
                    <div class="form-group">
                        <label for="">Ảnh sp</label>
                        <input type="file" name="image" id="" class="form-control">
                        <?php if(isset($_GET['imageerr'])):?>
                            <span class="text-danger err"><?= $_GET['imageerr'] ?></span>
                        <?php endif?>

                    </div>
                </div>
                <div class="col-12">
                    <div class="form-group">
                        <label for="">Mô tả ngắn</label>
                        <textarea name="short_desc" id="" rows="2" class="form-control"></textarea>
                        <?php if(isset($_GET['short_descerr'])):?>
                            <span class="text-danger err"><?= $_GET['short_descerr'] ?></span>
                        <?php endif?>

                    </div>
                    <div class="form-group">
                        <label for="">Chi tiết</label>
                        <textarea name="detail" id="" rows="5" class="form-control"></textarea>
                        <?php if(isset($_GET['detailerr'])):?>
                            <span class="text-danger err"><?= $_GET['detailerr'] ?></span>
                        <?php endif?>

                    </div>
                </div>
                <div class="justify-content-end">
                    <button type="submit" class="btn btn-sm btn-primary">Lưu</button>
                    <a href="<?= $baseUrl ."product" ?>" class="btn btn-sm btn-danger">Hủy</a>
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
