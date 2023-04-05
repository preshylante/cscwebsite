<?php
session_start();
//error_reporting(0);
include "connect.php";

if(isset($_SESSION['user'])){
    echo '<h3>welcome '. $_SESSION['user'].'<br></h3>';
    echo '<a href = "logout.php?logout" class="btn btn-danger mt-3" style="position:absolute;left:1250px;top:70px;">logout</a>';
}
else{
    header('location:login.html');
}


if(isset($_POST['update'])){
    $id = mysqli_real_escape_string($connect, $_POST['id']);
    
    $fname = mysqli_real_escape_string($connect, $_POST['fname']);
    $lname = mysqli_real_escape_string($connect, $_POST['lname']);
    $dept = mysqli_real_escape_string($connect, $_POST['dept']);
    $college = mysqli_real_escape_string($connect, $_POST['college']);
    $matricnumber = mysqli_real_escape_string($connect, $_POST['matricnumber']);
    $regnumber = mysqli_real_escape_string($connect, $_POST['regnumber']);
    $email = mysqli_real_escape_string($connect, $_POST['email']);
    $password = mysqli_real_escape_string($connect, $_POST['password']);


//checking empty fields
if (empty($data['email']) || empty($data['password']) || empty($data['dept']) || empty($data['college']) || empty($data['fname']) || empty($data['lname']) || empty($data['matricnumber']) || empty($data['regnumber'])) {

    if (empty($fname)){
        echo"<script> alert('Please fill in first name')</script>";
    }
    if (empty($lname)){
        echo"<script> alert('Please fill in last name')</script>";
    }
    if (empty($dept)){
        echo"<script> alert('Please fill in dept')</script>";
    }
    if (empty($college)){
        echo"<script> alert('Please fill in college')</script>";
    }
    if (empty($matricnumber)){
        echo"<script> alert('Please fill in matric number')</script>";
    }
    if (empty($regnumber)){
        echo"<script> alert('Please fill in regnumber')</script>";
    }
    if (empty($email)){
       echo"<script> alert('Please fill in email')</script>";
    }
    if (empty($password)){
       echo"<script> alert('Please fill in password')</script>";
    }
}
else{
    //updating the table
    $result = mysqli_query($connect, "UPDATE stuent_info SET fname='$fname',lname='$lname',dept='$dept',college='$college',matricnumber='$matricnumber',regnumber='$regnumber',email='$email',password='$password' WHERE id=$id");
header("location:echoreg.php");
}
}

//getting id from url
$id = ''; 
if(isset( $_GET['id'])) {
    $id = $_GET['id']; 
} 

//getting data associated with particular id
$result = mysqli_query($connect, 'SELECT * FROM stuent_info WHERE id=$id');

while($rows = mysqli_fetch_array($result))
{
    $fname = $rows['fname'];
    $lname = $rows['lname'];
    $dept = $rows['dept'];
    $college = $rows['college'];
    $matricnumber = $rows['matricnumber'];
    $regnumber = $rows['regnumber'];
    $email = $rows['email'];
    $password = $rows['password'];
}
?>

<html>
    <link href="bootstrap.css" type="text/css" rel="stylesheet">
<body style="background-color:coral;">
    <form action="edit.php" method="POST" style="margin-left:450px;margin-top:100px;">
        <h1 class="bg-light w-50 text-center text-dark pb-3">Add up form</h1>
    <div class="form-group pb-2 pt-3"><i class="fab fa-user">
        <label class="fs-5 fw-bolder">First name:</label><input type="text" name="fname" class="form-control w-50" size="40" placeholder="Enter username">
    </div>
    <div class="form-group pb-2 pt-3"><i class="fab fa-user">
        <label class="fs-5 fw-bolder">Last name:</label><input type="text" name="lname" class="form-control w-50" size="40" placeholder="Enter username">  
    </div>
    <div class="form-group pb-2 pt-3"><i class="fab fa-user">
        <label class="fs-5 fw-bolder">Department</label><input type="text" name="dept" class="form-control w-50" size="40" placeholder="Enter username">
    </div>
    <div class="form-group pb-2 pt-3"><i class="fab fa-user">
        <label class="fs-5 fw-bolder">College:</label><input type="text" name="college" class="form-control w-50" size="40" placeholder="Enter username">
    </div>
    <div class="form-group pb-3 pt-3"><i class="fab fa-user">
        <label class="fs-5 fw-bolder">Matriculation Number:</label><input type="text" name="matricnumber" class="form-control w-50" size="40" placeholder="Enter email">
    </div>
    <div class="form-group pb-3"><i class="fab fa-user">
        <label class="fs-5 fw-bolder" >Registration Number:</label><input type="text" name="regnumber" class="form-control w-50" size="40" placeholder="Enter password">
    </div>
    <div class="form-group pb-3"><i class="fab fa-user">
        <label class="fs-5 fw-bolder" >Email:</label><input type="email" name="email" class="form-control w-50" size="40" placeholder="Enter password">
    </div>
    <div class="form-group pb-2 pt-3"><i class="fab fa-user">
        <label class="fs-5 fw-bolder">Password:</label><input type="password" name="password" class="form-control w-50" size="40" placeholder="Enter username">
    </div>
<input type="hidden" name="id">
    <input type="submit" class="btn btn-danger w-50" name="update" value="update"><br><br>
        <a href="edit.php" style="position:absolute;left:560px;color:black;">If Registered already,Click to login</a>
</form>
</body>
</html>