
<?php
$q = $_GET['q'];

$con = mysqli_connect('localhost','root','','zivima');
if (!$con) {
    die('Could not connect: ' . mysqli_error($con));
}
//echo $q;

mysqli_select_db($con,"zivima");
$sql="UPDATE student_team SET verifySatus= 1 where ST_id= '".$q."'";

if ($con->query($sql) === TRUE) {
    echo "Record updated successfully";
} else {
    echo "Error updating record: " . $con->error;
}
mysqli_close($con);
?>