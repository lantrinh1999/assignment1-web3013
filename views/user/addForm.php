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
                <h3 class="panel-title">Đăng kí</h3>
            </div>
            <div class="panel-body">
                <form name="myForm" id="signupForm" action="<?= $baseUrl . "user-save-add"?>" method="post" class="form-horizontal">
                    <div class="form-group">
                        <label class="col-sm-4 control-label" for="name">Name</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" id="name" name="name" placeholder="Name" />
                                <?php if(isset($_GET['nameerr'])):?>
                                    <span class="text-danger err"><?= $_GET['nameerr'] ?></span>
                                <?php endif?>

                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-4 control-label" for="email">Email</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" id="email" name="email" placeholder="Email" />
                                <?php if(isset($_GET['emailerr'])):?>
                                    <span class="text-danger err"><?= $_GET['emailerr'] ?></span>
                                <?php endif?>

                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-4 control-label" for="password">Password</label>
                        <div class="col-sm-5">
                            <input type="password" class="form-control" id="password" name="password" placeholder="Password" />
                                <?php if(isset($_GET['passworderr'])):?>
                                    <span class="text-danger err"><?= $_GET['passworderr'] ?></span>
                                <?php endif?>

                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-4 control-label" for="confirm_password">Confirm password</label>
                        <div class="col-sm-5">
                            <input type="password" class="form-control" id="confirm_password" name="confirm_password" placeholder="Confirm password" />
                                <?php if(isset($_GET['cpassworderr'])):?>
                                    <span class="text-danger err"><?= $_GET['cpassworderr'] ?></span>
                                <?php endif?>

                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-5 col-sm-offset-4">
                            <label>Role</label>
                            <select name="role" id="role" class="role form-control">
                                <option value="">---</option>
                                <option value="900">Admin</option>
                                <option value="700">Moderator</option>
                                <option value="1">Memner</option>
                            </select>
                                <?php if(isset($_GET['roleerr'])):?>
                                    <span class="text-danger err"><?= $_GET['roleerr'] ?></span>
                                <?php endif?>

                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-9 col-sm-offset-4">
                            <button type="submit" class="btn btn-primary" name="signup" value="Sign up">Sign up</button>
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