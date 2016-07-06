<?php
require '../database.php';
	$id = 0;

	if( !empty($_GET['id']))
	{
		$id = $_REQUEST['id'];
	}

	$conn = Database::connect();
	$results=Database::selectTable($conn,"product","id",$id);
	if($results!=null)
	{
		$data=mysqli_fetch_array($results);
	}
if( !empty($_POST))
{
	$id = $_POST['id'];
	//delete data
	
	$sql = "DELETE FROM product WHERE id=$id";
	if(mysqli_query($conn,$sql))
	{
		header("Location: productIndex.php");
	}
	
}
?>

<!DOCTYPE html>
<html lang = "vi">
<head>
	<title>Xóa sản phẩm</title>
	<meta charset="utf-8">
    <?php include 'include/css_js_head.php'; ?>
</head>

<body>
	<?php include 'include/header.php'; ?>
    <div class="container-fluid">
		<div class="row-fluid">
		<!-- / Include menu -->
			<?php include'include/menu_left.php'; ?>

			<div class="span9">
			<!-- / Include Form action -->

				<form class="form-horizontal" action="productDelete.php" method="post">
					<legend><h3>Xóa sản phẩm: </h3></legend>
					<input type="hidden" name="id" value="<?php echo $id;?>">
					<p class="alert alert-error">Bạn có chắc muốn xóa sản phẩm này?</p>
					<div class="form-actions">
						<button type="submit" class="btn btn-danger">Có</button>
						<a class="btn" href="productIndex.php">Không</a>
					</div>
				</form>
			</div>
		</div>
		
	</div> <!-- container -->
	<hr>
      <!-- /Include Footer -->
  	<?php include 'include/footer.php'; ?>
</body>
</html>