<?php

    $i=0;
        $con = mysqli_connect('localhost','root','','zivima');
        if (!$con) {
            die('Could not connect: ' . mysqli_error($con));
        }
        //echo $q;
        
        mysqli_select_db($con,"zivima");
        $sql="SELECT * FROM institute WHERE InVerifyStatus = 1";
        $result = mysqli_query($con,$sql);
        if ($result->num_rows > 0) {
        ?>
                <div style="margin-left:50px;" >
                <table class="table">
                        <thead>
                            <tr class="row">
                            <th  class="col-sm-1">#</th>
                            <th class="col-sm-2">AICTE Code</th>
                            <th class="col-sm-2">institute ID</th>
                            <th class="col-sm-3">Institute Name</th>
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
        <label for=""><?php echo  $row['InAICTID']; ?> </label>
        </td>
        <td class="col-sm-2">
             <label for=""> <?php echo  $row['In_Id']; ?></label>    
        </td>
        <td class="col-sm-3">
            <label for=""> <?php echo  $row['InName']; ?> </label>
        </td>
        <td class="col-sm-2">
            <label for="">verified</label>
        </td>
        </tr>      
<?php
             }//while close
       } //if close
       ?>