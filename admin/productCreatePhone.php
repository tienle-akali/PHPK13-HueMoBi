<?php
require '../database.php';
if( !empty($_POST)){
	//keep track post values
	$name = $_POST['name'];
	$prices = $_POST['prices'];
	$idCategory = $_POST['idCategory'];
	$importDay = $_POST['importDay'];
	$conn = Database::connect();
	$sql = "INSERT INTO product (name, prices, idCategory, importDay) values('$name', '$prices', '$idCategory', '$importDay')";
	$conn->query($sql);
	$idprod = $conn->insert_id;

	// thông số kĩ thuật
	$productId = $idprod;

	$scr_tech = $_POST['scr_tech'];
	$scr_dpi = $_POST['scr_dpi'];
	$scr_width = $_POST['scr_width'];
	$scr_touch = $_POST['scr_touch'];
	$scr_glass = $_POST['scr_glass'];
	$b_campixel = $_POST['b_campixel'];
	$b_camvideo = $_POST['b_camvideo'];
	$b_camflash = $_POST['b_camflash'];
	$b_campro = $_POST['b_campro'];
	$f_campixel = $_POST['f_campixel'];
	$f_camvideo = $_POST['f_camvideo'];
	$f_camcall = $_POST['f_camcall'];
	$f_camother = $_POST['f_camother'];
	$os_ver = $_POST['os_ver'];
	$chip_name = $_POST['chip_name'];
	$chip_clock = $_POST['chip_clock'];
	$chip_gpu = $_POST['chip_gpu'];
	$ram = $_POST['ram'];
	$rom_size = $_POST['rom_size'];
	$rom_enable = $_POST['rom_enable'];
	$sdcard = $_POST['sdcard'];
	$sdmax = $_POST['sdmax'];
	$net_2g = $_POST['net_2g'];
	$net_3g = $_POST['net_3g'];
	$net_4g = $_POST['net_4g'];
	$sim_num = $_POST['sim_num'];
	$sim_type = $_POST['sim_type'];
	$wifi = $_POST['wifi'];
	$gps = $_POST['gps'];
	$bluetooth = $_POST['bluetooth'];
	$nfc = $_POST['nfc'];
	$port = $_POST['port'];
	$jack = $_POST['jack'];
	$net_other = $_POST['net_other'];
	$design = $_POST['design'];
	$matter = $_POST['matter'];
	$size = $_POST['size'];
	$weight = $_POST['weight'];
	$pin_size = $_POST['pin_size'];
	$pin_type = $_POST['pin_type'];
	$movie = $_POST['movie'];
	$music = $_POST['music'];
	$record = $_POST['record'];
	$radio = $_POST['radio'];
	$other = $_POST['other'];


	//insert data
	$sql2 = "INSERT INTO `detailphone`(`productId`, `scr_tech`, `scr_dpi`, `scr_width`, `scr_touch`, `scr_glass`, `b_campixel`, `b_camvideo`, `b_camflash`, `b_campro`, `f_campixel`, `f_camvideo`, `f_camcall`, `f_camother`, `os_ver`, `chip_name`, `chip_clock`, `chip_gpu`, `ram`, `rom_size`, `rom_enable`, `sdcard`, `sdmax`, `net_2g`, `net_3g`, `net_4g`, `sim_num`, `sim_type`, `wifi`, `gps`, `bluetooth`, `nfc`, `port`, `jack`, `net_other`, `design`, `matter`, `size`, `weight`, `pin_size`, `pin_type`, `movie`, `music`, `record`, `radio`, `other`) VALUES ('$productId', '$scr_tech', '$scr_dpi', '$scr_width', '$scr_touch', '$scr_glass', '$b_campixel', '$b_camvideo', '$b_camflash', '$b_campro', '$f_campixel', '$f_camvideo', '$f_camcall', '$f_camother', '$os_ver', '$chip_name', '$chip_clock', '$chip_gpu', '$ram', '$rom_size', '$rom_enable', '$sdcard', '$sdmax', '$net_2g', '$net_3g', '$net_4g', '$sim_num', '$sim_type', '$wifi', '$gps', '$bluetooth', '$nfc', '$port', '$jack', '$net_other', '$design', '$matter', '$size', '$weight', '$pin_size', '$pin_type', '$movie', '$music', '$record', '$radio', '$other')";

	
	$conn->query($sql2);
	header("Location: productIndex.php");
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
	<title>Thêm điện thoại mới</title>
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
				<form class="form-horizontal" action="productCreatePhone.php" method="post">
					<legend><h3 style="color:red">Thêm điện thoại mới</h3></legend>
					<div class="control-group">
						<label class="control-label">Tên điện thoại</label>
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
								<option value="" disabled="disabled" selected="selected" style="color:red; font-style:oblique">Chọn hãng Điện thoại</option>
								<?php
								$conn = Database::connect();
								$sql = "SELECT * FROM category";
								$results = mysqli_query($conn, $sql);
								
								// var_dump($results); die; kiếm tra giá trị của biến

								if ($results->num_rows > 0) {
									// $d=0;
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
										if($row['parentId']==8)
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
						<h4>Màn hình</h4>
						<label class="control-label">Công nghệ màn hình</label>
						<div class="controls">
							<select name="scr_tech">
								<option value="TFT">TFT</option>
								<option value="IPS LCD">IPS LCD</option>
								<option value="Retina">Retina</option>
								<option value="Super Amoled">Super AMOLED</option>
							</select>
							<!-- <input type="text" name="scr_tech" placeholder="Công nghệ màn hình" value="<?php //echo !empty($scr_tech)?$scr_tech:'';?>"> -->
						</div>
						<label class="control-label">Độ phân giải</label>
						<div class="controls">
							<select name="scr_dpi">
								<option value="128 x 160 Pixels">128 x 160 Pixels</option>
								<option value="VGA (640 x 480)">VGA (640 x 480 pixels)</option>
								<option value="qHD (960 x 540 pixels)">qHD (960 x 540 pixels)</option>
								<option value="HD (1280 x 720 pixels)">HD (1280 x 720 pixels)</option>
								<option value="Full HD (1920 x 1080 pixels)">Full HD (1920 x 1080 pixels)</option>
								<option value="2K (2560 x 1440 pixels)">2K (2560 x 1440 pixels)</option>
								<option value="4K (4096 x 2160 pixels)">4K (4096 x 2160 pixels)</option>
								<option value="4K Ultra HD (3840 x 2160 pixels)">4K Ultra HD (3840 x 2160 pixels)</option>
							</select>
							<!-- <input type="text" name="scr_dpi" placeholder="Độ phân giải" value="<?php //echo !empty($scr_dpi)?$scr_dpi:'';?>"> -->
						</div>
						<label class="control-label">Màn hình rộng</label>
						<div class="controls">
							<input type="text" name="scr_width" placeholder="Inch" value="<?php echo !empty($scr_width)?$scr_width:'';?>">
						</div>
						<label class="control-label">Cảm ứng</label>
						<div class="controls">
							<select name="scr_touch">
								<option value="Không">Không</option>
								<option value="Cảm ứng điện dung đa điểm">Cảm ứng điện dung đa điểm</option>
							</select>
							<!-- <input type="text" name="scr_touch" placeholder="Cảm ứng" value="<?php //echo !empty($scr_touch)?$scr_touch:'';?>"> -->
						</div>
						<label class="control-label">Mặt kính cảm ứng</label>
						<div class="controls">
							<select name="scr_glass">
								<option value="Kính thường">Kính thường</option>
								<option value="Kính cường lực">Kính cường lực</option>
								<option value="Gorrila Glass 3">Gorrila Glass 3</option>
								<option value="Gorrila Glass 4">Gorrila Glass 4</option>
								<option value="Kính oleophobic (ion cường lực)">Kính oleophobic (ion cường lực)</option>
							</select>
							<!-- <input type="text" name="scr_glass" placeholder="Mặt kính cảm ứng" value="<?php //echo !empty($scr_glass)?$scr_glass:'';?>"> -->
						</div>
					</div>
					<div class="control-group">
						<h4>Camera sau</h4>
						<label class="control-label">Độ phân giải</label>
						<div class="controls">
							<select name="b_campixel">
								<option value="VGA">VGA</option>
								<option value="1.3 MP">1.3 MP</option>
								<option value="2 MP">2 MP</option>
								<option value="3.2 MP">3.2MP</option>
								<option value="4 MP">4 MP</option>
								<option value="5 MP">5 MP</option>
								<option value="6.7 MP">6.7MP</option>
								<option value="8 MP">8 MP</option>
								<option value="10 MP">10 MP</option>
								<option value="12 MP">12 MP</option>
								<option value="13 MP">13 MP</option>
								<option value="16 MP">16 MP</option>
								<option value="21 MP">21 MP</option>
								<option value="41 MP">41 MP</option>
							</select>
							<!-- <input type="text" name="b_campixel" placeholder="Độ phân giải" value="<?php //echo !empty($b_campixel)?$b_campixel:'';?>"> -->
						</div>
						<label class="control-label">Quay phim</label>
						<div class="controls">
							<select name="b_camvideo">
								<option value="Có">Có</option>
								<option value="Không">Không</option>
								<option value="VGA">VGA</option>
								<option value="360p">360p</option>
								<option value="480p">480p</option>
								<option value="HD 720p">HD 720p</option>
								<option value="FullHD 1080p">FullHD 1080p</option>
								<option value="2K 1440p@30fps">2K 1440p@30fps</option>
								<option value="2K 1440p@60fps">2K 1440p@60fps</option>
								<option value="Quay phim 4K 2160p@30fps">Quay phim 4K 2160p@30fps</option>
								<option value="Quay phim 4K 2160p@60fps">Quay phim 4K 2160p@60fps</option>
							</select>
							<!-- <input type="text" name="b_camvideo" placeholder="Quay phim" value="<?php //echo !empty($b_camvideo)?$b_camvideo:'';?>"> -->
						</div>
						<label class="control-label">Đèn Flash</label>
						<div class="controls">
							<select name="b_camflash">
								<option value="Có">Có</option>
								<option value="Không">Không</option>
								<option value="Dual Tone LED">Dual Tone LED</option>
							</select>
							<!-- <input type="text" name="b_camflash" placeholder="Đèn Flash" value="<?php //echo !empty($b_camflash)?$b_camflash:'';?>"> -->
						</div>
						<label class="control-label">Chụp ảnh nâng cao</label>
						<div class="controls">
							<select name="b_campro">
								<option value="Không">Không</option>
								<option value="Tự động lấy nét, Chạm lấy nét, Nhận diện khuôn mặt, Nhận diện nụ cười, HDR, Panorama, Chống rung quang học">Tự động lấy nét, Chạm lấy nét, Nhận diện khuôn mặt, Nhận diện nụ cười, HDR, Panorama, Chống rung quang học</option>
							</select>
							<!-- <input type="text" name="b_campro" placeholder="Chụp ảnh nâng cao" value="<?php //echo !empty($b_campro)?$b_campro:'';?>"> -->
						</div>
					</div>
					<div class="control-group">
						<h4>Camera trước</h4>
						<label class="control-label">Độ phân giải</label>
						<div class="controls">
							<select name="f_campixel">
								<option value="VGA">VGA</option>
								<option value="1.3MP">1.3MP</option>
								<option value="2MP">2MP</option>
								<option value="3.2MP">3.2MP</option>
								<option value="4MP">4MP</option>
								<option value="5MP">5MP</option>
								<option value="6.7MP">6.7MP</option>
								<option value="8MP">8MP</option>
								<option value="10MP">10MP</option>
								<option value="12MP">12MP</option>
								<option value="13MP">13MP</option>
								<option value="16MP">16MP</option>
								<option value="21MP">21MP</option>
							</select>
							<!-- <input type="text" name="f_campixel" placeholder="Độ phân giải" value="<?php //echo !empty($f_campixel)?$f_campixel:'';?>"> -->
						</div>
						<label class="control-label">Quay phim</label>
						<div class="controls">
							<select name="f_camvideo">
								<option value="Có">Có</option>
								<option value="Không">Không</option>
								<option value="VGA">VGA</option>
								<option value="360p">360p</option>
								<option value="480p">480p</option>
								<option value="HD 720p">HD 720p</option>
								<option value="FullHD 1080p">FullHD 1080p</option>
								<option value="2K 1440p@30fps">2K 1440p@30fps</option>
								<option value="2K 1440p@60fps">2K 1440p@60fps</option>
								<option value="Quay phim 4K 2160p@30fps">Quay phim 4K 2160p@30fps</option>
								<option value="Quay phim 4K 2160p@60fps">Quay phim 4K 2160p@60fps</option>
							</select>
							<!-- <input type="text" name="f_camvideo" placeholder="Quay phim" value="<?php //echo !empty($f_camvideo)?$f_camvideo:'';?>"> -->
						</div>
						<label class="control-label">Video Call</label>
						<div class="controls">
							<select name="f_camcall">
								<option value="Có">Có</option>
								<option value="Không">Không</option>
							</select>
							<!-- <input type="text" name="f_camcall" placeholder="Video Call" value="<?php //echo !empty($f_camcall)?$f_camcall:'';?>"> -->
						</div>
						<label class="control-label">Thông tin khác</label>
						<div class="controls">
							<input type="text" name="f_camother" placeholder="Thông tin khác" value="<?php echo !empty($f_camother)?$f_camother:'';?>">
						</div>
					</div>
					<div class="control-group">
						<h4>Hệ điều hành - CPU</h4>
						<label class="control-label">Hệ điều hành</label>
						<div class="controls">
							<select name="os_ver">
								<option value="Không">Không</option>
								<option value="iOS 7">iOS 7</option>
								<option value="iOS 8">iOS 8</option>
								<option value="iOS 9">iOS 9</option>
								<option value="Android 4.2">Android 4.2</option>
								<option value="Android 4.3">Android 4.3</option>
								<option value="Android 4.4">Android 4.4</option>
								<option value="Android 5">Android 5</option>
								<option value="Android 5.1">Android 5.1</option>
								<option value="Android 6">Android 6</option>
								<option value="Windows Phone 8">Windows Phone 8</option>
								<option value="Windows 10">Windows 10</option>
							</select>
							<!-- <input type="text" name="os_ver" placeholder="Hệ điều hành" value="<?php //echo !empty($os_ver)?$os_ver:'';?>"> -->
						</div>
						<label class="control-label">Chipset (hãng SX CPU)</label>
						<div class="controls">
							<input type="text" name="chip_name" placeholder="Chipset" value="<?php echo !empty($chip_name)?$chip_name:'';?>">
						</div>
						<label class="control-label">Tốc độ CPU</label>
						<div class="controls">
							<input type="text" name="chip_clock" placeholder="Ghz" value=" Ghz">
						</div>
						<label class="control-label">Chip đồ họa (GPU)</label>
						<div class="controls">
							<input type="text" name="chip_gpu" placeholder="GPU" value="<?php echo !empty($chip_gpu)?$chip_gpu:'';?>">
						</div>
					</div>
					<div class="control-group">
						<h4>Bộ nhớ &amp; Lưu trữ</h4>
						<label class="control-label">RAM</label>
						<div class="controls">
							<select name="ram">
								<option value="Không">Không</option>
								<option value="512 MB">512 MB</option>
								<option value="1 GB">1 GB</option>
								<option value="1.5 GB">1.5 GB</option>
								<option value="2 GB">2 GB</option>
								<option value="3 GB">3 GB</option>
								<option value="4 GB">4 GB</option>
								<option value="6 GB">6 GB</option>
							</select>
							<!-- <input type="text" name="ram" placeholder="RAM" value="<?php //echo !empty($ram)?$ram:'';?>"> -->
						</div>
						<label class="control-label">Bộ nhớ trong (ROM)</label>
						<div class="controls">
							<select name="rom_size">
								<option value="Không">Không</option>
								<option value="512MB">512 MB</option>
								<option value="4GB">4 GB</option>
								<option value="8GB">8 GB</option>
								<option value="16GB">16 GB</option>
								<option value="32GB">32 GB</option>
								<option value="64GB">64 GB</option>
								<option value="128GB">128 GB</option>
								<option value="256GB">256 GB</option>
							</select>
							<!-- <input type="text" name="rom_size" placeholder="ROM" value="<?php //echo !empty($rom_size)?$rom_size:'';?>"> -->
						</div>
						<label class="control-label">Bộ nhớ khả dụng</label>
						<div class="controls">
							<input type="text" name="rom_enable" placeholder="Bộ nhớ khả dụng" value=" GB">
						</div>
						<label class="control-label">Thẻ nhớ ngoài</label>
						<div class="controls">
							<select name="sdcard">
								<option value="Không">Không</option>
								<option value="SD">SD</option>
								<option value="Micro SD">Micro SD</option>
							</select>
							<!-- <input type="text" name="sdcard" placeholder="Thẻ nhớ ngoài" value="<?php //echo !empty($sdcard)?$sdcard:'';?>"> -->
						</div>
						<label class="control-label">Hỗ trợ thẻ tối đa</label>
						<div class="controls">
							<select name="sdmax">
								<option value="Không">Không</option>
								<option value="8 GB">8 GB</option>
								<option value="16 GB">16 GB</option>
								<option value="32 GB">32 GB</option>
								<option value="64 GB">64 GB</option>
								<option value="128 GB">128 GB</option>
								<option value="200 GB">200 GB</option>
								<option value="256 GB">256 GB</option>
								<option value="1 TB">1 TB</option>
							</select>
							<!-- <input type="text" name="sdmax" placeholder="Hỗ trợ thẻ tối đa" value="<?php //echo !empty($sdmax)?$sdmax:'';?>"> -->
						</div>
					</div>
					<div class="control-group">
						<h4>Kết nối</h4>
						<label class="control-label">Băng tần 2G</label>
						<div class="controls">
							<input type="text" name="net_2g" placeholder="2G" value="GMS 850/900/1800/1900">
						</div>
						<label class="control-label">Băng tần 3G</label>
						<div class="controls">
							<input type="text" name="net_3g" placeholder="3G" value="Có, Không, HSPDA 850/900/1900/2100">
						</div>
						<label class="control-label">Hỗ trợ 4G</label>
						<div class="controls">
							<select name="net_4g">
								<option value="Không">Không</option>
								<option value="Có">Có</option>
								<option value="4G LTE Cat 4">4G LTE Cat 4</option>
								<option value="4G LTE Cat 6">4G LTE Cat 6</option>
								<option value="4G LTE Cat 9">4G LTE Cat 9</option>
							</select>
							<!-- <input type="text" name="net_4g" placeholder="4G" value="<?php //echo !empty($net_4g)?$net_4g:'';?>"> -->
						</div>
						<label class="control-label">Số khe sim</label>
						<div class="controls">
							<select name="sim_num">
								<option value="1 SIM">1 SIM</option>
								<option value="2 SIM">2 Sim</option>
								<option value="2 SIM, SIM 2 chung khe thẻ nhớ">2 SIM, SIM 2 chung khe thẻ nhớ</option>
							</select>
							<!-- <input type="text" name="sim_num" placeholder="Số khe sim" value="<?php //echo !empty($sim_num)?$sim_num:'';?>"> -->
						</div>
						<label class="control-label">Loại Sim</label>
						<div class="controls">
							<select name="sim_type">
								<option value="SIM thường">SIM thường</option>
								<option value="Micro SIM">Micro SIM</option>
								<option value="Nano SIM">Nano SIM</option>
							</select>
							<!-- <input type="text" name="sim_type" placeholder="Loại Sim" value="<?php //echo !empty($sim_type)?$sim_type:'';?>"> -->
						</div>
						<label class="control-label">Wifi</label>
						<div class="controls">
							<input type="text" name="wifi" placeholder="Wifi" value="Có, Wi-Fi 802.11 a/b/g/n/ac, Dual-band, DLNA, Wi-Fi Direct, Wi-Fi hotspot">
						</div>
						<label class="control-label">GPS</label>
						<div class="controls">
							<input type="text" name="gps" placeholder="GPS" value="Có, Không, BDS, A-GPS, GLONASS">
						</div>
						<label class="control-label">Bluetooth</label>
						<div class="controls">
							<input type="text" name="bluetooth" placeholder="Bluetooth" value="Có, Không, EDR, v4.2, v4.0, apt-X, A2DP, LE">
						</div>
						<label class="control-label">NFC</label>
						<div class="controls">
							<select name="nfc">
								<option value="Có">Có</option>
								<option value="Không">Không</option>
							</select>
							<!-- <input type="text" name="nfc" placeholder="NFC" value="<?php //echo !empty($nfc)?$nfc:'';?>"> -->
						</div>
						<label class="control-label">Cổng kết nối/sạc</label>
						<div class="controls">
							<select name="port">
								<option value="Micro USB">Micro USB</option>
								<option value="Lightning">Lightning</option>
								<option value="USB Type C">USB Type C</option>
							</select>
							<!-- <input type="text" name="port" placeholder="Cổng kết nối/sạc" value="<?php //echo !empty($port)?$port:'';?>"> -->
						</div>
						<label class="control-label">Jack tai nghe</label>
						<div class="controls">
							<select name="jack">
								<option value="Không">3.5 mm</option>
								<option value="Có">Có</option>
								<option value="Không">Không</option>
							</select>
							<<!-- input type="text" name="jack" placeholder="Jack tai nghe" value="<?php //echo !empty($jack)?$jack:'';?>"> -->
						</div>
						<label class="control-label">Kết nối khác</label>
						<div class="controls">
							<input type="text" name="net_other" placeholder="Kết nối khác" value="Không, NFC, OTG, MHL">
						</div>
					</div>
					<div class="control-group">
						<h4>Thiết kế &amp; Trọng lượng</h4>
						<label class="control-label">Thiết kế</label>
						<div class="controls">
							<input type="text" name="design" placeholder="Thiết kế" value="Nguyên khối, Pin rời, Pin liền">
						</div>
						<label class="control-label">Chất liệu</label>
						<div class="controls">
							<select name="matter">
								<option value="Nhựa">Nhựa</option>
								<option value="Hợp kim nhôm">Hợp kim nhôm</option>
								<option value="Kim loại">Kim loại</option>
								<option value="Khung kim loại">Khung kim loại</option>
								<option value="Khung kim loại + mặt kính cường lực">Khung kim loại + mặt kính cường lực</option>
							</select>
							<!-- <input type="text" name="matter" placeholder="Chất liệu" value="<?php //echo !empty($matter)?$matter:'';?>"> -->
						</div>
						<label class="control-label">Kích thước</label>
						<div class="controls">
							<input type="text" name="size" placeholder="Kích thước" value="Dài  mm - Rộng  mm - Dày  mm">
						</div>
						<label class="control-label">Trọng lượng</label>
						<div class="controls">
							<input type="text" name="weight" placeholder="Trọng lượng" value=" g">
						</div>
					</div>
					<div class="control-group">
						<h4>Thông tin pin</h4>
						<label class="control-label">Dung lượng pin</label>
						<div class="controls">
							<input type="text" name="pin_size" placeholder="Dung lượng pin" value=" mAh">
						</div>
						<label class="control-label">Loại pin</label>
						<div class="controls">
							<select name="jack">
								<option value="Pin chuẩn Li-Ion">Pin chuẩn Li-Ion</option>
								<option value="Pin chuẩn Li-Po">Pin chuẩn Li-Po</option>
							</select>
							<!-- <input type="text" name="pin_type" placeholder="Loại pin" value="<?php //echo !empty($pin_type)?$pin_type:'';?>"> -->
						</div>
					</div>
					<div class="control-group">
						<h4>Giải trí &amp; Ứng dụng</h4>
						<label class="control-label">Xem phim</label>
						<div class="controls">
							<input type="text" name="movie" placeholder="Xem phim" value="Có">
						</div>
						<label class="control-label">Nghe nhạc</label>
						<div class="controls">
							<input type="text" name="music" placeholder="Nghe nhạc" value="MP3, WAV, eAAC+, FLAC">
						</div>
						<label class="control-label">Ghi âm</label>
						<div class="controls">
							<input type="text" name="record" placeholder="Ghi âm" value="Có, microphone chuyên dụng chống ồn">
						</div>
						<label class="control-label">Radio</label>
						<div class="controls">
							<input type="text" name="radio" placeholder="Radio" value="Có, Không">
						</div>
						<label class="control-label">Chức năng khác</label>
						<div class="controls">
							<input type="text" name="other" placeholder="Chức năng khác" value="Không">
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