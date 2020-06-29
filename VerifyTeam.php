<?php include('inc/SpocSession.php'); 

?>
 <!DOCTYPE html>  
 <html>  
      <head>  
           <title></title>  
           <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
           <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>  
           <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>            
           <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" />
		    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
			<style>
		
			
			</style>
      </head>
		
      <body>  
      <?php 
      $n= $auth['IN_id'];
      $con = mysqli_connect('localhost','root','','zivima');
        mysqli_select_db($con,"zivima");
        if (!$con) {
            die('Could not connect: ' . mysqli_error($con));
        }
        //echo $q;
        $query ="SELECT * FROM student_team where In_Id = $n";
        //echo $n;
        $result = mysqli_query($con,$query);
		if ($result->num_rows > 0) {
        ?>
        
           <div class="container">  
                <h3 align="center">Registerd Team From Your institute</h3>  
                <br />  
                <div class="table-responsive">  
                     <table id="student_data" class="table table-striped table-bordered">  
                          <thead>  
                               <tr>  
                                    <td>Student ID</td>  
                                    <td>Student Teamleader Name</td>  
                                    <td>Student Mail</td>  
                                    <td>View Details</td>  
                                    <td>Verify</td>  
                               </tr>  
                          </thead>  
                          <?php  
                          while($row = mysqli_fetch_array($result))  
                          {  
                               echo '  
                               <tr>  
                                    <td>'.$row["ST_id"].'</td>  
                                    <td>'.$row["ST_leaderName"].'</td>  
                                    <td>'.$row["ST_mail"].'</td>  
                                    <td><button type="submit" class="btn btn-info">View Details </button></td>  ';
                                    ?>
                                    
                                    <td><button type="submit" id="btnViewAll" onclick=" verify(<?php  echo $row['ST_id']; ?>)" class="btn"> <i class="fa fa-check-circle" aria-hidden="true"></i></i> </button>  
                               </tr> 

                               <?php
                          }  
							}
                        else{  ?>  
						<div align="center" style="margin-top=50px;">
                    <h4 class="text-center"> No Team Has Registered from your institute </h4> <br>
                    <?php
						}
						 ?>
                     </table>
						

                </div>
            </div>
                </div>  
           </div>  
      </body>  
 </html>  
 <script>  
 $(document).ready(function(){  
      $("#student_data").DataTable();  
 });  

 function verify(id) {
                       // alert(id);
                if (id == "") {
                        alert("I Dont Get ID");
                        return;
                } else {
                        if (window.XMLHttpRequest) {
                        xmlhttp = new XMLHttpRequest();
                        
                        } else {
                        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
                        }
                        xmlhttp.onreadystatechange = function() {
                        if (this.readyState == 4 && this.status == 200) {
                                alert(this.responseText);
                                window.location.reload(true);
                                //alert("verified");
                        }
                        };
                        xmlhttp.open("GET","TeamStatusupdate.php?q="+id,true);
                        xmlhttp.send();
                }
   }
 </script> 