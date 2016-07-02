<?php
	require_once("../database.php");
	$conn=Database::connect();
	if(isset($_POST['btn_add']))
	{
		$name=$_POST['name'];
		$email=$_POST['email'];
		$phone=$_POST['phone'];
		$website=$_POST['website'];
		$avatar='../upload/producer/'.basename($_FILES['avatar']['name']);
		if(Database::selectTable($conn,"producer","name",$name)!=null)
		{
			echo '<script language="javascript">';
			echo 'alert("Hãng sản xuất đã tồn tại !")';
			echo '</script>';
		}
		else
		{
			if(move_uploaded_file($_FILES['avatar']['tmp_name'], $avatar))
			{
				$sql="INSERT INTO `producer`( `name`, `website`, `phone`, `email`, `avatar`) VALUES ('$name','$website','$phone','$email','$avatar')";
				mysqli_query($conn,$sql);
				// echo '<script language="javascript">';
				// echo 'alert("Hãng sản xuất: '.$name.' đã được tạo mới !")';
				// echo '</script>';
				header("Location: producerIndex.php");
			}
			else
			{
				echo '<script language="javascript">';
				echo 'alert("Lỗi upfile !")';
				echo '</script>';
			}
			
		}
	}
	
?>
<!DOCTYPE html>
<html lang="en">
<head>
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
        		<form class="form-horizontal" action="producerCreate.php" method="post" enctype="multipart/form-data">
			<legend><h3>Tạo mới Hãng sãn xuất</h3></legend>
			 <div style="float:left; width:300px">
			  <div class="control-group">
			    <label class="control-label">Tên Hãng sản xuất</label>
			    <div class="controls">
			      	<input name="name" type="text" required="" placeholder="Tên Hãng" value="<?php echo !empty($name)?$name:'';?>">
			    </div>
			  </div>
			  <div class="control-group">
			    <label class="control-label">Email</label>
			    <div class="controls">
			      	<input name="email" type="email" placeholder="Email Address" value="<?php echo !empty($email)?$email:'';?>">
			    </div>
			  </div>
			  <div class="control-group">
			    <label class="control-label">Số điện thoại</label>
			    <div class="controls">
			      	<input name="phone" type="text"  placeholder="Số điện thoại" value="<?php echo !empty($phone)?$phone:'';?>">
			    </div>
			  </div>
			  <div class="control-group">
			    <label class="control-label">Website</label>
			    <div class="controls">
			      	<input name="website" type="url"  placeholder="Nhập Website" value="<?php echo !empty($website)?$website:'';?>">
			    </div>
			  </div>
			  </div>
			  <div style="margin-left:450px;width:160px; height:200px">
				<div style="width:150px;height:150px; text-align:center"><img id="blah" alt="your image" width="128px" height="128px" class="img-polaroid" src="../assets/img/logocamera.png"/></div><br>
				<input type="file" accept="image/*" required="" name="avatar" onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])">
			  </div>
			  <div class="form-actions">
				  <button type="submit" class="btn btn-success" name="btn_add">Thêm mới</button>
				  <button type="reset" class="btn btn-success" name="btn_reset">Làm mới</button>
				  <a class="btn" href="producerList.php">Back</a>
				</div>
			</form>

        	</div><!--/span-->
      	</div><!--/row-->
      <hr>
      <!-- /Include Footer -->
  	<?php include 'include/footer.php'; ?>
</body>
</html>
