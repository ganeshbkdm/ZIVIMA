<!DOCTYPE html>
<?php include('inc/session.php');?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
           <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>  
           <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>            
           <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" />
		    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <title>ZIVIMA | (Zila Vikas Manch)</title>
</head>
<body>
        <form action=""  method="post">
                
                
<?php
        $i=0;
        $Eid;
        $con = mysqli_connect('localhost','root','','zivima');
        if (!$con) {
            die('Could not connect: ' . mysqli_error($con));
        }
        $n=$auth['ST_id'];//from session
        //echo $n;     
        //echo $q;
        mysqli_select_db($con,"zivima");
        $sql1="SELECT E_id FROM student_team ,event WHERE student_team.E_id=event.E_no and student_team.ST_id = $n";
        $result1 = mysqli_query($con,$sql1);
        if ($result1->num_rows > 0)
        {
            if($row1= mysqli_fetch_array($result1))
            { 
                $Eid= $row1['E_id'];
            }
            $sql3="SELECT E_name FROM event WHERE E_no = $Eid";
            $result3 = mysqli_query($con,$sql3);
            if ($result3->num_rows > 0)
            {
                if($row3= mysqli_fetch_array($result3))
                {?>
                    <br>
      0             <h4 align="center">You Are Enrolled for event <?php echo $row3['E_name'];?></h4>
                    <br>
                   <?php
                }
    
            }
            $sql="SELECT * FROM problem_statement WHERE E_id = $Eid";
            $result = mysqli_query($con,$sql);
            if ($result->num_rows > 0) {
            ?>

                    <div class="container">
                    <br/>
                    <div class="table-responsive">
                    <table id="evnet_data" class="table table-striped table-bordered">  
                            <thead>
                                <tr>
                                <th></th>
                                <th>Problem Statement </th>
                                <th>Type</th>
                                <!-- <th>Submit Report</th>
                                </tr> -->
                            </thead>
                            <tbody>
            <?php
               
    
                while($row = mysqli_fetch_array($result))
                 { 
              ?>
                <tr>
                <th><?php echo ++$i;?>
                </th>
                <td>
                <label for=""><?php echo  $row['PS_title']; ?> </label>
                </td>
                <td>
                    <label for=""> <?php echo  $row['PS_type']; ?></label>    
                </td>
                <!-- <td>
                    <button type="submit" onclick="submitRpt();" class="btn btn-primary">Submit Report</button>
                </td> -->
                </tr>      
    <?php
                 }//while close
           } //Inne if close
        }//outer If
        
  ?>           
</table>
</div>
            </div>
        </form>
</div>
</div>
</body>
</html>
<script>  
 $(document).ready(function(){  
      $("#event_data").DataTable();  
 }); 
</script>

