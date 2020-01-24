<?php include "connectDB.php" ?>
<?php
session_start();
    if(!isset($_SESSION['id'])){
        header("Location: login.php");
    }
    $id =$_SESSION['id'];
    $doctor="";
    $sql1 = "SELECT * FROM login WHERE id ='$id'";
    $retval1 = mysqli_query($conn,$sql1);
    while($row =mysqli_fetch_assoc($retval1)){
        
        $doctor = $row['user_name'];
    
    }    

$output = '';
$outputdata = $_SESSION['exportdata'];
$course = $_SESSION['course'];


if(isset($_POST["export"])){
  
    $sql = "SELECT * FROM attendance WHERE course='$course' AND doctor='$doctor' AND date ='$outputdata' ";
    $result = mysqli_query($conn, $sql);

    if($result->num_rows > 0){
        $output .= '
                    <table class="table" bordered="1">  
                      <TR>
                      <th>Std. name</th>
                      <th>SID</th>
                      <th>Card</th>
                      <th>Course</th>
                      <th>Room</th>
                      <th>Doctor</th>
                      <th>Time attendence</th>
                      <th>date</th>
                      </TR>';

      while($row=$result->fetch_assoc()) {

          $output .= '
                      <TR> 
                          <TD> '.$row['student_name'].'</TD>
                          <TD> '.$row['student_id'].'</TD>
                          <TD> '.$row['card_id'].'</TD>
                          <TD> '.$row['course'].'</TD>
                          <TD> '.$row['room'].'</TD>
                          <TD> '.$row['doctor'].'</TD>
                          <TD> '.$row['time'].'</TD>
                          <TD> '.$row['date'].'</TD>
                      </TR>';
      }
      $output .= '</table>';
      header('Content-Type: application/vnd.ms-excel');
      header('Content-Disposition: attachment; filename=UserLog'.$outputdata.'.xls');
      echo $output;
    }
    else{
        header( "location: attendance_student.php?course=$course" );
    }
}
?>