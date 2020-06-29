<?php
$q = $_GET['q'];

$con = mysqli_connect('localhost','root','','zivima');
if (!$con) {
    die('Could not connect: ' . mysqli_error($con));
}
//echo $q;
mysqli_select_db($con,"zivima");
$sql="SELECT * from report WHERE R_id = '".$q."'";
$result = mysqli_query($con,$sql);
    if ($result->num_rows > 0) 
    {   
        if($row = mysqli_fetch_array($result))
        { 
            $filename = "report/".$row[2];
            echo $filename;
            // header('Content-type: application/pdf'); 
  
            // header('Content-Disposition: inline; filename="' . $filename . '"'); 
              
            // header('Content-Transfer-Encoding: binary'); 
              
            // header('Accept-Ranges: bytes'); 
         }
     
    } //if close
    ?>