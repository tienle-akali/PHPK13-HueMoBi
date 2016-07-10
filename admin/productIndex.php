<?php
include '../database.php';
$conn = Database::connect();
	
	if (empty($_POST['idCate'])||$_POST['idCate']==0) {
		$sql = "SELECT * FROM product";
		$results = mysqli_query($conn, $sql);
	}
	if ( !empty($_POST['idCate']))
	{	
		$id=$_POST['idCate'];
		$sql = "SELECT * FROM product WHERE idCategory IN (SELECT id FROM category WHERE parentId=$id)";
		//chọn ra id các danh mục phụ có parentId =$id, từ đó truy vấn chọn ra các sản phẩm có idCategory=id danh mục phụ đó để in ra
		$results = mysqli_query($conn, $sql);
	}


?>

<!DOCTYPE html>
<html lang="vi">
<head>
	<title>Quản lý Sản phẩm</title>
    <meta charset="utf-8">
    <?php include 'include/css_js_head.php'; ?>
</head>

<body>
	<?php include 'include/header.php'; ?>
    <div class="container-fluid">
		<div class="row-fluid">
		<!-- / Include menu -->
			<?php include'include/menu_left.php'; ?>

			<div class="span9">
			<!-- / Include Form action -->

				<table class="table table-striped table-bordered">
					<caption><h3>Toàn bộ sản phẩm</h3></caption>
					
					 <form method="post" action="productIndex.php">
						<button type="submit" class="btn btn-success" style="float:right">Xem</button>
						<select name="idCate" style="float:right">
							
							<option value="0">Tất cả</option>
							<option value="8">Điện thoại</option>
							<option value="10">Tablet</option>
							<option value="9">Laptop</option>
							<option value="11">Phụ kiện</option>
							<!-- <a href="">Xem theo danh mục</a> -->
							<!-- <a type="submit" href="productIndex.php" class="btn btn-success">Tất cả</a>
							<a type="submit" class="btn btn-success" name="dt">Điện thoại</a>
							<a href="productViewTablet.php" class="btn btn-success">Tablet</a>
							<a href="productViewLaptop.php" class="btn btn-success">Laptop</a>
							<a href="productViewPk.php" class="btn btn-success">Phụ kiện</a>
	 -->
						</select>
						
					</form>
	              	<thead>
		                <tr>
		                  	<th>Tên sản phẩm</th>
		                  	<th>Giá</th>
		                  	<th>Danh mục</th>
		                  	<th>Ngày nhập kho</th>
		                  	<th>Tùy chỉnh</th>
		                </tr>
	              	</thead>
	              	<?php
	              	echo '<tbody>';
	              	
					
						
						if ($results->num_rows > 0) {
						    // output data of each row
						    while($row = $results->fetch_assoc()) {
						        echo '<tr>';
							   	echo '<td>'. $row['name'] . '</td>';
							   	echo '<td>'. $row['prices'] . '</td>';
							   	// echo '<td>'. $row['idProducer'] . '</td>';
							   	$idCate = $row['idCategory'];
							   	$sql2 = "SELECT name FROM category WHERE id=$idCate"; //lọc ra tên của danh mục sở hữu sản phẩm
							   	$results2 = mysqli_query($conn, $sql2);
							   	$row2 = $results2->fetch_assoc();
							   	echo '<td>'. $row2['name'] . '</td>';
							   	
							   	echo '<td>'. $row['importDay'] . '</td>';
							   	echo '<td width=250>';
							   	echo '<a class="btn" href="productRead.php?id='.$row['id'].'">Xem chi tiết</a>';
							   	echo '&nbsp;';
							   	echo '<a class="btn btn-success" href="productUpdate.php?id='.$row['id'].'" target="_blank">Cập nhật</a>';
							   	echo '&nbsp;';
							   	echo '<a class="btn btn-danger" href="productDelete.php?id='.$row['id'].'">Xóa</a>';
							   	echo '</td>';
							   	echo '</tr>';
						    }
						} else {
						    echo "Chưa có sản phẩm nào!";
						}


					echo '</tbody>';

	              	?>


	              	<!-- <tbody>
	              	<?php 
					 //   	include '../database.php';
					 //   	$conn = Database::connect();
					 //   	$sql = "SELECT * FROM product";
						// $results = mysqli_query($conn, $sql);
						// if ($results->num_rows > 0) {
						//     // output data of each row
						//     while($row = $results->fetch_assoc()) {
						//         echo '<tr>';
						// 	   	echo '<td>'. $row['name'] . '</td>';
						// 	   	echo '<td>'. $row['prices'] . '</td>';
						// 	   	// echo '<td>'. $row['idProducer'] . '</td>';
						// 	   	echo '<td>'. $row['idCategory'] . '</td>';
						// 	   	echo '<td>'. $row['importDay'] . '</td>';
						// 	   	echo '<td width=250>';
						// 	   	echo '<a class="btn" href="productRead.php?id='.$row['id'].'">Xem chi tiết</a>';
						// 	   	echo '&nbsp;';
						// 	   	echo '<a class="btn btn-success" href="productUpdate.php?id='.$row['id'].'" target="_blank">Cập nhật</a>';
						// 	   	echo '&nbsp;';
						// 	   	echo '<a class="btn btn-danger" href="productDelete.php?id='.$row['id'].'">Xóa</a>';
						// 	   	echo '</td>';
						// 	   	echo '</tr>';
						//     }
						// } else {
						//     echo "0 results";
						// }
					 //   	Database::disconnect();
				  	?>
				    </tbody> -->
	            </table>
	           
    		</div><!--/span-->
    	</div><!--/row-->
    </div> <!-- /container -->
    <hr>
      <!-- /Include Footer -->
  	<?php include 'include/footer.php'; ?>
  </body>
</html>