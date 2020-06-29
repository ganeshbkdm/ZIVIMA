<html lang="en">
<body>
<?php	
        $password_confirm_error=" ";
	// if page has POST request
	if($_POST)
	{
		// read received values
		
		// read form values
                $Tname = $_POST['TeamName'];
                $TLname = $_POST['TeamLeaderName'];
		$email = $_POST['MailId'];
		$mobile = $_POST['Mobile'];
		$password = $_POST['Password'];		
                $password_confirm = $_POST['ConfirmPass'];	
                $today= date("Y/m/d");	
		// password validation
		if($password != $password_confirm) $password_confirm_error="Password not matched.";
		//$password_confirm_error="";
                $conn =  mysqli_connect("localhost", "root", "", "zivima");		
                
		if($conn)
		{
                        $q = mysqli_query($conn, "insert into student_team( ST_name, ST_leaderName, ST_mail, ST_pass, ST_mobile) values ( '$Tname', '$TLname', '$email', '$password','$mobile')");
                        $user_query = mysqli_query($conn, "select * from student_team where ST_mail='$email' ");
			$user_data = mysqli_fetch_array($user_query);
			if($q) 
			{
                                echo "Success";
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
		else echo "Failed to connect";
	}		
?>



<?php include('inc/header.php'); ?>
<body>
        <!--navigation bar-->
       <?php include('inc/navbar.php'); ?>
            <!--end of nav-->
        <div class="container bg-light" id="app" style="margin-top: 25px;align-items: center; ">
         {{ message }}
        <h4 class="text-center pt-5">Student Team Registration</h4>
        <hr>
                <form  @submit="checkForm" action="registration.php" method="post">
                        <div class="form-group">
                        <div v-if="errors.length" class="alert alert-warning" role="alert" style="text-align:center;">
                                 <ul type="none">
                                <li v-for="error in errors">{{ error }}</li>
                                </ul>
                        </div>
                        <div class="row mt-5 justify-content-center" >
                                <div class="col-sm-4 ">
                                        <input type="text" class="form-control w-30" name="instituteId" placeholder="Institute Code">
                                </div>
                                <div class="col-sm-4">
                                        <button type="submit" class="btn btn-success w-50">Verify</button>
                                </div>
                        </div>

                        <div class="row mt-5 justify-content-center">
                                <div class="col-sm-4">
                                        <input type="text" class="form-control " v-model="name" name="TeamName" placeholder="Enter Team Name">
                                </div>
                                <div class="col-sm-4">
                                        <input type="text" class="form-control " v-model="TeamLeadername" name="TeamLeaderName" placeholder=" Enter Team Leader Name">
                                </div>
                        </div>

                        <div class="row mt-5 justify-content-center">
                                <div class="col-sm-4">
                                        <input type="text" class="form-control " name="InstituteName" placeholder="Institute Name" >
                                </div>
                                <div class="col-sm-4">
                                        <input type="text" class="form-control " name="InstituteAdd" placeholder="Institute Address" >
                                </div>
                        </div>

                        <div class="row mt-5 justify-content-center">
                                <div class="col-sm-4">
                                        <input type="email" id="email" v-model="email" onchange="uniqueUser(this.value); validateMain(this.value)" class="form-control " name="MailId" placeholder="Enter Email">
                                        <span class="text-danger" id="txtHint"></span>
                                </div>
                                <div class="col-sm-4">
                                        <input type="text" class="form-control " name="Mobile" placeholder="Enter Contact Number">
                                </div>
                        </div>

                        <div class="row mt-5 justify-content-center">
                                <div class="col-sm-4">
                                        <input type="password" class="form-control " name="Password" placeholder="Enter password" >
                                </div>
                                <div class="col-sm-4">
                                        <input type="password" class="form-control " name="ConfirmPass" placeholder="Confirm password"registration>
                                        <span class="text-danger"> <?=$password_confirm_error;?> </span>
                                </div>
                </div>
                        <hr>

                        <div class="row mt-5 justify-content-center">
                                
                                        <button type="submit" id="register" class="btn btn-success">REGISTER</button>
                                &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                <button type="submit" class="btn btn-danger ">Cancle</button>
                                
                                </div>
                                
                        </div>
                        
                        </form>
                        <hr>

        </div>
        </body>
 <script>
                
                const app = new Vue({
                        el: '#app',
                        data: {
                        errors: [],
                        name: null,
                        email: null
                },
                methods: {
                        checkForm: function (e) {
                        this.errors = [];

                        if (!this.name) {
                                this.errors.push("Name required.");
                        }
                        if (!this.email) {
                                this.errors.push('Email required.');
                        } else if (!this.validEmail(this.email)) {
                                this.errors.push('Valid email required.');
                        }

                        if (!this.errors.length) {
                                return true;
                        }

                        e.preventDefault();
                        },
                        validEmail: function (email) {
                        var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
                        return re.test(email);
                        }
                        }
                })
        
        </script>
        <script>
                // AJAX For unique user

                function uniqueUser(str) {
                        //alert(str);
                if (str == "") {
                        document.getElementById("txtHint").innerHTML = "";
                        return;
                } else {
                        if (window.XMLHttpRequest) {
                        // code for IE7+, Firefox, Chrome, Opera, Safari
                        xmlhttp = new XMLHttpRequest();
                        
                        } else {
                        // code for IE6, IE5
                        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
                        }
                        xmlhttp.onreadystatechange = function() {
                        if (this.readyState == 4 && this.status == 200) {
                                //alert(this.responseText);
                                document.getElementById("txtHint").innerHTML = this.responseText;
                                //alert("called");
                                 
                                
                        }
                        document.getElementById("email").innerHTML ="";
                        };
                        xmlhttp.open("GET","getuser.php?q="+str,true);
                        xmlhttp.send();
                        if(this.responseText=="Already Have an Account")
                        {
                                document.getElementById("email").innerHTML ="";
                        }
                }
                }
                //end AJAX
                
        </script>