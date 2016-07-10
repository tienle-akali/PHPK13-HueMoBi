<?php
	$id = null;
	if ( !empty($_GET['id'])) {
		$id = $_REQUEST['id'];
	}
	
	include '../database.php';
	$conn = Database::connect();

	if ( null==$id || !(is_numeric($id))) {
		header("Location: tintucIndex.php");
	} else {
		$sql = "SELECT * FROM tintuc WHERE id=$id";
		$results = mysqli_query($conn, $sql);
		if ($results->num_rows > 0) {
			$data2 = $results->fetch_array();
	}
}
	
?>
<!DOCTYPE html>
<html lang="vi">
<head>
	<title>Xem tin tức</title>
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
        		<form class="form-horizontal" action="tintucRead.php" method="POST">
	        		<legend><h3 style="color:red">Tin tức: <?php echo $data2['title']; ?></h3></legend>
					<input type="hidden" name="id" value="<?php echo $data2['id'];?>">
					<div class="control-group">
					    <label class="control-label">Tiêu đề tin tức</label>
					    <div class="controls">
					      	<label class="checkbox">
								<?php echo $data2['title']; ?>
							</label>
					    </div>
					</div>
					<div class="control-group">
						<label class="control-label">Danh mục</label>
						<div class="controls">
						  		<?php
						    		
						    		$sql2 = "SELECT * FROM category WHERE parentId=13";
									$results2 = $conn->query($sql2);

									if ($results2->num_rows > 0) {
									    // output data of each row
									    while($row = $results2->fetch_assoc()) {
									    	if($row['id']==$data2['idCategory'])
									    	{	
									    		echo '<label class="checkbox">'.$row['name'].'</label>';
									    		
									    	}
									    }
									} 
						    	?>
						  	</select>
						</div>
					</div>

					<div class="control-group">
					    <label class="control-label">Ngày xuất bản</label>
					    <div class="controls">
					    	<label class="checkbox">
								<?php echo $data2['date']; ?>
							</label>
					      	
					    </div>
					</div>

					<div class="control-group">
					    <label class="control-label">Tác giả</label>
					    <div class="controls">
					      	<label class="checkbox">
								<?php echo $data2['author']; ?>
							</label>
					    </div>
					</div>

					<div class="control-group">
					    <label class="control-label">Thẻ tag</label>
					    <div class="controls">
					      	<label class="checkbox">
								<?php echo $data2['tag']; ?>
							</label>
					    </div>
					</div>
					<div class="control-group">
					    <label class="control-label">Nội dung tin tức</label>
					    <div class="controls">
					      	<label class="checkbox">
								<?php echo $data2['content']; ?>
							</label>
					    </div>
					</div>



				  	<div class="form-actions">
					  <a class="btn btn-success" href="tintucUpdate.php?id=<?php echo $data2['id'];?>">Cập nhật</a>
					  <a class="btn" href="tintucIndex.php">Trở lại</a>
					</div>
				</form>

        	</div><!--/span-->
      	</div><!--/row-->
     </div>
      <hr>
      <!-- /Include Footer -->
  	<?php include 'include/footer.php'; ?>
</body>
</html>