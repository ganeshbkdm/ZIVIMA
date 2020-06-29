<?php
$q = $_GET['q'];

$con = mysqli_connect('localhost','root','','zivima');
if (!$con) {
    die('Could not connect: ' . mysqli_error($con));
}
//echo $q;

mysqli_select_db($con,"zivima");
$sql="SELECT * FROM student_team WHERE ST_mail = '".$q."'";
$result = mysqli_query($con,$sql);
if($row = mysqli_fetch_array($result)) {
    echo "Already Have an Account";
}
//echo "Accounnt";
mysqli_close($con);
?>