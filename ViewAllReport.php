    <?php
        $i=0;
        $con = mysqli_connect('localhost','root','','zivima');
        if (!$con) {
            die('Could not connect: ' . mysqli_error($con));
        }
        //echo $q;
        
        mysqli_select_db($con,"zivima");
        $sql="SELECT * FROM report";
        $result = mysqli_query($con,$sql);
        if ($result->num_rows > 0) {
        ?>
                <div style="margin-left:50px;" >
                <table class="table">
                        <thead>
                            <tr class="row">
                            <th  class="col-sm-1">#</th>
                            <th class="col-sm-2">Team Name</th>
                            <th class="col-sm-2"> Problem Statement</th>
                            <th class="col-sm-3">Event Name</th>
                            <th class="col-sm-2">Status</th>
                            </tr>
                        </thead>
                        <tbody>
        <?php
           

            while($row = mysqli_fetch_array($result))
             { 
          ?>
          <tr class="row">
        <th class="col-sm-1"><?php echo ++$i;?>
        </th>
        <td class="col-sm-2">
        <label for=""><?php
            $id1=$row['ST_id'];
           // echo $id;
            $sql1="SELECT * from report,student_team WHERE report.ST_id=student_team.ST_id and report.ST_id=$id1";
            $result1 = mysqli_query($con,$sql1);
            if($result1)
            {
                if($row1 = mysqli_fetch_array($result1))
                { 
                   
                    echo $row1['ST_name'];
                }
                else{
                    echo "not found";
                }
            }
            
        ?> </label>
        </td>
        <td class="col-sm-2">
             <label for=""> <?php 
              $id2=$row['PS_id'];
             $sql2="SELECT * from report,problem_statement WHERE report.PS_id=problem_statement.PS_id and report.PS_id=$id2";
             $result2 = mysqli_query($con,$sql2);
             if($result2)
             {
                 if($row2 = mysqli_fetch_array($result2))
                 { 
                     echo $row2['PS_title'];
                 }
                 else{
                     echo "not found";
                 }
             }
             ?></label>    
        </td>
        <td class="col-sm-3">
            <label for=""> <?php 
             $id3=$row['R_id'];
             $sql3="SELECT * from report,problem_statement,event WHERE report.PS_id=problem_statement.PS_id and problem_statement.E_id=event.E_no and report.R_id=$id3";
             $result3 = mysqli_query($con,$sql3);
             if($result3)
             {
                 if($row3 = mysqli_fetch_array($result3))
                 { 
                     echo $row3['E_name'];
                 }
                 else{
                     echo "not found";
                 }
             }
            
            ?> </label>
        </td>
        <td class="col-sm-2">
            <h6>Checked</h6>
        </td>
        </tr>      
<?php
             }
            }
            ?>