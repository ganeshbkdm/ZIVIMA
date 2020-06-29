<?php include('inc/session.php'); ?>
<?php

	$error = false;
	$error_msg =""; $success_msg="";
	
	$email_error=""; $password_error="";
	// if some page not opened, read error msg of that page
	isset($_GET['error_msg']) ? $error_msg = $_GET['error_msg'] : $error_msg="";
	
	// if page has POST request
	if($_POST)
	{
		// read received values
		
		// read form values
		$email = $_POST['email'];
		$password = $_POST['password'];		
		
		// validation
		if($email=="") $email_error="Email is required.";	
	
	
		$conn =  mysqli_connect("localhost", "root", "", "zivima");		
	
		// validation for unique email
		$email_query = mysqli_query($conn, "select * from student_team where ST_mail LIKE '$email' ");
		$email_count = mysqli_num_rows($email_query);
		if($email_count == 0) $email_error = "Email not available.";
		// email validation end
	
		// match password from query
		$user_data = mysqli_fetch_array($email_query);

        if($password != $user_data["ST_pass"])
             $password_error = "Wrong password.";		
		//var_dump($user_data); die();
		
		if($email_count != 1 || $password_error!="")
			$error = true;		
		
		if(!$error)
		{
			$_SESSION['login'] = true;
			
			$_SESSION['user_data'] = $user_data;
			
			//var_dump($_SESSION); die();
			//redirect
			header("Location: StudentDashboard.php");
		}
		//else echo "no if";
	}		
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login | ZIVIMA (Zila Vikas Manch)</title>
    <?php include('inc/header.php')?>
</head>
<body>
<?php include('inc/navbar.php'); ?>
<br><br><br><br>
    <div class="container justify-content-center" >
        <div class="card col-sm-12">
            <div class="card-header">
                Student login
            </div> <br><br>
            <form action="login.php" method="post">
            <div class="form-group row justify-content-center">
                <label for="email" class=" col-form-label">Email :
                </label>&nbsp&nbsp&nbsp&nbsp&nbsp
                <div class="col-sm-3">
                <input type="email" name="email" class="form-control" placeholder="Enter Email..">
                <span style="color:red;"><?php echo $email_error;?></span>
                </div>
            </div><br>
            <div class="form-group row justify-content-center">
                <label for="inputPassword" class="col-form-label">Password :</label>
                <div class="col-sm-3">
                <input type="password" class="form-control" id="inputPassword" name="password" placeholder="Password">
                <span style="color:red;"><?php echo $password_error;?></span>
                
            </div>
            </div><br>
            <div class="form-group row justify-content-center">
                <button type="submit" class="btn btn-success"> Submit</button>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                <button type="reset" class="btn btn-danger">Reset </button>
            </div> <br>
            <div class="form-group row justify-content-center">
               For Sign Up <a href="registration.php"> &nbsp&nbsp Click Here </a>
            </div>
            </form>
            </div>
        </div>

    </div>
<?php include('inc/footer.php'); ?>

</body>
</html>