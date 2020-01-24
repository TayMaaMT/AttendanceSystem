<?php include "connectDB.php" ?>
<?php session_start() ?>


<?php 
$db_user_name='';
$db_password ='';
if(isset ($_POST['login'])){

$username=$_POST['username'];

$password=$_POST['password'];
 

$username=mysqli_real_escape_string($conn,$username);
$password=mysqli_real_escape_string($conn,$password);

$query = "SELECT * FROM login WHERE user_name='{$username}'";

$select_user_query = mysqli_query($conn,$query);

if(!$select_user_query){
    die("Query Faild " .mysqli_error($conn));
}
while ($row = mysqli_fetch_array($select_user_query)){
    $db_id = $row['id'];
    $db_user_name = $row['user_name'];
    $db_email = $row['email'];
    $db_password = $row['password'];
         
}
if($username !==  $db_user_name && $password !==  $db_password){
    echo ("error");
}
else if ("admin" ==  $db_user_name && $password ==  $db_password){
    $_SESSION['id']=$db_id;
    

 header("Location:./admin_panel.php");
}
else if ($username ==  $db_user_name && $password ==  $db_password){
    $_SESSION['id']=$db_id;
    

 header("Location:./profile.php");
}
else{
echo ("error");
}
}

?>