<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ZIVIMA</title>
    <?php include('inc/header.php'); ?>
</head>
<body>
<?php
	//var_dump($_POST);
	// declare variables
	$error = false;
	$error_msg =""; $success_msg="";
	$name_error =""; $mobile_error=""; $email_error="";
	$password_error=""; $password_confirm_error="";
	// if some page not opened, read error msg of that page
	isset($_GET['error_msg']) ? $error_msg = $_GET['error_msg'] : $error_msg="";
	
	// if page has POST request
	if($_POST)
	{
		// read received values
		
		// read form values
		$name = $_POST['name'];
		$email = $_POST['email'];
		$mobile = $_POST['mobile'];
		$password = $_POST['password'];		
		$password_confirm = $_POST['password_confirm'];		
		
		// validation
		if($name=="") $name_error="Name is required.";
		if($email=="") $email_error="Email is required.";
		if(strlen($mobile)!="10") $mobile_error="Mobile Number must be 10 digit only.";
		if($mobile=="") $mobile_error="Mobile Number is required.";
		
		// password validation
		if($password != $password_confirm) $password_confirm_error="Password not matched.";
		//$password_confirm_error="";
		$conn =  mysqli_connect("localhost", "root", "", "test");		
		
		// validation for unique email
		$email_query = mysqli_query($conn, "select * from user where email LIKE '$email' ");
		$email_count = mysqli_num_rows($email_query);
		if($email_count > 1) $email_error = "Email is already registered.";
		// email validation end
	
		if($email_count > 1 || $name_error!="" || $email_error!="" || $mobile_error!="" || $password_confirm_error!="")
			$error = true;		
		
		if(!$error)
		{
			//echo "in if";
			// db connection
			//var_dump($conn);
			// insert in db
			//$q = mysqli_query($conn, "");
			// store in variables
			$q = mysqli_query($conn, "insert into user (name, email, mobile, password) values ('$name', '$email', '$mobile', '$password') ");
			//echo mysqli_error($conn);
			$user_query = mysqli_query($conn, "select * from user where email='$email' ");
			$user_data = mysqli_fetch_array($user_query);
			if($q) 
			{
				$_SESSION['login'] = true;
				$_SESSION['auth'] = $user_data;
				//var_dump($_SESSION); die();
				echo("HEllo");
				//redirect
				header("Location: index.html");
			}
			
			//if($q) $success_msg = "Congrats, You are now registerd!";
			//else $error_msg = "Sorry, something went wrong!";
			
		}
		//else echo "no if";
	}		
?>
<div class="container">
	<div class="row">
		<div class="col-md-6 offset-md-3 paddingTB30">
			
			
			<div class="card">
			  <div class="card-header">Register</div>
			  <div class="card-body">
				
				<!-- msg -->
				<?php if($error_msg!="") { ?>
					<div class="alert alert-danger">
						<?=$error_msg;?>
					</div>
				<?php } ?>
				
				<?php if($success_msg!="") { ?>
					<div class="alert alert-success">
						<?=$success_msg;?>
					</div>
				<?php } ?>
				
				<form method="POST" action="test.php">
					<!-- NAME -->
					<div class="form-group">
					  <label for="name">Name:</label>
					  <input type="text" class="form-control" name="name" id="name">
					  <span class="text-danger"> <?=$name_error;?> </span>
					</div>
					
					<!-- Email -->
					<div class="form-group">
					  <label for="email">Email:</label>
					  <input type="email" class="form-control" name="email" id="email">
					  <span class="text-danger"> <?=$email_error;?> </span>
					</div>
					
					<!-- Mobile -->
					<div class="form-group">
					  <label for="mobile">Mobile:</label>
					  <input type="number" class="form-control" name="mobile" id="mobile">
					  <span class="text-danger"> <?=$mobile_error;?> </span>
					</div>
					
					<!-- Password -->
					<div class="form-group">
					  <label for="password">Password:</label>
					  <input type="password" class="form-control" name="password" id="password">
					  <span class="text-danger"> <?=$password_error;?> </span>
					</div>
					
					<!-- Password Confirm-->
					<div class="form-group">
					  <label for="password_confirm">Retype Password:</label>
					  <input type="password_confirm" class="form-control" name="password_confirm" id="password_confirm">
					  <span class="text-danger"> <?=$password_confirm_error;?> </span>
					</div>
					
					<button type="submit" class="btn btn-info">Submit</button>
				</form>
				<a href="login.php">Login if you are registered already.</a>
			  </div> 
			</div>


		</div>
	</div>
</div>

<h4 class="mt-5"> Enter Team  member deatils </h4> <br>
                        <div class="row mt-5" style="align-content: center">
                                
                                <table class="table">
                                        <thead>
                                                <tr class="row">
                                                <th  class="col-sm-1">#</th>
                                                <th class="col-sm-3">Name</th>
                                                <th class="col-sm-3">Mail</th>
                                                <th class="col-sm-3">Mobile</th>
                                                </tr>
                                        </thead>
                                        <tbody>
                                                <tr class="row">
                                                <th class="col-sm-1">1
                                                </th>
                                                <td class="col-sm-3">
                                                        <input type="text" class="form-control " id="mobile" placeholder="Enter Full Name" required>
                                                </td>
                                                <td class="col-sm-3">
                                                        <input type="text" class="form-control " id="mobile" placeholder="Enter Email" required>
                                                </td>
                                                <td class="col-sm-3">
                                                        <input type="text" class="form-control " id="mobile" placeholder="Enter Mobile" required>
                                                </td>
                                                </tr>
                                                <tr class="row">
                                                <th class="col-sm-1">2
                                                </th>
                                                <td class="col-sm-3">
                                                        <input type="text" class="form-control " id="mobile" placeholder="Enter Full Name" required>
                                                </td>
                                                <td class="col-sm-3">
                                                        <input type="text" class="form-control " id="mobile" placeholder="Enter Email" required>
                                                </td>
                                                <td class="col-sm-3">
                                                        <input type="text" class="form-control " id="mobile" placeholder="Enter Mobile" required>
                                                </td>
                                                </tr>
                                                <tr class="row">
                                                        <th class="col-sm-1">3
                                                        </th>
                                                        <td class="col-sm-3">
                                                                <input type="text" class="form-control " id="mobile" placeholder="Enter Full Name" required>
                                                        </td>
                                                        <td class="col-sm-3">
                                                                <input type="text" class="form-control " id="mobile" placeholder="Enter Email" required>
                                                        </td>
                                                        <td class="col-sm-3">
                                                                <input type="text" class="form-control " id="mobile" placeholder="Enter Mobile" required>
                                                        </td>
                                                        </tr>
                                                        <tr class="row">
                                                        <th class="col-sm-1">4
                                                        </th>
                                                        <td class="col-sm-3">
                                                                <input type="text" class="form-control " id="mobile" placeholder="Enter Full Name" required>
                                                        </td>
                                                        <td class="col-sm-3">
                                                                <input type="text" class="form-control " id="mobile" placeholder="Enter Email" required>
                                                        </td>
                                                        <td class="col-sm-3">
                                                                <input type="text" class="form-control " id="mobile" placeholder="Enter Mobile" required>
                                                        </td>
                                                        </tr>
                                                        <tr class="row">
                                                                <th class="col-sm-1">5
                                                                </th>
                                                                <td class="col-sm-3">
                                                                        <input type="text" class="form-control " id="mobile" placeholder="Enter Full Name" required>
                                                                </td>
                                                                <td class="col-sm-3">
                                                                        <input type="text" class="form-control " id="mobile" placeholder="Enter Email" required>
                                                                </td>
                                                                <td class="col-sm-3">
                                                                        <input type="text" class="form-control " id="mobile" placeholder="Enter Mobile" required>
                                                                </td>
                                                                </tr>
                                        </tbody>
                                        </table>
                        </div>
</body>
</html>