<?php include "doctor_add.php" ?>
<!DOCTYPE html>

<html lang="en">

<head>
        <meta charset="UTF-8">
        <title>profile</title>
        <link rel="stylesheet" type="text/css" href="css/profile1.css">
        <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
        <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
        <!--===============================================================================================-->
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>

<body>

        <div class="card">
                <div class="container">
                        <img src="img/profile.png" alt="Doctor pic" class="image">
                        <div class="overlay">
                                <a href="#" class="icon" title="User Profile">
                                        <i class="material-icons">add_a_photo</i>
                                </a>
                        </div>
                </div>

                <h1><?php echo $db_user_name ?></h1>
                <p class="title"><?php echo $db_email ?></p>
                <p>Islamic University</p>
                <p><button class="button btn-style">
                                <div class="translate"></div>
                                <a href="#">Add Course</a>
                        </button>
                </p>

                <div class="modal0">
                        <div class="modal-content0">
                                <span class="close-button0">×</span><br>
                                <h3 style="color: black; text-align: center;">Add Course</h3>
                                     <form action="profile.php" method="post">
                                <label for="select course">select course</label>
                                <select class="select" id="select course" name="select course">
                                <?php
                                    $sql2 = "SELECT * FROM courses" ;
                                    $retval2 = mysqli_query($conn,$sql2);
                                    while($row =mysqli_fetch_assoc($retval2)){
                                    $db_course_name = $row['course_name'];
                                ?>   
                                    <option><?php echo $db_course_name ?></option>
                                    <?php   }?>
                                </select> <br> <br>


                                <label for="select class">select class</label>
                                <select class="select" id="select class" name="select class" style="margin-left: 20px;">
                                     <?php
                                        $sql3 = "SELECT * FROM classroom" ;
                                        $retval3 = mysqli_query($conn,$sql3);
                                        while($row =mysqli_fetch_assoc($retval3)){
                                        $db_class_name = $row['class_name'];
                                    ?> 
                                    <option ><?php echo $db_class_name ?></option>
                                    <?php   }?>
                                </select> <br> <br>


                                <label for="appt">lecture time</label>

                                <input type="time" style="margin-left: 20px;" name="timeFrom" id="appt" name="appt" min="08:00"
                                        max="4:00" required>
                                <small>to</small>
                                <input type="time" id="appt" name="timeTo" min="08:00" max="4:00" required>
                                <button class="button btn-style" name="addCourse" type="submit"  class="login100-form-btn">Add Course</button>
                                </form>
                        </div>
                </div>
                <p><button class="button btn-style" onclick="window.location.href='./room.php'">
                                <div class="translate"></div>
                                <a href="room.html">Add Student</a>
                        </button></p>
        </div>
        <h1 style="float:left ;margin-left:13% ;">Daily attendance</h1>
        <h1 style="float:right;margin-right:10% ;">Semester attendance</h1>
<div id='container'>
            
        <?php
                         
                         $sql4 = "SELECT * FROM doctors WHERE 	doctor_name='$db_user_name'" ;
                         $retval4 = mysqli_query($conn,$sql4);
                        
                         while($row =mysqli_fetch_assoc($retval4)){
                         $db_course_name = $row['course'];
                         $db_room_name = $row['room'];
                       
                     ?>
         
        <div class="card2" onclick="window.location.href='./attendance_student.php?course=<?php echo $db_course_name ?>'">
              
                <h2><?php echo $db_course_name ?></h2>

        </div>
      
        <div class="card2" onclick="window.location.href='./total_attendance.php?course=<?php echo $db_course_name ?>'">
              
                <h2><?php echo $db_course_name ?></h2>
                
        </div>
        <?php }?>
        </div>
        <!--===============================================================================================-->
        <script src="js/profile.js"></script>

</body>

</html>