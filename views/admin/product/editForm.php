
<!DOCTYPE html>
<html>
<head>
<?php 
require_once './views/admin/_share/top_asset.php';
 ?>
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

<!--- header --->
<!----------------------------------               ----------------------------------->
<?php 
require_once './views/admin/_share/header.php';
 ?>
<!----------------------------------               ----------------------------------->
  <!-- Left side column. contains the logo and sidebar -->
<!------------------------------------------------------------>  
<?php 
require_once './views/admin/_share/lside.php';
 ?>
 <!---------------------------------------------------------------->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dashboard
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>


<!------------------------------------------------------------------------------------>


<section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
              <div class="box-body">
        <!----------------------------------------                                     -------------------------------------------->   
        <form name="myForm" id="signupForm" action="<?= $baseUrl . "admin/product-save-edit"?>" method="post" enctype="multipart/form-data">
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="">Tên sp</label>
                        <input type="text" name="name" id="" class="form-control" value="<?= $product->name?>">
                        <input type="hidden" name="id" value="<?= $product->id ?>">
                        <?php if(isset($_GET['nameerr'])):?>
                            <span class="text-danger err"><?= $_GET['nameerr'] ?></span>
                        <?php endif?>
                    </div>
                    <div class="form-group">
                        <label for="">Danh mục</label>
                        <select name="cate_id" id="" class="form-control">


                            <?php foreach ($cates as $c):?>
                                <?php $selected = $product->cate_id === $c->id ? "selected" : "" ?>
                                <option <?= $selected ?> value="<?= $c->id?>"><?= $c->cate_name?></option>
                            <?php endforeach;?>
                        </select>
                        <?php if(isset($_GET['cateerr'])):?>
                            <span class="text-danger err"><?= $_GET['cateerr'] ?></span>
                        <?php endif?>
                    </div>
                    <div class="form-group">
                        <label for="">Giá sp</label>
                        <input type="number" name="price" id="" class="form-control" value="<?= $product->price?>">
                        <?php if(isset($_GET['priceerr'])):?>
                            <span class="text-danger err"><?= $_GET['priceerr'] ?></span>
                        <?php endif?>
                    </div>
                    <div class="form-group">
                        <label for="">Sao đánh giá sp</label>
                        <input type="number" name="star" id="" class="form-control" value="<?= $product->star?>">
                        <?php if(isset($_GET['starerr'])):?>
                            <span class="text-danger err"><?= $_GET['starerr'] ?></span>
                        <?php endif?>
                    </div>
                    <div class="form-group">
                        <label for="">Lượt xem sp</label>
                        <input type="number" name="views" id="" class="form-control" value="<?= $product->views?>">
                        <?php if(isset($_GET['viewerr'])):?>
                            <span class="text-danger err"><?= $_GET['viewerr'] ?></span>
                        <?php endif?>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="img-preview mt-5 text-center">
                        <?php
                        $imgDefault = $product->image != null ? $product->image :  "images/default-img.png";
                        ?>
                        <img width="300px" src="<?= $baseUrl . "public/" . $imgDefault ?>" alt="" class="img-fluid">
                    </div>
                    <div class="form-group">
                        <label for="">Ảnh sp</label>
                        <input type="file" name="image" id="" class="form-control">
                        <?php if(isset($_GET['imageerr'])):?>
                            <span class="text-danger err"><?= $_GET['imageerr'] ?></span>
                        <?php endif?>
                    </div>
                </div>
                <div class="col-sm-12">
                    <div class="form-group">
                        <label for="">Mô tả ngắn</label>
                        <textarea name="short_desc" id="" rows="3" class="form-control" value=""><?= $product->short_desc?></textarea>
                        <?php if(isset($_GET['short_descerr'])):?>
                            <span class="text-danger err"><?= $_GET['short_descerr'] ?></span>
                        <?php endif?>
                    </div>
                    <div class="form-group">
                        <label for="">Chi tiết</label>
                        <textarea name="detail" id="" rows="6" class="form-control" value=""><?= $product->detail?></textarea>
                        <?php if(isset($_GET['detailerr'])):?>
                            <span class="text-danger err"><?= $_GET['detailerr'] ?></span>
                        <?php endif?>
                    </div>
                </div>
                <div class="justify-content-center col-sm-12">
                    <button type="submit" class="btn btn-sm btn-primary">Lưu</button>
                    <a href="<?= $baseUrl . "admin/product" ?>" class="btn btn-sm btn-danger">Hủy</a>
                </div>
            </div>
        </form>
   
        <!----------------------------------------                                     -------------------------------------------->                 
              </div>
              <!-- /.box-body -->
          </div>
        </div>
      </div>
    </section>

    <!-- /.content -->
<!---------------------------------------------------------------------------------------->


  </div>
  <!-- /.content-wrapper -->

<!------------------------------------------------------------------------------------------------------------------------------------>
<?php 
require_once './views/admin/_share/footer.php';
 ?>
<!----------------------------------               ----------------------------------->
  <!-- Control Sidebar -->
<!----------------------------------               ----------------------------------->
<?php 
require_once './views/admin/_share/control_sidebar.php';
 ?>
<!----------------------------------               ----------------------------------->

</div>
<!-- ./wrapper -->


<!----------------------------------               ----------------------------------->
<?php 
require_once './views/admin/_share/bottom_asset.php';
 ?>
<!----------------------------------               ----------------------------------->
</body>
</html>
