<?php 
	include "../database.php";
	if(isset($_POST['btn_add']))
	{
		$conn=Database::connect();
		$name=$_POST['name'];
		$typedetail=$_POST['typedetail'];
		$content=$_POST['content'];
		
			$sql="INSERT INTO `detailproduct`(`name`, `parentId`, `content`) VALUES ('$name','$typedetail', '$content')";
			mysqli_query($conn,$sql);
			
			header("Location: detailCreate.php");
	
	}
	
 ?>
 <!DOCTYPE html>
<html lang="vi">
<head>
	<meta charset="utf-8">
	<title>Tạo mô tả sản phẩm</title>
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
        		<form class="form-horizontal" action="detailCreate.php" method="POST">
        			<legend><h3>Create New Detail</h3></legend>
					<div class="control-group">
					    <label class="control-label">Name Detail</label>
					    <div class="controls">
					      	<input name="name" type="text" required="rterterter" placeholder="Input Name Detail" value="<?php echo !empty($name)?$name:'';?>">
					    </div>
					</div>
					<div class="control-group">
						<label class="control-label">Type Detail</label>
						<div class="controls">
						  	<select name="typedetail" required="">
						  		<option value="" disabled="disabled" selected="selected">Chọn kiểu mô tả</option>
						  		<option value="0">Original Detail </option> <!-- thư mục gốc có idParent=0 -->
						  		<?php
						    		$conn=Database::connect();
						    		$sql = "SELECT * FROM detailproduct";
									$result = $conn->query($sql);

									if ($result->num_rows > 0) {
									    // output data of each row
									    while($row = $result->fetch_assoc()) {
									    	
									        echo "<option value='".$row['id']."'>";
									        echo $row['name'];
									        echo '</option>';
									    	
									    }
									} else {
									}
									Database::disconnect();
						    	?>
						  	</select>
						</div>
					</div>
					<div class="control-group">
					    <label class="control-label">Content </label>
					    <div class="controls">
					      	<input name="content" type="text" placeholder="Nhập nội dung mô tả" value="<?php echo !empty($content)?$content:'';?>">
					    </div>
					</div>
					<div class="form-actions">
						<button type="submit" class="btn btn-success" name="btn_add">Create</button>
						<a class="btn" href="detailList.php">Back</a>
					</div>
				
				</form>

        	</div><!--/span-->
      	</div><!--/row-->
    
    <hr>
      <!-- /Include Footer -->
  	<?php include 'include/footer.php'; ?>
  	</div>
</body>
</html>