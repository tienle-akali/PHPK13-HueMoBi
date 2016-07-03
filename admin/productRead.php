<?php
$id = null;
if( !empty($_GET['id'])){
	$id = $_REQUEST['id'];
}

include '../database.php';
$conn = Database::connect();	

if ( null==$id || !(is_numeric($id))) {
	header("Location: productRead.php");
} else {
	$sql = "SELECT * FROM product WHERE id=$id";
	$results = mysqli_query($conn, $sql);
	if ($results->num_rows > 0) {
		$data2 = $results->fetch_array();
	}
}
?>


<!DOCTYPE html>
<html lang="vi">
<head>
	<title>Xem sản phẩm</title>
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
				
			<div class="form-horizontal">
				<legend><h3><?php echo $data2['name'];?></h3></legend>
				<div class="control-group">
					<label class="control-label">Tên sản phẩm</label>
					<div class="controls">
						<label class="checkbox">
							<?php echo $data2['name'];?>
						</label>
					</div>
				</div>

				<div class="control-group">
					<label class="control-label">Giá</label>
					<div class="controls">
						<label class="checkbox">
							<?php echo $data2['prices']; ?>
						</label>
					</div>
				</div>

				<!-- <div class="control-group">
					<label class="control-label">Nhà sản xuất</label>
					<div class="controls">
						<label class="checkbox">
							<?php
							// Database::connect();
							// $sql = "SELECT * FROM producer";
							// $results = mysqli_query($conn, $sql);
							
							
							// // var_dump($results); die; kiếm tra giá trị của biến
							// if($results->num_rows > 0)
							// {	
							// 	while($row = $results->fetch_assoc())
							// 	{
							// 		if($row['id']==$data2['idProducer'])
							// 		{
							// 			echo $row['name'];	
							// 		}
								
							// 	}
							// }
						
							?>
						</label>
					</div>
				</div> -->

				<div class="control-group">
					<label class="control-label">Danh mục</label>
					<div class="controls">
						<label class="checkbox">
							<?php
							Database::connect();
							$sql = "SELECT * FROM category";
							$results = mysqli_query($conn, $sql);
							

							// var_dump($results); die; kiếm tra giá trị của biến
							
							if($results->num_rows > 0)
							{
								while($row = $results->fetch_assoc())
								{
									if($row['id']==$data2['idCategory'])
									{
										echo $row['name'];
									}
								}
							
							}
							

							?>
						</label>
					</div>
				</div>

				<div class="control-group">
					<label class="control-label">Ngày nhập kho</label>
					<div class="controls">
						<label class="checkbox">
							<?php echo $data2['importDay']; ?>
						</label>
					</div>
				</div>

				<div class="control-group controls"> <!-- trỏ đến trang cấu hình -->
					<a class="btn btn-danger" href="#">Chi tiết sản phẩm</a>
					<a class="btn btn-success" href="productUpdate.php?id='<?php echo $data2['id'];?>'">Cập nhật</a>
				</div>

				<div class="form-actions">
					<a class="btn" href="productIndex.php">Trở lại</a>
				</div>
			</div>
			
		</div>

	</div> <!-- container -->
</body>
</html>