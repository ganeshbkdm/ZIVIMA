<?php
if($_POST)
	{   echo $name = $_POST['name'];
        echo $design = $_POST['Designation'];
		echo $email = $_POST['email'];
		echo $mobile = $_POST['mobile'];
		echo $password = $_POST['pass'];		
        echo $today= date("Y-m-d");	
        $conn =  mysqli_connect("localhost", "root", "", "zivima");
		if($conn)
		{
            $q = mysqli_query($conn,"INSERT INTO institute_sopc (SPOC_name, SPOC_mail,SOPC_designation,SPOC_mobile) VALUES ('$name','$email','$mobile','$design','$mobile')");
            $user_query = mysqli_query($conn, "select * from institute_sopc where SPOC_mail='$email' ");
			$user_data = mysqli_fetch_array($user_query);
			if($q) 
			{
                 echo 'Success';
				$_SESSION['login'] = true;
				$_SESSION['auth'] = $user_data;
				//var_dump($_SESSION); die();
				//echo("HEllo");
				//redirect
				header("Location: index.html");
            }
            else{
            echo "fail, You are not registerd!";
			//else $error_msg = "Sorry, something went wrong!";
            }
			
			
		}
		else echo "Failed to connect";
	}		
?>


<html>
        <head>
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
            <style>
            </style>
        </head>
    <body>           
            <div class="container bg-light" style="margin-top: 25px;align-items: center; ">
                <h4 class="text-center pt-5">Institute SPOC Registration</h4>
                <hr>
                    <form action="AddSPOC.php" method="post">
                                <div class="row mt-5 justify-content-center">
                                    <div class="col-sm-4">
                                            <input type="text" class="form-control " name="name" placeholder="Enter Name" required>
                                    </div>
                                    <div class="col-sm-4">
                                            <input type="text" class="form-control " name="Designation" placeholder=" Designation" required>
                                    </div>
                                </div>
                                <div class="row mt-5 justify-content-center">
                                        <div class="col-sm-4">
                                                <input type="email" class="form-control " name="email" placeholder="Enter Email" required>
                                        </div>
                                        <div class="col-sm-4">
                                                <input type="text" class="form-control " name="mobile" placeholder="Enter Contact Number" required>
                                        </div>
                                </div>

                                <div class="row mt-5 justify-content-center">
                                        <label for="pass" class=" col-form-label">Default PassWord :
                                         </label>
                                        <div class="col-sm-4">
                                                <input type="text" class="form-control " name="pass" id="pass" placeholder="Enter password" required>
                                        </div>
        
                                </div>
                                     <div class="row mt-5 justify-content-center">
                                        
                                                <button type="submit" class="btn btn-success">ADD</button>
                                        &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                   <button type="reset" class="btn btn-danger ">Cancle</button>
                                        
                                    </div>
                                    
                                </div>
                            
                            </form>
                          <hr>
            </div>
                  
    </body>
</html>