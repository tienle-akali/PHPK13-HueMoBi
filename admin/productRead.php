<?php
$id = null;
if( !empty($_GET['id'])){
	$id = $_REQUEST['id'];
}

include '../database.php';
$conn = Database::connect();	

if ( null==$id || !(is_numeric($id))) {
	header("Location: productRead.php");
} else {
	$sql = "SELECT * FROM product WHERE id=$id";
	$results = mysqli_query($conn, $sql);
	if ($results->num_rows > 0) {
		$data2 = $results->fetch_array();
	}
	
	//hình ảnh

	$result_img = Database::selectTable($conn,"hinhanh","productId",$id);
	$img = mysqli_fetch_assoc($result_img);


	//================


	$idCateProd = $data2['idCategory'];//chon ra idCategory cua san pham de truy van den id cua danh muc
	$sql_cate = "SELECT parentId FROM category WHERE id=$idCateProd";

	$result_cate = mysqli_query($conn, $sql_cate);//thuc hien truy van
	$data_cate=null;
	
	if($result_cate->num_rows > 0)
	{
		$data_cate = $result_cate->fetch_array();//gan du lieu cho bien data_cate
	}
	if($data_cate['parentId']==8)//kiem tra $data_cate co phai la danh muc dien thoai khong
	{
		$sql2 = "SELECT * FROM detailphone WHERE productId=$id";//neu dung thi thuc hien cau lenh	
	}
	if ($data_cate['parentId']==9) {
		$sql2 = "SELECT * FROM detaillaptop WHERE productId=$id";
	}
	if ($data_cate['parentId']==10) {
		$sql2 = "SELECT * FROM detailtablet WHERE productId=$id";
	}
	if ($data_cate['parentId']==11) {
		$sql2 = "SELECT * FROM detailphukien WHERE productId=$id";
	}
	
	$results2 = mysqli_query($conn, $sql2);
	if ($results2->num_rows > 0) {
	
		$data3 = $results2->fetch_array();
	}
	
}
?>


<!DOCTYPE html>
<html lang="vi">
<head>
	<title>Xem sản phẩm</title>
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
				
			<div class="form-horizontal">
				<legend><h3><?php echo $data2['name'];?></h3></legend>
				<div class="control-group">
					<label class="control-label">Tên sản phẩm</label>
					<div class="controls">
						<label class="checkbox">
							<?php echo $data2['name'];?>
						</label>
					</div>
				</div>

				<div class="control-group">
					<label class="control-label">Giá</label>
					<div class="controls">
						<label class="checkbox">
							<?php echo $data2['prices'].' VND'; ?>
						</label>
					</div>
				</div>

				<div class="control-group">
					<label class="control-label">Danh mục</label>
					<div class="controls">
						<label class="checkbox">
							<?php
							
							$sql = "SELECT * FROM category";
							$results = mysqli_query($conn, $sql);
							// var_dump($results); die; kiếm tra giá trị của biến						
							if($results->num_rows > 0)
							{
								while($row = $results->fetch_assoc())
								{
									if($row['id']==$data2['idCategory'])
									{
										echo $row['name'];
									}
								}
							}
							
							?>
						</label>
					</div>
				</div>

				<div class="control-group">
					<label class="control-label">Ngày nhập kho</label>
					<div class="controls">
						<label class="checkbox">
							<?php echo $data2['importDay']; ?>
						</label>
					</div>
				</div>
				
				<!-- thêm hình ảnh -->
					<div class="control-group">
						<label class="control-label">Avatar</label>
						<div style="width:160px; height:160px; text-align:center"><img src="<?php echo $img['avatar'];?>'" width="50px" height="50px"></div>
				  	</div>
				  	<div class="control-group">
						<label class="control-label">Hình ảnh</label>
						<div style="width:160px; height:160px; text-align:center"><img src="<?php echo $img['img'];?>" width="50px" height="50px"></div>
				  	</div>
					
					
<?php				
	if($data_cate['parentId']==8){ //phone

					echo '<div class="control-group"><h3 style="color:blue">Thông số kĩ thuật</h3></div><div class="control-group">
						<h4>Màn hình</h4>
						<label class="control-label">Công nghệ màn hình</label>
						<div class="controls">
							
							<label class="checkbox">'.$data3['scr_tech'].'</label>
						</div>
						<br>
						<label class="control-label">Độ phân giải</label>
						<div class="controls">
							<label class="checkbox">'.$data3['scr_dpi'].'</label>
						</div>
						<br>
						
					
						<label class="control-label">Màn hình rộng</label>
						<div class="controls">
							<label class="checkbox">'.$data3['scr_width'].'</label>
						</div>
						<br>
						<label class="control-label">Cảm ứng</label>
						<div class="controls">
							<label class="checkbox">'.$data3['scr_touch'].'</label>
							
						</div>
						<br>
						<label class="control-label">Mặt kính cảm ứng</label>
						<div class="controls">
							<label class="checkbox">'.$data3['scr_glass'].'</label>
							
						</div>
					</div>

					<div class="control-group">
						<h4>Camera sau</h4>
						<label class="control-label">Độ phân giải</label>
						<div class="controls">
							<label class="checkbox">'.$data3['b_campixel'].'</label>
							
						</div>
						<br>
						<label class="control-label">Quay phim</label>
						<div class="controls">
							<label class="checkbox">'.$data3['b_camvideo'].'</label>
							
						</div>
						<br>
						<label class="control-label">Đèn Flash</label>
						<div class="controls">
							<label class="checkbox">'.$data3['b_camflash'].'</label>
						</div>
						<br>
						<label class="control-label">Chụp ảnh nâng cao</label>
						<div class="controls">
							<label class="checkbox">'.$data3['b_campro'].'</label>
							
						</div>
					</div>
					<div class="control-group">
						<h4>Camera trước</h4>
						<label class="control-label">Độ phân giải</label>
						<div class="controls">
							<label class="checkbox">'.$data3['f_campixel'].'</label>
							
						</div>
						<br>
						<label class="control-label">Quay phim</label>
						<div class="controls">
							<label class="checkbox">'.$data3['f_camvideo'].'</label>
					
						</div>
						<br>
						<label class="control-label">Video Call</label>
						<div class="controls">
							<label class="checkbox">'.$data3['f_camcall'].'</label>
							
						</div>
						<br>
						<label class="control-label">Thông tin khác</label>
						<div class="controls">
							<label class="checkbox">'.$data3['f_camother'].'</label>
							
						</div>
						<br>
					</div>
					<div class="control-group">
						<h4>Hệ điều hành - CPU</h4>
						<label class="control-label">Hệ điều hành</label>
						<div class="controls">
							<label class="checkbox">'.$data3['os_ver'].'</label>
						</div>
						<br>
						

						<label class="control-label">Chipset (hãng SX CPU)</label>
						<div class="controls">
							<label class="checkbox">'.$data3['chip_name'].'</label>
						
						</div>
						<br>
						<label class="control-label">Tốc độ CPU</label>
						<div class="controls">
							<label class="checkbox">'.$data3['chip_clock'].'</label>
							
						</div>
						<br>

						<label class="control-label">Chip đồ họa (GPU)</label>
						<div class="controls">
							<label class="checkbox">'.$data3['chip_gpu'].'</label>
							
						</div>
						
					</div>

					<div class="control-group">
						<h4>Bộ nhớ &amp; Lưu trữ</h4>
						<label class="control-label">RAM</label>
						<div class="controls">
							<label class="checkbox">'.$data3['ram'].'</label>
							
						</div>
						<br>
						<label class="control-label">Bộ nhớ trong (ROM)</label>
						<div class="controls">
							<label class="checkbox">'.$data3['rom_size'].'</label>
							
						</div>
						<br>
						<label class="control-label">Bộ nhớ khả dụng</label>
						<div class="controls">
							<label class="checkbox">'.$data3['rom_enable'].'</label>
							
						</div>
						<br>
						<label class="control-label">Thẻ nhớ ngoài</label>
						<div class="controls">
							<label class="checkbox">'.$data3['sdcard'].'</label>
							
						</div>
						<br>
						<label class="control-label">Hỗ trợ thẻ tối đa</label>
						<div class="controls">
							<label class="checkbox">'.$data3['sdmax'].'</label>
							
						</div>
					</div>
					<div class="control-group">
						<h4>Kết nối</h4>
						<label class="control-label">Băng tần 2G</label>
						<div class="controls">
							<label class="checkbox">'.$data3['net_2g'].'</label>
							
						</div>
						<br>
						<label class="control-label">Băng tần 3G</label>
						<div class="controls">
							<label class="checkbox">'.$data3['net_3g'].'</label>
							
						</div>
						<br>
						<label class="control-label">Hỗ trợ 4G</label>
						<div class="controls">
							<label class="checkbox">'.$data3['net_4g'].'</label>
							
						</div>
						<br>
						<label class="control-label">Số khe sim</label>
						<div class="controls">
							<label class="checkbox">'.$data3['sim_num'].'</label>
							
						</div>
						<br>
						<label class="control-label">Loại Sim</label>
						<div class="controls">
							<label class="checkbox">'.$data3['sim_type'].'</label>
							
						</div>
						<br>
						<label class="control-label">Wifi</label>
						<div class="controls">
							<label class="checkbox">'.$data3['wifi'].'</label>
							
						</div>
						<br>
						<label class="control-label">GPS</label>
						<div class="controls">
							<label class="checkbox">'.$data3['gps'].'</label>
							
						</div>
						<br>
						<label class="control-label">Bluetooth</label>
						<div class="controls">
							<label class="checkbox">'.$data3['bluetooth'].'</label>
						
						</div>
						<br>
						<label class="control-label">NFC</label>
						<div class="controls">
							<label class="checkbox">'.$data3['nfc'].'</label>
							
						</div><br>
						<label class="control-label">Cổng kết nối/sạc</label>
						<div class="controls">
							<label class="checkbox">'.$data3['port'].'</label>
							
						</div><br>
						<label class="control-label">Jack tai nghe</label>
						<div class="controls">
							<label class="checkbox">'.$data3['jack'].'</label>
							
						</div><br>
						<label class="control-label">Kết nối khác</label>
						<div class="controls">
							<label class="checkbox">'.$data3['net_other'].'</label>
							
						</div>
					</div>
					<div class="control-group">
						<h4>Thiết kế &amp; Trọng lượng</h4>
						<label class="control-label">Thiết kế</label>
						<div class="controls">
							<label class="checkbox">'.$data3['design'].'</label>
							
						</div><br>
						<label class="control-label">Chất liệu</label>
						<div class="controls">
							<label class="checkbox">'.$data3['matter'].'</label>
							
						</div><br>
						<label class="control-label">Kích thước</label>
						<div class="controls">
							<label class="checkbox">'.$data3['size'].'</label>
							
						</div><br>
						<label class="control-label">Trọng lượng</label>
						<div class="controls">
							<label class="checkbox">'.$data3['weight'].'</label>
							
						</div>
					</div>
					<div class="control-group">
						<h4>Thông tin pin</h4>
						<label class="control-label">Dung lượng pin</label>
						<div class="controls">
							<label class="checkbox">'.$data3['pin_size'].'</label>
							
						</div><br>
						<label class="control-label">Loại pin</label>
						<div class="controls">
							<label class="checkbox">'.$data3['pin_type'].'</label>
							
						</div>
					</div>
					<div class="control-group">
						<h4>Giải trí &amp; Ứng dụng</h4>
						<label class="control-label">Xem phim</label>
						<div class="controls">
							<label class="checkbox">'.$data3['movie'].'</label>
							
						</div><br>
						<label class="control-label">Nghe nhạc</label>
						<div class="controls">
							<label class="checkbox">'.$data3['music'].'</label>
							
						</div><br>
						<label class="control-label">Ghi âm</label>
						<div class="controls">
							<label class="checkbox">'.$data3['record'].'</label>
							
						</div><br>
						<label class="control-label">Radio</label>
						<div class="controls">
							<label class="checkbox">'.$data3['radio'].'</label>
							
						</div><br>
						<label class="control-label">Chức năng khác</label>
						<div class="controls">
							<label class="checkbox">'.$data3['other'].'</label>
							
						</div>
					</div>';
				}


if($data_cate['parentId']==9){ //laptop

					echo '<div class="control-group"><h3 style="color:blue">Thông số kĩ thuật</h3></div><div class="control-group">
						<h4>Bộ xử lý</h4>
						<label class="control-label">Hãng CPU</label>
						<div class="controls">
							
							<label class="checkbox">'.$data3['cpu_prod'].'</label>
						</div>
						<br>
						<label class="control-label">Công nghệ CPU</label>
						<div class="controls">
							<label class="checkbox">'.$data3['cpu_tech'].'</label>
						</div>
						<br>
						
					
						<label class="control-label">Loại CPU</label>
						<div class="controls">
							<label class="checkbox">'.$data3['cpu_type'].'</label>
						</div>
						<br>
						<label class="control-label">Tốc độ CPU</label>
						<div class="controls">
							<label class="checkbox">'.$data3['cpu_clock'].'</label>
							
						</div>
						<br>
						<label class="control-label">Bộ nhớ đệm</label>
						<div class="controls">
							<label class="checkbox">'.$data3['cpu_cache'].'</label>
							
						</div>
						<br>
						<label class="control-label">Tốc độ tối đa</label>
						<div class="controls">
							<label class="checkbox">'.$data3['cpu_max'].'</label>
							
						</div>
					</div>

					<div class="control-group">
						<h4>Bo mạch</h4>
						<label class="control-label">Chipset</label>
						<div class="controls">
							<label class="checkbox">'.$data3['board_chip'].'</label>
							
						</div>
						<br>
						<label class="control-label">Tốc độ Bus</label>
						<div class="controls">
							<label class="checkbox">'.$data3['board_bus'].'</label>
							
						</div>
						<br>
						<label class="control-label">Hỗ trợ RAM tối đa</label>
						<div class="controls">
							<label class="checkbox">'.$data3['board_ram_max'].'</label>
						</div>
						
					</div>
					<div class="control-group">
						<h4>Bộ nhớ</h4>
						<label class="control-label">RAM</label>
						<div class="controls">
							<label class="checkbox">'.$data3['ram_size'].'</label>
							
						</div>
						<br>
						<label class="control-label">Loại RAM</label>
						<div class="controls">
							<label class="checkbox">'.$data3['ram_type'].'</label>
					
						</div>
						<br>
						<label class="control-label">Tốc độ Bus</label>
						<div class="controls">
							<label class="checkbox">'.$data3['ram_bus'].'</label>
							
						</div>
						
					</div>
					<div class="control-group">
						<h4>Đĩa cứng</h4>
						<label class="control-label">Loại ổ đĩa</label>
						<div class="controls">
							<label class="checkbox">'.$data3['disk_type'].'</label>
						</div>
						<br>
						

						<label class="control-label">Ổ cứng</label>
						<div class="controls">
							<label class="checkbox">'.$data3['disk_size'].'</label>
						
						</div>
						
					</div>

					<div class="control-group">
						<h4>Màn hình</h4>
						<label class="control-label">Kích thước màn hình</label>
						<div class="controls">
							<label class="checkbox">'.$data3['scr_width'].'</label>
						</div>
						<br>
						

						<label class="control-label">Độ phân giải (W x H)</label>
						<div class="controls">
							<label class="checkbox">'.$data3['scr_dpi'].'</label>
						
						</div>
						<br>

						<label class="control-label">Công nghệ MH</label>
						<div class="controls">
							<label class="checkbox">'.$data3['scr_tech'].'</label>
						</div>
						<br>
						

						<label class="control-label">Màn hình cảm ứng</label>
						<div class="controls">
							<label class="checkbox">'.$data3['scr_touch'].'</label>
						
						</div>
						
					</div>

					<div class="control-group">
						<h4>Đồ họa</h4>
						<label class="control-label">Chipset đồ họa</label>
						<div class="controls">
							<label class="checkbox">'.$data3['gpu_chip'].'</label>
							
						</div>
						<br>
						<label class="control-label">Bộ nhớ đồ họa</label>
						<div class="controls">
							<label class="checkbox">'.$data3['gpu_memory'].'</label>
							
						</div>
						<br>
						<label class="control-label">Thiết kế card</label>
						<div class="controls">
							<label class="checkbox">'.$data3['gpu_style'].'</label>
							
						</div>
						
					</div>

					<div class="control-group">
						<h4>Âm thanh</h4>
						<label class="control-label">Kênh âm thanh</label>
						<div class="controls">
							<label class="checkbox">'.$data3['sound_channel'].'</label>
							
						</div>
						<br>
						<label class="control-label">Thông tin thêm	</label>
						<div class="controls">
							<label class="checkbox">'.$data3['sound_other'].'</label>
							
						</div>
						
					</div>

					<div class="control-group">
						<h4>Đĩa quang</h4>
						<label class="control-label">Có sẵn Đĩa Quang</label>
						<div class="controls">
							<label class="checkbox">'.$data3['optical_disk'].'</label>
							
						</div>
						<br>
						<label class="control-label">Loại đĩa quang</label>
						<div class="controls">
							<label class="checkbox">'.$data3['optical_type'].'</label>
							
						</div>
						
					<div class="control-group">
						<h4>Tính năng mở rộng &amp; cổng giao tiếp</h4>
						<label class="control-label">Cổng giao tiếp</label>
						<div class="controls">
							<label class="checkbox">'.$data3['port'].'</label>
							
						</div>
						<br>
						<label class="control-label">Tính năng mở rộng</label>
						<div class="controls">
							<label class="checkbox">'.$data3['ext_feat'].'</label>
							
						</div>
					</div>

					<div class="control-group">
						<h4>Giao tiếp mạng</h4>
						<label class="control-label">LAN</label>
						<div class="controls">
							<label class="checkbox">'.$data3['lan'].'</label>
							
						</div>
						<br>
						<label class="control-label">Chuẩn WiFi</label>
						<div class="controls">
							<label class="checkbox">'.$data3['wifi_stand'].'</label>
							
						</div>
						<br>
						<label class="control-label">Kết nối không dây khác</label>
						<div class="controls">
							<label class="checkbox">'.$data3['wire_other'].'</label>
							
						</div>
					</div>

					<div class="control-group">
						<h4>Card Reader</h4>
						<label class="control-label">Đọc thẻ nhớ</label>
						<div class="controls">
							<label class="checkbox">'.$data3['card_read'].'</label>
						
						</div>
						<br>
						<label class="control-label">Khe đọc thẻ nhớ</label>
						<div class="controls">
							<label class="checkbox">'.$data3['card_slot'].'</label>
							
						</div>
					</div>

					<div class="control-group">
						<h4>Webcam</h4>
						<label class="control-label">Độ phân giải WC</label>
						<div class="controls">
							<label class="checkbox">'.$data3['cam_pixel'].'</label>
							
						</div><br>
						<label class="control-label">Thông tin thêm</label>
						<div class="controls">
							<label class="checkbox">'.$data3['cam_info'].'</label>
							
						</div>
					</div>


					<div class="control-group">
						<h4>PIN/Battery</h4>
						<label class="control-label">Thông tin Pin</label>
						<div class="controls">
							<label class="checkbox">'.$data3['pin_info'].'</label>
							
						</div>
					</div>

					<div class="control-group">
						<h4>Hệ điều hành, phần mềm sẵn có/OS</h4>
						<label class="control-label">Hệ điều hành</label>
						<div class="controls">
							<label class="checkbox">'.$data3['os_ver'].'</label>
							
						</div><br>
						<label class="control-label">Phần mềm sẵn có</label>
						<div class="controls">
							<label class="checkbox">'.$data3['soft'].'</label>
							
						</div>
					</div>


					<div class="control-group">
						<h4>Kích thước &amp; Trọng lượng</h4>
						<label class="control-label">Kích thước</label>
						<div class="controls">
							<label class="checkbox">'.$data3['size'].'</label>
							
						</div><br>
						<label class="control-label">Trọng lượng (kg)</label>
						<div class="controls">
							<label class="checkbox">'.$data3['weight'].'</label>
							
						</div><br>
						<label class="control-label">Chất liệu</label>
						<div class="controls">
							<label class="checkbox">'.$data3['matter'].'</label>
							
						</div>
					</div>';
				}


if($data_cate['parentId']==10){ //tablet

					echo '<div class="control-group"><h3 style="color:blue">Thông số kĩ thuật</h3></div><div class="control-group">
						<h4>Màn hình</h4>
						<label class="control-label">Công nghệ MH</label>
						<div class="controls">
							<label class="checkbox">'.$data3['scr_tech'].'</label>
						</div>
						<br>

						<label class="control-label">Độ phân giải</label>
						<div class="controls">
							<label class="checkbox">'.$data3['scr_dpi'].'</label>
						</div>
						<br>
						

						<label class="control-label">Kích thước màn hình</label>
						<div class="controls">
							<label class="checkbox">'.$data3['scr_width'].'</label>
						
						</div>
						
					</div>

					<div class="control-group">
						<h4>Chụp ảnh &amp; Quay phim</h4>
						<label class="control-label">Độ phân giải</label>
						<div class="controls">
							<label class="checkbox">'.$data3['b_campixel'].'</label>
						</div>
						<br>

						<label class="control-label">Quay phim</label>
						<div class="controls">
							<label class="checkbox">'.$data3['b_camvideo'].'</label>
						</div>
						<br>
						
					
						<label class="control-label">Tính năng camera</label>
						<div class="controls">
							<label class="checkbox">'.$data3['b_camfeature'].'</label>
						</div>
						<br>
						<label class="control-label">Camera trước</label>
						<div class="controls">
							<label class="checkbox">'.$data3['f_campixel'].'</label>
							
						</div>
					</div>

					<div class="control-group">
						<h4>Cấu hình</h4>
						<label class="control-label">Hệ điều hành</label>
						<div class="controls">
							<label class="checkbox">'.$data3['os_ver'].'</label>
							
						</div>
						<br>
						<label class="control-label">Loại CPU (Chipset)</label>
						<div class="controls">
							<label class="checkbox">'.$data3['chip_name'].'</label>
							
						</div>
						<br>
						<label class="control-label">Tốc độ CPU</label>
						<div class="controls">
							<label class="checkbox">'.$data3['chip_clock'].'</label>
							
						</div>
						<br>
						<label class="control-label">Chip đồ họa (GPU)</label>
						<div class="controls">
							<label class="checkbox">'.$data3['chip_gpu'].'</label>
							
						</div>
						<br>
						<label class="control-label">RAM</label>
						<div class="controls">
							<label class="checkbox">'.$data3['ram'].'</label>
							
						</div>
						<br>
						<label class="control-label">Bộ nhớ trong (ROM)</label>
						<div class="controls">
							<label class="checkbox">'.$data3['rom_size'].'</label>
							
						</div>
						<br>
						<label class="control-label">Bộ nhớ khả dụng</label>
						<div class="controls">
							<label class="checkbox">'.$data3['rom_enable'].'</label>
							
						</div>
						<br>
						<label class="control-label">Thẻ nhớ ngoài</label>
						<div class="controls">
							<label class="checkbox">'.$data3['sdcard'].'</label>
							
						</div>
						<br>
						<label class="control-label">Hỗ trợ thẻ tối đa</label>
						<div class="controls">
							<label class="checkbox">'.$data3['sdmax'].'</label>
							
						</div>
						<br>
						<label class="control-label">Cảm biến</label>
						<div class="controls">
							<label class="checkbox">'.$data3['sensor'].'</label>
							
						</div>
					</div>

					<div class="control-group">
						<h4>Kết nối</h4>
						<label class="control-label">Số khe sim</label>
						<div class="controls">
							<label class="checkbox">'.$data3['sim_num'].'</label>
							
						</div>
						<br>
						<label class="control-label">Loại Sim</label>
						<div class="controls">
							<label class="checkbox">'.$data3['sim_type'].'</label>
							
						</div>
						<br>
						<label class="control-label">Thực hiện cuộc gọi</label>
						<div class="controls">
							<label class="checkbox">'.$data3['calling'].'</label>
						</div>
						<br>
						<label class="control-label">Hỗ trợ 3G</label>
						<div class="controls">
							<label class="checkbox">'.$data3['net_3g'].'</label>
							
						</div>
						<br>
						<label class="control-label">Hỗ trợ 4G</label>
						<div class="controls">
							<label class="checkbox">'.$data3['net_4g'].'</label>
					
						</div>
						<br>
						<label class="control-label">Wifi</label>
						<div class="controls">
							<label class="checkbox">'.$data3['wifi'].'</label>
							
						</div>
						<br>
						<label class="control-label">Bluetooth</label>
						<div class="controls">
							<label class="checkbox">'.$data3['bluetooth'].'</label>
						</div>
						<br>
						

						<label class="control-label">GPS</label>
						<div class="controls">
							<label class="checkbox">'.$data3['gps'].'</label>
						
						</div>
						<br>
						<label class="control-label">Cổng kết nối/sạc</label>
						<div class="controls">
							<label class="checkbox">'.$data3['port'].'</label>
							
						</div>
						<br>
						<label class="control-label">Jack tai nghe</label>
						<div class="controls">
							<label class="checkbox">'.$data3['jack'].'</label>
							
						</div>
						<br>
						<label class="control-label">Hỗ trợ OTG</label>
						<div class="controls">
							<label class="checkbox">'.$data3['otg'].'</label>
							
						</div>
						<br>
						<label class="control-label">Kết nối khác</label>
						<div class="controls">
							<label class="checkbox">'.$data3['net_other'].'</label>
							
						</div>
						
					</div>

					<div class="control-group">
						<h4>Chức năng khác</h4>
						<label class="control-label">Ghi âm</label>
						<div class="controls">
							<label class="checkbox">'.$data3['record'].'</label>
							
						</div>
						<br>
						<label class="control-label">Radio</label>
						<div class="controls">
							<label class="checkbox">'.$data3['radio'].'</label>
							
						</div>
						<br>
						<label class="control-label">Tính năng đặc biệt</label>
						<div class="controls">
							<label class="checkbox">'.$data3['spec_feat'].'</label>
							
						</div>
						
					</div>

					<div class="control-group">
						<h4>Thiết kế &amp; Trọng lượng</h4>
						<label class="control-label">Chất liệu</label>
						<div class="controls">
							<label class="checkbox">'.$data3['matter'].'</label>
							
						</div><br>
						<label class="control-label">Kích thước</label>
						<div class="controls">
							<label class="checkbox">'.$data3['size'].'</label>
							
						</div><br>
						<label class="control-label">Trọng lượng</label>
						<div class="controls">
							<label class="checkbox">'.$data3['weight'].'</label>
							
						</div>
						
					</div>


					<div class="control-group">
						<h4>Thông tin pin</h4>
						<label class="control-label">Loại pin</label>
						<div class="controls">
							<label class="checkbox">'.$data3['pin_type'].'</label>
							
						</div><br>

						<label class="control-label">Dung lượng pin</label>
						<div class="controls">
							<label class="checkbox">'.$data3['pin_size'].'</label>
							
						</div>
					</div>';
				}
if($data_cate['parentId']==11){
			echo '<div class="control-group">
						<label class="control-label">Nội dung mô tả</label>
						<div class="controls">
							<textarea class="checkbox" disabled="" style="height:500px;width:800px">'.$data3['content'].'</textarea>
						</div>
				</div>';

}

?>				


				<div class="form-actions">
					<a class="btn btn-success" href="productUpdate.php?id='<?php echo $data2['id'];?>'">Cập nhật</a>
					<a class="btn" href="productIndex.php">Trở lại</a>
				</div>
			</div>
			
		</div>

	</div> <!-- container -->
	 <hr>
      <!-- /Include Footer -->
  	<?php include 'include/footer.php'; ?>
</body>
</html>