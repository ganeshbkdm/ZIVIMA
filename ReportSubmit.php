
<?php	
	if($_POST)
	{
        $R_title = $_POST['RptTitle'];
	$PS_id = $_POST['PSID'];        
        $Rpt_desc = $_POST['RptDesc'];
        $pdf =  $_FILES['pdf']['name'];
        $today= date("Y-m-d");

        $targetfolder = "report/";

        //$targetfolder = $targetfolder . basename( $_FILES['pdf']['name']) ;




        //echo $today;
          $conn =  mysqli_connect("localhost", "root", "", "zivima");       
		if($conn)
		{
                        $q = mysqli_query($conn, "INSERT INTO report (R_title, R_file, submittedAT,PS_id,R_desc) VALUES ('$R_title','$pdf','$today','$PS_id','$Rpt_desc')");
                        if($q) 
                        {
                        move_uploaded_file($_FILES['pdf']['tmp_name'], "report/$pdf");
                        echo("<script> alert('Report Submitted Succesflly ...');</script>");
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




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>

<?php	                            
                        $con = mysqli_connect('localhost','root','','zivima');
                        if (!$con) {
                            die('Could not connect: ' . mysqli_error($con));
                        }
                        //echo $q;

                        mysqli_select_db($con,"zivima");
                        $sql="select * from problem_statement";
                        $result = mysqli_query($con,$sql);
                        if(mysqli_num_rows($result) > 0)
                        { ?>


<div class="container bg-light" style="margin-top: 25px;align-items: center; ">
                <h4 class="text-center pt-5">Upload Report </h4>
                <hr>
                    <form method="post" action="ReportSubmit.php" enctype="multipart/form-data">
                            <div class="form-group">
                                <div class="row mt-5 justify-content-center">
                                        <label for="email" class=" col-form-label">Select problm statement :</label>
                                        <div class="col-sm-4">
                                                <select class="form-control" name="PSID" id="PSID">
                                                
                                                        <?php
                                                                while($row = mysqli_fetch_array($result))
                                                                {   ?>
                                                                <option value="<?php echo $row['PS_id'];?>"><?php echo $row['PS_title'];?></option>
                                                                <?php
                                                                }
                                                        ?>
                                                </select>
                                        </div>
                                 </div>
                                <div class="row mt-5 justify-content-center" >
                                    <div class="col-sm-4 ">
                                            <input type="text" class="form-control w-30" name="RptTitle" id="RptTitle" placeholder="Report Title">
                                    </div>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control w-30" name="RptTitle1" id="RptTitle" placeholder="Report Title">           
                                    </div>
                                </div>

                                <div class="row mt-5 justify-content-center">
                                <div class="col-sm-8">
                                        <textarea class="form-control" name="RptDesc" id="RptDesc" cols="200" rows="3" placeholder="Report Descripation"></textarea>      
                                        </div>
                                </div>
                                
                                <div class="row mt-5 justify-content-center">
                                        <label for="file" class=" col-form-label">Select Report File(*PDF OLNY):</label>
                                        <div class="col-sm-4">
                                                <input type="file" class="form-control " accept="application/pdf" id="pdf" name="pdf" placeholder="Select Report" required>
                                        </div>
                                      
                                </div>

                        
                                     <div class="row mt-5 justify-content-center">
                                        
                                                <button type="submit" class="btn btn-success">Submit</button>
                                        &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                   <button type="reset" class="btn btn-danger ">Reset</button>
                                        
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
                            <h4 class="text-center pt-5">Problem Statement Not Added Yet 
                                <a href="index.html">click here</a> Go Back 
                            </h4>
                            <img src="img/notfound.gif" alt="">
                            </div>
                            <?php

                        }
                      
                        mysqli_close($con);
            ?>

</body>
</html>