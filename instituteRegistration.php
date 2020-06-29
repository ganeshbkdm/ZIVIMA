<?php	
    // if page has POST request
	if($_POST)
	{
		// read received values
		
		// read form values
        $aictId = $_POST['aicteId'];
        $name = $_POST['name'];
        $email = $_POST['email'];   
        $mobile = $_POST['mobile'];
        $instituteAdd = $_POST['instituteAdd'];
        $password = $_POST['Password'];		
        $conn =  mysqli_connect("localhost", "root", "", "zivima");		
                
		if($conn)
		{
        $q = mysqli_query($conn, "insert into institute (InName,InAICTID, InMail,InMobile, InPass) values ('$name', '$aictId', '$email', '$mobile', '$password')");
        $user_query = mysqli_query($conn, "select * from student_team where ST_mail='$email' ");
        $user_data = mysqli_fetch_array($user_query);
        if($q) 
        {
          echo "Success";
          $_SESSION['login'] = true;
          $_SESSION['auth'] = $user_data;
          //var_dump($_SESSION); die();
          //redirect
          header("Location: index.html");
        }
        //if($q) $success_msg = "Congrats, You are now registerd!";
        //else $error_msg = "Sorry, something went wrong!";
			
		}
		else echo "Failed to connect";
	}		
?>



<?php include('inc/header.php') ?>
<?php include('inc/navbar.php') ?>
            
            <div class="container bg-light" style="margin-top: 25px;align-items: center; ">
                <h4 class="text-center pt-5">Institute Registration</h4>
                <hr>
                    <form method="post" action="instituteRegistration.php">
                            <div class="form-group">
                                
                                <div class="row mt-5 justify-content-center" >
                                    <div class="col-sm-4 ">
                                            <input type="text" class="form-control w-30" name="aicteId" id="aicteId" placeholder="AICTE Code">
                                    </div>
                                    <div class="col-sm-4">
                                            <button type="submit" class="btn btn-success w-50">Verify</button>
                                    </div>
                                </div>

                                <div class="row mt-5 justify-content-center">
                                    <div class="col-sm-4">
                                            <input type="text" class="form-control " name="name" id="name" placeholder="Institute Name" required>
                                    </div>
                                    <div class="col-sm-4">
                                            <input type="text" class="form-control " name="instituteAdd" id="instituteAdd" placeholder=" Institute Address" required>
                                    </div>
                                </div>
                                
                                <div class="row mt-5 justify-content-center">
                                        <div class="col-sm-4">
                                                <input type="email" class="form-control " id="email" name="email" placeholder="Enter Institute Email" required>
                                        </div>
                                        <div class="col-sm-4">
                                                <input type="text" class="form-control " id="mobile" name="mobile" placeholder="Enter Institute Contact Number" required>
                                        </div>
                                </div>

                                <div class="row mt-5 justify-content-center">
                                        <div class="col-sm-4">
                                                <input type="password" class="form-control " name="password"  id="email" placeholder="Enter password" required>
                                        </div>
                                        <div class="col-sm-4">
                                                <input type="password" class="form-control " name="confirmPass"  id="mobile" placeholder="Confirm password"registration>
                                        </div>
                                </div>
                                     <div class="row mt-5 justify-content-center">
                                        
                                                <button type="submit" class="btn btn-success">REGISTER</button>
                                        &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                   <button type="submit" class="btn btn-danger ">CANCLE</button>
                                        
                                    </div>
                                    
                                </div>
                            
                            </form>
                          <hr>
            </div>
                  
    </body>