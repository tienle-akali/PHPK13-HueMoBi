<?php
require '../database.php';
if( !empty($_POST)){
	//keep track post values
	$name = $_POST['name'];
	$prices = $_POST['prices'];
	$idCategory = $_POST['idCategory'];
	$importDay = $_POST['importDay'];
	$conn = Database::connect();
	//insert data phone
	$sql = "INSERT INTO product (name, prices, idCategory, importDay) values('$name', '$prices', '$idCategory', '$importDay')";
	$conn->query($sql);
	$idprod = $conn->insert_id; //lấy id của sản phẩm

	// thông số kĩ thuật
	$productId = $idprod;

	
	// màn hình
	$scr_tech = $_POST['scr_tech'];
	$scr_dpi = $_POST['scr_dpi'];
	$scr_width = $_POST['scr_width'];
	// camera
	$b_campixel = $_POST['b_campixel'];
	$b_camvideo = $_POST['b_camvideo'];
	$b_camfeature = $_POST['b_camfeature'];
	$f_campixel = $_POST['f_campixel'];
	// hệ điều hành
	$os_ver = $_POST['os_ver'];
	$chip_name = $_POST['chip_name'];
	$chip_clock = $_POST['chip_clock'];
	$chip_gpu = $_POST['chip_gpu'];
	$ram = $_POST['ram'];
	$rom_size = $_POST['rom_size'];
	$rom_enable = $_POST['rom_enable'];
	$sdcard = $_POST['sdcard'];
	$sdmax = $_POST['sdmax'];
	$sensor = $_POST['sensor'];
	//kết nối
	$sim_num = $_POST['sim_num'];
	$sim_type = $_POST['sim_type'];
	$calling = $_POST['calling'];
	$net_3g = $_POST['net_3g'];
	$net_4g = $_POST['net_4g'];
	$wifi = $_POST['wifi'];
	$bluetooth = $_POST['bluetooth'];
	$gps = $_POST['gps'];
	$port = $_POST['port'];
	$jack = $_POST['jack'];
	$otg = $_POST['otg'];
	$net_other = $_POST['net_other'];
	//chức năng đặc biệt
	$record = $_POST['record'];
	$radio = $_POST['radio'];
	$spec_feat = $_POST['spec_feat'];
	//thiết kế
	$matter = $_POST['matter'];
	$size = $_POST['size'];
	$weight = $_POST['weight'];
	//pin
	$pin_type = $_POST['pin_type'];
	$pin_size = $_POST['pin_size'];

	//insert data detailphone
	$sql2 = "INSERT INTO `detailtablet`(`productId`, `scr_tech`, `scr_dpi`, `scr_width`, `b_campixel`, `b_camvideo`, `b_camfeature`, `f_campixel`, `os_ver`, `chip_name`, `chip_clock`, `chip_gpu`, `ram`, `rom_size`, `rom_enable`, `sdcard`, `sdmax`, `sensor`, `sim_num`, `sim_type`, `calling`, `net_3g`, `net_4g`, `wifi`, `bluetooth`, `gps`, `port`, `jack`, `otg`, `net_other`, `record`, `radio`, `spec_feat`, `matter`, `size`, `weight`, `pin_type`, `pin_size`) VALUES ('$productId', '$scr_tech', '$scr_dpi', '$scr_width', '$b_campixel', '$b_camvideo', '$b_camfeature', '$f_campixel', '$os_ver', '$chip_name', '$chip_clock', '$chip_gpu', '$ram', '$rom_size', '$rom_enable', '$sdcard', '$sdmax', '$sensor', '$sim_num', '$sim_type',  '$calling', '$net_3g', '$net_4g', '$wifi', '$bluetooth', '$gps', '$port', '$jack', '$otg', '$net_other', '$record', '$radio', '$spec_feat', '$matter', '$size', '$weight', '$pin_type', '$pin_size')";

	
	$conn->query($sql2);
	header("Location: productIndex.php");
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
	<title>Thêm Tablet mới</title>
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
				<form class="form-horizontal" action="productCreateTablet.php" method="post">
					<legend><h3>Thêm Tablet mới</h3></legend>
					<div class="control-group">
						<label class="control-label">Tên sản phẩm</label>
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
							<select name="idCategory">
								<option value="" disabled="disabled" style="color:red; font-style:oblique">Danh mục chính</option>
								<?php
								$conn = Database::connect();
								$sql = "SELECT * FROM category";
								$results = mysqli_query($conn, $sql);
								
								// var_dump($results); die; kiếm tra giá trị của biến

								if ($results->num_rows > 0) {
									$d=0;
									while($row = $results->fetch_assoc()) {
										if($row['parentId']!=0&&$d<1)
										{
											$d++;
											echo '<option value="" disabled="disabled" style="color:red; font-style:oblique">Điện thoại</option>';
										}
										if($row['parentId']==9&&$d<2)
										{
											$d++;
											echo '<option value="" disabled="disabled" style="color:red; font-style:oblique">Laptop</option>';
										}
										if($row['parentId']==10&&$d<3)
										{
											$d++;
											echo '<option value="" disabled="disabled" style="color:red; font-style:oblique">Tablet</option>';
										}
										if($row['parentId']==11&&$d<4)
										{
											$d++;
											echo '<option value="" disabled="disabled" style="color:red; font-style:oblique">Phụ kiện</option>';
										}
										if($row['parentId']==12&&$d<5)
										{
											$d++;
											echo '<option value="" disabled="disabled" style="color:red; font-style:oblique">Sim thẻ</option>';
										}
										if($row['parentId']==13&&$d<6)
										{
											$d++;
											echo '<option value="" disabled="disabled" style="color:red; font-style:oblique">Tin tức</option>';
										}
										if($row['parentId']==14&&$d<7)
										{
											$d++;
											echo '<option value="" disabled="disabled" style="color:red; font-style:oblique">Game app</option>';
										}
										echo '<option value = "'.$row['id'].'">'.$row['name'].'</option>';

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
					
					<div class="control-group"><h2>Thông số kĩ thuật</h2></div>

					<div class="control-group">
						<h3>Màn hình</h3>
						<label class="control-label">Công nghệ màn hình</label>
						<div class="controls">
							<input type="text" name="scr_tech" placeholder="Công nghệ màn hình" value="<?php echo !empty($scr_tech)?$scr_tech:'';?>">
						</div>
						<label class="control-label">Độ phân giải</label>
						<div class="controls">
							<input type="text" name="scr_dpi" placeholder="Độ phân giải" value="<?php echo !empty($scr_dpi)?$scr_dpi:'';?>">
						</div>
						<label class="control-label">Kích thước màn hình</label>
						<div class="controls">
							<input type="text" name="scr_width" placeholder="Màn hình rộng" value="<?php echo !empty($scr_width)?$scr_width:'';?>">
						</div>
					</div>

					<div class="control-group">
						<h3>Chụp ảnh &amp; Quay phim</h3>
						<label class="control-label">Độ phân giải</label>
						<div class="controls">
							<input type="text" name="b_campixel" placeholder="Công nghệ màn hình" value="<?php echo !empty($b_campixel)?$b_campixel:'';?>">
						</div>
						<label class="control-label">Quay phim</label>
						<div class="controls">
							<input type="text" name="b_camvideo" placeholder="Độ phân giải" value="<?php echo !empty($b_camvideo)?$b_camvideo:'';?>">
						</div>
						<label class="control-label">Tính năng camera</label>
						<div class="controls">
							<input type="text" name="b_camfeature" placeholder="Màn hình rộng" value="<?php echo !empty($b_camfeature)?$b_camfeature:'';?>">
						</div>
						<label class="control-label">Camera trước</label>
						<div class="controls">
							<input type="text" name="f_campixel" placeholder="Công nghệ màn hình" value="<?php echo !empty($f_campixel)?$f_campixel:'';?>">
						</div>
					</div>

					<div class="control-group">
						<h3>Cấu hình</h3>
						<label class="control-label">Hệ điều hành</label>
						<div class="controls">
							<input type="text" name="os_ver" placeholder="Công nghệ màn hình" value="<?php echo !empty($os_ver)?$os_ver:'';?>">
						</div>
						<label class="control-label">Loại CPU (Chipset)</label>
						<div class="controls">
							<input type="text" name="chip_name" placeholder="Độ phân giải" value="<?php echo !empty($chip_name)?$chip_name:'';?>">
						</div>
						<label class="control-label">Tốc độ CPU</label>
						<div class="controls">
							<input type="text" name="chip_clock" placeholder="Màn hình rộng" value="<?php echo !empty($chip_clock)?$chip_clock:'';?>">
						</div>
						<label class="control-label">Chip đồ họa (GPU)</label>
						<div class="controls">
							<input type="text" name="chip_gpu" placeholder="Cảm ứng" value="<?php echo !empty($chip_gpu)?$chip_gpu:'';?>">
						</div>
						<label class="control-label">RAM</label>
						<div class="controls">
							<input type="text" name="ram" placeholder="Công nghệ màn hình" value="<?php echo !empty($ram)?$ram:'';?>">
						</div>
						<label class="control-label">Bộ nhớ trong (ROM)</label>
						<div class="controls">
							<input type="text" name="rom_size" placeholder="Độ phân giải" value="<?php echo !empty($rom_size)?$rom_size:'';?>">
						</div>
						<label class="control-label">Bộ nhớ khả dụng</label>
						<div class="controls">
							<input type="text" name="rom_enable" placeholder="Màn hình rộng" value="<?php echo !empty($rom_enable)?$rom_enable:'';?>">
						</div>
						<label class="control-label">Thẻ nhớ ngoài</label>
						<div class="controls">
							<input type="text" name="sdcard" placeholder="Cảm ứng" value="<?php echo !empty($sdcard)?$sdcard:'';?>">
						</div>
						<label class="control-label">Hỗ trợ thẻ tối đa</label>
						<div class="controls">
							<input type="text" name="sdmax" placeholder="Cảm ứng" value="<?php echo !empty($sdmax)?$sdmax:'';?>">
						</div>
						<label class="control-label">Cảm biến</label>
						<div class="controls">
							<input type="text" name="sensor" placeholder="Cảm ứng" value="<?php echo !empty($sensor)?$sensor:'';?>">
						</div>
					</div>
					
					<div class="control-group">
						<h3>Kết nối</h3>
						<label class="control-label">Số khe sim</label>
						<div class="controls">
							<input type="text" name="sim_num" placeholder="Độ phân giải" value="<?php echo !empty($sim_num)?$sim_num:'';?>">
						</div>
						<label class="control-label">Loại Sim</label>
						<div class="controls">
							<input type="text" name="sim_type" placeholder="Màn hình rộng" value="<?php echo !empty($sim_type)?$sim_type:'';?>">
						</div>
						<label class="control-label">Thực hiện cuộc gọi	</label>
						<div class="controls">
							<input type="text" name="calling" placeholder="Màn hình rộng" value="<?php echo !empty($calling)?$calling:'';?>">
						</div>
						<label class="control-label">Hỗ trợ 3G</label>
						<div class="controls">
							<input type="text" name="net_3g" placeholder="Công nghệ màn hình" value="<?php echo !empty($net_3g)?$net_3g:'';?>">
						</div>
						<label class="control-label">Hỗ trợ 4G</label>
						<div class="controls">
							<input type="text" name="net_4g" placeholder="Công nghệ màn hình" value="<?php echo !empty($net_4g)?$net_4g:'';?>">
						</div>
						
						<label class="control-label">Wifi</label>
						<div class="controls">
							<input type="text" name="wifi" placeholder="Cảm ứng" value="<?php echo !empty($wifi)?$wifi:'';?>">
						</div>
						<label class="control-label">Bluetooth</label>
						<div class="controls">
							<input type="text" name="bluetooth" placeholder="Màn hình rộng" value="<?php echo !empty($bluetooth)?$bluetooth:'';?>">
						</div>
						<label class="control-label">GPS</label>
						<div class="controls">
							<input type="text" name="gps" placeholder="Cảm ứng" value="<?php echo !empty($gps)?$gps:'';?>">
						</div>
						<label class="control-label">Cổng kết nối/sạc</label>
						<div class="controls">
							<input type="text" name="port" placeholder="Cảm ứng" value="<?php echo !empty($port)?$port:'';?>">
						</div>
						<label class="control-label">Jack tai nghe</label>
						<div class="controls">
							<input type="text" name="jack" placeholder="Cảm ứng" value="<?php echo !empty($jack)?$jack:'';?>">
						</div>
						<label class="control-label">Hỗ trợ OTG</label>
						<div class="controls">
							<input type="text" name="otg" placeholder="Cảm ứng" value="<?php echo !empty($otg)?$otg:'';?>">
						</div>
						<label class="control-label">Kết nối khác</label>
						<div class="controls">
							<input type="text" name="net_other" placeholder="Màn hình rộng" value="<?php echo !empty($net_other)?$net_other:'';?>">
						</div>
					</div>
					<div class="control-group">
						<h3>Chức năng khác</h3>
						<label class="control-label">Ghi âm</label>
						<div class="controls">
							<input type="text" name="record" placeholder="Công nghệ màn hình" value="<?php echo !empty($record)?$record:'';?>">
						</div>
						<label class="control-label">Radio</label>
						<div class="controls">
							<input type="text" name="radio" placeholder="Độ phân giải" value="<?php echo !empty($radio)?$radio:'';?>">
						</div>
						<label class="control-label">Tính năng đặc biệt</label>
						<div class="controls">
							<input type="text" name="spec_feat" placeholder="Màn hình rộng" value="<?php echo !empty($spec_feat)?$spec_feat:'';?>">
						</div>
					</div>

					<div class="control-group">
						<h3>Thiết kế &amp; Trọng lượng</h3>
						<label class="control-label">Chất liệu</label>
						<div class="controls">
							<input type="text" name="matter" placeholder="Độ phân giải" value="<?php echo !empty($matter)?$matter:'';?>">
						</div>
						<label class="control-label">Kích thước</label>
						<div class="controls">
							<input type="text" name="size" placeholder="Màn hình rộng" value="<?php echo !empty($size)?$size:'';?>">
						</div>
						<label class="control-label">Trọng lượng</label>
						<div class="controls">
							<input type="text" name="weight" placeholder="Cảm ứng" value="<?php echo !empty($weight)?$weight:'';?>">
						</div>
					</div>
					<div class="control-group">
						<h3>Thông tin pin</h3>
						<label class="control-label">Loại pin</label>
						<div class="controls">
							<input type="text" name="pin_type" placeholder="Độ phân giải" value="<?php echo !empty($pin_type)?$pin_type:'';?>">
						</div>
						<label class="control-label">Dung lượng pin</label>
						<div class="controls">
							<input type="text" name="pin_size" placeholder="Công nghệ màn hình" value="<?php echo !empty($pin_size)?$pin_size:'';?>">
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

</body>
</html>

<!-- <input type="password" name="" value="" size="30" /> -->