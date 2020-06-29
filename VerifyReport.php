<!DOCTYPE html>
<html lang="en">
<?php include('inc/header.php'); ?>
<head>

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
        $sql="SELECT * FROM report where R_checkStatus=0";
        $result = mysqli_query($con,$sql);
        if ($result->num_rows > 0) {
        ?>

        
            <h4 class="text-center"> Verify Report </h4> <br>
                <div style="margin-left:50px;" >
                <table class="table">
                        <thead>
                            <tr class="row">
                            <th  class="col-sm-1">#</th>
                            <th class="col-sm-2">Team Name</th>
                            <th class="col-sm-2"> Problem Statement</th>
                            <th class="col-sm-3">Event Name</th>
                            <th class="col-sm-2">View  Report </th>
                            <th class="col-sm-2">Verify </th>
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
        <label for=""><?php
            $id1=$row['ST_id'];
           // echo $id;
            $sql1="SELECT * from report,student_team WHERE report.ST_id=student_team.ST_id and report.ST_id=$id1";
            $result1 = mysqli_query($con,$sql1);
            if($result1)
            {
                if($row1 = mysqli_fetch_array($result1))
                { 
                   
                    echo $row1['ST_name'];
                }
                else{
                    echo "not found";
                }
            }
            
        ?> </label>
        </td>
        <td class="col-sm-2">
             <label for=""> <?php 
              $id2=$row['PS_id'];
             $sql2="SELECT * from report,problem_statement WHERE report.PS_id=problem_statement.PS_id and report.PS_id=$id2";
             $result2 = mysqli_query($con,$sql2);
             if($result2)
             {
                 if($row2 = mysqli_fetch_array($result2))
                 { 
                     echo $row2['PS_title'];
                 }
                 else{
                     echo "not found";
                 }
             }
             ?></label>    
        </td>
        <td class="col-sm-3">
            <label for=""> <?php 
             $id3=$row['R_id'];
             $sql3="SELECT * from report,problem_statement,event WHERE report.PS_id=problem_statement.PS_id and problem_statement.E_id=event.E_no and report.R_id=$id3";
             $result3 = mysqli_query($con,$sql3);
             if($result3)
             {
                 if($row3 = mysqli_fetch_array($result3))
                 { 
                     echo $row3['E_name'];
                 }
                 else{
                     echo "not found";
                 }
             }
            
            ?> </label>
        </td>
        <td class="col-sm-2">
             <button class="btn btn-primary" type="submit" id="btnViewAll" onclick=" view(<?php echo $row['R_id']; ?>)" class="btn "> <i class="fa fa-eye" aria-hidden="true"></i> </button>
        </td>
        <td class="col-sm-2">
             <button class="btn btn-primary" type="submit" id="btnVeryfy" onclick=" verify(<?php echo $row['R_id']; ?>)" class="btn "> <i class="fa fa-check-square-o" aria-hidden="true"></i></button>
        </td>
        </tr>      
<?php
             }//while close
       } //if close
       else{
          
    ?>
            <div align="center" style="margin-top=50px;">
                <h4 class="text-center"> All Report are Verified.. </h4> <br>
                <button type="submit" onclick=" viewAll()" class="btn btn-primary"> View All Report</button>
                <div id="viewAll"></div>
                <br><br><br>
            </div>
            

 <?php
       }//else close
   
   ?>   
                                                                
        </table>
        </div>
</body>
<script>
function view(id) {
                       //alert(id);
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
                            //alert("called");
                              alert("Opening..."+ this.responseText);
                               window.location.href = this.responseText;
                               //window.open('this.responseText', '_blank');
                                //document.getElementById("viewpdf").innerHTML = this.responseText;
                               // window.location.reload(true);
                                //alert("verified");
                        }
                        };
                        xmlhttp.open("GET","ViewPDF.php?q="+id,true);
                        xmlhttp.send();
                }
   }
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
                        xmlhttp.open("GET","updateReportStatus.php?q="+id,true);
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
                        xmlhttp.open("GET","viewAllReport.php",true);
                        xmlhttp.send();
                
   }
</script>
</html> 