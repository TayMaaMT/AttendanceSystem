<?php include "connectDB.php" ?>
<?php session_start() ;
    if(!isset($_SESSION['id'])){
        header("Location: login.php");
    }
    $id=$_SESSION['id'];
    $doctor="";
    $sql1 = "SELECT * FROM login WHERE id ='$id'";
    $retval1 = mysqli_query($conn,$sql1);
    while($row =mysqli_fetch_assoc($retval1)){
        
        $doctor = $row['user_name'];
    
    }

    $course =  $_SESSION["course"];
  
 
   $count = 0;
   $msg="";
//**********************************************************************************************   

?>
<table class="table table-bordered data-table">
            <thead class="th-color">
                <th>Std. name</th>
                <th>SID</th>
                <th>Card</th>
                <th>Course</th>
                <th>Room</th>
                <th>Doctor</th>
                <th>Number attendence</th>
               
            </thead>
            <tbody>
            <?php
            $sql = "SELECT * FROM attendance WHERE course='$course' AND doctor='$doctor' ";
            $retval = mysqli_query($conn,$sql);
            $db_student_name="";
            $array =array("hi");
            while($row =mysqli_fetch_assoc($retval) ){
               if(!(array_search($row['student_name'], $array))){
                
                    array_push($array,$row['student_name'] );
                    
             
                $db_student_name = $row['student_name'];
                $db_student_id=$row['student_id'];
                $db_card_id=$row['card_id'];
                $db_course=$row['course'];
                $db_room=$row['room'];
                $db_doctor=$row['doctor'];
                $attendance = "SELECT * FROM attendance where student_name='$db_student_name' AND course='$course'";
                $msg= $attendance;
                $retval2 =mysqli_query($conn,$attendance);

                $count=mysqli_num_rows($retval2);
                if(!$retval2){
                    $result="error card".mysqli_error($conn);
                    }
                 else {
                    if(mysqli_num_rows($retval2)>0){

                        $count=mysqli_num_rows($retval2);
                    }
                   

                 }
                 

       
               
            ?>
<tr>
            
            <td><?php echo $db_student_name?></td>
            <td><?php echo $db_student_id?></td>
            <td><?php echo $db_card_id ?></td>
            <td><?php echo $db_course ?></td>
            <td><?php echo $db_room ?></td>
            <td><?php echo $db_doctor ?></td>
            <td><?php echo $count ?></td>
       
  
  <?php   }}?>

            </tbody>
        </table>

    <script src="js/table.js"></script>