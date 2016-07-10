<?php 
	require '../database.php';
	$id = 0;

	if ( !empty($_GET['id'])) {
		$id = $_REQUEST['id'];
	}
	$conn = Database::connect();
	$results=Database::selectTable($conn,"category","id",$id);
	if($results!=null)
	{
		$data=mysqli_fetch_array($results);
	}
	if ( !empty($_POST)) {
		// keep track post values
		$id = $_POST['id'];
		
		// delete data
		$sql = "DELETE FROM category WHERE id=$id";
			if(mysqli_query($conn,$sql)){
				
				header("Location: categoryList.php");
			}
			else
			{
				echo '<script language="javascript">';
				echo 'alert("Không thể xóa Hãng sản xuất: '.$data['name'].'  !")';
				echo '</script>';
			}
	
	}
?>
 
<!DOCTYPE html>
<html lang="vi">
<head>
	<title>Xóa danh mục</title>
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
  
				<form class="form-horizontal" action="categoryDelete.php" method="post">
					<legend><h3>Xóa danh mục</h3></legend>
				  	<input type="hidden" name="id" value="<?php echo $id;?>"/>
				  	<p class="alert alert-error">Bạn có chắc muốn xóa danh mục này?</p>
				  	<div class="form-actions">
					  <button type="submit" class="btn btn-danger">Có</button>
					  <a class="btn" href="categoryList.php">Không</a>
					</div>
				</form>
			</div>
		</div>
    </div> <!-- /container -->
    <hr>
      <!-- /Include Footer -->
  	<?php include 'include/footer.php'; ?>
  </body>
</html>