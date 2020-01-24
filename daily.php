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
    $course=$_SESSION["course"];
    
    $seldate= $_SESSION["exportdata"] ;
    ?>
<table class="table table-bordered data-table">
            <thead class="th-color">
                <th>Std. name</th>
                <th>SID</th>
                <th>Card</th>
                <th>Course</th>
                <th>Room</th>
                <th>Doctor</th>
                <th>Time attendence</th>
                <th>date</th>
            </thead>
            <tbody>
            <?php
            $sql = "SELECT * FROM attendance WHERE course='$course' AND doctor='$doctor' AND date ='$seldate' ORDER BY id DESC ";
            $retval = mysqli_query($conn,$sql);
            while($row =mysqli_fetch_assoc($retval)){
                $db_student_name = $row['student_name'];
                $db_student_id=$row['student_id'];
                $db_card_id=$row['card_id'];
                $db_course=$row['course'];
                $db_room=$row['room'];
                $db_doctor=$row['doctor'];
                $db_time=$row['time'];
                $db_date =$row['date'];
                

         
            ?>
<tr>
            
            <td><?php echo $db_student_name?></td>
            <td><?php echo $db_student_id?></td>
            <td><?php echo $db_card_id ?></td>
            <td><?php echo $db_course ?></td>
            <td><?php echo $db_room ?></td>
            <td><?php echo $db_doctor ?></td>
            <td><?php echo $db_time ?></td>
            <td><?php echo $db_date ?></td>
  
  <?php   }?>

            </tbody>
        </table>