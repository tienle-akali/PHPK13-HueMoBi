<?php
	$id = null;
	if ( !empty($_GET['id'])) {
		$id = $_REQUEST['id'];
	}

	if ( $id==null ) {
		header("Location: categoryList.php");
	}
	require '../database.php';
	$conn = Database::connect();
	if(isset($_POST['btn_save'])){
		$id=$_POST['id'];
		$nameprod=$_POST['nameprod'];
		$typecategory=$_POST['typecategory'];
			$sql="UPDATE `category` SET `name` = '$nameprod', `parentId`='$typecategory' WHERE `id`='$id'";
			mysqli_query($conn,$sql);
			header("Location : categoryList.php");	

	}
	else{
		$results=Database::selectTable($conn,"category","id",$id);
		if($results!=null){
			$data2 = mysqli_fetch_array($results);
		}
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Cập nhật danh mục</title>
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
        		<form class="form-horizontal" action="categoryUpdate.php" method="POST">
	        		<legend><h3>Cập nhật danh mục: <?php echo $data2['name'] ?></h3></legend>
					<input type="hidden" name="id" value="<?php echo $data2['id']; ?>">
					<div class="control-group">
					    <label class="control-label">Tên Danh mục</label>
					    <div class="controls">
					      	<input name="nameprod" type="text" required="" placeholder="Input Name Category" value="<?php echo $data2['name']; ?>" >
					    </div>
					</div>
					<div class="control-group">
					    <label class="control-label">Kiểu danh mục</label>
					    <div class="controls">
					      	<select name="typecategory" required="">
					      		<option value="" disabled="disabled">Chọn danh mục</option>
					      		<option value="0">Danh mục gốc</option>
					      		<?php 
					      			$results=Database::selectTable($conn,"category","parentId", '0'); //chọn ra các danh mục gốc có parentId=0
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
					  <button type="submit" class="btn btn-success" name="btn_save">Cập nhật</button>
					  <a class="btn" href="categoryList.php">Trở lại</a>
					</div>
				</form>

        	</div><!--/span-->
      	</div><!--/row-->
      <hr>
      <!-- /Include Footer -->
  	<?php include 'include/footer.php'; ?>
</body>
</html>