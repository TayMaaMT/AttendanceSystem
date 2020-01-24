<?php include "connectDB.php" ?>
<?php session_start() ?>
<?php
$msg='';
if(!isset($_SESSION['id'])){
    header("Location: login.php");
}?>

<?php 
if(isset($_POST['add_class'])) {
    if(!empty($_POST['classroom'])){
        $classroom=$_POST['classroom'];
        $sql = "INSERT INTO classroom(`class_name`) VALUES('{$classroom}')";
        $result = mysqli_query($conn,$sql);
        if(!$result){
            $msg= "Error in sharing classroom , try again".mysqli_error($conn);}
             }
          
    else{
            $msg="<center>Please type a class first</center>";
            }
 }


?>

<?php 
if(isset($_POST['add_course'])) {
    if(!empty($_POST['CourseName'])){
        $CourseName=$_POST['CourseName'];
        $CourseID=$_POST['CourseID'];
        $sql = "INSERT INTO courses(`course_name`,`course_id`) VALUES('{$CourseName}','{$CourseID}')";
        $result = mysqli_query($conn,$sql);
        if(!$result){
            $msg= "Error in sharing doctor , try again".mysqli_error($conn);}
             }
          
    else{
            $msg="<center>Please type a course first</center>";
            }
 }


?>

<?php 
if(isset($_POST['add_doctor'])) {
    if(!empty($_POST['drname'])){
        $drname=$_POST['drname'];
        $dremail=$_POST['dremail'];
        $drpassword=$_POST['drpassword'];
        $sql = "INSERT INTO login(`user_name`,`email`,`password`) VALUES('{$drname}','{$dremail}','{$drpassword}')";
        $sql2= "INSERT INTO doctors(`doctor_name`,`doctor_email`,`password`) VALUES('{$drname}','{$dremail}','{$drpassword}')";
        $result = mysqli_query($conn,$sql);
        $result2=mysqli_query($conn,$sql2);
        if(!$result ){
            $msg= "Error in sharing course , try again".mysqli_error($conn);}
             }
          
    else{
            $msg="<center>Please type a course first</center>";
            }
 }


?>