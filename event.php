<!DOCTYPE html>
<?php include('inc/DAsession.php');
$n=$auth['DA_id'];
?>

<?php	
	if($_POST)
	{
		$Ename = $_POST['EventName'];
        $ELoc = $_POST['EventVenue'];
		$RegStart = $_POST['registrationFrom'];
		$RegEnd = $_POST['LastDateOfReg'];
        $CompDate = $_POST['CompitationDate'];
		$fullAdd = $_POST['fullAdd'];		
        		
        $today= date("Y-m-d");
        //echo $today;
          $conn =  mysqli_connect("localhost", "root", "", "zivima");       
		if($conn)
		{
            $q = mysqli_query($conn, "insert into event (E_name, E_location,fullAdd,competitionDate, regStartFrom, lastRegDate ,createdAt,updatedAt,DA_id) VALUES ('$Ename','$ELoc','$fullAdd','$CompDate','$RegStart','$RegEnd','$today','$today','$n')");
			if($q) 
			{
                echo("<script> alert('Event Created Succesfully...');</script>");

                header("Location: statistics.php");
            }
            else
            {
                echo("<script> alert('Something Went wrong... Try');</script>");
            }
		}
        else 
            echo "Failed to connect";
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
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
	<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script>
    $( function() {
        $( "#registrationFrom" ).datepicker();
        $( "#registrationFrom" ).on( "change", function() {
			$( "#registrationFrom" ).datepicker( "option", "dateFormat", "yy-mm-dd" );
		});
        $( "#LastDateOgReg" ).datepicker() 
        $( "#LastDateOgReg" ).on( "change", function() {
			$( "#LastDateOgReg" ).datepicker( "option", "dateFormat", "yy-mm-dd" );
		});
        $( "#CompitationDate" ).datepicker()
        $( "#CompitationDate" ).on( "change", function() {
            $( "#CompitationDate" ).datepicker( "option", "dateFormat", "yy-mm-dd" );
		});
       
    } );
    </script>
</head>
<body>

<div class="container bg-light" style="margin-top: 25px;align-items: center; ">
    <h4 class="text-center pt-5">Create Event</h4>
    <hr>
        <form method="post" action="event.php">
                <div class="form-group">
                    
                    <div class="row mt-5 justify-content-center">
                        <div class="col-sm-4">
                                <input type="text" class="form-control " name="EventName" id="name" placeholder="Event Name" required>
                        </div>
                        <div class="col-sm-4">
                                <input type="text" class="form-control " name="EventVenue" id="EventVenue" placeholder=" Event Venue Address" required>
                        </div>
                    </div>
                    <div class="row mt-5 justify-content-center">
                    <div class="col-sm-4">
                            <label for="">Event Held in </label>
                                    <input type="text" class="form-control " name="fullAdd"  id="fullAdd" placeholder=" FUll Address" required>
                            </div>
                            <div class="col-sm-4">
                                    <label for="">Registration Date</label>
                                    <input type="text" class="form-control " name="registrationFrom"  id="registrationFrom" required>
                            </div>
                           
                    </div>
                    <div class="row mt-5 justify-content-center">
                             <div class="col-sm-4">
                                <label for="">Last Registration Date</label>
                                    <input type="text" class="form-control " name="LastDateOfReg"  id="LastDateOgReg" registration>
                                    
                            </div>
                            <div class="col-sm-4">
                                    <label for="">Competition Date</label>
                                    <input type="text" class="form-control " name="CompitationDate"  id="CompitationDate" required>
                            </div>
                            
                    </div>
                            <div class="row mt-5 justify-content-center">
                            
                                    <button type="submit" class="btn btn-success">Create</button>
                            &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        <button type="submit" class="btn btn-danger ">CANCLE</button>
                            
                        </div>
                        
                    </div>
                
                </form>
                <hr>
</div>
</body>
</html>