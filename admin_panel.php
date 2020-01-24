<?php include "admin_add.php" ?>
<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->
    <link rel="icon" type="image/png" href="images/icons/favicon.ico" />
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="css/main_dashboard.css">
    <link rel="stylesheet" type="text/css" href="css/dashboard.css">
    <!--===============================================================================================-->
</head>

<body>
    <div class="container-login" style="background-image: url('img/iug.jpg');">
        <span class="login-form-title p-b-41">Admin Attendence System</span>
        <div class="container">
            <!-------------------------- Add Student ------------------------------->
            <div class="test">
                <label>
                    <img class="imgs" id="back-img" src="img/student.png" />
                    student
                </label>
                <button class="trigger" id="button-5">
                    <div class="translate"></div>
                    <a href="table_log.php">ِAdd</a>
                </button>
            </div>

            <div class="modal">
                <div class="modal-content">
                    <span class="close-button">×</span>
                </div>
            </div>

            <!-------------------------- Add Doctor ------------------------------->
            <div class="test" >
                
                <label>
                    <img class="imgs" src="img/doc.png" />
                    Doctor
                </label>
                <button class="trigger" id="button-2">
                    <div class="translate"></div>
                    <a href="#">ِAdd </a>
                </button>
            </div>

            <div class="modal1">
                <div class="modal-content1">
                    <span class="close-button1">×</span> <br>
                    <form action="admin_panel.php" method="post">
                        <center>
                            <h3>Add Doctor</h3>
                            <input type="text" placeholder="Dr.Name" name="drname" required><br><br>
                            <input type="text" placeholder="Dr.Email" name="dremail" required><br><br>
                            <input type="password" placeholder="Password" name="drpassword" required><br><br>
                            <button type="submit" name="add_doctor">Add Doctor</button> <br>
                        </center>
                    </form>
                </div>
            </div>

            <!-------------------------- Add Classroom ------------------------------->
            <div class="test">
                <label>
                    <img class="imgs" src="img/classroom.png" />
                    Classroom
                </label>
                <button class="trigger" id="button-3">
                    <div class="translate"></div>
                    <a href="#">Add </a>
                </button>
            </div>

            <div class="modal2">
                <div class="modal-content2">
                    <span class="close-button2">×</span><br>
                        <form action="admin_panel.php" method="post">
                            <center>
                                <h3>Add Classroom</h3>
                                <input type="text" placeholder="Classroom name"  name="classroom" required><br><br>
                                <button type="submit" name='add_class'>Add Classroom</button>
                            </center>
                        </form>
                </div>
            </div>

            <!-------------------------- Add Course ------------------------------->
            <div class="test">
                <label>
                    <img class="imgs" src="img/course.png" />
                    Course </label>
                <button class="trigger" id="button-6">
                    <div class="translate"></div>
                    <a href="#">Add</a>
                </button>
            </div>

            <div class="modal3">
                <div class="modal-content3">
                    <span class="close-button3">×</span><br>
                        <form action="admin_panel.php" method="post">
                            <center>
                                <h3>Add Course</h3> 
                                <input type="text" placeholder="Course Name" name="CourseName" required><br><br>
                                <input type="text" placeholder="Course Number" name="CourseID" required><br><br>
                                <button type="submit" name="add_course">Add Course</button>
                            </center>
                        </form>
                </div>
            </div>
        </div>
    </div>


    <!--==================================================================-->

    <script src="js/dashboard.js"></script>


</body>

</html>