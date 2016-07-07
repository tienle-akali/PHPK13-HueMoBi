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
							<?php echo $data2['prices']; ?>
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
				
				<?php
				if($data_cate['parentId']==8)
				{	
					echo '<table class="table table-striped table-bordered">
	        		<caption><h3>Thông số cấu hình</h3></caption>
	              	<thead>
		                <tr>
		                	<th>Tên thông số</th>
		                  	<th>Thông số</th>
		                </tr>
	              	</thead>
	              	<tbody>
	              	<?php 
				   	include '../database.php';
				   	$conn = Database::connect();
					$results = Database::selectTable($conn,"category","","");
					if ($results!=null) {
					    // output data of each row
					    while($row = mysqli_fetch_assoc($results)) {
					        echo '<tr>';
					        echo '<td>'. $row['id'] . '</td>';
						   	echo '<td>'. $row['name'] . '</td>';
						   	echo '<td>'. $row['parentId'] . '</td>';
						   	echo '<td width=100px >';
						   	echo '<a class="btn btn-small btn-success" href="categoryUpdate.php?id='.$row['id'].'"><i class="icon-edit"></i></a>';
						   	echo '<a class="btn btn-small btn-danger" href="categoryDelete.php?id='.$row['id'].'" style="margin-left:5px"><i class="icon-remove-circle"></i></a>';
						   	echo '</td>';
						   	echo '</tr>';
					    }
					} else {
					    echo "<td colspan='4' style='text-align: center; font-size:20px; color: red'>No Data</td>";
					}'
					echo '<div class="control-group"><h3 style="color:blue">Thông số kĩ thuật</h3></div>

					<div class="control-group">
						<h4>Màn hình</h4>
						<label class="control-label">Công nghệ màn hình</label>
						<div class="controls">'
							// <!-- <?php echo array_key_exists('scr_tech', $data3) ? $data3['scr_tech'] : '';
							.$data3['scr_tech'].';
						</div>'

						<label class="control-label">Độ phân giải</label>
						<div class="controls">
							<?php echo $data3['scr_dpi'];?>
						</div>
						<label class="control-label">Màn hình rộng</label>
						<div class="controls">
							<?php echo $data3['scr_width'];?>
						</div>
						<label class="control-label">Cảm ứng</label>
						<div class="controls">
							<?php echo $data3['scr_touch'];?>
						</div>

						<label class="control-label">Mặt kính cảm ứng</label>
						<div class="controls">
							<?php echo $data3['scr_glass'];?>
						</div>
					</div>
					<div class="control-group">
						<h4>Camera sau</h4>
						<label class="control-label">Độ phân giải</label>
						<div class="controls">
							<?php echo $data3['b_campixel'];?>
						</div>
						<label class="control-label">Quay phim</label>
						<div class="controls">
							<?php echo $data3['b_camvideo'];?>
							
						</div>
						<label class="control-label">Đèn Flash</label>
						<div class="controls">
							<?php echo $data3['b_camflash'];?>
						</div>
						<label class="control-label">Chụp ảnh nâng cao</label>
						<div class="controls">
							<?php echo $data3['b_campro'];?>
							
						</div>
					</div>
					<div class="control-group">
						<h4>Camera trước</h4>
						<label class="control-label">Độ phân giải</label>
						<div class="controls">
							<?php echo $data3['f_campixel'];?>
							
						</div>
						<label class="control-label">Quay phim</label>
						<div class="controls">
							<?php echo $data3['f_camvideo'];?>
					
						</div>
						<label class="control-label">Video Call</label>
						<div class="controls">
							<?php echo $data3['f_camcall'];?>
							
						</div>
						<label class="control-label">Thông tin khác</label>
						<div class="controls">
							<?php echo $data3['f_camother'];?>
							
						</div>
					</div>
					<div class="control-group">
						<h4>Hệ điều hành - CPU</h4>
						<label class="control-label">Hệ điều hành</label>
						<div class="controls">
							<?php echo $data3['os_ver'];?>
						</div>
						<label class="control-label">Chipset (hãng SX CPU)</label>
						<div class="controls">
							<?php echo $data3['chip_name'];?>
						
						</div>
						<label class="control-label">Tốc độ CPU</label>
						<div class="controls">
							<?php echo $data3['chip_clock'];?>
							
						</div>
						<label class="control-label">Chip đồ họa (GPU)</label>
						<div class="controls">
							<?php echo $data3['chip_gpu'];?>
							
						</div>
					</div>
					<div class="control-group">
						<h4>Bộ nhớ &amp; Lưu trữ</h4>
						<label class="control-label">RAM</label>
						<div class="controls">
							<?php echo $data3['ram'];?>
							
						</div>
						<label class="control-label">Bộ nhớ trong (ROM)</label>
						<div class="controls">
							<?php echo $data3['rom_size'];?>
							
						</div>
						<label class="control-label">Bộ nhớ khả dụng</label>
						<div class="controls">
							<?php echo $data3['rom_enable'];?>
							
						</div>
						<label class="control-label">Thẻ nhớ ngoài</label>
						<div class="controls">
							<?php echo $data3['sdcard'];?>
							
						</div>
						<label class="control-label">Hỗ trợ thẻ tối đa</label>
						<div class="controls">
							<?php echo $data3['sdmax'];?>
							
						</div>
					</div>
					<div class="control-group">
						<h4>Kết nối</h4>
						<label class="control-label">Băng tần 2G</label>
						<div class="controls">
							<?php echo $data3['net_2g'];?>
							
						</div>
						<label class="control-label">Băng tần 3G</label>
						<div class="controls">
							<?php echo $data3['net_3g'];?>
							
						</div>
						<label class="control-label">Hỗ trợ 4G</label>
						<div class="controls">
							<?php echo $data3['net_4g'];?>
							
						</div>
						<label class="control-label">Số khe sim</label>
						<div class="controls">
							<?php echo $data3['sim_num'];?>
							
						</div>
						<label class="control-label">Loại Sim</label>
						<div class="controls">
							<?php echo $data3['sim_type'];?>
							
						</div>
						<label class="control-label">Wifi</label>
						<div class="controls">
							<?php echo $data3['wifi'];?>
							
						</div>
						<label class="control-label">GPS</label>
						<div class="controls">
							<?php echo $data3['gps'];?>
							
						</div>
						<label class="control-label">Bluetooth</label>
						<div class="controls">
							<?php echo $data3['bluetooth'];?>
						
						</div>
						<label class="control-label">NFC</label>
						<div class="controls">
							<?php echo $data3['nfc'];?>
							
						</div>
						<label class="control-label">Cổng kết nối/sạc</label>
						<div class="controls">
							<?php echo $data3['port'];?>
							
						</div>
						<label class="control-label">Jack tai nghe</label>
						<div class="controls">
							<?php echo $data3['jack'];?>
							
						</div>
						<label class="control-label">Kết nối khác</label>
						<div class="controls">
							<?php echo $data3['net_other'];?>
							
						</div>
					</div>
					<div class="control-group">
						<h4>Thiết kế &amp; Trọng lượng</h4>
						<label class="control-label">Thiết kế</label>
						<div class="controls">
							<?php echo $data3['design'];?>
							
						</div>
						<label class="control-label">Chất liệu</label>
						<div class="controls">
							<?php echo $data3['matter'];?>
							
						</div>
						<label class="control-label">Kích thước</label>
						<div class="controls">
							<?php echo $data3['size'];?>
							
						</div>
						<label class="control-label">Trọng lượng</label>
						<div class="controls">
							<?php echo $data3['weight'];?>
							
						</div>
					</div>
					<div class="control-group">
						<h4>Thông tin pin</h4>
						<label class="control-label">Dung lượng pin</label>
						<div class="controls">
							<?php echo $data3['pin_size'];?>
							
						</div>
						<label class="control-label">Loại pin</label>
						<div class="controls">
							<?php echo $data3['pin_type'];?>
							
						</div>
					</div>
					<div class="control-group">
						<h4>Giải trí &amp; Ứng dụng</h4>
						<label class="control-label">Xem phim</label>
						<div class="controls">
							<?php echo $data3['movie'];?>
							
						</div>
						<label class="control-label">Nghe nhạc</label>
						<div class="controls">
							<?php echo $data3['music'];?>
							
						</div>
						<label class="control-label">Ghi âm</label>
						<div class="controls">
							<?php echo $data3['record'];?>
							
						</div>
						<label class="control-label">Radio</label>
						<div class="controls">
							<?php echo $data3['radio'];?>
							
						</div>
						<label class="control-label">Chức năng khác</label>
						<div class="controls">
							<?php echo $data3['other'];?>
							
						</div>
					</div>
				}
				
				?>


				<div class="control-group controls"> <!-- trỏ đến trang cấu hình -->
					<!-- <a class="btn btn-danger" href="detailproduct.php?id='<?php //echo $data2['id'];?>'">Chi tiết sản phẩm</a> -->
					<a class="btn btn-success" href="productUpdate.php?id='<?php echo $data2['id'];?>'">Cập nhật</a>
				</div>

				<div class="form-actions">
					<a class="btn" href="productIndex.php">Trở lại</a>
				</div>
			</div>
			
		</div>

	</div> <!-- container -->
</body>
</html>