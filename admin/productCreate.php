<?php
require '../database.php';
if( !empty($_POST)){
	//keep track post values
	$name = $_POST['name'];
	$prices = $_POST['prices'];
	$idProducer = $_POST['idProducer'];
	$idCategory = $_POST['idCategory'];
	$importDay = $_POST['importDay'];
	

	//insert data
	$conn = Database::connect();
	$sql = "INSERT INTO product (name, prices, idProducer, idCategory, importDay) values('$name', '$prices', '$idProducer', '$idCategory', '$importDay')";
	$conn->query($sql);
	header("Location: productIndex.php");
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
	<title>Tạo mới sản phẩm</title>
	<meta charset="utf-8">
	<?php include 'include/css_js_head.php'; ?>
</head>
<body>
	<!-- /Include Menu Head -->
  	<?php include 'include/header.php'; ?>
	<!-- /Include Menu Head -->
	<div class="container-fluid">
		<div class="row-fluid">
		<!-- / Include menu -->
			<?php include'include/menu_left.php'; ?>
			<div class="span9">
        	<!-- / Include Form action -->
				<form class="form-horizontal" action="productCreate.php" method="post">
					<legend><h3>Create New Product</h3></legend>
					<div class="control-group">
						<label class="control-label">Tên sản phẩm</label>
						<div class="controls">
							<input name="name" required="required" type="text" placeholder="Nhập tên sản phẩm" value="<?php echo !empty($name)?$name:'';?>">
						</div>
					</div>

					<div class="control-group">
						<label class="control-label">Giá</label>
						<div class="controls">
							<input type="number" required="required" name="prices" placeholder="Nhập giá sản phẩm" value="<?php echo !empty($prices)?$prices:'';?>">
						</div>
					</div>

<!-- 
					<div class="control-group">
						<label class="control-label">Chọn nhà sản xuất</label>
						<div class="controls">
							<select name="idProducer" size = 1 >
								<?php 
									// $conn = Database::connect();
									// $sql = "SELECT * FROM producer";
									// $results = mysqli_query($conn, $sql);

									// if($results->num_rows > 0) {
									// 	while ($row = $results->fetch_assoc()) {
									// 		echo '<option value = '.$row['id'].'>'.$row['name'].'</option>';
									// 	}
									// }

								?>
							</select>
						</div>
					</div> -->
					
					<div class="control-group">
						<label class="control-label">Chọn danh mục</label>
						<div class="controls">
							<select name="idCategory" size = 1 >
								<?php
								$conn = Database::connect();
								$sql = "SELECT * FROM category";
								$results = mysqli_query($conn, $sql);
								
								// var_dump($results); die; kiếm tra giá trị của biến

								if ($results->num_rows > 0) {
									while($row = $results->fetch_assoc()) {
										echo '<option value = '.$row['id'].'>'.$row['name'].'</option>';

									}
								}
								
								Database::disconnect();
							
								?>
							</select>
							
						</div>
					</div>
					

					<div class="control-group">
						<label class="control-label">Ngày nhập kho</label>
						<div class="controls">
							<input type="date" name="importDay" required="required" placeholder="Ngày nhập kho" value="<?php echo !empty($importDay)?$importDay:'';?>" min="2016-06-15" min="2016-12-31" >
						</div>
					</div>

					
					<div class="form-actions">
						<button type="submit" class="btn btn-success">Tạo</button>
						<a class="btn" href="productIndex.php">Trở lại</a>
					</div>
				</form>
			</div><!-- span -->
		</div><!-- row -->
		<hr>
	      <!-- /Include Footer -->
	  	<?php include 'include/footer.php'; ?>
	</div> <!-- container -->

</body>
</html>

<!-- <input type="password" name="" value="" size="30" /> -->