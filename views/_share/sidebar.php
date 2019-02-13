<?php 
require_once $path.'../commons/utils.php';

$id = $_SESSION['login']['id'];
$sql = "select 
      * from users where id = '$id'";

$stmt = $conn->prepare($sql);
$stmt->execute();
$u = $stmt->fetch();

 ?>
<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">
    <!-- Sidebar user panel -->
    <div class="user-panel">
      <div class="pull-left image">
        <img src="<?= $siteUrl . $u['avatar'] ?>" class="img-circle" alt="User Image">
      </div>
      <div class="pull-left info">
        <div>
          <span class="hidden-xs"><?= $_SESSION['login']['email'] ?></span>
        </div>
        <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
      </div>
    </div>
    <!-- search form -->
    <!-- /.search form -->
    <!-- sidebar menu: : style can be found in sidebar.less -->
    <ul class="sidebar-menu" data-widget="tree">
      <li class="header">MAIN NAVIGATION</li>
      <li class="treeview">
        <a href="#">
          <i class="mục"></i> <span>Dashboard</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li class="">
            <a href="<?= $adminUrl ?>">
              <i class="fa fa-circle-o"></i> Trang quản trị
            </a>
          </li>
        </ul>
      </li>
      <li class="treeview">
        <a href="<?= $adminUrl ?>danh-muc">
          <i class="fa fa-list"></i> <span>Danh mục</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li class="">
            <a href="<?= $adminUrl ?>danh-muc">
              <i class="fa fa-circle-o"></i> Danh sách
            </a>
          </li>
          <li class="">
            <a href="<?= $adminUrl ?>danh-muc/add.php">
              <i class="fa fa-circle-o"></i> Thêm mới danh mục
            </a>
          </li>
        </ul>
      </li>
      <li class="treeview">
        <a href="">
          <i class="fa fa-cube"></i> <span>Sản phẩm</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li class="">
            <a href="<?= $adminUrl ?>san-pham">
              <i class="fa fa-circle-o"></i> Danh sách
            </a>
          </li>
          <li class="">
            <a href="<?= $adminUrl ?>san-pham/add.php">
              <i class="fa fa-circle-o"></i> Thêm mới sản phẩm
            </a>
          </li>
        </ul>
      </li>

      <li class="treeview">
        <a href="">
          <i class="fa fa-cube"></i> <span>Tin tức</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li class="">
            <a href="<?= $adminUrl ?>tin-tuc">
              <i class="fa fa-circle-o"></i> Danh sách
            </a>
          </li>
          <li class="">
            <a href="<?= $adminUrl ?>tin-tuc/add.php">
              <i class="fa fa-circle-o"></i> Thêm mới tin tức
            </a>
          </li>
        </ul>
      </li>
      <li class="treeview">
        <a href="">
          <i class="fa fa-cube"></i> <span>Hóa đơn</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li class="">
            <a href="<?= $adminUrl ?>cart">
              <i class="fa fa-circle-o"></i> Danh sách hóa đơn
            </a>
          </li>
        </ul>
      </li>


      <li class="treeview">
        <a href="#">
          <i class="fa fa-mail-forward"></i> <span>Phản hồi</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li class="">
            <a href="<?= $adminUrl ?>comment">
              <i class="fa fa-circle-o"></i> Danh sách
            </a>
          </li>
        </ul>
      </li>
      <li class="treeview">
        <a href="#">
          <i class="fa fa-newspaper-o"></i> <span>Liên hệ</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li class="">
            <a href="<?= $adminUrl ?>lien-he">
              <i class="fa fa-circle-o"></i> Danh sách
            </a>
          </li>
        </ul>
      </li>
      <li class="treeview">
        <a href="#">
          <i class="fa fa-users"></i> <span>Tài khoản</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li class="">
            <a href="<?= $adminUrl ?>tai-khoan">
              <i class="fa fa-list"></i> Danh sách
            </a>
          </li>
          <li class="">
            <a href="<?= $adminUrl ?>tai-khoan/add.php">
              <i class="fa fa-user-plus"></i> Tạo tài khoản
            </a>
          </li>
        </ul>
      </li>
      <li class="treeview">
        <a href="#">
          <i class="fa fa-gears"></i> <span>Hệ thống</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li class="">
            <a href="<?= $adminUrl ?>thong-tin/index.php">
              <i class="fa fa-eye"></i> Thông tin chung
            </a>
          </li>
          <li class="">
            <a href="<?= $adminUrl ?>slideshow">
              <i class="fa fa-file-image-o"></i> Slide shows
            </a>
          </li>
        </ul>
      </li>
    </ul>
  </section>
  <!-- /.sidebar -->
</aside>