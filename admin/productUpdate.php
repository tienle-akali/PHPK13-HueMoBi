<?php

	$id = null;

	if( !empty($_GET['id']))
	{
		$id = $_REQUEST['id'];
	}

	if( null==$id){
		header("Location: productIndex.php");
	}

	require '../database.php';
	$conn = Database::connect();

	if($_SERVER["REQUEST_METHOD"] == "POST")
	{	
		$id = $_POST['id'];
		$nameprod = $_POST['nameprod'];
		$prices = $_POST['prices'];
		$idProducer = $_POST['idProducer'];
		$idCategory = $_POST['idCategory'];
		$importDay = $_POST['importDay'];

		
		$sql = "UPDATE `product` SET `name`='$nameprod', `prices`='$prices', `idProducer`='$idProducer', `idCategory`='$idCategory', `importDay`='$importDay' WHERE `id`='$id'";
		mysqli_query($conn,$sql);
		header("Location: productIndex.php");
	} else {
		$sql = "SELECT * FROM product WHERE id=$id";
		$results = mysqli_query($conn, $sql);

		if($results->num_rows > 0)
		{
			$data2 = $results->fetch_array();
		}

	}

?>


<!DOCTYPE html>
<html lang = "en">
<head>
	<title>Cập nhật sản phẩm</title>
	<meta charset = "utf-8">
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
					
				<form class="form-horizontal" action="productUpdate.php?id=<?php echo $data2['id'];?>" method="post">
				
					<legend><h3>Update Product: <?php echo $data2['name']; ?></h3></legend>
					<div class="control-group">
						<label class="control-label">Tên sản phẩm</label>
						<div class="controls">
							<input type="text" name="nameprod" placeholder="Nhập tên sản phẩm" value="<?php echo $data2['name'];?>">
						</div>
					</div>

					<div class="control-group">
						<label class="control-label">Giá</label>
						<div class="controls">
							<input type="number" name="prices" placeholder="Nhập giá sản phẩm" value="<?php echo $data2['prices'];?>">
						</div>
					</div>

					<!-- <div class="control-group">
						<label class="control-label">Nhà sản xuất</label>
						<div class="controls">
							<select name="idProducer">
							<?php
							
							// $sql = "SELECT * FROM producer";
							// $results = mysqli_query($conn, $sql);

							// // var_dump($results); die;
							// if ($results->num_rows>0) {
							// 	while ($row = $results->fetch_assoc()) {
							// 		if($row['idProducer']==$data2['idProducer'])
							// 		{
							// 			echo '<option value ="'.$row['id'].'" selected="selected">'.$row['name'].'</option>';
							// 		}
							// 		echo '<option value ="'.$row['id'].'">'.$row['name'].'</option>';
							// 	}
							// }
							?>
							</select>
						</div>
					</div> -->

					<div class="control-group">
						<label class="control-label">Danh mục</label>
						<div class="controls">
							<select name="idCategory">
							<?php
							$sql = "SELECT * FROM category";
							$results = mysqli_query($conn, $sql);

							if($results->num_rows > 0)
							{
								while ($row = $results->fetch_assoc()) {
									echo '<option value = '.$row['id'].'>'.$row['name'].'</option>';
								}
							}
							
							?>
							</select>
						</div>
					</div>

					<div class="control-group">
						<label class="control-label">Ngày nhập kho</label>
						<div class="controls">
							<input type="date" name="importDay" placeholder="Nhập ngày tháng năm" value="<?php echo $data2['importDay'];?>">
						</div>
					</div>

					<div class="form-actions">
						<button type="submit" class="btn btn-success">Cập nhật</button>
						<a class="btn" href="productIndex.php">Trở lại</a>
					</div>

				</form>

			</div>


		</div>
	</div><!-- container -->


</body>

</html>