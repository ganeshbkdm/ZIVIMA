<?php
 include('inc/SpocSession.php'); 
    include('inc/header.php'); 
   
    $n=$auth['SOPC_id'];
    $i=0;
        $con = mysqli_connect('localhost','root','','zivima');
        if (!$con) {
            die('Could not connect: ' . mysqli_error($con));
        }
        //echo $q;
        
        mysqli_select_db($con,"zivima");
        $sql="SELECT * FROM student_team WHERE SPOC_id = $n";
        $result = mysqli_query($con,$sql);
        if ($result->num_rows > 0) {
        ?>
                <div style="margin-left:50px;" >
                <table class="table">
                        <thead>
                            <tr class="row">
                            <th  class="col-sm-1">#</th>
                            <th class="col-sm-2">Team NAme</th>
                            <th class="col-sm-2">Team Leader</th>
                            <th class="col-sm-3">Mail</th>
                            <th class="col-sm-2">Contact</th>
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
        <label for=""><?php echo  $row['ST_name']; ?> </label>
        </td>
        <td class="col-sm-2">
             <label for=""> <?php echo  $row['ST_leaderName']; ?></label>    
        </td>
        <td class="col-sm-3">
            <label for=""> <?php echo  $row['ST_mail']; ?> </label>
        </td>
        <td class="col-sm-2">
            <label for=""><?php echo  $row['ST_mobile']; ?></label>
        </td>
        </tr>      
<?php
             }//while close
       } //if close
       ?>