<!-- <?php
  // session_start();
  // $data=$_SESSION['login'];
  // if($data['username']==null)
  //   header("Location: login.php");
  // $namePage="Trang quản lý HueMobile";
 ?> -->
<!DOCTYPE html>
<html lang="vi">
<head>
  <title>Trang chủ Admin</title>
  <?php include 'include/css_js_head.php'; ?>
</head>
<body>
	<!-- /Include Menu Head -->
  	<?php include 'include/header.php'; ?>

  	<div class="container-fluid">
      	<div class="row-fluid">
      	<!-- / Include menu -->
        	<?php include'include/menu_left.php'; ?>

        	<div class="span10">
        	<!-- / Include Form action -->
        		<?php include 'include/about.php'; ?>

        	</div><!--/span-->
      	</div><!--/row-->
      <hr>
      <!-- /Include Footer -->
  	<?php include 'include/footer.php'; ?>
</body>
</html>