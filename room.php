<?php include "connectDB.php" ?>
<?php session_start() ?>
<!DOCTYPE html>
<html>

<head>
  <title>Rooms</title>
  <meta charset="UTF-8">
  <link rel="stylesheet" type="text/css" href="css/room.css">
</head>

<body>
  <h1><span>Calss Room</span>For add students!</h1>

  <!-- Flex Container -->
  <div id="container">

                         <?php
                          $sql3 = "SELECT * FROM classroom" ;
                          $retval3 = mysqli_query($conn,$sql3);
                          while($row =mysqli_fetch_assoc($retval3)){
                         $db_class_name = $row['class_name'];
                            ?>
    <div class="button" id="button-5">
      <div id="translate"></div>
      <a href="table_log.php?room=<?php echo $db_class_name ?>"><?php echo $db_class_name ?></a>
    </div>
    <?php   }?>
    

    <!-- End Container -->
  </div>

</body>

</html>