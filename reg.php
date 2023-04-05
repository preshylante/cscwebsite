<?php
session_start();
require "connect.php";
if(isset($_POST['submit'])){
   
    $fname = mysqli_real_escape_string($connect, $_POST['fname']);
    $lname = mysqli_real_escape_string($connect, $_POST['lname']);
    $dept = mysqli_real_escape_string($connect, $_POST['dept']);
    $college = mysqli_real_escape_string($connect, $_POST['college']);
    $matricnumber = mysqli_real_escape_string($connect, $_POST['matricnumber']);
    $regnumber = mysqli_real_escape_string($connect, $_POST['regnumber']);
    $email = mysqli_real_escape_string($connect, $_POST['email']);
    $password = mysqli_real_escape_string($connect, $_POST['password']);
    //$create_datetime = date("Y-m-d H:i:s");

    $data = $_POST;
    if (empty($data['email']) || empty($data['password']) || empty($data['dept']) || empty($data['college']) || empty($data['fname']) || empty($data['lname']) || empty($data['matricnumber']) || empty($data['regnumber'])) {

        
        if (empty($data['fname'])){
            echo"<script> alert('Please fill in first name')</script>";
        }
        if (empty($data['lname'])){
            echo"<script> alert('Please fill in last name')</script>";
            
        }
        if (empty($data['dept'])){
            echo"<script> alert('Please fill in dept')</script>";
      }
        
        if (empty($data['college'])){
            echo"<script> alert('Please fill in college')</script>";
        }
        if (empty($data['matricnumber'])){
            echo"<script> alert('Please fill in matric number')</script>";
                   }
        if (empty($data['regnumber'])){
            echo"<script> alert('Please fill in regnumber')</script>";
                   }
        if (empty($data['email'])){
           echo"<script> alert('Please fill in email')</script>";
           
        }
        if (empty($data['password'])){
           echo"<script> alert('Please fill in password')</script>";
        }
}

    $sql = "SELECT * FROM stuent_info WHERE email = '$email'";
    $result = mysqli_query($connect, $sql);

    $num = mysqli_num_rows($result);

    if($num == 1){
        //echo "Details already exist";
    }
    else{
        $result = 'INSERT into stuent_info(fname, lname, dept, college, matricnumber, regnumber, email, password) VALUES ("'.$fname.'" , "'.$lname.'" , "'.$dept.'" , "'.$college.'" , "'.$matricnumber.'" , "'.$regnumber.'" , "'.$email.'" , "'.$password.'")';
        mysqli_query($connect, $result);
        echo "<script> alert('Registration successful')</script>";
        $_SESSION['user'] = $_POST['email'];
        header('location:login.html');
    }

    
    }


?>