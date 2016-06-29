<!DOCTYPE html>
<html lang="en">
<head>
	<title>Xem danh mục</title>
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
        		<caption><h3>List Category</h3></caption>
              	<thead>
	                <tr>
	                	<th>ID</th>
	                  	<th>Name</th>
	                  	<th>In Category</th>
	                  	<th>Action</th>
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
				}
			   	Database::disconnect();
			  	?>
			      </tbody>
            </table>

        	</div><!--/span-->
      	</div><!--/row-->
      <hr>
      <!-- /Include Footer -->
  	<?php include 'include/footer.php'; ?>
</body>
</html>