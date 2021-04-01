<?php

$insert = false;

if(isset($_POST['name'])){

    //Set connection variables
    $server = "localhost:3307";
    $username = "root";
    $password = "";
    $db = "trip";

    $con = mysqli_connect($server, $username, $password, $db); //creating database connections

    //check for connection error and giving message
    if(!$con){
        die("Failed to connect-").
        mysqli_connect_error();
    }
    
    // echo "Connected to database succesfully";

    //collect data from html form
    $name = $_POST['name'];
    $age = $_POST['age'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $message = $_POST['message'];

    //sql query
    $sql = "INSERT INTO `student` (`name`, `age`, `email`, `phone`, `message`, `dt`) VALUES ('$name', '$age', '$email', '$phone', '$message', current_timestamp());";

    //execute the query if connected to db
    if($con->query($sql) == true){
        $insert = true;  //flag for successful insertion to db
    }
    else{
        echo "ERROR: $sql <br> $con->error";
    }

    $con->close(); //close the database connection
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>php practice</title>
    <link rel="stylesheet" href="style.css">
    
</head>
<body>

<div class = "banner">
    <img src = "banner.jpg">
</div>

    <div class="container">

        <h2>Welcome to NIELIT Guwahati</h2>
        <p>Enter your details:</p>


        <form action="index.php" method="POST">

            <input type="text" name="name" id="name" placeholder="Your Name" required>
            <input type="text" name="age" id="age" placeholder="Your Age" required>
            <input type="email" name="email" id="email" placeholder="Your Email" required>
            <input type="text" name="phone" id="phone" placeholder="Your Phone No" required>
            <textarea name="message" id="message" rows="5" cols = "20" placeholder="Write your message.."></textarea><br>
            <button class="btn">Submit</button>


        </form>

        <?php
            if($insert==true){
                echo "<br><p class='submitMsg'> Form Submitted Successfully. </p>";
            }
        ?>

    </div>
    <script src = file.js></script>
    
</body>
</html>



