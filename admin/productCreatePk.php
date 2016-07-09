<?php
require '../database.php';
if( !empty($_POST)){
	//keep track post values
	$name = $_POST['name'];
	$prices = $_POST['prices'];
	$idCategory = $_POST['idCategory'];
	$importDay = $_POST['importDay'];
	$conn = Database::connect();
	$sql = "INSERT INTO product (name, prices, idCategory, importDay) values('$name', '$prices', '$idCategory', '$importDay')";
	$conn->query($sql);
	$idprod = $conn->insert_id;

	// nội dung sản phẩm
	$content = $_POST['content'];

	$sql2 = "INSERT INTO `detailphukien`(`productId`, `content`) VALUES ('$idprod', '$content')";
	$conn->query($sql2);
	header("Location: productIndex.php");
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Thêm Phụ kiện mới</title>
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
        		<form class="form-horizontal" action="productCreatePk.php" method="post">
					<legend><h3 style="color:red">Thêm Phụ kiện mới</h3></legend>
					<div class="control-group">
						<label class="control-label">Tên phụ kiện</label>
						<div class="controls">
							<input name="name" required="required" type="text" placeholder="Nhập tên sản phẩm" value="<?php echo !empty($name)?$name:'';?>">
						</div>
					</div>

					<div class="control-group">
						<label class="control-label">Giá</label>
						<div class="controls">
							<input type="number" required="required" name="prices" placeholder="Nhập giá sản phẩm" value="<?php echo "000";//echo "!empty($prices)?$prices:''";?>"> <!-- thay bằng đuôi 000 cho tiện nhập liệu nhanh -->
						</div>
					</div>
					
					<div class="control-group">
						<label class="control-label">Chọn danh mục</label>
						<div class="controls">
							<select name="idCategory" required="required">
								<option value="" disabled="disabled" selected="selected" style="color:red; font-style:oblique">Chọn loại phụ kiện</option>
								<?php
								$conn = Database::connect();
								$sql = "SELECT * FROM category";
								$results = mysqli_query($conn, $sql);
								
								// var_dump($results); die; kiếm tra giá trị của biến

								if ($results->num_rows > 0) {
									// $d=0;
									while($row = $results->fetch_assoc()) {
										
										if($row['parentId']==11)
										{
											echo '<option value = "'.$row['id'].'">'.$row['name'].'</option>';
										}
										

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
							<!-- <input type="date" name="importDay" required="required" placeholder="Ngày nhập kho" value="<?php //echo !empty($importDay)?$importDay:'';?>" min="2016-06-15" min="2016-12-31" > --> <!-- kiểu chọn ngày cách cũ -->
							<input type="date" name="importDay" required="required" placeholder="Ngày nhập kho" value="<?php echo date("Y-m-d");?>" min="2016-06-15" min="2016-12-31" > <!-- kiểu lấy sẵn ngày tháng năm hiện tại thay vì phải click chọn -->
							<!-- <input type="text" name="importDay" required="required" placeholder="Ngày nhập kho" value="<?php //echo date("d-m-Y h:i:s A");?>" min="2016-06-15" min="2016-12-31" > --> <!-- lấy ngày tháng +giờ hiện tại thì dùng hàm này-->
						</div>
					</div>

					<div class="control-group">
						<label class="control-label">Nội dung mô tả</label>
						<div class="controls">
							<textarea name="content" style="height:200px;width:600px"></textarea>
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
	</div>
</body>
</html>