<?php include('inc/InstituteSession.php');
if(!$login) {
  include('inc/header.php');
  include('inc/navbar.php'); 
  ?>
<div align="center">

  <br><br><br>
<h3>You Are Not Logged in Please login first<br><br><br>
  <a href="InstituteLogin.php">Click Here</a> to login </h3>
</div>
 
  <?php
}
  else
  {
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Dashboard | ZIVIMA(Zila Vikas Manch)</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
   
<style>
  .nav-link:hover{
    border-bottom: 1px solid #FFF;
    border-radius:2px;
    display: block;
  }
  body {
  font-size: .875rem;
}

.sidebar {
  position: fixed;
  top: 0;
  bottom: 0;
  left: 0;
  z-index: 100; /* Behind the navbar */
  padding: 0;
  box-shadow: inset -1px 0 0 rgba(0, 0, 0, .1);
  border-bottom: 1px solid #FFF;
}
a{
  color: #FFF;
}

.sidebar-sticky {
  position: -webkit-sticky;
  position: sticky;
  top: 48px; /* Height of navbar */
  height: calc(100vh - 48px);
  padding-top: .5rem;
  overflow-x: hidden;
  overflow-y: auto; /* Scrollable contents if viewport is shorter than content. */
}
iframe{
  z-index: 100;
}
.sidebar .nav-link {
  font-weight: 500;
  color: rgb(133, 130, 130);
  margin-top: 5px;
}
.sidebar .nav-link:hover .feather,
.sidebar .nav-link.active .feather {
  color: #fff;
}

.sidebar-heading {
  font-size: .75rem;
  text-transform: uppercase;
}
</style>  
  </head>

  <body>
    <nav class="navbar sticky-top p-2 " style="background-color: #111a24 ; color: rgb(255, 255, 255); box-shadow: inset -1px 0 0 rgba(0, 0, 0, .1);border-bottom: 1px solid #FFF;">
        <a class="col-sm-2 col-md-4" style=" color: rgb(255, 255, 255); font-size: 20px;" href="#"> <i class="fa fa-dashboard"></i> Institute Dashboard</i></a>
      <ul class="navbar-nav px-3">
        <li class="nav-item text-nowrap">
           <a class="" href="#"> <i class="fa fa-commenting-o fa-1x" aria-hidden="true"></i></a> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
           <a class="" href="#"> <i class="fa fa-bullhorn fa-1x" aria-hidden="true"></i></a> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <img src="img/user.png" style="max-height: 50px" alt="">  &nbsp;&nbsp; &nbsp;&nbsp;
                Welcome, <?=$auth['InName'];?>&nbsp;&nbsp;&nbsp;&nbsp;
              <a class="" href="logout.php">Logout&nbsp;&nbsp;<i class="fa fa-sign-out fa-1x" aria-hidden="true"></i></a>                   </li>
      </ul>
    </nav>
    
    <div class="container-fluid">
      <div class="row border-top">
        <nav class="col-md-2 sidebar" style="background-color: #111a24 ; color: rgb(255, 255, 255)">
          <div class="sidebar-sticky">
            <ul class="nav flex-column">
              <li class="nav-item">
                <a class="nav-link" href="index.html">
                    <i class="fa fa-home" aria-hidden="true"></i>
                     Home 
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="AddSPOC.php" target="main_content">
                <i class="fa fa-users" aria-hidden="true"></i>
                  Add SPOC
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="InstituteWiseStudTeam.php" target="main_content">
                  <i class="fa fa-street-view" aria-hidden="true"></i>
                  View Student Team
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="ProblemStatement.php" target="main_content">
                <i class="fa fa-bookmark" aria-hidden="true"></i>
                Profile
                </a>
              </li>
            
            <div style="margin-top: 50px; margin-left: 5px; color:#333;" > <i class="fa fa-copyright" aria-hidden="true"></i>Ganesh Kadam</div>
          </div>
        </nav>
        <iframe src="statistics.php" class="col-md-9 ml-sm-auto col-lg-10 pt-1 px-1" style="height: 550px" name="main_content" >
        </iframe>
      </div>
    </div>
  </body>
</html>
<?php
 }
 ?>