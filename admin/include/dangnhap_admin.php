<?php
session_start();
$servername = "localhost";
$name = "root";
$password = "";
$dbname = "datahuemobi";

// Create connection
$conn = new mysqli($servername, $name, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
if (!empty($_POST)) {
	$username=$_POST['username'];
$sql="SELECT user.id, user.username, user.fullName, user.password, role.name, role.key FROM user INNER JOIN role ON user.role=role.id WHERE user.username='$username'";
$results = $conn->query($sql);

if ($results->num_rows > 0) {
    // output data of each row
    $data = $results->fetch_assoc();
    $_SESSION['login']=$data;
    header('Location: test1.php');

} else {
    echo "0 results";
}
}
$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
  <?php include'include/css_js_head.php'; ?>
    <style type="text/css">
      body {
        padding-top: 40px;
        padding-bottom: 40px;
        background-color: #f5f5f5;
      }

      .form-signin {
        max-width: 400px;
        padding: 19px 29px 29px;
        margin: 0 auto 20px;
        background-color: #fff;
        border: 1px solid #e5e5e5;
        -webkit-border-radius: 5px;
           -moz-border-radius: 5px;
                border-radius: 5px;
        -webkit-box-shadow: 0 1px 2px rgba(0,0,0,.05);
           -moz-box-shadow: 0 1px 2px rgba(0,0,0,.05);
                box-shadow: 0 1px 2px rgba(0,0,0,.05);
      }
      .form-signin .form-signin-heading,
      .form-signin .checkbox {
        margin-bottom: 10px;
      }
      .form-signin input[type="text"],
      .form-signin input[type="password"] {
        font-size: 20px;
        height: auto;
        margin-bottom: 15px;
        padding: 7px 9px;
      }

    </style>
  </head>

  <body>

    <div class="container">

      <form class="form-signin" method="POST" action="dangnhap_admin.php">
        <legend style="text-align:center"><h2 class="form-signin-heading"><img src="../assets/img/login.png"></i> Login</h2></legend>
        <label><b><i class="icon-user"></i> Username</b></label>
        <input type="text" class="input-block-level" placeholder="Enter Username" name="username" value="<?php echo !empty($username)?$username:''; ?>" required="">
        <label><b><i class="icon-eye-open"></i> Password</b></label>
        <input type="password" class="input-block-level" placeholder="Enter Password" name="password" value="<?php echo !empty($password)?$password:''; ?>" required="">
        <hr>
        <button type="submit" class="btn btn-success btn-block"><i class="icon-off"></i> Login</button>
      </form>

    </div> <!-- /container -->

  </body>
</html>
