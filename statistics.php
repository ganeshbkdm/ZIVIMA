<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        .format{
            height:200px;
            width:200px;
            border: 1px solid #333;
            margin-top:50px;
            margin-left:100px;
            padding-top:50px;
            padding-bottom:50px;
            color:black;
            
        }
    
    </style>
</head>
<body>
    <?php
     $con = mysqli_connect('localhost','root','','zivima');
    if (!$con) {
        die('Could not connect: ' . mysqli_error($con));
    }
    //echo $q;

    mysqli_select_db($con,"zivima");
    // Verifyed Institute Count 
    $sql="SELECT count(*) as total FROM institute WHERE InVerifyStatus= 1";
    $result=mysqli_query($con,$sql);
    $data=mysqli_fetch_assoc($result);
    $verifiedInstitute=$data['total'];
    //Not Verified Institutes
    $sql3="SELECT count(*) as total FROM institute WHERE InVerifyStatus= 0";
    $result3=mysqli_query($con,$sql3);
    $data3=mysqli_fetch_assoc($result3);
    $notVerifiedInstitute=$data3['total'];
    //Total Participated Teams
    $sql1="SELECT count(*) as total FROM student_team";
    $result1=mysqli_query($con,$sql1);
    $data1=mysqli_fetch_assoc($result1);
    $totalStudent=$data1['total'];

    mysqli_close($con);
    ?>
 <div class="container-fluid">
    <div class="row">
      <div align="center" class="format col-2 shadow p-3 mb-5">
      <a href="#" target="main_content">
      <i class="fa fa-users fa-2x" aria-hidden="true"></i>
          <br>
         <h5>Total Participated Team</h5><br>
         <h4><?php echo $totalStudent; ?></h4> 
         </a>
      </div>
      <div align="center" class="format col-2 shadow p-3 mb-5">
     <a href="" target="main_content"> <i class="fa fa-building fa-2x" aria-hidden="true"></i>
          <br>
         <h5>Verified Institute</h5><br>
         <h4><?php echo $verifiedInstitute; ?></h4> </a>
      </div>
      <div align="center" class="format col-2 shadow p-3 mb-5">
      <a href="" target="main_content">
     <i class="fa fa-building fa-2x" aria-hidden="true"></i>
          <br>
         <h5>Till Not verified Institite </h5><br>
         <h4><?php echo $notVerifiedInstitute; ?></h4> 
         </a>
      </div>
    </div>
    </div>
</body>
</html>