
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

        	<div class="span10">
        	<!-- / Include Form action -->
        		<div>
            <legend><h4>Information User</h4></legend>
            <?php
            //   $id = null;
            // if ( !empty($_GET['id'])) {
            //   $id = $_REQUEST['id'];
            // }

            // if ( null==$id ) {
            //   header("Location: index.php");
            // }
              $namePage = 'Thông tin người dùng';
              $id = $data['id'];
              
              include '../database.php';
              $conn=Database::connect();
              $sql="SELECT user.id, user.username, user.fullName, user.beginDate, role.name, role.keyword FROM user INNER JOIN role ON user.role=role.id WHERE user.id='$id'";
              $results = mysqli_query($conn, $sql);
              if ($results->num_rows > 0) {
                $userinfo = $results->fetch_array();
                // var_dump($userinfo);
              }

            ?>
              <div>
                <img src="../assets/img/avatar.jpg" height="150px" width="150px">
              </div> 
              <div>
                <li> Username : <?php echo $userinfo['username']; ?></li>
                <li> Full Name : <?php echo $userinfo['fullName']; ?></li>
                <li> Role : <?php echo $userinfo['name']; ?></li>
                <li> Begin Date : <?php echo $userinfo['beginDate']; ?></li>
                <!-- <?php
                // var_dump($userinfo);
                ?> -->
              </div>
            </div>

        	</div><!--/span-->
      	</div><!--/row-->
      <hr>
      <!-- /Include Footer -->
  	<?php include 'include/footer.php'; ?>
  </div>
</body>
</html>