<?php
$insert = false;
if(isset($_POST['name'])){
    $sever = "localhost";
    $username = "root";
    $password = "";

    $con = mysqli_connect($sever, $username, $password);

    if(!$con){
        die("connection to this database failed due to" . mysqli_connect_error());
    }
    //echo "Success connecting to the db";
    $name = $_POST['name'];
    $age = $_POST['age'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $year = $_POST['year'];
    $class = $_POST['class'];
    $batch = $_POST['batch'];
    $rollno = $_POST['rollno'];
    
    $sql = "INSERT INTO `industrial visit`.`trip` (`name`, `age`, `email`, `phone`, `year`, `class`, `batch`, `rollno`, `dt`) VALUES ('$name', '$age', '$email', '$phone', '$year', '$class', '$batch', '$rollno', current_timestamp())";
    //echo $sql;

    if($con->query($sql) == true){
        //echo "Successfully inserted";
        $insert = true;
    }
    else{
        echo "ERROR: $sql <br> $con->error";
    }
    $con->close();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Travel Form</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <img src="tsec.jfif" alt="cannot render" class="bg">
    <div class="container">
        <h1>Thadomal Shahani Engineering College</h1>
        <h2>Industrial Visit Form</h2>
        <p>Enter your details to confirm your participation.</p>
        
            <form action="index.php" method="post">
                <input type="text" name="name" id="name" placeholder="Enter your Name">
                <input type="text" name="age" id="age" placeholder="Enter your Age">
                <input type="email" name="email" id="email" placeholder="Enter your email">
                <input type="number" name="phone" id="phone" placeholder="Enter your phone number">
                <input type="text" name="year" id="year" placeholder="Enter your Year">
                <input type="text" name="class" id="class" placeholder="Enter your Class">
                <input type="text" name="batch" id="batch" placeholder="Enter your Batch">
                <input type="text" name="rollno" id="rollno" placeholder="Enter your Roll No">
                <button class="btn">Submit</button>
                
            </form>
        <?php
        if($insert == true){
            echo "<p class='submitMsg'>Thanks for submitting the form</p>";
        }
        ?>
        
    </div>
    
    <!--  -->
</body>
</html>