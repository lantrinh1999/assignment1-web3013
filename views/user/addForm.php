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
        <form action="<?= $baseUrl . "user-save-add"?>" method="post" enctype="multipart/form-data">
            <div class="row mt-3 mb-3">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="">Tên</label>
                        <input type="text" name="name" id="" class="form-control"> 
                    </div>
                    <div class="form-group">
                        <label for="">Email</label>
                        <input type="text" name="email" id="" class="form-control"> 
                    </div>
                    <div class="form-group">
                        <label for="">Password</label>
                        <input type="text" name="password" id="" class="form-control"> 
                    </div>    
                    <div class="form-group">
                        <label for="">Submit password</label>
                        <input type="text" name="" id="" class="form-control"> 
                    </div>                                    
                    <div class="form-group">
                        <label for="">Role</label>
                        <select class="form-control">
                            <option value="900">admin</option>
                            <option value="700">mod</option>
                            <option value="1">member</option>
                        </select>
                    </div>

                    <div class="justify-content-end">
                        <button type="submit" class="btn btn-sm btn-primary">Lưu</button>
                        <a href="<?= $baseUrl ."user" ?>" class="btn btn-sm btn-danger">Hủy</a>
                    </div>
                </div>
                
            </div>
        </form>
    </div>
    <script src="plugins/jquery/jquery.min.js"></script>
    <script src="plugins/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>