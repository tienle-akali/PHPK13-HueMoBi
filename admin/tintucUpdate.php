<?php
	$id = null;
	if ( !empty($_GET['id'])) {
		$id = $_REQUEST['id'];
	}

	if ( $id==null ) {
		header("Location: tintucIndex.php");
	}
	require '../database.php';
	$conn = Database::connect();
	if(isset($_POST['btn_save'])){
		$id=$_POST['id'];
		$title=$_POST['title'];
		$content = $_POST['content'];
		$date = $_POST['date'];
		$author = $_POST['author'];
		$tag = $_POST['tag'];
		$idCategory=$_POST['typecategory'];
		
			$sql="UPDATE `tintuc` SET `title`='$title',`content`='$content',`date`='$date',`author`='$author',`tag`='$tag',`idCategory`='$idCategory' WHERE `id`='$id'";
			
			mysqli_query($conn,$sql);
			header("Location : tintucIndex.php");	

	}
	else{
		$results=Database::selectTable($conn,"tintuc","id",$id);
		if($results!=null){
			$data2 = mysqli_fetch_array($results);
		}
	}
?>
<!DOCTYPE html>
<html lang="vi">
<head>
	<title>Cập nhật tin tức</title>
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
        		<form class="form-horizontal" action="tintucUpdate.php" method="POST">
	        		<legend><h3 style="color:red">Cập nhật tin tức: <br><?php echo $data2['title']; ?></h3></legend>
					<input type="hidden" name="id" value="<?php echo $data2['id'];?>">
					<div class="control-group">
					    <label class="control-label">Tiêu đề tin tức</label>
					    <div class="controls">
					      	<input name="title" type="text" required="" placeholder="Nhập tiêu đề" value="<?php echo $data2['title']; ?>" >
					    </div>
					</div>
					<div class="control-group">
						<label class="control-label">Danh mục</label>
						<div class="controls">
						  	
						  	<select name="typecategory" required="">
						  		
						  		<?php
						    		
						    		$sql2 = "SELECT * FROM category WHERE parentId=13";
									$results2 = $conn->query($sql2);

									if ($results2->num_rows > 0) {
									    // output data of each row
									    while($row = $results2->fetch_assoc()) {
									    	if($row['id']==$data2['idCategory'])
									    	{
									    		echo '<option selected="" value="'.$row['id'].'">'.$row['name'].'</option>';
									    	}
									    	else{
									    		echo '<option value="'.$row['id'].'">'.$row['name'].'</option>';
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
					      	<input type="text" name="date" required="required" placeholder="Ngày xuất bản" value="<?php echo $data2['date'];?>" min="2016-06-15" min="2016-12-31" >
					      	<!-- lấy ngày tháng +giờ hiện tại thì dùng hàm này. Lưu ý tỏng bảng Database đặt kiểu cho trường date là kiểu TIMESTAMP để lưu đúng chuẩn -->
					    </div>
					</div>

					<div class="control-group">
					    <label class="control-label">Tác giả</label>
					    <div class="controls">
					      	<input name="author" type="text" required="rterterter" placeholder="Tác giả" value="<?php echo $data2['author'];?>">
					    </div>
					</div>

					<div class="control-group">
					    <label class="control-label">Thẻ tag</label>
					    <div class="controls">
					      	<input name="tag" type="text" required="rterterter" placeholder="Thẻ tag" value="<?php echo $data2['tag'];?>">
					    </div>
					</div>
					<div class="control-group">
					    <label class="control-label">Nội dung tin tức</label>
					    <div class="controls">
					      	<input name="content" type="text" style="height:300px;" required="rterterter" placeholder="Nội dung tin tức" value="<?php echo $data2['content'];?>">
					    </div>
					</div>



				  	<div class="form-actions">
					  <button type="submit" class="btn btn-success" name="btn_save">Cập nhật</button>
					  <a class="btn" href="tintucIndex.php">Trở lại</a>
					</div>
				</form>

        	</div><!--/span-->
      	</div><!--/row-->
      <hr>
      <!-- /Include Footer -->
  	<?php include 'include/footer.php'; ?>
</body>
</html>