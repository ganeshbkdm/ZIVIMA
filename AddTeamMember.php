<?php include('inc/session.php');?>
<?php	
      $n=$auth['ST_id'];//from session
	if($_POST)
    {
        $name = $_POST['name'];
        $mail = $_POST['email'];
		$mobile = $_POST['mobile'];
        $today= date("Y/m/d");
        $conn =  mysqli_connect("localhost", "root", "", "zivima");		
       
         echo $n;       
		if($conn)
		{                 
            $q = mysqli_query($conn, "insert into team_member( TM_name, TM_mail, TM_mobile, createdAt,updatedAt,ST_id) values ( '$name','$mail','$mobile','$today','$today','$n')");
            if($q)
            {
                echo "<script>alert('Added Successfully');</script>";
            }
            else{
                echo "<script>alert('Unable to add...');</script>";

            }
		}
		else echo "Failed to connect";
	}		
?>

<html lang="en">
<head>
        <<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
        <style>
            table{
                font-size:13px;
            }
         </style>	
</head>
<body>

<?php
    $i=0;
        $con = mysqli_connect('localhost','root','','zivima');
        if (!$con) {
            die('Could not connect: ' . mysqli_error($con));
        }
        //echo $q;
        
        mysqli_select_db($con,"zivima");
        // $sql1="SELECT count(*) FROM team_member WHERE ST_id = 12";
        // $row1 = mysql_fetch_array($result1);
        // $total = $row1[0];
        // echo "Total rows: " . $total;
        $sql="SELECT * FROM team_member WHERE ST_id = $n";
        $result = mysqli_query($con,$sql);
        $rows = mysqli_num_rows($result);
        //echo $rows;
        if ($result->num_rows > 0) {
        ?>
            <div class="container"> 
                <div class="table-responsive" >
                <br/>
                <table class="table table-striped table-bordered" id="stud_data">
                    
                        <thead>
                            <tr >
                            <th >#</th>
                            <th >Student Name</th>
                            <th>Email ID</th>
                            <th >Mobile Number</th>
                            </tr>
                        </thead>
                        <tbody>
        <?php
           

            while($row = mysqli_fetch_array($result))
             { 
          ?>
          <tr >
        <th ><?php echo ++$i;?>
        </th>
        <td>
        <?php echo  $row['TM_name']; ?> 
        </td>
        <td >
             <?php echo  $row['TM_mail']; ?>  
        </td>
        <td >
          <?php echo  $row['TM_mobile']; ?> 
        </td>
        </tr>      
<?php
             }//while close
       } 
       //if close
       
      
       if($rows<4)
       {
            if($rows==0)
            {
                ?>
                <div align="center">
                    <br>
                <button class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Add Member</button> <br><br>
                <div class="alert alert-warning" role="alert">
                    You Have to add atleast 1 member.. No member Added Yet 
                </div>
                </div>
                <?php
            }
            else{
           ?>
                <div align="center ">
                    <br>
                <button class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Add Member</button> <br><br>
                <div class="alert alert-warning" role="alert">
                You can Add Maximum 4 member in your team .<br>
                you can add <?php echo 4-$rows;?> more member in your team  
                </div>
                <br>
                              
                </div>
                
                <?php
            }
       }
       else{
           ?>
            <div align="center">
                <h5>Your Team is Completed...</h5>
            </div>
           <?php
       }
       ?>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Team Member</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form method="post" action="AddTeamMember.php">
                            <div class="form-group">
                                <div class="row mt-5 justify-content-center">
                                    <div class="col-sm-6">
                                            <input type="text" class="form-control " name="name" id="name" placeholder="Member Name" required>
                                    </div>
                                </div>
                                
                                <div class="row mt-5 justify-content-center">
                                        <div class="col-sm-6">
                                                <input type="email" class="form-control " id="email" name="email" placeholder="Email" required>
                                        </div>
                                 </div>
                                <div class="row mt-5 justify-content-center">
                                        <div class="col-sm-6">
                                                <input type="text" class="form-control " id="mobile" name="mobile" placeholder="Mobile Number" required>
                                        </div>
                                </div>
                                     <div class="row mt-5 justify-content-center">
                                        
                                                <button type="submit" class="btn btn-success">Add Member</button>                                        
                                    </div>
                                </div>
                            
                            </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
</div>
          </body>
          <script>
          $(document).ready(function(){  
            $("#stud_data").DataTable();  
        }); 
          </script>
 </html>