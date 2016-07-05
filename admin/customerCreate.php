<?php
	 	
	$genders  = 1;
	require "../database.php";

	$conn   = Database::connect(); 

	if (!empty($_POST)) {

		$fullname = $_POST["fullname"];		
		$username = $_POST['username'];		
		$password = $_POST['password'];		
		$genders  = $_POST['genders'];
		$birthday = $_POST['birthday'];
		$address  = $_POST['address'];

		$result = Database::selectTable($conn,'customer','username',$username);
		
		
		if($result->num_rows>0){
			echo '<script language="javascript">';
			echo 'alert("Username đã tồn tại !")';
			echo '</script>';
		}

		Database::disconnect();	

	}else{			

		$fullname = "";		
		$username = "";		
		$password = "";		
		$genders  = "";
		$birthday = "";
		$address  = "";
			
		$sql = "INSERT INTO `customer`(`fullname`, `username`, `password`, `genders`, `birthday`, `address`) 
									VALUES('$fullname','$username', '$password', '$genders', '$birthday', '$address')";
		$conn->query($sql);

			// echo '<script language="javascript">';
			// echo 'alert(" The new creation customer was susscessfull !")';
			// echo '</script>';

		Database::disconnect();

		//header("Location: customerCreate.php");
	}

?>


<!DOCTYPE html>
<html lang="en">
<head>
	<!-- <?php echo $namePage = "Create Customer";?> -->
	<?php include 'include/css_js_head.php';?>
	
</head>
<body>

	<?php include 'include/header.php';?>
	<div class="container-fluid">
		<!-- 	Include Menu left -->		
		<?php include'include/menu_left.php'; ?>

		<div class="span10">
			<!-- creat a form action with post -->			
			<form action="createCustomer.php" method="POST" class="form-horizontal">

				<legend><h3>Create A New Customer</h3></legend>
					<!-- show a list role  -->
					<div class="control-group">
						    <label class="control-label">Full Name</label>
						    <div class="controls">
						      	<input name="fullname" type="text"  placeholder="Fullname" 
						      		   value="<?php echo !empty($fullname)?$address:'';?>">
						    </div>
					</div>

					<div class="control-group">
						    <label class="control-label">Email/Phonenumber</label>
						    <div class="controls">
						      	<input name="username" type="text"  placeholder="Username" value="<?php echo !empty($username)?$username:'';?>">
						    </div>
					  	</div>

					<div class="control-group">
						    <label class="control-label">Password</label>
						    <div class="controls">
						      	<input name="password" type="password"  placeholder="Password" 
						      		   value="<?php echo !empty($password)?$password:'';?>">
						    </div>
					</div>

					<div class="control-group">
						    <label class="control-label">Re-password</label>
						    <div class="controls">
						      	<input name="password" type="password"  placeholder="Re-password" 
						      		   value="<?php echo !empty($password)?$password:'';?>">
						    </div>
					</div>

					<div class="control-group">
						    <label class="control-label">Genders</label>
						    <div class="controls">
						    	<input type="radio" name="genders" value="1" 
						    	<?php  $genders = 0;if($genders==1) echo 'checked' ;?> > Male
		  						<input type="radio" name="genders" value="0" 
		  						<?php $genders = 0;if($genders==0) echo 'checked' ;?> > Female
						    </div>
					  	</div>

					<div class="control-group">
						    <label class="control-label">Birthday</label>
						    <div class="controls">
						      	<input name="birthday" type="hidden" value="0">
						      	<select  name="day" id="">

									<option value="" selected="selected">Ngày</option>
										<?php 
												$day = 1;
												while ( $day <= 31) {
													echo "<option> $day</option>";
													$day++;	
												} 
										?>								

								</select>

								<select name="month" id="">
										<option value="" selected="selected">Tháng</option>
										<option value="01">January</option>
										<option value="02">February</option>
										<option value="03">March</option>
										<option value="04">April</option>
										<option value="05">May</option>
										<option value="06">June</option>
										<option value="07">July</option>
										<option value="08">August</option>
										<option value="09">September</option>
										<option value="10">October</option>
										<option value="11">November</option>
										<option value="12">December</option>
								</select>
								<select  name="day" id="">

									<option value="" selected="selected">Năm</option>
										<?php 
												$year = 1950;
												while ($year <= 2016) {
													
													echo "<option> $year </option>";
													
													$year++;
												}
										?>								

								</select>
								</input>

						    </div>
					  	</div>

					<div class="control-group">
						    <label class="control-label">Address</label>
						    <div class="controls">
						      	<input name="address" type="text"  placeholder="Address" 
						      		   value="<?php echo !empty($address)?$address:'';?>">
						    </div>
					</div>

					<div class="form-actions">
							<button type="submit" class="btn btn-success">Create</button>
							<a class="btn" href="index.php">Back</a>
						</div>

			</form>

		</div>
		
	</div>
</body>
</html>