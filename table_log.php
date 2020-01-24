<?php include "connectDB.php" ?>
<?php session_start() ?>

<?php 
$msg="";


    
    if(isset ($_POST['update'])){

        $student_name = $_POST['student_name'];
        $student_id=$_POST['student_id'];
        $doctor=$_POST['doctor'];
        $NO_id=$_POST['NO_id'];
        $course=$_POST['course'];
        $time_from='';
        $time_to='';
        $sql3= "SELECT * FROM doctors WHERE course ='$course' AND doctor_name ='$doctor'";
            $retval3=mysqli_query($conn,$sql3);
      
            if(!mysqli_num_rows($retval3)>0){
              echo "<script type='text/javascript'>alert('Thier is No Course or doctor match your inputs ');</script>";
            }
            else{
             // $msg=mysqli_fetch_assoc($retval3);
             while($row = mysqli_fetch_assoc($retval3)){
                         $time_from=$row['time_start'];
                         $time_to = $row['time_end'];
                       
                         
             }
           // $msg=mysqli_fetch_assoc($retval3);
                    $query = "UPDATE student SET ".
                    "`student_name`='$student_name',".
                    "`student_id`='$student_id',".
                    "`course`='$course',".
                    "`doctor`='$doctor',".
                    "`time_from`='$time_from',".
                    "`time_to`='$time_to' ".
                    "WHERE id= $NO_id";
            
                 //   $msg=$query;
                    $retval = mysqli_query($conn,$query);
                    if(!$retval){
                      echo mysqli_error($conn);
                  }
                  else{
                    
                    echo "<script type='text/javascript'>alert('successfully Updated');</script>";
          
                  }
                  
                  
                }}

      if(isset($_POST['delet'])){
        $delet_id=$_POST['delet_id'];
       
        $sql = "DELETE FROM `student` WHERE `id`=$delet_id ";
        $retval = mysqli_query($conn,$sql);
        if(!$retval){
            echo mysqli_error($conn);
        }
        else{
          
          echo "<script type='text/javascript'>alert('successfully deleted');</script>";

        }
       

      }          

?>
<!DOCTYPE html>
<html>

<head>
  <title>Attandence System</title>
  <!--===============================================================================================-->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css" />
  <!--===============================================================================================-->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
  <!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
  <!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
  <!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="css/table.css">

</head>

<body>

  <div class="container">
    <h1>Attandence <span>Room </span><?php echo $_GET["room"];  ?></h1>
    <button class="general-btn btn-edit btn-style">
      <div class="translate"></div>
      <a href="#">ِEdit</a>
    </button>
    <button class="general-btn btn-del btn-style">
      <div class="translate"></div>
      <a href="#">Delete</a>
    </button>
    <table class="table table-bordered data-table">
      <thead class="th-color">
      <th style="display:none;">ID.No</th>
        <th>Student Number</th>
        <th>Student Name</th>
        <th>Card Number</th>
        <th>Course</th>
        <th>Class</th>
        <th>Doctor</th>

        <th width="100px">Select</th>
      </thead>

      <tbody>
      <?php
                    $room= $_GET["room"];
                    $sql = "SELECT * FROM student WHERE room ='$room' ORDER BY id DESC";
                    $retval = mysqli_query($conn,$sql);
                    while($row =mysqli_fetch_assoc($retval)){
                        $db_id=$row['id'];
                        $db_student_name = $row['student_name'];
                        $db_student_id=$row['student_id'];
                        $db_card_id=$row['card_id'];
                        $db_course=$row['course'];
                        $db_room=$row['room'];
                        $db_time_from=$row['time_from'];
                        $db_doctor=$row['doctor'];

                 
                    ?>
        <tr>
                    <td style="display:none;"><?php echo $db_id ?></td>
                    <td><?php echo $db_student_id ?></td>
                    <td><?php echo $db_student_name?></td>
                    <td><?php echo $db_card_id ?></td>
                    <td><?php echo $db_course ?></td>
                    <td><?php echo $db_room ?></td>
                    <td><?php echo $db_doctor ?></td>
          <td>
            <!-- <input type="hidden" value="">           -->
            <input type="button" class="option-input button" name="example" />

          </td>
          <?php   }?>
      </tbody>
    </table>

    <div class="btns">

      <!--Edit button-->
      <div class="modal1">
        <div class="modal-content1">
          <span class="close-button1">×</span> <br> 
          <h3 style="text-align: center;">Edit Data</h3>
          <form method='POST' action='table_log.php?room=<?php echo $room ?>'> <br>

            <input type="text" id= "student_name" placeholder="Add name of student" name="student_name" required=""> <br> <br>

            <input type="text" id="student_id"  placeholder="Add student number" name="student_id" required=""> <br> <br>
            <input type="hidden" id="No_id" name="NO_id" >
            <label for="select course">select doctor</label>
            <select id="doctor" class="select" id="select_course" name="doctor">
            <?php
                          $sql2 = "SELECT * FROM login" ;
                          $retval2 = mysqli_query($conn,$sql2);
                          while($row =mysqli_fetch_assoc($retval2)){
                         $db_user_name = $row['user_name'];
                            ?>
              <option><?php echo $db_user_name ?></option>
              <?php   }?>
            </select> <br> <br>

            <label for="select course">select course</label>
            <select id="course" class="select" id="select_doctor" name="course">
            <?php
                          $sql2 = "SELECT * FROM courses" ;
                          $retval2 = mysqli_query($conn,$sql2);
                          while($row =mysqli_fetch_assoc($retval2)){
                         $db_course_name = $row['course_name'];
                            ?>
              <option><?php echo $db_course_name ?></option>
              <?php   }?>
            </select> <br> <br>

            <button name="update" id="update" type="submit" class="general-btn btn-style">
              <div class="translate"></div>
              Update
            </button>
            </form>
        </div>
       
      </div>
    </div>

    <!--Delet button button-->

    <div class="modal2">
      <div class="modal-content2">
      <form method='POST' action='table_log.php?room=<?php echo $room ?>'> <br>
        <span class="close-button2">×</span>
        <p>Are you sure!</p>
        <input type="hidden" id="delet_id" name="delet_id" >
        <button name="delet" class="general-btn btn-style">
          <div class="translate"></div>
          Yes!
        </button>
        <button class="general-btn btn-style">
          <div class="translate"></div>
          No!
        </button>
        </form>
      </div>
    </div>


    

  </div>
  </div>
  <script src="js/table.js"></script>
</body>

</html>