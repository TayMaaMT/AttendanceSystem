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

$course = $_SESSION['course'];

if(isset($_POST["export"])){
  
    $sql = "SELECT * FROM attendance WHERE course='$course' AND doctor='$doctor'  ORDER BY id DESC ";
    $retval = mysqli_query($conn,$sql);
    $db_student_name="";
    $array =array("hi");
    if($retval->num_rows > 0){
        $output .= '
                    <table class="table" bordered="1">  
                      <TR>
                      <th>Std. name</th>
                      <th>SID</th>
                      <th>Card</th>
                      <th>Course</th>
                      <th>Room</th>
                      <th>Doctor</th>
                      <th>count</th>
                      </TR>';


         
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
               
    

    

          $output .= '
                      <TR> 
                          <TD> '.$row['student_name'].'</TD>
                          <TD> '.$row['student_id'].'</TD>
                          <TD> '.$row['card_id'].'</TD>
                          <TD> '.$row['course'].'</TD>
                          <TD> '.$row['room'].'</TD>
                          <TD> '.$row['doctor'].'</TD>
                          <TD> '.$count.'</TD>
                        
                      </TR>';
      }}

      $output .= '</table>';
      header('Content-Type: application/vnd.ms-excel');
      header('Content-Disposition: attachment; filename=UserLog'.$course.'.xls');
      echo $output;
    }
    else{
        header( "location: attendance_student.php?course=$course" );
    }
}
?>