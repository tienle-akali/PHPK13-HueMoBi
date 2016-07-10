<?php 
	include "../database.php";
	if(isset($_POST['btn_add']))
	{
		$conn = Database::connect();
		$title=$_POST['title'];
		$content = $_POST['content'];
		$date = $_POST['date'];
		$author = $_POST['author'];
		$tag = $_POST['tag'];
		$idCategory=$_POST['typecategory'];
		
		// if (Database::selectTable($conn,"category","name",$name)!=null) {
		// 	echo '<script language="javascript">';
		// 	echo 'alert("Danh mục : '.$name.' đã tồn tại !")';
		// 	echo '</script>';
		// }
		// else{
			//creat new category
			$sql="INSERT INTO `tintuc`(`title`, `content`, `date`, `author`, `tag`, `idCategory`) VALUES ('$title', '$content', '$date', '$author', '$tag', '$idCategory')";
			mysqli_query($conn,$sql);
			// Database::disconnect();
			// echo '<script language="javascript">';
			// echo 'alert("Danh mục : '.$name.' tạo mới thành công !")';
			// echo '</script>';
			header("Location: tintucCreate.php");
		// }

	}
	
 ?>
 <!DOCTYPE html>
<html lang="vi">
<head>
	<title>Tạo tin tức</title>
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
        		<form class="form-horizontal" action="tintucCreate.php" method="POST">
        			<legend><h3>Tạo tin tức mới</h3></legend>
					<div class="control-group">
					    <label class="control-label">Tiêu đề tin tức</label>
					    <div class="controls">
					      	<input name="title" type="text" required="rterterter" placeholder="Nhập tiêu đề" value="<?php echo !empty($title)?$title:'';?>">
					    </div>
					</div>

					<div class="control-group">
						<label class="control-label">Danh mục</label>
						<div class="controls">
						  	<select name="typecategory" required="">
						  		
						  		<?php
						    		$conn=Database::connect();
						    		$sql2 = "SELECT * FROM category WHERE parentId=13";
									$result = $conn->query($sql2);

									if ($result->num_rows > 0) {
									    // output data of each row
									    while($row = $result->fetch_assoc()) {
									    	
									    		echo '<option value="'.$row['id'].'">'.$row['name'].'</option>';
								
									    }
									} 
						    	?>
						  	</select>
						</div>
					</div>

					

					<div class="control-group">
					    <label class="control-label">Ngày xuất bản</label>
					    <div class="controls">
					      	<input type="text" name="date" required="required" placeholder="Ngày xuất bản" value="<?php echo date("Y-m-d h:i:s A");?>" min="2016-06-15" min="2016-12-31" >
					      	<!-- lấy ngày tháng +giờ hiện tại thì dùng hàm này. Lưu ý tỏng bảng Database đặt kiểu cho trường date là kiểu TIMESTAMP để lưu đúng chuẩn -->
					    </div>
					</div>

					<div class="control-group">
					    <label class="control-label">Tác giả</label>
					    <div class="controls">
					      	<input name="author" type="text" required="rterterter" placeholder="Tác giả" value="<?php echo !empty($author)?$author:'';?>">
					    </div>
					</div>

					<div class="control-group">
					    <label class="control-label">Thẻ tag</label>
					    <div class="controls">
					      	<input name="tag" type="text" required="rterterter" placeholder="Thẻ tag" value="<?php echo !empty($tag)?$tag:'';?>">
					    </div>
					</div>
					<div class="control-group">
					    <label class="control-label">Nội dung tin tức</label>
					    <div class="controls">
					      	<input name="content" type="text" style="height:300px;" required="rterterter" placeholder="Nội dung tin tức" value="<?php echo !empty($content)?$content:'';?>">
					    </div>
					</div>

					<div class="form-actions">
						<button type="submit" class="btn btn-success" name="btn_add">Tạo</button>
						<a class="btn" href="categoryList.php">Trở lại</a>
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