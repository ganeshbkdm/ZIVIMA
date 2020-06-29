<?php include('inc/DAsession.php'); 
$n=$auth['DA_id'];
?>

<?php
$q = $_GET['q'];

$con = mysqli_connect('localhost','root','','zivima');
if (!$con) {
    die('Could not connect: ' . mysqli_error($con));
}
//echo $q;

mysqli_select_db($con,"zivima");
$sql="UPDATE report SET R_checkStatus= 1, DA_Id=$n WHERE R_id = '".$q."'";

if ($con->query($sql) === TRUE) {
    echo "Report Verified successfully";
} else {
    echo "Error updating record: " . $con->error;
}
mysqli_close($con);
?>