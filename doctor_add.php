<?php include "connectDB.php" ?>
<?php session_start() ?>
<?php 
if(!isset($_SESSION['id'])){
    header("Location: login.php");
}

$id=$_SESSION['id'];
$result ='';
$db_id='';
$db_user_name='';
$db_email='';
$sql1 = "SELECT * FROM login WHERE id ='$id'";
$retval1 = mysqli_query($conn,$sql1);
while($row =mysqli_fetch_assoc($retval1)){
    $db_id = $row['id'];
    $db_user_name = $row['user_name'];
    $db_email = $row['email'];
}


if(isset($_POST['addCourse'])){
$select_course=$_POST['select_course'];
$select_class=$_POST['select_class'];
$timeFrom=$_POST['timeFrom'];
$timeTo=$_POST['timeTo'];


$sql = "SELECT * FROM doctors where time_start='$timeFrom' AND room='$select_class'";
$doctor = "SELECT * FROM login where id='$id'";
$retval =mysqli_query($conn,$sql);
if(!$retval){
  $result="Failed query".mysqli_error($conn);
}else{

    if(mysqli_num_rows($retval)>0){    
        $result ="This time is already in choosen. Choose another time!"; 

     }else{
        $sql = "INSERT INTO doctors(`doctor_name`,`course`,`room`,`time_start`,`time_end`) VALUES('{$db_user_name}','{$select_course}','{$select_class}','{$timeFrom}','{$timeTo}')";
        $retval =mysqli_query($conn,$sql);
        if(!$retval){
            echo "Error,Faild query".mysqli_error($conn);
        }else{
            $result="<br> Successfully signedup, You must login now";
        }

    }    
}
}

?>