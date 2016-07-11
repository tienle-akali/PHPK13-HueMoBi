<?php

	$id = null;

	if( !empty($_GET['id']))
	{
		$id = $_REQUEST['id'];
	}

	if( null==$id){
		header("Location: productIndex.php");
	}

	require '../database.php';
	$conn = Database::connect();

	if($_SERVER["REQUEST_METHOD"] == "POST")
	{	
		// $id = $_POST['id'];
		$nameprod = $_POST['nameprod'];
		$prices = $_POST['prices'];
		$idCategory = $_POST['idCategory'];
		$importDay = $_POST['importDay'];

		
		$sql = "UPDATE `product` SET `name`='$nameprod', `prices`='$prices', `idCategory`='$idCategory', `importDay`='$importDay' WHERE `id`='$id'";
		$kq = mysqli_query($conn,$sql);
		// $idprod = $kq->insert_id;
		
		//hình ảnh

		//     INSERT INTO `hinhanh`(`avatar`, `image`, `productId`) VALUES ('upload/product/', 'upload/product/', ) 
		$changer=$_POST['changer'];
		$logo=$_POST['logo'];
			if($changer==1){
				if($FILES['avatar']['tmp_name']!=null&&$FILES['image']['tmp_name']!=null){
					if(unlink($logo)){
						$url = '../upload/product/';
						$avatar=$url.$_FILES['avatar']['name']; 
						$image=$url.$_FILES['image']['name'];
						move_uploaded_file($_FILES['avatar']['tmp_name'], $avatar);
						move_uploaded_file($_FILES['image']['tmp_name'], $image);
							$sql_img="UPDATE `hinhanh` SET `avatar`='$avatar',`image`='$image' WHERE `productId`='$id'";
						}
					}
				}
				else{
					echo '<script language="javascript">';
					echo 'alert("No File Avatar !")';
					echo '</script>';
				}
			
			mysqli_query($conn,$sql_img);


		$sql2 = "SELECT * FROM product WHERE id=$id";
		$results = mysqli_query($conn, $sql2);
		if ($results->num_rows > 0) {
			$data2 = $results->fetch_array();
		}
// ===============================LỌC RA DANH MỤC GỐC CỦA SẢN PHẨM ĐỂ XUẤT CHI TIẾT SẢN PHẨM===================
		$idCateProd = $data2['idCategory'];//chon ra idCategory cua san pham de truy van den id cua danh muc
		$sql_cate = "SELECT parentId FROM category WHERE id=$idCateProd";

		$result_cate = mysqli_query($conn, $sql_cate);//thuc hien truy van
		$data_cate=null;
		
		if($result_cate->num_rows > 0)
		{
			$data_cate = $result_cate->fetch_array();//gan du lieu cho bien data_cate (id của danh mục cha)
		}

		if($data_cate['parentId']==8)//kiem tra $data_cate co phai la danh muc dien thoai khong
		{
			$sql3 = "SELECT * FROM detailphone WHERE productId=$id";//neu dung thi thuc hien cau lenh	
		}
		if ($data_cate['parentId']==9) {
			$sql3 = "SELECT * FROM detaillaptop WHERE productId=$id";
		}
		if ($data_cate['parentId']==10) {
			$sql3 = "SELECT * FROM detailtablet WHERE productId=$id";
		}
		if ($data_cate['parentId']==11) {
			$sql3 = "SELECT * FROM detailphukien WHERE productId=$id";
		}
		
		$results2 = mysqli_query($conn, $sql3);
		if ($results2->num_rows > 0) {
		
			$data3 = $results2->fetch_array(); //đưa dữ liệu chi tiết sản phẩm vào biến data3
		}
// ===============================LỌC RA DANH MỤC GỐC CỦA SẢN PHẨM ĐỂ XUẤT CHI TIẾT SẢN PHẨM===================

		if($data_cate['parentId']==8)//kiem tra $data_cate co phai la danh muc dien thoai khong
		{
			// thông số kĩ thuật điện thoại
			// $productId = $idprod;

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

			$sql4 = "UPDATE `detailphone` SET `scr_tech`='$scr_tech',`scr_dpi`='$scr_dpi',`scr_width`='$scr_width',`scr_touch`='$scr_touch',`scr_glass`='$scr_glass',`b_campixel`='$b_campixel',`b_camvideo`='$b_camvideo',`b_camflash`='$b_camflash',`b_campro`='$b_campro',`f_campixel`='$f_campixel',`f_camvideo`='$f_camvideo',`f_camcall`='$f_camcall',`f_camother`='$f_camother',`os_ver`='$os_ver',`chip_name`='$chip_name',`chip_clock`='$chip_clock',`chip_gpu`='$chip_gpu',`ram`='$ram',`rom_size`='$rom_size',`rom_enable`='$rom_enable',`sdcard`='$sdcard',`sdmax`='$sdmax',`net_2g`='$net_2g',`net_3g`='$net_3g',`net_4g`='$net_4g',`sim_num`='$sim_num',`sim_type`='$sim_type',`wifi`='$wifi',`gps`='$gps',`bluetooth`='$bluetooth',`nfc`='$nfc',`port`='$port',`jack`='$jack',`net_other`='$net_other',`design`='$design',`matter`='$matter',`size`='$size',`weight`='$weight',`pin_size`='$pin_size',`pin_type`='$pin_type',`movie`='$movie',`music`='$music',`record`='$record',`radio`='$radio',`other`='$other' WHERE `productId`='$id'";//neu dung thi thuc hien cau lenh	
			$conn->query($sql4);
		}
		if($data_cate['parentId']==9)//kiem tra $data_cate co phai la danh muc laptop khong
		{
			// thông số kĩ thuật laptop
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

			$sql4 = "UPDATE `detaillaptop` SET `cpu_prod`='$cpu_prod',`cpu_tech`='$cpu_tech',`cpu_type`='$cpu_type',`cpu_clock`='$cpu_clock',`cpu_cache`='$cpu_cache',`cpu_max`='$cpu_max',`board_chip`='$board_chip',`board_bus`='$board_bus',`board_ram_max`='$board_ram_max',`ram_size`='$ram_size',`ram_type`='$ram_type',`ram_bus`='$ram_bus',`disk_type`='$disk_type',`disk_size`='$disk_size',`scr_width`='$scr_width',`scr_dpi`='$scr_dpi',`scr_tech`='$scr_tech',`scr_touch`='$scr_touch',`gpu_chip`='$gpu_chip',`gpu_memory`='$gpu_memory',`gpu_style`='$gpu_style',`sound_channel`='$sound_channel',`sound_other`='$sound_other',`optical_disk`='$optical_disk',`optical_type`='$optical_type',`port`='$port',`ext_feat`='$ext_feat',`lan`='$lan',`wifi_stand`='$wifi_stand',`wire_other`='$wire_other',`card_read`='$card_read',`card_slot`='$card_slot',`cam_pixel`='$cam_pixel',`cam_info`='$cam_info',`pin_info`='$pin_info',`os_ver`='$os_ver',`soft`='$soft',`size`='$size',`weight`='$weight',`matter`='$matter' WHERE `productId`='$id'";
			$conn->query($sql4);
		}
		if($data_cate['parentId']==10)//kiem tra $data_cate co phai la danh muc tablet khong
		{

			// thông số kĩ thuật Tablet
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


			$sql4 = "UPDATE `detailtablet` SET `scr_tech`='$scr_tech',`scr_dpi`='$scr_dpi',`scr_width`='$scr_width',`b_campixel`='$b_campixel',`b_camvideo`='$b_camvideo',`b_camfeature`='$b_camfeature',`f_campixel`='$f_campixel',`os_ver`='$os_ver',`chip_name`='$chip_name',`chip_clock`='$chip_clock',`chip_gpu`='$chip_gpu',`ram`='$ram',`rom_size`='$rom_size',`rom_enable`='$rom_enable',`sdcard`='$sdcard',`sdmax`='$sdmax',`sensor`='$sensor',`sim_num`='$sim_num',`sim_type`='$sim_type',`calling`='$calling',`net_3g`='$net_3g',`net_4g`='$net_4g',`wifi`='$wifi',`bluetooth`='$bluetooth',`gps`='$gps',`port`='$port',`jack`='$jack',`otg`='$otg',`net_other`='$net_other',`record`='$record',`radio`='$radio',`spec_feat`='$spec_feat',`matter`='$matter',`size`='$size',`weight`='$weight',`pin_type`='$pin_type',`pin_size`='$pin_size' WHERE `productId`='$id'";
			$conn->query($sql4);
		}
		if($data_cate['parentId']==11)//kiem tra $data_cate co phai la danh muc phu kien khong
		{

			// thông số kĩ thuật Phụ kiện
			// nội dung sản phẩm
			$content = $_POST['content'];

			$sql4 = "UPDATE `detailphukien` SET `content`='$content' WHERE `productId`='$id'";
			$conn->query($sql4);
		}
		
		header("Location: productRead.php?id=$id"); //cập nhật xong trở về trang sản phẩm đó lại
	} else {
		$sql = "SELECT * FROM product WHERE id=$id"; //câu lệnh để lấy tất cả thuộc tính có sẵn trước của sản phẩm đó hiển thị ra trang productUpdate khi mới loading vào
		$results = mysqli_query($conn, $sql);

		if($results->num_rows > 0)
		{
			$data2 = $results->fetch_array();
		}

	}

?>


<!DOCTYPE html>
<html lang = "vi">
<head>
	<title>Cập nhật sản phẩm</title>
	<meta charset = "utf-8">
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
					
				<form class="form-horizontal" action="productUpdate.php?id=<?php echo $data2['id'];?>" method="post">
				
					<legend><h3>Cập nhật sản phẩm: <?php echo $data2['name']; ?></h3></legend>
					<div class="control-group">
						<label class="control-label">Tên sản phẩm</label>
						<div class="controls">
							<input type="text" name="nameprod" placeholder="Nhập tên sản phẩm" value="<?php echo $data2['name'];?>">
						</div>
					</div>

					<div class="control-group">
						<label class="control-label">Giá</label>
						<div class="controls">
							<input type="number" name="prices" placeholder="Nhập giá sản phẩm" value="<?php echo $data2['prices'];?>">
						</div>
					</div>

					<div class="control-group">
						<label class="control-label">Danh mục</label>
						<div class="controls">
							<select name="idCategory">
								<option value="" disabled="disabled">Chọn danh mục</option>
							<?php
								
								$sql = "SELECT * FROM category";

								$results = mysqli_query($conn, $sql);
								
								if($results->num_rows > 0)
								{
									$d=0;
									while ($row = $results->fetch_assoc()) {
										
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
										if($row['id']==$data2['idCategory']){
											echo '<option value = "'.$row['id'].'" selected="selected">'.$row['name'].'</option>';
										}
										elseif($row['parentId']!=0){
											echo '<option value = "'.$row['id'].'">'.$row['name'].'</option>';
										}

									}
									
								}
								// Database::disconnect();
							?>
							</select>
						</div>
					</div>

					<div class="control-group">
						<label class="control-label">Ngày nhập kho</label>
						<div class="controls">
							<input type="date" name="importDay" placeholder="Nhập ngày tháng năm" value="<?php echo $data2['importDay'];?>">
						</div>
					</div>


					<!-- thêm hình ảnh -->

					<div style="margin-left:450px;width:160px; height:200px">
						<div style="width:150px;height:150px; text-align:center"><img id="blah" alt="your image" width="128px" height="128px" class="img-polaroid" src="<?php echo $data['avatar'];?>"/></div>
						<div>
						<script>
							$(document).ready(function(){
							    $("#hide").click(function(){
							        $("#upfile").hide();
							    });
							    $("#show").click(function(){
							        $("#upfile").show();
							    });
							});
						</script>
							Changer Logo Producer: 
							<input type="radio" id="show" name="changer" value="1" checked> Yes
							<input type="radio" id="hide" name="changer" value="0" > No
		  					<br>
		  					<input type="file" id="upfile" accept="image/*" name="avatar" onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])">
						</div>
					</div>
					<div style="margin-left:450px;width:160px; height:200px">
						<div style="width:150px;height:150px; text-align:center"><img id="blah" alt="your image" width="128px" height="128px" class="img-polaroid" src="<?php echo $data['image'];?>"/></div>
						<div>
						<script>
							$(document).ready(function(){
							    $("#hide").click(function(){
							        $("#upfile").hide();
							    });
							    $("#show").click(function(){
							        $("#upfile").show();
							    });
							});
						</script>
							Changer Logo Producer: 
							<input type="radio" id="show" name="changer" value="1" checked> Yes
							<input type="radio" id="hide" name="changer" value="0" > No
		  					<br>
		  					<input type="file" id="upfile" accept="image/*" name="avatar" onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])">
						</div>
					</div>

					<!-- <div class="control-group">
						<label class="control-label">Avatar</label>
						<div style="margin-left:250px;width:160px; height:200px">
							<div style="width:150px;height:150px; text-align:center"><img id="blah" alt="your image" width="128px" height="128px" class="img-polaroid" src="../assets/img/logocamera.png"/></div><br>
							<input type="file" accept="image/*" required="" name="avatar" onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])">
						</div>
				  	</div>
				  	<div class="control-group">
						<label class="control-label">Hình ảnh</label>
						<div style="margin-left:250px;width:160px; height:200px">
							<div style="width:150px;height:150px; text-align:center"><img id="blah2" alt="your image" width="128px" height="128px" class="img-polaroid" src="../assets/img/logocamera.png"/></div><br>
							<input type="file" accept="image/*" required="" name="image" onchange="document.getElementById('blah2').src = window.URL.createObjectURL(this.files[0])">
						</div>
				  	</div> -->



<?php
// ===============================LỌC RA DANH MỤC GỐC CỦA SẢN PHẨM ĐỂ XUẤT CHI TIẾT SẢN PHẨM===================
		$idCateProd = $data2['idCategory'];//chon ra idCategory cua san pham de truy van den id cua danh muc
		$sql_cate = "SELECT parentId FROM category WHERE id=$idCateProd";

		$result_cate = mysqli_query($conn, $sql_cate);//thuc hien truy van
		$data_cate=null;
		
		if($result_cate->num_rows > 0)
		{
			$data_cate = $result_cate->fetch_array();//gan du lieu cho bien data_cate (id của danh mục cha)
		}

		if($data_cate['parentId']==8)//kiem tra $data_cate co phai la danh muc dien thoai khong
		{
			$sql3 = "SELECT * FROM detailphone WHERE productId=$id";//neu dung thi thuc hien cau lenh	
		}
		if ($data_cate['parentId']==9) {
			$sql3 = "SELECT * FROM detaillaptop WHERE productId=$id";
		}
		if ($data_cate['parentId']==10) {
			$sql3 = "SELECT * FROM detailtablet WHERE productId=$id";
		}
		if ($data_cate['parentId']==11) {
			$sql3 = "SELECT * FROM detailphukien WHERE productId=$id";
		}
		
		$results2 = mysqli_query($conn, $sql3);
		if ($results2->num_rows > 0) {
		
			$data3 = $results2->fetch_array(); //đưa dữ liệu chi tiết sản phẩm vào biến data3
		}
// ===============================LỌC RA DANH MỤC GỐC CỦA SẢN PHẨM ĐỂ XUẤT CHI TIẾT SẢN PHẨM===================

if($data_cate['parentId']==8){ //phone

					echo '<div class="control-group"><h3 style="color:blue">Thông số kĩ thuật</h3></div>
					<div class="control-group">
						<h4>Màn hình</h4>
						<label class="control-label">Công nghệ màn hình</label>
						<div class="controls">
							<select name="scr_tech">
								<option selected="" value="'.$data3['scr_tech'].'">'.$data3['scr_tech'].'</option>
								<option value="TFT">TFT</option>
								<option value="IPS LCD">IPS LCD</option>
								<option value="Retina">Retina</option>
								<option value="Super Amoled">Super AMOLED</option>
							</select>
							
						</div>
						<label class="control-label">Độ phân giải</label>
						<div class="controls">
							<select name="scr_dpi">
								<option selected="" value="'.$data3['scr_dpi'].'">'.$data3['scr_dpi'].'</option>
								<option value="128 x 160 Pixels">128 x 160 Pixels</option>
								<option value="VGA (640 x 480)">VGA (640 x 480 pixels)</option>
								<option value="qHD (960 x 540 pixels)">qHD (960 x 540 pixels)</option>
								<option value="HD (1280 x 720 pixels)">HD (1280 x 720 pixels)</option>
								<option value="Full HD (1920 x 1080 pixels)">Full HD (1920 x 1080 pixels)</option>
								<option value="2K (2560 x 1440 pixels)">2K (2560 x 1440 pixels)</option>
								<option value="4K (4096 x 2160 pixels)">4K (4096 x 2160 pixels)</option>
								<option value="4K Ultra HD (3840 x 2160 pixels)">4K Ultra HD (3840 x 2160 pixels)</option>
							</select>
							
						</div>
						<label class="control-label">Màn hình rộng</label>
						<div class="controls">
							<input type="text" name="scr_width" placeholder="Inch" value="'.$data3['scr_width'].'">
						</div>
						<label class="control-label">Cảm ứng</label>
						<div class="controls">
							<select name="scr_touch">
								<option value="'.$data3['scr_touch'].'">'.$data3['scr_touch'].'</option>
								<option value="Không">Không</option>
								<option value="Cảm ứng điện dung đa điểm">Cảm ứng điện dung đa điểm</option>
							</select>
							
						</div>
						<label class="control-label">Mặt kính cảm ứng</label>
						<div class="controls">
							<select name="scr_glass">
								
								<option value="'.$data3['scr_glass'].'">'.$data3['scr_glass'].'</option>
								<option value="Kính thường">Kính thường</option>
								<option value="Kính cường lực">Kính cường lực</option>
								<option value="Gorrila Glass 3">Gorrila Glass 3</option>
								<option value="Gorrila Glass 4">Gorrila Glass 4</option>
								<option value="Kính oleophobic (ion cường lực)">Kính oleophobic (ion cường lực)</option>
							</select>
							
						</div>
					</div>
					<div class="control-group">
						<h4>Camera sau</h4>
						<label class="control-label">Độ phân giải</label>
						<div class="controls">
							<select name="b_campixel">
								<option value="'.$data3['b_campixel'].'">'.$data3['b_campixel'].'</option>
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
							
						</div>
						<label class="control-label">Quay phim</label>
						<div class="controls">
							<select name="b_camvideo">
								<option value="'.$data3['b_camvideo'].'">'.$data3['b_camvideo'].'</option>
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
							
						</div>
						<label class="control-label">Đèn Flash</label>
						<div class="controls">
							<select name="b_camflash">
								<option value="'.$data3['b_camflash'].'">'.$data3['b_camflash'].'</option>
								<option value="Có">Có</option>
								<option value="Không">Không</option>
								<option value="Dual Tone LED">Dual Tone LED</option>
							</select>
							
						</div>
						<label class="control-label">Chụp ảnh nâng cao</label>
						<div class="controls">
							<select name="b_campro">
								<option value="'.$data3['b_campro'].'">'.$data3['b_campro'].'</option>
								<option value="Không">Không</option>
								<option value="Tự động lấy nét, Chạm lấy nét, Nhận diện khuôn mặt, Nhận diện nụ cười, HDR, Panorama, Chống rung quang học">Tự động lấy nét, Chạm lấy nét, Nhận diện khuôn mặt, Nhận diện nụ cười, HDR, Panorama, Chống rung quang học</option>
							</select>
							
						</div>
					</div>
					<div class="control-group">
						<h4>Camera trước</h4>
						<label class="control-label">Độ phân giải</label>
						<div class="controls">
							<select name="f_campixel">
								<option value="'.$data3['f_campixel'].'">'.$data3['f_campixel'].'</option>
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
							
						</div>
						<label class="control-label">Quay phim</label>
						<div class="controls">
							<select name="f_camvideo">
								<option value="'.$data3['f_camvideo'].'">'.$data3['f_camvideo'].'</option>
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
							
						</div>
						<label class="control-label">Video Call</label>
						<div class="controls">
							<select name="f_camcall">
								<option value="'.$data3['f_camcall'].'">'.$data3['f_camcall'].'</option>
								<option value="Có">Có</option>
								<option value="Không">Không</option>
							</select>
							
						</div>
						<label class="control-label">Thông tin khác</label>
						<div class="controls">
							<input type="text" name="f_camother" placeholder="Thông tin khác" value="'.$data3['f_camother'].'">
						</div>
					</div>
					<div class="control-group">
						<h4>Hệ điều hành - CPU</h4>
						<label class="control-label">Hệ điều hành</label>
						<div class="controls">
							<select name="os_ver">
								<option value="'.$data3['os_ver'].'">'.$data3['os_ver'].'</option>
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
							
						</div>
						<label class="control-label">Chipset (hãng SX CPU)</label>
						<div class="controls">
							<input type="text" name="chip_name" placeholder="Chipset" value="'.$data3['chip_name'].'">
						</div>
						<label class="control-label">Tốc độ CPU</label>
						<div class="controls">
							<input type="text" name="chip_clock" placeholder="Ghz" value="'.$data3['chip_clock'].'">
						</div>
						<label class="control-label">Chip đồ họa (GPU)</label>
						<div class="controls">
							<input type="text" name="chip_gpu" placeholder="GPU" value="'.$data3['chip_gpu'].'">
						</div>
					</div>
					<div class="control-group">
						<h4>Bộ nhớ &amp; Lưu trữ</h4>
						<label class="control-label">RAM</label>
						<div class="controls">
							<select name="ram">
								<option value="'.$data3['ram'].'">'.$data3['ram'].'</option>
								<option value="Không">Không</option>
								<option value="512 MB">512 MB</option>
								<option value="1 GB">1 GB</option>
								<option value="1.5 GB">1.5 GB</option>
								<option value="2 GB">2 GB</option>
								<option value="3 GB">3 GB</option>
								<option value="4 GB">4 GB</option>
								<option value="6 GB">6 GB</option>
							</select>
							
						</div>
						<label class="control-label">Bộ nhớ trong (ROM)</label>
						<div class="controls">
							<select name="rom_size">
								<option value="'.$data3['rom_size'].'">'.$data3['rom_size'].'</option>
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
							
						</div>
						<label class="control-label">Bộ nhớ khả dụng</label>
						<div class="controls">
							<input type="text" name="rom_enable" placeholder="Bộ nhớ khả dụng" value="'.$data3['rom_enable'].'">
						</div>
						<label class="control-label">Thẻ nhớ ngoài</label>
						<div class="controls">
							<select name="sdcard">
								<option value="'.$data3['sdcard'].'">'.$data3['sdcard'].'</option>
								<option value="Không">Không</option>
								<option value="SD">SD</option>
								<option value="Micro SD">Micro SD</option>
							</select>
							
						</div>
						<label class="control-label">Hỗ trợ thẻ tối đa</label>
						<div class="controls">
							<select name="sdmax">
								<option value="'.$data3['sdmax'].'">'.$data3['sdmax'].'</option>
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
							
						</div>
					</div>
					<div class="control-group">
						<h4>Kết nối</h4>
						<label class="control-label">Băng tần 2G</label>
						<div class="controls">
							<input type="text" name="net_2g" placeholder="2G" value="'.$data3['net_2g'].'">
						</div>
						<label class="control-label">Băng tần 3G</label>
						<div class="controls">
							<input type="text" name="net_3g" placeholder="3G" value="'.$data3['net_3g'].'">
						</div>
						<label class="control-label">Hỗ trợ 4G</label>
						<div class="controls">
							<select name="net_4g">
								<option value="'.$data3['net_4g'].'">'.$data3['net_4g'].'</option>
								<option value="Không">Không</option>
								<option value="Có">Có</option>
								<option value="4G LTE Cat 4">4G LTE Cat 4</option>
								<option value="4G LTE Cat 6">4G LTE Cat 6</option>
								<option value="4G LTE Cat 9">4G LTE Cat 9</option>
							</select>
							
						</div>
						<label class="control-label">Số khe sim</label>
						<div class="controls">
							<select name="sim_num">
								<option value="'.$data3['sim_num'].'">'.$data3['sim_num'].'</option>
								<option value="1 SIM">1 SIM</option>
								<option value="2 SIM">2 Sim</option>
								<option value="2 SIM, SIM 2 chung khe thẻ nhớ">2 SIM, SIM 2 chung khe thẻ nhớ</option>
							</select>
							
						</div>
						<label class="control-label">Loại Sim</label>
						<div class="controls">
							<select name="sim_type">
								<option value="'.$data3['sim_type'].'">'.$data3['sim_type'].'</option>
								<option value="SIM thường">SIM thường</option>
								<option value="Micro SIM">Micro SIM</option>
								<option value="Nano SIM">Nano SIM</option>
							</select>
							
						</div>
						<label class="control-label">Wifi</label>
						<div class="controls">
							<input type="text" name="wifi" placeholder="Wifi" value="'.$data3['wifi'].'">
						</div>
						<label class="control-label">GPS</label>
						<div class="controls">
							<input type="text" name="gps" placeholder="GPS" value="'.$data3['gps'].'">
						</div>
						<label class="control-label">Bluetooth</label>
						<div class="controls">
							<input type="text" name="bluetooth" placeholder="Bluetooth" value="'.$data3['bluetooth'].'">
						</div>
						<label class="control-label">NFC</label>
						<div class="controls">
							<select name="nfc">
								<option value="'.$data3['nfc'].'">'.$data3['nfc'].'</option>
								<option value="Có">Có</option>
								<option value="Không">Không</option>
							</select>
							
						</div>
						<label class="control-label">Cổng kết nối/sạc</label>
						<div class="controls">
							<select name="port">
								<option value="'.$data3['port'].'">'.$data3['port'].'</option>
								<option value="Micro USB">Micro USB</option>
								<option value="Lightning">Lightning</option>
								<option value="USB Type C">USB Type C</option>
							</select>
							
						</div>
						<label class="control-label">Jack tai nghe</label>
						<div class="controls">
							<select name="jack">
								<option value="'.$data3['port'].'">'.$data3['port'].'</option>
								<option value="Không">3.5 mm</option>
								<option value="Có">Có</option>
								<option value="Không">Không</option>
							</select>
							
						</div>
						<label class="control-label">Kết nối khác</label>
						<div class="controls">
							<input type="text" name="net_other" placeholder="Kết nối khác" value="'.$data3['net_other'].'">
						</div>
					</div>
					<div class="control-group">
						<h4>Thiết kế &amp; Trọng lượng</h4>
						<label class="control-label">Thiết kế</label>
						<div class="controls">
							<input type="text" name="design" placeholder="Thiết kế" value="'.$data3['design'].'">
						</div>
						<label class="control-label">Chất liệu</label>
						<div class="controls">
							<select name="matter">
								<option value="'.$data3['matter'].'">'.$data3['matter'].'</option>
								<option value="Nhựa">Nhựa</option>
								<option value="Hợp kim nhôm">Hợp kim nhôm</option>
								<option value="Kim loại">Kim loại</option>
								<option value="Khung kim loại">Khung kim loại</option>
								<option value="Khung kim loại + mặt kính cường lực">Khung kim loại + mặt kính cường lực</option>
							</select>
							
						</div>
						<label class="control-label">Kích thước</label>
						<div class="controls">
							<input type="text" name="size" placeholder="Kích thước" value="'.$data3['size'].'">
						</div>
						<label class="control-label">Trọng lượng</label>
						<div class="controls">
							<input type="text" name="weight" placeholder="Trọng lượng" value="'.$data3['weight'].'">
						</div>
					</div>
					<div class="control-group">
						<h4>Thông tin pin</h4>
						<label class="control-label">Dung lượng pin</label>
						<div class="controls">
							<input type="text" name="pin_size" placeholder="Dung lượng pin" value="'.$data3['pin_size'].'">
						</div>
						<label class="control-label">Loại pin</label>
						<div class="controls">
							<select name="pin_type">
								<option value="'.$data3['pin_type'].'">'.$data3['pin_type'].'</option>
								<option value="Pin chuẩn Li-Ion">Pin chuẩn Li-Ion</option>
								<option value="Pin chuẩn Li-Po">Pin chuẩn Li-Po</option>
							</select>
							
						</div>
					</div>
					<div class="control-group">
						<h4>Giải trí &amp; Ứng dụng</h4>
						<label class="control-label">Xem phim</label>
						<div class="controls">
							<input type="text" name="movie" placeholder="Xem phim" value="'.$data3['movie'].'">
						</div>
						<label class="control-label">Nghe nhạc</label>
						<div class="controls">
							<input type="text" name="music" placeholder="Nghe nhạc" value="'.$data3['music'].'">
						</div>
						<label class="control-label">Ghi âm</label>
						<div class="controls">
							<input type="text" name="record" placeholder="Ghi âm" value="'.$data3['record'].'">
						</div>
						<label class="control-label">Radio</label>
						<div class="controls">
							<input type="text" name="radio" placeholder="Radio" value="'.$data3['radio'].'">
						</div>
						<label class="control-label">Chức năng khác</label>
						<div class="controls">
							<input type="text" name="other" placeholder="Chức năng khác" value="'.$data3['other'].'">
						</div>
					</div>';

}

if($data_cate['parentId']==9){ //laptop

				echo '<div class="control-group"><h3 style="color:blue">Thông số kĩ thuật</h3></div>
					
					<div class="control-group">
						<h4>Bộ xử lý</h4>
						<label class="control-label">Hãng CPU</label>
						<div class="controls">
							<input type="text" name="cpu_prod" placeholder="Hãng CPU" value="'.$data3['cpu_prod'].'">
						</div>
						<label class="control-label">Công nghệ CPU</label>
						<div class="controls">
							<input type="text" name="cpu_tech" placeholder="Công nghệ CPU" value="'.$data3['cpu_tech'].'">
						</div>
						<label class="control-label">Loại CPU</label>
						<div class="controls">
							<input type="text" name="cpu_type" placeholder="Hãng CPU" value="'.$data3['cpu_type'].'">
						</div>
						<label class="control-label">Tốc độ CPU</label>
						<div class="controls">
							<input type="text" name="cpu_clock" placeholder="Hãng CPU" value="'.$data3['cpu_clock'].'">
						</div>
						<label class="control-label">Bộ nhớ đệm</label>
						<div class="controls">
							<input type="text" name="cpu_cache" placeholder="Hãng CPU" value="'.$data3['cpu_cache'].'">
						</div>
						<label class="control-label">Tốc độ tối đa</label>
						<div class="controls">
							<input type="text" name="cpu_max" placeholder="Hãng CPU" value="'.$data3['cpu_max'].'">
						</div>
						
					</div>

					<div class="control-group">
						<h4>Bo mạch</h4>
						<label class="control-label">Chipset</label>
						<div class="controls">
							<input type="text" name="board_chip" placeholder="Chipset" value="'.$data3['board_chip'].'">
						</div>
						<label class="control-label">Tốc độ Bus</label>
						<div class="controls">
							<select name="board_bus">
								<option value="'.$data3['board_bus'].'">'.$data3['board_bus'].'</option>
								<option value="1333MHz">1333MHz</option>
								<option value="1600MHz">1600MHz</option>
							</select>
							
						</div>
						<label class="control-label">Hỗ trợ RAM tối đa</label>
						<div class="controls">
							<select name="board_ram_max">
								<option value="'.$data3['board_ram_max'].'">'.$data3['board_ram_max'].'</option>
								<option value="Không">Không</option>
								<option value="2 GB">2 GB</option>
								<option value="4 GB">4 GB</option>
								<option value="8 GB">8 GB</option>
							</select>
							
						</div>
					</div>

					<div class="control-group">
						<h4>Bộ nhớ</h4>
						<label class="control-label">RAM</label>
						<div class="controls">
							<input type="text" name="ram_size" placeholder="Chipset" value="'.$data3['ram_size'].'">
						</div>
						<label class="control-label">Loại RAM</label>
						<div class="controls">
							<input type="text" name="ram_type" placeholder="Tốc độ Bus" value="'.$data3['ram_type'].'">
						</div>
						<label class="control-label">Tốc độ Bus</label>
						<div class="controls">
							<select name="ram_bus">
								<option value="'.$data3['ram_bus'].'">'.$data3['ram_bus'].'</option>
								<option value="1333MHz">1333MHz</option>
								<option value="1600MHz">1600MHz</option>
							</select>
							
						</div>
					</div>

					<div class="control-group">
						<h4>Đĩa cứng</h4>
						<label class="control-label">Loại ổ đĩa</label>
						<div class="controls">
							<select name="disk_type">
								<option value="'.$data3['disk_type'].'">'.$data3['disk_type'].'</option>
								<option value="eMMC">eMMC</option>
								<option value="HDD">HDD</option>
								<option value="SSD">SSD</option>
							</select>
							
						</div>
						<label class="control-label">Ổ cứng</label>
						<div class="controls">
							<select name="disk_size">
								<option value="'.$data3['disk_size'].'">'.$data3['disk_size'].'</option>
								<option value="128 GB">128 GB</option>
								<option value="256 GB">256 GB</option>
								<option value="500 GB">500 GB</option>
								<option value="750 GB">750 GB</option>
								<option value="1 TB">1 TB</option>
							</select>
						</div>
					</div>

					<div class="control-group">
						<h4>Màn hình</h4>
						<label class="control-label">Kích thước màn hình</label>
						<div class="controls">
							<select name="scr_width">
								<option value="'.$data3['scr_width'].'">'.$data3['scr_width'].'</option>
								<option value="11.6 inch">11.6 inch</option>
								<option value="13.3 inch">13.3 inch</option>
								<option value="14 inch">14 inch</option>
								<option value="15.6 inch">15.6 inch</option>
							</select>
							
						</div>
						<label class="control-label">Độ phân giải (W x H)</label>
						<div class="controls">
							<select name="scr_dpi">
								<option value="'.$data3['scr_dpi'].'">'.$data3['scr_dpi'].'</option>
								<option value="HD (1280 x 720 pixels)">HD (1280 x 720 pixels)</option>
								<option value="HD (1366 x 768 pixels)">HD (1366 x 768 pixels)</option>
								<option value="Full HD (1920 x 1080 pixels)">Full HD (1920 x 1080 pixels)</option>
								<option value="2K (2560 x 1440 pixels)">2K (2560 x 1440 pixels)</option>
							</select>
							
						</div>
						<label class="control-label">Công nghệ MH</label>
						<div class="controls">
							<input type="text" name="scr_tech" placeholder="Công nghệ màn hình" value="'.$data3['scr_tech'].'">
						</div>
						<label class="control-label">Màn hình cảm ứng</label>
						<div class="controls">
							<input type="text" name="scr_touch" placeholder="Công nghệ màn hình" value="'.$data3['scr_touch'].'">
						</div>
					</div>

					<div class="control-group">
						<h4>Đồ họa</h4>
						<label class="control-label">Chipset đồ họa</label>
						<div class="controls">
							<input type="text" name="gpu_chip" placeholder="Công nghệ màn hình" value="'.$data3['gpu_chip'].'">
						</div>
						<label class="control-label">Bộ nhớ đồ họa</label>
						<div class="controls">
							<select name="gpu_memory">
								<option value="'.$data3['gpu_memory'].'">'.$data3['gpu_memory'].'</option>
								<option value="Share (Dùng chung bộ nhớ với RAM)">Share (Dùng chung bộ nhớ với RAM)</option>
								<option value="1GB">1GB</option>
								<option value="2GB">2GB</option>
								<option value="3GB">3GB</option>
								<option value="4GB">4GB</option>
								<option value="8GB">8GB</option>
							</select>
							
						</div>
						<label class="control-label">Thiết kế card</label>
						<div class="controls">
							<select name="gpu_style">
								<option value="'.$data3['gpu_style'].'">'.$data3['gpu_style'].'</option>
								<option value="Card đồ họa tích hợp">Card đồ họa tích hợp</option>
								<option value="Card đồ họa rời">Card đồ họa rời</option>
							</select>
							
						</div>
					</div>

					<div class="control-group">
						<h4>Âm thanh</h4>
						<label class="control-label">Kênh âm thanh</label>
						<div class="controls">
							<select name="sound_channel">
								<option value="'.$data3['sound_channel'].'">'.$data3['sound_channel'].'</option>
								<option value="2.0">2.0</option>
								<option value="5.1">5.1</option>
								<option value="Stereo">Stereo</option>
							</select>
							
						</div>
						<label class="control-label">Thông tin thêm	</label>
						<div class="controls">
							<input type="text" name="sound_other" placeholder="Độ phân giải" value="'.$data3['sound_other'].'">
						</div>
					</div>

					<div class="control-group">
						<h4>Đĩa quang</h4>
						<label class="control-label">Có sẵn Đĩa Quang</label>
						<div class="controls">
							<select name="optical_disk">
								<option value="'.$data3['optical_disk'].'">'.$data3['optical_disk'].'</option>
								<option value="Có">Có</option>
								<option value="Không">Không</option>
							</select>
							
						</div>
						<label class="control-label">Loại đĩa quang</label>
						<div class="controls">
							<select name="optical_type">
								<option value="'.$data3['optical_type'].'">'.$data3['optical_type'].'</option>
								<option value="Không">Không</option>
								<option value="DVD Super Multi Double Layer">DVD Super Multi Double Layer</option>
							</select>
							
						</div>
					</div>

					<div class="control-group">
						<h4>Tính năng mở rộng &amp; cổng giao tiếp</h4>
						<label class="control-label">Cổng giao tiếp</label>
						<div class="controls">
							<input type="text" name="port" placeholder="Công nghệ màn hình" value="'.$data3['port'].'">
						</div>
						<label class="control-label">Tính năng mở rộng</label>
						<div class="controls">
							<input type="text" name="ext_feat" placeholder="Độ phân giải" value="'.$data3['ext_feat'].'">
						</div>
					</div>

					<div class="control-group">
						<h4>Giao tiếp mạng</h4>
						<label class="control-label">LAN</label>
						<div class="controls">
							<input type="text" name="lan" placeholder="Công nghệ màn hình" value="'.$data3['lan'].'">
						</div>
						<label class="control-label">Chuẩn WiFi</label>
						<div class="controls">
							<input type="text" name="wifi_stand" placeholder="Độ phân giải" value="'.$data3['wifi_stand'].'">
						</div>
						<label class="control-label">Kết nối không dây khác</label>
						<div class="controls">
							<input type="text" name="wire_other" placeholder="Độ phân giải" value="'.$data3['wire_other'].'">
						</div>
					</div>

					<div class="control-group">
						<h4>Card Reader</h4>
						<label class="control-label">Đọc thẻ nhớ</label>
						<div class="controls">
							<select name="card_read">
								<option value="'.$data3['card_read'].'">'.$data3['card_read'].'</option>
								<option value="Có">Có</option>
								<option value="Không">Không</option>
							</select>
							
						</div>
						<label class="control-label">Khe đọc thẻ nhớ</label>
						<div class="controls">
							<input type="text" name="card_slot" placeholder="Độ phân giải" value="'.$data3['card_slot'].'">
						</div>
					</div>

					<div class="control-group">
						<h4>Webcam</h4>
						<label class="control-label">Độ phân giải WC</label>
						<div class="controls">
							<select name="cam_pixel">
								<option value="'.$data3['cam_pixel'].'">'.$data3['cam_pixel'].'</option>
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
							
						</div>
						<label class="control-label">Thông tin thêm</label>
						<div class="controls">
							<input type="text" name="cam_info" placeholder="Độ phân giải" value="'.$data3['cam_info'].'">
						</div>
					</div>

					<div class="control-group">
						<h4>PIN/Battery</h4>
						<label class="control-label">Thông tin Pin</label>
						<div class="controls">
							<input type="text" name="pin_info" placeholder="Công nghệ màn hình" value="'.$data3['pin_info'].'">
						</div>
					</div>

					<div class="control-group">
						<h4>Hệ điều hành, phần mềm sẵn có/OS</h4>
						<label class="control-label">Hệ điều hành</label>
						<div class="controls">
							<select name="os_ver">
								<option value="'.$data3['os_ver'].'">'.$data3['os_ver'].'</option>
								<option value="Windows 10">Windows 10</option>
								<option value="Mac OS">Mac OS</option>
								<option value="Ubuntu">Ubuntu</option>
								<option value="Android">Android</option>
							</select>
							
						</div>
						<label class="control-label">Phần mềm sẵn có</label>
						<div class="controls">
							<input type="text" name="soft" placeholder="Cảm ứng" value="'.$data3['soft'].'">
						</div>
					</div>
					
					<div class="control-group">
						<h4>Kích thước &amp; Trọng lượng</h4>
						<label class="control-label">Kích thước</label>
						<div class="controls">
							<input type="text" name="size" placeholder="Màn hình rộng" value="'.$data3['size'].'">
						</div>
						<label class="control-label">Trọng lượng (kg)</label>
						<div class="controls">
							<input type="text" name="weight" placeholder="Cảm ứng" value="'.$data3['weight'].'">
						</div>
						<label class="control-label">Chất liệu</label>
						<div class="controls">
							<input type="text" name="matter" placeholder="Độ phân giải" value="'.$data3['matter'].'">
						</div>	
					</div>';


}


if($data_cate['parentId']==10){ //tablet

				echo '<div class="control-group"><h3 style="color:blue">Thông số kĩ thuật</h3></div>

					<div class="control-group">
						<h4>Màn hình</h4>
						<label class="control-label">Công nghệ màn hình</label>
						<div class="controls">
							<select name="scr_tech">
								<option value="'.$data3['scr_tech'].'">'.$data3['scr_tech'].'</option>
								<option value="TFT">TFT</option>
								<option value="IPS LCD">IPS LCD</option>
								<option value="Retina">Retina</option>
								<option value="Super Amoled">Super AMOLED</option>
							</select>
							
						</div>
						<label class="control-label">Độ phân giải</label>
						<div class="controls">
							<select name="scr_dpi">
								<option value="'.$data3['scr_dpi'].'">'.$data3['scr_dpi'].'</option>
								<option value="qHD (960 x 540 pixels)">qHD (960 x 540 pixels)</option>
								<option value="HD (1280 x 720 pixels)">HD (1280 x 720 pixels)</option>
								<option value="Full HD (1920 x 1080 pixels)">Full HD (1920 x 1080 pixels)</option>
								<option value="2K (2560 x 1440 pixels)">2K (2560 x 1440 pixels)</option>
								<option value="4K (4096 x 2160 pixels)">4K (4096 x 2160 pixels)</option>
								<option value="4K Ultra HD (3840 x 2160 pixels)">4K Ultra HD (3840 x 2160 pixels)</option>
							</select>
							
						</div>
						<label class="control-label">Kích thước màn hình</label>
						<div class="controls">
							<input type="text" name="scr_width" placeholder="Inch" value="'.$data3['scr_width'].'">
						</div>
					</div>

					<div class="control-group">
						<h4>Chụp ảnh &amp; Quay phim</h4>
						<label class="control-label">Độ phân giải</label>
						<div class="controls">
							<select name="b_campixel">
								<option value="'.$data3['b_campixel'].'">'.$data3['b_campixel'].'</option>
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
							
						</div>
						<label class="control-label">Quay phim</label>
						<div class="controls">
							<select name="b_camvideo">
								<option value="'.$data3['b_camvideo'].'">'.$data3['b_camvideo'].'</option>
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
							
						</div>
						<label class="control-label">Tính năng camera</label>
						<div class="controls">
							<input type="text" name="b_camfeature" placeholder="Màn hình rộng" value="'.$data3['b_camfeature'].'">
						</div>
						<label class="control-label">Camera trước</label>
						<div class="controls">
							<select name="f_campixel">
								<option value="'.$data3['f_campixel'].'">'.$data3['f_campixel'].'</option>
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
							</select>
							
						</div>
					</div>

					<div class="control-group">
						<h4>Cấu hình</h4>
						<label class="control-label">Hệ điều hành</label>
						<div class="controls">
							<select name="os_ver">
								<option value="'.$data3['os_ver'].'">'.$data3['os_ver'].'</option>
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
							
						</div>
						<label class="control-label">Loại CPU (Chipset)</label>
						<div class="controls">
							<input type="text" name="chip_name" placeholder="Độ phân giải" value="'.$data3['chip_name'].'">
						</div>
						<label class="control-label">Tốc độ CPU</label>
						<div class="controls">
							<input type="text" name="chip_clock" placeholder="Màn hình rộng" value="'.$data3['chip_clock'].'">
						</div>
						<label class="control-label">Chip đồ họa (GPU)</label>
						<div class="controls">
							<input type="text" name="chip_gpu" placeholder="Cảm ứng" value="'.$data3['chip_gpu'].'">
						</div>
						<label class="control-label">RAM</label>
						<div class="controls">
							<select name="ram">
								<option value="'.$data3['ram'].'">'.$data3['ram'].'</option>
								<option value="Không">Không</option>
								<option value="512 MB">512 MB</option>
								<option value="1 GB">1 GB</option>
								<option value="1.5 GB">1.5 GB</option>
								<option value="2 GB">2 GB</option>
								<option value="3 GB">3 GB</option>
								<option value="4 GB">4 GB</option>
								<option value="6 GB">6 GB</option>
							</select>
							
						</div>
						<label class="control-label">Bộ nhớ trong (ROM)</label>
						<div class="controls">
							<select name="rom_size">
								<option value="'.$data3['rom_size'].'">'.$data3['rom_size'].'</option>
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
							
						</div>
						<label class="control-label">Bộ nhớ khả dụng</label>
						<div class="controls">
							<input type="text" name="rom_enable" placeholder="Bộ nhớ khả dụng" value="'.$data3['rom_enable'].'">
						</div>
						<label class="control-label">Thẻ nhớ ngoài</label>
						<div class="controls">
							<select name="sdcard">
								<option value="'.$data3['sdcard'].'">'.$data3['sdcard'].'</option>
								<option value="Không">Không</option>
								<option value="SD">SD</option>
								<option value="Micro SD">Micro SD</option>
							</select>
							
						</div>
						<label class="control-label">Hỗ trợ thẻ tối đa</label>
						<div class="controls">
							<select name="sdmax">
								<option value="'.$data3['sdmax'].'">'.$data3['sdmax'].'</option>
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
							
						</div>
						<label class="control-label">Cảm biến</label>
						<div class="controls">
							<input type="text" name="sensor" placeholder="Cảm biến" value="'.$data3['sensor'].'">
						</div>
					</div>
					
					<div class="control-group">
						<h4>Kết nối</h4>
						<label class="control-label">Số khe sim</label>
						<div class="controls">
							<select name="sim_num">
								<option value="'.$data3['sim_num'].'">'.$data3['sim_num'].'</option>
								<option value="Không hỗ trợ">Không hỗ trợ</option>
								<option value="1 SIM">1 SIM</option>
								<option value="2 SIM">2 Sim</option>
								<option value="2 SIM, SIM 2 chung khe thẻ nhớ">2 SIM, SIM 2 chung khe thẻ nhớ</option>
							</select>
							
						</div>
						<label class="control-label">Loại Sim</label>
						<div class="controls">
							<select name="sim_type">
								<option value="'.$data3['sim_type'].'">'.$data3['sim_type'].'</option>
								<option value="SIM thường">SIM thường</option>
								<option value="Micro SIM">Micro SIM</option>
								<option value="Nano SIM">Nano SIM</option>
							</select>
							
						</div>
						<label class="control-label">Thực hiện cuộc gọi	</label>
						<div class="controls">
							<input type="text" name="calling" placeholder="Thực hiện cuộc gọi" value="'.$data3['calling'].'">
						</div>
						<label class="control-label">Hỗ trợ 3G</label>
						<div class="controls">
							<input type="text" name="net_3g" placeholder="Hỗ trợ 3G" value="'.$data3['net_3g'].'">
						</div>
						<label class="control-label">Hỗ trợ 4G</label>
						<div class="controls">
							<select name="net_4g">
								<option value="'.$data3['net_4g'].'">'.$data3['net_4g'].'</option>
								<option value="Không">Không</option>
								<option value="Có">Có</option>
								<option value="4G LTE Cat 4">4G LTE Cat 4</option>
								<option value="4G LTE Cat 6">4G LTE Cat 6</option>
								<option value="4G LTE Cat 9">4G LTE Cat 9</option>
							</select>
							
						</div>
						
						<label class="control-label">Wifi</label>
						<div class="controls">
							<input type="text" name="wifi" placeholder="Wifi" value="'.$data3['wifi'].'">
						</div>
						<label class="control-label">Bluetooth</label>
						<div class="controls">
							<input type="text" name="bluetooth" placeholder="Bluetooth" value="'.$data3['bluetooth'].'">
						</div>
						<label class="control-label">GPS</label>
						<div class="controls">
							<input type="text" name="gps" placeholder="GPS" value="'.$data3['gps'].'">
						</div>
						<label class="control-label">Cổng kết nối/sạc</label>
						<div class="controls">
							<select name="port">
								<option value="'.$data3['port'].'">'.$data3['port'].'</option>
								<option value="Micro USB">Micro USB</option>
								<option value="Lightning">Lightning</option>
								<option value="USB Type C">USB Type C</option>
							</select>
							
						</div>
						<label class="control-label">Jack tai nghe</label>
						<div class="controls">
							<select name="jack">
								<option value="'.$data3['jack'].'">'.$data3['jack'].'</option>
								<option value="Không">3.5 mm</option>
								<option value="Có">Có</option>
								<option value="Không">Không</option>
							</select>
							
						</div>
						<label class="control-label">Hỗ trợ OTG</label>
						<div class="controls">
							<input type="text" name="otg" placeholder="Hỗ trợ OTG" value="'.$data3['otg'].'">
						</div>
						<label class="control-label">Kết nối khác</label>
						<div class="controls">
							<input type="text" name="net_other" placeholder="Kết nối khác" value="'.$data3['net_other'].'">
						</div>
					</div>
					<div class="control-group">
						<h4>Chức năng khác</h4>
						<label class="control-label">Ghi âm</label>
						<div class="controls">
							<input type="text" name="record" placeholder="Ghi âm" value="'.$data3['record'].'">
						</div>
						<label class="control-label">Radio</label>
						<div class="controls">
							<input type="text" name="radio" placeholder="Radio" value="'.$data3['radio'].'">
						</div>
						<label class="control-label">Tính năng đặc biệt</label>
						<div class="controls">
							<input type="text" name="spec_feat" placeholder="Tính năng đặc biệt" value="'.$data3['spec_feat'].'">
						</div>
					</div>

					<div class="control-group">
						<h4>Thiết kế &amp; Trọng lượng</h4>
						<label class="control-label">Chất liệu</label>
						<div class="controls">
							<input type="text" name="matter" placeholder="Chất liệu" value="'.$data3['matter'].'">
						</div>
						<label class="control-label">Kích thước</label>
						<div class="controls">
							<input type="text" name="size" placeholder="Kích thước" value="'.$data3['size'].'">
						</div>
						<label class="control-label">Trọng lượng</label>
						<div class="controls">
							<input type="text" name="weight" placeholder="Trọng lượng" value="'.$data3['weight'].'">
						</div>
					</div>
					<div class="control-group">
						<h4>Thông tin pin</h4>
						<label class="control-label">Loại pin</label>
						<div class="controls">
							<select name="pin_type">
								<option value="'.$data3['pin_type'].'">'.$data3['pin_type'].'</option>
								<option value="Lithium - Polymer">Lithium - Polymer</option>
								<option value="Lithium - Ion">Lithium - Ion</option>
							</select>
							
						</div>
						<label class="control-label">Dung lượng pin</label>
						<div class="controls">
							<input type="text" name="pin_size" placeholder=">Dung lượng pin" value="'.$data3['pin_size'].'">
						</div>
					</div>';


}


if($data_cate['parentId']==11){ //phu kien

				echo '<div class="control-group">
						<label class="control-label">Nội dung mô tả</label>
						<div class="controls">
							<textarea name="content" style="height:200px;width:600px">'.$data3['content'].'</textarea>
						</div>
					</div>';

}

?>

					<div class="form-actions">
						<button type="submit" class="btn btn-success" name="btn_update">Cập nhật</button>
						<a class="btn btn-danger" href="productRead.php?id=<?php echo $data2['id']?>">Hủy bỏ</a>
						<a class="btn" href="productIndex.php">Trở lại</a>
					</div>

				</form>

			</div>
		</div>
	</div><!-- container -->
	<hr>
      <!-- /Include Footer -->
  	<?php include 'include/footer.php'; ?>

</body>

</html>