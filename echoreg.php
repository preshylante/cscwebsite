<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="bootstrap.css" type="text/css" rel="stylesheet">
</head>
<body>
    <div class="container">
<table class="table table-striped table-hover table-bordered border-primary w-100">
    <tr class="table-active">
        <th>Fist Name</th>
        <th>Last Name</th>
        <th>Department</th>
        <th>College</th>
        <th>Matriculation Number</th>
        <th>Registration Number</th>
        <th>Email</th>
        <th>Update</th>


    </tr>
    <?php
    session_start();
    require "connect.php";

    if(isset($_SESSION['user'])){
        echo '<h3>welcome '. $_SESSION['user'].'<br></h3>';
        echo '<a href = "logout.php?logout" class="btn btn-danger mt-3" style="position:absolute;left:1250px;top:70px;">logout</a>';
    }
    else{
        header('location:login.html');
    }

    
    $result = mysqli_query($connect, "SELECT * FROM stuent_info ORDER BY id DESC");
    while($rows = mysqli_fetch_array($result)){
   
        $fname = $rows['fname'];
        $lname = $rows['lname'];
        $dept = $rows['dept'];
        $college = $rows['college'];
        $matricnumber = $rows['matricnumber'];
        $regnumber = $rows['regnumber'];
        $email = $rows['email'];


        echo "<br>
        <tr>
        <td>$fname</td>
        <td>$lname</td>
        <td>$dept</td>
        <td>$college</td>
        <td>$matricnumber</td>
        <td>$regnumber</td>
        <td>$email</td>
        <td><a href=\"edit.php?id=$rows[id]\">edit</a></td>
        </tr>
        ";
        
    }
  

    ?>
</table>

    </div>
    
   <a href="signup.html" class="btn btn-info" role="button">Add more columns</a>
   <a href="edit.php" class="btn btn-success" role="button">edit</a>
    
</body>
</html>