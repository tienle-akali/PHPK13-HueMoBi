<!DOCTYPE html>
<html lang="vi">
<head>
	<title>Danh sách tin tức</title>
  <?php include 'include/css_js_head.php'; ?>
</head>
<body>
	<!-- /Include Menu Head -->
  	<?php include 'include/header.php'; ?>

  	<div class="container-fluid">
      	<div class="row-fluid">
      	<!-- / Include menu -->
        	<?php include'include/menu_left.php'; ?>

        	<div class="span10">
        	<!-- / Include Form action -->
        		<table class="table table-striped table-bordered">
        		<caption><h3>Tổng hợp các tin tức</h3></caption>
              	<thead>
	                <tr>
	                	<!-- <th>ID</th> -->
	                  	<th>Tiêu đề</th>
	                  	<th>Ngày xuất bản</th>
	                  	<th>Tác giả</th>
	                  	<th>Thuộc danh mục</th>
	                  	<th>Tùy chỉnh</th>
	                </tr>
              	</thead>
              	<tbody>
              	<?php 
			   	include '../database.php';
			   	$conn = Database::connect();
			   	$sql = "SELECT * FROM `tintuc` ORDER BY `tintuc`.`date` DESC"; //in ra theo thứ tự ngày mới nhất
				$results = mysqli_query($conn, $sql);
				if ($results!=null) {
				    // output data of each row
				    while($row = mysqli_fetch_assoc($results)) {
				        echo '<tr>';
				        // echo '<td>'. $row['id'] . '</td>';
					   	echo '<td>'. $row['title'] . '</td>';
					   	echo '<td>'. $row['date'] . '</td>';
					   	echo '<td>'. $row['author'] . '</td>';
					   	$idCate = $row['idCategory'];
					   	$sql2 = "SELECT name FROM category WHERE id=$idCate"; //lọc ra tên của danh mục sở hữu tin tức
					   	$results2 = mysqli_query($conn, $sql2);
					   	$row2 = $results2->fetch_assoc();
					   	echo '<td>'. $row2['name'] . '</td>';
					   	echo '<td width=200px >';
					   	echo '<a class="btn btn-small" href="tintucRead.php?id='.$row['id'].'"><i class="icon-edit"></i> Xem</a>';
					   	echo '<a class="btn btn-small btn-success" href="tintucUpdate.php?id='.$row['id'].'"style="margin-left:5px"><i class="icon-edit"></i> Sửa</a>';
					   	echo '<a class="btn btn-small btn-danger" href="tintucDelete.php?id='.$row['id'].'" style="margin-left:5px"><i class="icon-remove-circle"></i> Xóa</a>';
					   	echo '</td>';
					   	echo '</tr>';
				    }
				} else {
				    echo "<td colspan='4' style='text-align: center; font-size:20px; color: red'>Không có tin tức nào</td>";
				}
			   	Database::disconnect();
			  	?>
			      </tbody>
            </table>

        	</div><!--/span-->
      	</div><!--/row-->

      	<p class="btn btn-success" style="display:block;position:fixed;top:80px;right:20px"> <!-- giỏ hàng -->
        	<a href="tintucCreate.php" style="color:#fff"><i class="icon-plus"></i> Thêm tin mới</a>
    	</p>

      </div><!-- container -->
      <hr>
      <!-- /Include Footer -->
  	<?php include 'include/footer.php'; ?>
</body>
</html>