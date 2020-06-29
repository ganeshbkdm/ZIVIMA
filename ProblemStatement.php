<?php include('inc/DAsession.php');
$n=$auth['DA_id'];
?>


<?php	
	if($_POST)
	{
        $PS_title = $_POST['PSTitle'];
		$PS_type = $_POST['PSType'];        
        $PS_desc = $_POST['PSDesc'];
		$PS_tech = $_POST['technology'];
		$PS_note = $_POST['Note'];
        $Eid = $_POST['EventID'];
		//$fullAdd = $_POST['fullAdd'];		
        		
        $today= date("Y-m-d");
        //echo $today;
          $conn =  mysqli_connect("localhost", "root", "", "zivima");       
		if($conn)
		{
            $q = mysqli_query($conn, "INSERT INTO problem_statement(PS_type, PS_title, PS_description, PS_tech,PS_note, E_id, createdAt, updatedAt,DA_id) VALUES ('$PS_type','$PS_title','$PS_desc','$PS_tech','$PS_note','$Eid','$today','$today','$n')");
			if($q) 
			{
                echo("<script> alert('PS Created Succesfully...');</script>");
                //header("Location: statistics.php");
            }
            else
            {
                echo("<script> alert('Something Went wrong... Try');</script>");
            }
		}
        else 
            echo "Failed to connect";
            mysqli_close($conn);
    }		

    
    
?>



<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="/resources/demos/style.css">
</head>
<body>
        <?php	                            
                        $con = mysqli_connect('localhost','root','','zivima');
                        if (!$con) {
                            die('Could not connect: ' . mysqli_error($con));
                        }
                        //echo $q;

                        mysqli_select_db($con,"zivima");
                        $sql="select * from event";
                        $result = mysqli_query($con,$sql);
                        if(mysqli_num_rows($result) > 0)
                        { ?>

<div class="container bg-light" style="margin-top: 25px;align-items: center; ">
    <h4 class="text-center pt-5">Add Problem Statement</h4>
    <hr>
        <form method="post" action="ProblemStatement.php">
                <div class="form-group">
                    <div class="row mt-5 justify-content-center">
                        <!-- <div class="col-sm-4">
                                <label class="justify-content-right" for="eid">Select Event </label>
                        </div> -->
                    <div class="col-sm-4">
                    <select class="form-control" name="EventID" id="EventID">
                    
                        <?php
                            while($row = mysqli_fetch_array($result))
                            {   ?>
                               <option value="<?php echo $row['E_no'];?>"><?php echo $row['E_name'];?></option>
                             <?php
                            }
                            ?>
                   </select>
                    </div>
                    </div>
                    <div class="row mt-5 justify-content-center">
                        <div class="col-sm-4">
                                <input type="text" class="form-control " name="PSTitle" id="PSTitle" placeholder="Problem Statement Title" required>
                        </div>
                        <div class="col-sm-4">
                            <select class="form-control" name="PSType" id="PSType" required >
                               <option value="0">Select PS Type </option>
                                <option value="Hardwarw">Hardware</option>
                                <option value="Software">Software</option>
                            </select>
                        </div>
                    </div>
                    <div class="row mt-5 justify-content-center">
                    <div class="col-sm-8">
                            <!-- <label for="">Problem Statement Description </label> -->
                            <textarea class="form-control" name="PSDesc" id="PSDesc" cols="200" rows="3" placeholder="Problem Statement Desc"></textarea>      
                            </div>
                    </div>
                    <div class="row mt-5 justify-content-center">
                    <div class="col-sm-4">
                                    <input type="text" class="form-control " name="technology"  id="technology" placeholder="Technology">                                
                            </div>
                            <div class="col-sm-4">
                                <input type="text" class="form-control " name="Note"  id="Note" placeholder="Note">                                
                            </div>
                            
                    </div>
                            <div class="row mt-5 justify-content-center">
                            
                                    <button type="submit" class="btn btn-success">Add Statement</button>
                            &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        <button type="reset" class="btn btn-danger ">CANCLE</button>
                            
                        </div>
                        
                    </div>
                
                </form>
                <hr>
</div>
<?php
                        }
                        else{ 
                            ?>
                            <div align="center">
                            <h4 class="text-center pt-5">Event not created yet 
                                <a href="event.php">click here</a> To Create Event 
                            </h4>
                            <img src="img/notfound.gif" alt="">
                            </div>
                            <?php

                        }
                      
                        mysqli_close($con);
            ?>
</body>
</html>