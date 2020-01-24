<?php include "connectDB.php" ?>
<?php 

date_default_timezone_set('Asia/Jerusalem');
$d = date("Y-m-d");
//echo " Date:".$d."<BR>";
$t = date("H:i:s");
$t = "08:30:00";

echo "\n";
echo $t;
echo $d;
echo $_GET['room'];
echo $_GET['CardID'];
echo "\n";
if(!empty($_GET['room']) && !empty($_GET['CardID']))
{

    $room = $_GET['room'];
    $card_id = $_GET['CardID'];
    $student = "SELECT * FROM student where room='$room' AND card_id='$card_id' AND time_from <='$t' AND time_to >='$t'";
    $retval =mysqli_query($conn,$student);
    if(!$retval){
        $result="error card".mysqli_error($conn);
        }
    else{
          if(mysqli_num_rows($retval)>0){   
            while ($row = mysqli_fetch_assoc($retval)){ 
                 $student_name= $row['student_name'];
                 $card_id=$row['card_id'];
                 $student_id=$row['student_id'];
                 $course=$row['course'];
                 $doctor=$row['doctor'];
                 $room=$row['room'];
                 $time=$t;
                 $date=$d;
                 $attendance = "SELECT * FROM attendance where student_name='$student_name' AND date ='$date'";
               
                 $retval2 =mysqli_query($conn,$attendance);
                 if(!$retval2){
                     $result="error card".mysqli_error($conn);
                     }
                else{
                    if(mysqli_num_rows($retval2)>0){ 
                        echo mysqli_num_rows($retval2);

                     }
                     else{    
                 $sql = "INSERT INTO attendance(`student_name`,`card_id`,`student_id`,`course`,`doctor`,`room`,`time`,`date`)
                VALUES ('".$student_name."', '".$card_id."','".$student_id."','".$course."','".$doctor."','".$room."','".$time."','".$date."')";
                if ($conn->query($sql) === TRUE) {
                    echo "OK";
                    echo mysqli_num_rows($retval2);
                } 
                else {
                    echo "Error: " . $sql . "<br>" . $conn->error;
            }
          }
        }
        }
    }
          else{
            $sql = "INSERT INTO student(`card_id`,`room`)
            VALUES ('".$card_id."', '".$room."')";

            if ($conn->query($sql) === TRUE) {
                echo "OK";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
         }

}  
}  
$conn->close();






?>