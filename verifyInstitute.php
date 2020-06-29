<!DOCTYPE html>
<html lang="en">
<head>  
           <title>Verify Institute</title>  
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
        $i=0;
        $con = mysqli_connect('localhost','root','','zivima');
        if (!$con) {
            die('Could not connect: ' . mysqli_error($con));
        }
        //echo $q;
        
        mysqli_select_db($con,"zivima");
        $sql="SELECT * FROM institute WHERE InVerifyStatus = 0";
        $result = mysqli_query($con,$sql);
        if ($result->num_rows > 0) {
        ?>

            <div class="container">
            <h4 class="text-center"> Verify Institute </h4> <br>
                <div class="table-responsive" >
                <table id="institute_data" class="table table-striped table-bordered">  

                        <thead>
                            <tr>
                            <th>#</th>
                            <th>AICTE Code</th>
                            <th>institute ID</th>
                            <th>Institute Name</th>
                            <th>Verify</th>
                            </tr>
                      
                        </thead>
                        <tbody>
        <?php
           

            while($row = mysqli_fetch_array($result))
             { 
          ?>
          <tr class="row">
        <?php echo ++$i;?>
        </th>
        <td>
        <?php echo  $row['InAICTID']; ?>
        </td>
        <td>
            <?php echo  $row['In_Id']; ?>    
        </td>
        <td>
            <?php echo  $row['InName']; ?> </label>
        </td>
        <td>
             <button type="submit" id="btnViewAll" onclick=" verify(<?php echo $row['In_Id']; ?>)" class="btn "> <i class="fa fa-check-circle" aria-hidden="true"></i></i> </button>
        </td>
        </tr>     
<?php
             }//while close
       } //if close
       else{
          
    ?>
    </table>
            <div align="center" style="margin-top=50px;">
                <h4 class="text-center"> All Requested Institute are Verified.. </h4> <br>
                <button type="submit" onclick=" viewAll()" class="btn btn-primary"> View All Institute</button>
                <br><br><br>
                <div id="viewAll">

                </div>
            </div>
            </div>
            </div>

 <?php
       }//else close
   
   ?>   
                                                                
        </table>
        </div>
</body>
<script>
$(document).ready(function(){  
      $("#institute_data").DataTable();  
 })
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
                        xmlhttp.open("GET","updateStatus.php?q="+id,true);
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
                               // alert(this.responseText);
                                document.getElementById("viewAll").innerHTML = this.responseText;
                                //document.getElementById("btnViewAll").style.visibility = "hidden";
                                //window.location.reload(true);
                                //alert("verified");
                        }
                        };
                        xmlhttp.open("GET","viewAll.php",true);
                        xmlhttp.send();
                
   }
  
</script>
</html> 