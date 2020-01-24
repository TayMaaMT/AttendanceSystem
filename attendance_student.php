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
    $course = $_GET['course'];
    $_SESSION["course"] =$course;
    //Get current date and time
    date_default_timezone_set('Asia/Jerusalem');
    $d = date("Y-m-d");
   
//**********************************************************************************************   
    if (isset($_POST['seldate'])) {
        $_SESSION["exportdata"] = $_POST['date'];
      
    }
    else{
        $_SESSION["exportdata"] = $d;
      }

      $seldate= $_SESSION["exportdata"] ;
?>


<!DOCTYPE html>
<html>

<head>
    <title>Attandence System</title>
    <!--===============================================================================================-->
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css" />
    <!--===============================================================================================-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="css/table.css">
    <script src="js/jquery.min.js"></script>
<script>
  $(document).ready(function(){
    setInterval(function(){
      $.ajax({
        url: "daily.php"
        }).done(function(data) {
        $('#daily').html(data);
      });
    },3000);
  });
</script>

</head>

<body>

    <div class="container">
        <center>
            <br>
      
        <h1> <?php echo $course ?> Attandence System</h1>
        <p style="color:white"> <?php echo $seldate ?></p>
    </center>
        <div style="float: left; ">
        <form method="post" action="export.php">
        <button name="export" class="general-btn  btn-style">
            <div class="translate"></div>
           Export to Excel
        </button>
    </form>
        </div>
        <div style=" float: right;">
        <label for="select date" style="color: white; ">select date</label>
                 <form method="POST" action="">
                    <input type="date" name="date"><br>
                    <button name="seldate" class=" general-btn btn-style" >
                    <div class="translate"></div>
                    Select date
                    </button> 
				</form>
           
           <br>

        <!-- <button class=" general-btn btn-style" style="width: 200px;">
                <div class="translate"></div>
                <a href="#">ِselect date</a>
                </button> <br> -->
  
        </div>
            
<div id="daily"></div>    

    </div>
</body>

</html>