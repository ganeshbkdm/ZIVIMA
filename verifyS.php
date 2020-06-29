 
 <!DOCTYPE html>  
 <html>  
      <head>  
           <title>Verify Student</title>  
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
	  <?php $con = mysqli_connect('localhost','root','','zivima');
        if (!$con) {
            die('Could not connect: ' . mysqli_error($con));
        }
        //echo $q;
        $query ="SELECT * FROM student_team where verifySatus=0";
        mysqli_select_db($con,"zivima");
        // $sql="SELECT * FROM student_team ";
        $result = mysqli_query($con,$query);
		if ($result->num_rows > 0) {
        ?>
        
           <div class="container">  
                <h3 align="center">Verify Student</h3>  
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
                <h4 class="text-center"> All Requested Teams are verified </h4> <br>
                <button type="submit" onclick=" viewAll()" class="btn btn-primary"> View All Team</button>
                <br><br><br>
                <div id="viewAll">
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
                       alert(id);
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
                                //alert("called");
                                window.location.reload(true);
                                //alert("verified");
                        }
                        };
                        xmlhttp.open("GET","updateSudentTeam.php?q="+id,true);
                        xmlhttp.send();
                }
   }
   function viewAll() {
                       //alert("In function")
                        if (window.XMLHttpRequest) {
                        xmlhttp = new XMLHttpRequest();
                        
                        } else {
                        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
                        }
                        xmlhttp.onreadystatechange = function() {
                        if (this.readyState == 4 && this.status == 200) {
                               //alert(this.responseText);
                                document.getElementById("viewAll").innerHTML = this.responseText;
                                //document.getElementById("btnViewAll").style.visibility = "hidden";
                                //window.location.reload(true);
                                //alert("verified");
                        }
                        };
                        xmlhttp.open("GET","viewAllStudTeam.php",true);
                        xmlhttp.send();
                
   }
 </script> 