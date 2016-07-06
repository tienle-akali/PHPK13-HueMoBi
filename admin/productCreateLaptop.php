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

	//cpu
	$cpu_prod = $_POST['cpu_prod'];
	$cpu_tech = $_POST['cpu_tech'];
	$cpu_type = $_POST['cpu_type'];
	$cpu_clock = $_POST['cpu_clock'];
	$cpu_cache = $_POST['cpu_cache'];
	$cpu_max = $_POST['cpu_max'];
	//board
	$board_chip = $_POST['board_chip'];
	$board_bus = $_POST['board_bus'];
	$board_ram_max = $_POST['board_ram_max'];
	//ram
	$ram_size = $_POST['ram_size'];
	$ram_type = $_POST['ram_type'];
	$ram_bus = $_POST['ram_bus'];
	//disk
	$disk_type = $_POST['disk_type'];
	$disk_size = $_POST['disk_size'];
	// màn hình
	$scr_width = $_POST['scr_width'];
	$scr_dpi = $_POST['scr_dpi'];
	$scr_tech = $_POST['scr_tech'];
	$scr_touch = $_POST['scr_touch'];
	// gpu
	$gpu_chip = $_POST['gpu_chip'];
	$gpu_memory = $_POST['gpu_memory'];
	$gpu_style = $_POST['gpu_style'];
	//sound
	$sound_channel = $_POST['sound_channel'];
	$sound_other = $_POST['sound_other'];
	//optical disk
	$optical_disk = $_POST['optical_disk'];
	$optical_type = $_POST['optical_type'];
	//port
	$port = $_POST['port'];
	$ext_feat = $_POST['ext_feat'];
	$lan = $_POST['lan'];
	$wifi_stand = $_POST['wifi_stand'];
	$wire_other = $_POST['wire_other'];
	//card
	$card_read = $_POST['card_read'];
	$card_slot = $_POST['card_slot'];
	//webcam
	$cam_pixel = $_POST['cam_pixel'];
	$cam_info = $_POST['cam_info'];
	//pin
	$pin_info = $_POST['pin_info'];
	//os
	$os_ver = $_POST['os_ver'];
	$soft = $_POST['soft'];
	//size
	$size = $_POST['size'];
	$weight = $_POST['weight'];
	$matter = $_POST['matter'];

	//insert data detailphone
	$sql2 = "INSERT INTO `detaillaptop`(`productId`, `cpu_prod`, `cpu_tech`, `cpu_type`, `cpu_clock`, `cpu_cache`, `cpu_max`, `board_chip`, `board_bus`, `board_ram_max`, `ram_size`, `ram_type`, `ram_bus`, `disk_type`, `disk_size`, `scr_width`, `scr_dpi`, `scr_tech`, `scr_touch`, `gpu_chip`, `gpu_memory`, `gpu_style`, `sound_channel`, `sound_other`, `optical_disk`, `optical_type`, `port`, `ext_feat`, `lan`, `wifi_stand`, `wire_other`, `card_read`, `card_slot`, `cam_pixel`, `cam_info`, `pin_info`, `os_ver`, `soft`, `size`, `weight`, `matter`) VALUES ('$productId', '$cpu_prod', '$cpu_tech', '$cpu_type', '$cpu_clock', '$cpu_cache', '$cpu_max', '$board_chip', '$board_bus', '$board_ram_max', '$ram_size', '$ram_type', '$ram_bus', '$disk_type', '$disk_size', '$scr_width', '$scr_dpi', '$scr_tech', '$scr_touch', '$gpu_chip', '$gpu_memory', '$gpu_style', '$sound_channel', '$sound_other', '$optical_disk', '$optical_type', '$port', '$ext_feat', '$lan', '$wifi_stand', '$wire_other', '$card_read', '$card_slot', '$cam_pixel', '$cam_info', '$pin_info', '$os_ver', '$soft', '$size', '$weight', '$matter')";

	
	$conn->query($sql2);
	header("Location: productIndex.php");
}

?>


<!DOCTYPE html>
<html lang="vi">
<head>
	<title>Thêm Laptop mới</title>
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
				<form class="form-horizontal" action="productCreateLaptop.php" method="post">
					<legend><h3 style="color:red">Thêm Laptop mới</h3></legend>
					<div class="control-group">
						<label class="control-label">Tên Laptop</label>
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
								<option value="" disabled="disabled" selected="selected" style="color:red; font-style:oblique">Chọn hãng Laptop</option>
								<?php
								$conn = Database::connect();
								$sql = "SELECT * FROM category";
								$results = mysqli_query($conn, $sql);
								
								// var_dump($results); die; kiếm tra giá trị của biến

								if ($results->num_rows > 0) {
									$d=0;
									while($row = $results->fetch_assoc()) {
										// if($row['parentId']!=0&&$d<1)
										// {
										// 	$d++;
										// 	echo '<option value="" disabled="disabled" style="color:red; font-style:oblique">Điện thoại</option>';
										// }
										// if($row['parentId']==9&&$d<2)
										// {
										// 	$d++;
										// 	echo '<option value="" disabled="disabled" style="color:red; font-style:oblique">Laptop</option>';
										// }
										// if($row['parentId']==10&&$d<3)
										// {
										// 	$d++;
										// 	echo '<option value="" disabled="disabled" style="color:red; font-style:oblique">Tablet</option>';
										// }
										// if($row['parentId']==11&&$d<4)
										// {
										// 	$d++;
										// 	echo '<option value="" disabled="disabled" style="color:red; font-style:oblique">Phụ kiện</option>';
										// }
										// if($row['parentId']==12&&$d<5)
										// {
										// 	$d++;
										// 	echo '<option value="" disabled="disabled" style="color:red; font-style:oblique">Sim thẻ</option>';
										// }
										// if($row['parentId']==13&&$d<6)
										// {
										// 	$d++;
										// 	echo '<option value="" disabled="disabled" style="color:red; font-style:oblique">Tin tức</option>';
										// }
										// if($row['parentId']==14&&$d<7)
										// {
										// 	$d++;
										// 	echo '<option value="" disabled="disabled" style="color:red; font-style:oblique">Game app</option>';
										// }
										if($row['parentId']==9)
										{
											echo '<option value = "'.$row['id'].'">'.$row['name'].'</option>';
										}
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
					
					<div class="control-group"><h3 style="color:blue">Thông số kĩ thuật</h3></div>
					
					<div class="control-group">
						<h4>Bộ xử lý</h4>
						<label class="control-label">Hãng CPU</label>
						<div class="controls">
							<input type="text" name="cpu_prod" placeholder="Hãng CPU" value="<?php echo !empty($cpu_prod)?$cpu_prod:'';?>">
						</div>
						<label class="control-label">Công nghệ CPU</label>
						<div class="controls">
							<input type="text" name="cpu_tech" placeholder="Công nghệ CPU" value="<?php echo !empty($cpu_tech)?$cpu_tech:'';?>">
						</div>
						<label class="control-label">Loại CPU</label>
						<div class="controls">
							<input type="text" name="cpu_type" placeholder="Hãng CPU" value="<?php echo !empty($cpu_type)?$cpu_type:'';?>">
						</div>
						<label class="control-label">Tốc độ CPU</label>
						<div class="controls">
							<input type="text" name="cpu_clock" placeholder="Hãng CPU" value=" Ghz">
						</div>
						<label class="control-label">Bộ nhớ đệm</label>
						<div class="controls">
							<input type="text" name="cpu_cache" placeholder="Hãng CPU" value="<?php echo !empty($cpu_cache)?$cpu_cache:'';?>">
						</div>
						<label class="control-label">Tốc độ tối đa</label>
						<div class="controls">
							<input type="text" name="cpu_max" placeholder="Hãng CPU" value="Không">
						</div>
						
					</div>

					<div class="control-group">
						<h4>Bo mạch</h4>
						<label class="control-label">Chipset</label>
						<div class="controls">
							<input type="text" name="board_chip" placeholder="Chipset" value="<?php echo !empty($board_chip)?$board_chip:'';?>">
						</div>
						<label class="control-label">Tốc độ Bus</label>
						<div class="controls">
							<select name="board_bus">
								<option value="1333MHz">1333MHz</option>
								<option value="1600MHz">1600MHz</option>
							</select>
							<!-- <input type="text" name="board_bus" placeholder="Tốc độ Bus" value="<?php //echo !empty($board_bus)?$board_bus:'';?>"> -->
						</div>
						<label class="control-label">Hỗ trợ RAM tối đa</label>
						<div class="controls">
							<select name="board_ram_max">
								<option value="Không">Không</option>
								<option value="2 GB">2 GB</option>
								<option value="4 GB">4 GB</option>
								<option value="8 GB">8 GB</option>
							</select>
							<!-- <input type="text" name="board_ram_max" placeholder="Hỗ trợ RAM tối đa" value="<?php //echo !empty($board_ram_max)?$board_ram_max:'';?>"> -->
						</div>
					</div>

					<div class="control-group">
						<h4>Bộ nhớ</h4>
						<label class="control-label">RAM</label>
						<div class="controls">
							<input type="text" name="ram_size" placeholder="Chipset" value=" GB">
						</div>
						<label class="control-label">Loại RAM</label>
						<div class="controls">
							<input type="text" name="ram_type" placeholder="Tốc độ Bus" value="<?php echo !empty($ram_type)?$ram_type:'';?>">
						</div>
						<label class="control-label">Tốc độ Bus</label>
						<div class="controls">
							<select name="ram_bus">
								<option value="1333MHz">1333MHz</option>
								<option value="1600MHz">1600MHz</option>
							</select>
							<!-- <input type="text" name="ram_bus" placeholder="Hỗ trợ RAM tối đa" value="<?php //echo !empty($ram_bus)?$ram_bus:'';?>"> -->
						</div>
					</div>

					<div class="control-group">
						<h4>Đĩa cứng</h4>
						<label class="control-label">Loại ổ đĩa</label>
						<div class="controls">
							<select name="disk_type">
								<option value="eMMC">eMMC</option>
								<option value="HDD">HDD</option>
								<option value="SSD">SSD</option>
							</select>
							<!-- <input type="text" name="disk_type" placeholder="Chipset" value="<?php //echo !empty($disk_type)?$disk_type:'';?>"> -->
						</div>
						<label class="control-label">Ổ cứng</label>
						<div class="controls">
							<select name="disk_size">
								<option value="128 GB">128 GB</option>
								<option value="256 GB">256 GB</option>
								<option value="500 GB">500 GB</option>
								<option value="750 GB">750 GB</option>
								<option value="1 TB">1 TB</option>
							</select>
							<!-- <input type="text" name="disk_size" placeholder="Tốc độ Bus" value="<?php //echo !empty($disk_size)?$disk_size:'';?>"> -->
						</div>
					</div>

					<div class="control-group">
						<h4>Màn hình</h4>
						<label class="control-label">Kích thước màn hình</label>
						<div class="controls">
							<select name="scr_width">
								<option value="11.6 inch">11.6 inch</option>
								<option value="13.3 inch">13.3 inch</option>
								<option value="14 inch">14 inch</option>
								<option value="15.6 inch">15.6 inch</option>
							</select>
							<!-- <input type="text" name="scr_width" placeholder="Màn hình rộng" value="<?php //echo !empty($scr_width)?$scr_width:'';?>"> -->
						</div>
						<label class="control-label">Độ phân giải (W x H)</label>
						<div class="controls">
							<select name="scr_dpi">
								<option value="HD (1280 x 720 pixels)">HD (1280 x 720 pixels)</option>
								<option value="HD (1366 x 768 pixels)">HD (1366 x 768 pixels)</option>
								<option value="Full HD (1920 x 1080 pixels)">Full HD (1920 x 1080 pixels)</option>
								<option value="2K (2560 x 1440 pixels)">2K (2560 x 1440 pixels)</option>
							</select>
							<!-- <input type="text" name="scr_dpi" placeholder="Độ phân giải" value="<?php //echo !empty($scr_dpi)?$scr_dpi:'';?>"> -->
						</div>
						<label class="control-label">Công nghệ MH</label>
						<div class="controls">
							<input type="text" name="scr_tech" placeholder="Công nghệ màn hình" value="<?php echo !empty($scr_tech)?$scr_tech:'';?>">
						</div>
						<label class="control-label">Màn hình cảm ứng</label>
						<div class="controls">
							<input type="text" name="scr_touch" placeholder="Công nghệ màn hình" value="<?php echo !empty($scr_touch)?$scr_touch:'';?>">
						</div>
					</div>

					<div class="control-group">
						<h4>Đồ họa</h4>
						<label class="control-label">Chipset đồ họa</label>
						<div class="controls">
							<input type="text" name="gpu_chip" placeholder="Công nghệ màn hình" value="<?php echo !empty($gpu_chip)?$gpu_chip:'';?>">
						</div>
						<label class="control-label">Bộ nhớ đồ họa</label>
						<div class="controls">
							<select name="gpu_memory">
								<option value="Share (Dùng chung bộ nhớ với RAM)">Share (Dùng chung bộ nhớ với RAM)</option>
								<option value="1GB">1GB</option>
								<option value="2GB">2GB</option>
								<option value="3GB">3GB</option>
								<option value="4GB">4GB</option>
								<option value="8GB">8GB</option>
							</select>
							<!-- <input type="text" name="gpu_memory" placeholder="Độ phân giải" value="<?php //echo !empty($gpu_memory)?$gpu_memory:'';?>"> -->
						</div>
						<label class="control-label">Thiết kế card</label>
						<div class="controls">
							<select name="gpu_style">
								<option value="Card đồ họa tích hợp">Card đồ họa tích hợp</option>
								<option value="Card đồ họa rời">Card đồ họa rời</option>
							</select>
							<!-- <input type="text" name="gpu_style" placeholder="Màn hình rộng" value="<?php //echo !empty($gpu_style)?$gpu_style:'';?>"> -->
						</div>
					</div>

					<div class="control-group">
						<h4>Âm thanh</h4>
						<label class="control-label">Kênh âm thanh</label>
						<div class="controls">
							<select name="sound_channel">
								<option value="2.0">2.0</option>
								<option value="5.1">5.1</option>
								<option value="Stereo">Stereo</option>
							</select>
							<!-- <input type="text" name="sound_channel" placeholder="Công nghệ màn hình" value="<?php //echo !empty($sound_channel)?$sound_channel:'';?>"> -->
						</div>
						<label class="control-label">Thông tin thêm	</label>
						<div class="controls">
							<input type="text" name="sound_other" placeholder="Độ phân giải" value="Combo Microphone &amp; Headphone">
						</div>
					</div>

					<div class="control-group">
						<h4>Đĩa quang</h4>
						<label class="control-label">Có sẵn Đĩa Quang</label>
						<div class="controls">
							<select name="optical_disk">
								<option value="Có">Có</option>
								<option value="Không">Không</option>
							</select>
							<!-- <input type="text" name="optical_disk" placeholder="Công nghệ màn hình" value="<?php //echo !empty($optical_disk)?$optical_disk:'';?>"> -->
						</div>
						<label class="control-label">Loại đĩa quang</label>
						<div class="controls">
							<select name="optical_type">
								<option value="Không">Không</option>
								<option value="DVD Super Multi Double Layer">DVD Super Multi Double Layer</option>
							</select>
							<!-- <input type="text" name="optical_type" placeholder="Độ phân giải" value="<?php //echo !empty($optical_type)?$optical_type:'';?>"> -->
						</div>
					</div>

					<div class="control-group">
						<h4>Tính năng mở rộng &amp; cổng giao tiếp</h4>
						<label class="control-label">Cổng giao tiếp</label>
						<div class="controls">
							<input type="text" name="port" placeholder="Công nghệ màn hình" value="USB 2.0, HDMI, LAN (RJ45), USB 3.0, VGA (D-Sub)">
						</div>
						<label class="control-label">Tính năng mở rộng</label>
						<div class="controls">
							<input type="text" name="ext_feat" placeholder="Độ phân giải" value="<?php echo !empty($ext_feat)?$ext_feat:'';?>">
						</div>
					</div>

					<div class="control-group">
						<h4>Giao tiếp mạng</h4>
						<label class="control-label">LAN</label>
						<div class="controls">
							<input type="text" name="lan" placeholder="Công nghệ màn hình" value="10/100/1000 Mbps Ethernet LAN (RJ-45 connector)">
						</div>
						<label class="control-label">Chuẩn WiFi</label>
						<div class="controls">
							<input type="text" name="wifi_stand" placeholder="Độ phân giải" value="802.11b/g/n/ac">
						</div>
						<label class="control-label">Kết nối không dây khác</label>
						<div class="controls">
							<input type="text" name="wire_other" placeholder="Độ phân giải" value="Bluetooth">
						</div>
					</div>

					<div class="control-group">
						<h4>Card Reader</h4>
						<label class="control-label">Đọc thẻ nhớ</label>
						<div class="controls">
							<select name="card_read">
								<option value="Có">Có</option>
								<option value="Không">Không</option>
							</select>
							<!-- <input type="text" name="card_read" placeholder="Công nghệ màn hình" value="<?php //echo !empty($card_read)?$card_read:'';?>"> -->
						</div>
						<label class="control-label">Khe đọc thẻ nhớ</label>
						<div class="controls">
							<input type="text" name="card_slot" placeholder="Độ phân giải" value="Không, Micro SD, MMC, SD, SDHC, SDXC">
						</div>
					</div>

					<div class="control-group">
						<h4>Webcam</h4>
						<label class="control-label">Độ phân giải WC</label>
						<div class="controls">
							<select name="cam_pixel">
								<option value="0.3 MP">0.3 MP</option>
								<option value="0.9 MP">0.9 MP</option>
								<option value="1.3 MP">1.3 MP</option>
								<option value="2 MP">2 MP</option>
								<option value="3.2 MP">3.2MP</option>
								<option value="4 MP">4 MP</option>
								<option value="5 MP">5 MP</option>
								<option value="6.7 MP">6.7MP</option>
								<option value="8 MP">8 MP</option>
								<option value="10 MP">10 MP</option>
							</select>
							<!-- <input type="text" name="cam_pixel" placeholder="Công nghệ màn hình" value="<?php //echo !empty($cam_pixel)?$cam_pixel:'';?>"> -->
						</div>
						<label class="control-label">Thông tin thêm</label>
						<div class="controls">
							<input type="text" name="cam_info" placeholder="Độ phân giải" value="<?php echo !empty($cam_info)?$cam_info:'';?>">
						</div>
					</div>

					<div class="control-group">
						<h4>PIN/Battery</h4>
						<label class="control-label">Thông tin Pin</label>
						<div class="controls">
							<input type="text" name="pin_info" placeholder="Công nghệ màn hình" value="<?php echo !empty($pin_info)?$pin_info:'';?>">
						</div>
					</div>

					<div class="control-group">
						<h4>Hệ điều hành, phần mềm sẵn có/OS</h4>
						<label class="control-label">Hệ điều hành</label>
						<div class="controls">
							<select name="os_ver">
								<option value="Windows 10">Windows 10</option>
								<option value="Mac OS">Mac OS</option>
								<option value="Ubuntu">Ubuntu</option>
								<option value="Android">Android</option>
							</select>
							<!-- <input type="text" name="os_ver" placeholder="Công nghệ màn hình" value="<?php //echo !empty($os_ver)?$os_ver:'';?>"> -->
						</div>
						<label class="control-label">Phần mềm sẵn có</label>
						<div class="controls">
							<input type="text" name="soft" placeholder="Cảm ứng" value="Microsoft Office bản dùng thử">
						</div>
					</div>
					
					<div class="control-group">
						<h4>Kích thước &amp; Trọng lượng</h4>
						<label class="control-label">Kích thước</label>
						<div class="controls">
							<input type="text" name="size" placeholder="Màn hình rộng" value="Dài  mm - Ngang  mm - Dày  mm">
						</div>
						<label class="control-label">Trọng lượng (kg)</label>
						<div class="controls">
							<input type="text" name="weight" placeholder="Cảm ứng" value="<?php echo !empty($weight)?$weight:'';?>">
						</div>
						<label class="control-label">Chất liệu</label>
						<div class="controls">
							<input type="text" name="matter" placeholder="Độ phân giải" value="Vỏ nhựa / Kim loại">
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