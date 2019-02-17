
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
                <form name="myForm" id="signupForm" onsubmit="return validateForm()" action="<?= $baseUrl . "admin/category-save-add"?>" method="post">
                    <div class="row mt-3 mb-3">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="">Tên danh mục</label>
                                <input type="text" name="cate_name" id="" class="form-control">
                                    <?php if(isset($_GET['nameerr'])):?>
                                        <span class="text-danger err"><?= $_GET['nameerr'] ?></span>
                                    <?php endif?>
                                
                            </div>

                            <div class="form-group">
                                <label for="">Mô tả</label>
                                <textarea name="desc" id="" rows="3" class="form-control"></textarea>
                                    <?php if(isset($_GET['descerr'])):?>
                                        <span class="text-danger err"><?= $_GET['descerr'] ?></span>
                                    <?php endif?>


                            </div>
                            <div class="justify-content-end">
                                <button type="submit" class="btn btn-sm btn-primary">Lưu</button>
                                <a href="<?= $baseUrl . "admin/category" ?>" class="btn btn-sm btn-danger">Hủy</a>
                            </div>
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
