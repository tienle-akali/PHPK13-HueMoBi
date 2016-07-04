<!DOCTYPE html>
<html lang="en">
<head>
  <?php include 'include/css_js_head.php'; ?>
</head>
<body>
	<!-- /Include Menu Head -->
  	<?php include 'include/header.php'; ?>

  	<div class="container-fluid">
      	<div class="row-fluid">
      	<!-- / Include menu -->
        	<?php include'include/menu_left.php'; ?>

        	<div class="span9">
        	<!-- / Include Form action -->
        	<form class="form-horizontal" action="detailproduct.php?id=<?php echo $data2['id'];?>" method="post">
            <legend><h3>Chi Tiết Sản Phẩm: <?php echo $data2['name']; ?></h3></legend>
            <div class="control-group">
              <label class="control-label">Màn hình</label>
              <div class="controls">
                <input name="name" type="text" value="<?php echo !empty($name)?$name:'';?>">
              </div>
              
            </div>
            
          </form>

        	</div><!--/span-->
      	</div><!--/row-->
      <hr>
      <!-- /Include Footer -->
  	<?php include 'include/footer.php'; ?>
</body>
</html>