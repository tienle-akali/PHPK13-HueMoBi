<?php
	$id = null;
	if ( !empty($_GET['id'])) {
		$id = $_REQUEST['id'];
	}

	if ( $id==null ) {
		header("Location: detailList.php");
	}
	require '../database.php';
	$conn = Database::connect();
	if(isset($_POST['btn_save'])){
		$id=$_POST['id'];
		$namedetail=$_POST['namedetail'];
		$typedetail=$_POST['typedetail'];
			$sql="UPDATE `detailproduct` SET `name` = '$namedetail', `parentId`='$typedetail' WHERE `id`='$id'";
			mysqli_query($conn,$sql);
			header("Location : detailList.php");	

	}
	else{
		$results=Database::selectTable($conn,"detailproduct","id",$id);
		if($results!=null){
			$data2 = mysqli_fetch_array($results);
		}
	}
?>
<!DOCTYPE html>
<html lang="vi">
<head>
	<meta charset="utf-8">
	<title>Cập nhật mô tả sản phẩm</title>
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
        		<form class="form-horizontal" action="detailUpdate.php" method="POST">
	        		<legend><h3>Update Detail: <?php echo $data2['name'] ?></h3></legend>
					<input type="hidden" name="id" value="<?php echo $data2['id']; ?>">
					<div class="control-group">
					    <label class="control-label">Name Detail</label>
					    <div class="controls">
					      	<input name="namedetail" type="text" required="" placeholder="Input Name Detail" value="<?php echo $data2['name']; ?>" >
					    </div>
					</div>
					<div class="control-group">
					    <label class="control-label">Type Detail</label>
					    <div class="controls">
					      	<select name="typedetail" required="">
					      		<option value="" disabled="disabled">Chọn kiểu mô tả</option>
					      		<option value="0">Original Category</option>
					      		<?php 
					      			$results=Database::selectTable($conn,"detailproduct","parentId", '0'); //sửa lỗi id ->parentId mới đúng 
					      			if($results!=null){
						      			while($row = $results->fetch_assoc()) {
						      				if($row['id']==$data2['parentId'])
						      				{
						      				echo '<option value="'.$row['id'].'" selected="selected">'.$row['name'].'</option>';
						      				} //lọc ra danh mục cha để hiển thị trong dropdown đầu tiên
						      				else {
						      					echo '<option value="'.$row['id'].'">'.$row['name'].'</option>';
						      				}
						      			}
					      			}
					      			Database::disconnect();
					      		?>
					      	</select>
					    </div>
					</div>
				  	<div class="form-actions">
					  <button type="submit" class="btn btn-success" name="btn_save">Save</button>
					  <a class="btn" href="detailList.php">Back</a>
					</div>
				</form>

        	</div><!--/span-->
      	</div><!--/row-->
      <hr>
      <!-- /Include Footer -->
  	<?php include 'include/footer.php'; ?>
</body>
</html>