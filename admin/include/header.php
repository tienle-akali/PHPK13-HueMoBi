<?php
  session_start();
  $data=$_SESSION['login'];
  if($data['username']==null)
    header("Location: login.php");
  $namePage="Trang quản lý HueMobile";
?>

<!-- <?php
 // $id = null;
//if ( !empty($_GET['id'])) {
 // $id = $_REQUEST['id'];
//}

  //include '../database.php';
  //$conn=Database::connect();
  // $sql="SELECT user.id, user.username, user.fullName, user.beginDate, role.name, role.keyword FROM user INNER JOIN role ON user.role=role.id WHERE user.id='$id'";
  // $results = mysqli_query($conn, $sql);
  // if ($results->num_rows > 0) {
  //   $data = $results->fetch_array();
  // }

?> -->
<div class="navbar navbar-inverse navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container">
          <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="brand" href="index.php" style="color:violet;font-weight:bold;">Huế Mobile</a>
          <div class="nav-collapse collapse">
            <ul class="nav">
              <li class="active"><a href="index.php">Trang chủ</a></li>
              

              <li class="dropdown"> <!-- User -->
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">User <b class="caret"></b></a>
                <ul class="dropdown-menu">
                <li class="nav-header">Action</li>
                  <li><a href="userCreate.php"><i class="icon-plus"></i> Thêm Quản trị viên</a></li>
                  <li><a href="userIndex.php"><i class="icon-th-list"></i> Danh sách Quản trị viên</a></li>
                </ul>
              </li>

              <li class="dropdown"> <!-- category -->
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Danh mục <b class="caret"></b></a>
                <ul class="dropdown-menu">
                <li class="nav-header">Action</li>
                  <li><a href="categoryCreate.php"><i class="icon-plus"></i> Thêm danh mục</a></li>
                  <li><a href="categoryList.php"><i class="icon-th-list"></i> Danh sách danh mục</a></li>
                  
                </ul>
              </li>

              <li class="dropdown"> <!-- Product -->
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Sản phẩm <b class="caret"></b></a>
                <ul class="dropdown-menu">
                <li class="nav-header">Action</li>
                  <li><a href="productCreatePhone.php"><i class="icon-plus"></i> Thêm Điện thoại</a></li>
                  <li><a href="productCreateTablet.php"><i class="icon-plus"></i> Thêm Tablet</a></li>
                  <li><a href="productCreateLaptop.php"><i class="icon-plus"></i> Thêm Laptop</a></li>
                  <li><a href="productCreatePk.php"><i class="icon-plus"></i> Thêm Phụ kiện</a></li>
                  <li class="divider"></li>
                  <li><a href="productIndex.php"><i class="icon-th-list"></i> Danh sách Sản phẩm</a></li>
                  <!-- <li class="divider"></li>
                  <li><a href="#"><i class="i"></i> Manage Product</a></li> -->
                </ul>
              </li>

              <li class="dropdown"> <!-- producer -->
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Tin tức <b class="caret"></b></a>
                <ul class="dropdown-menu">
                <li class="nav-header">Action</li>
                  <li><a href="#"><i class="icon-plus"></i> Thêm tin tức</a></li>
                  <li><a href="#"><i class="icon-th-list"></i> Danh sách tin tức</a></li>
                  <li class="divider"></li>
                  <li><a href="#"><i class="i"></i> Quản lý tin tức</a></li>
                </ul>
              </li>

              <li class="dropdown"> <!-- producer -->
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Khác <b class="caret"></b></a>
                <ul class="dropdown-menu">
                <li class="nav-header">Action</li>
                  <li><a href="#"><i class="icon-plus"></i> Game app</a></li>
                  <li><a href="#"><i class="icon-plus"></i> Hỏi đáp </a></li>
                  <li><a href="#"><i class="icon-plus"></i> Khuyến mãi</a></li>
                </ul>
              </li>
             
              <li class="dropdown"> <!-- category -->
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Khách hàng <b class="caret"></b></a>
                <ul class="dropdown-menu">
                <li class="nav-header">Action</li>
                  <li><a href="#"><i class="icon-plus"></i> Kiểm tra thông tin</a></li>
                  <li class="divider"></li>
                  <li><a href="#"><i class="i"></i> Quản lý khách hàng</a></li>
                </ul>
              </li>
            </ul> <!-- end ul -->

            <p class="navbar-text pull-right">
              Đăng nhập như <a href="userRead.php" class="navbar-link" style="color:yellow;text-decoration:none;font-weight:bold;margin-left:5px;"><?php echo $data['username']." (".$data['name'].")" ?></a>

              <button class="btn btn-danger" style="margin-left: 40px; margin-top:0"><a href="logout.php" style="color:#fff;text-decoration:none;">Đăng xuất</a></button>
            </p>
            
          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>