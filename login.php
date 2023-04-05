<?php
session_start();
require "connect.php";
if(isset($_POST['submit'])){
    $email = mysqli_real_escape_string($connect, $_POST['email']);
    $password = mysqli_real_escape_string($connect, $_POST['password']);

    if(empty($_POST['email']) || empty($_POST['password'])){
        echo "<script> alert('all fields are required')</script>";
    
    }else{
        $query = ("SELECT * FROM stuent_info WHERE email = '".$_POST['email']."' AND password = '".$_POST['password']."' ");
        $result = mysqli_query($connect, $query);
        $num = mysqli_num_rows($result);
    
        if($num == 1){
            while($row=mysqli_fetch_assoc($result)){
                            $id = $row["id"];
                            $user_email = $row["email"];
                            $pass = $row["password"];
                            $_SESSION['user'] = $_POST['email'];
            }
            header('location:echoreg.php');
        }else{
            echo "<script> alert('Please enter email and password')</script>";
        }
            
    }
}