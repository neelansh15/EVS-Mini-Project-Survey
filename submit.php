<?php

require_once('config.php');
$conn = new mysqli($host, $username, $password, $db);
$status = 0; //Initialize

if($conn->connect_error){
    die("Connection to database failed: <br />" . $conn->connect_error);
}

if(isset($_POST["name"])){
    $name = $_POST["name"];
    $email = $_POST["email"];

    $normal_dustbins = $_POST["normal_dustbins"];
    $small_dustbins = $_POST["small_dustbins"];

    $paper = $_POST["percentPaper"];
    $plastic = $_POST["percentPlastic"];
    $kitchen = $_POST["percentKitchen"];

    //Make email optional
    if($email == "" || $email == null){
        $email = "None";
    }

    $query = "INSERT INTO submissions (name, email, normal_dustbins, small_dustbins, paper, plastic, kitchen)
    VALUES (
        '$name',
        '$email',
        '$normal_dustbins',
        '$small_dustbins',
        '$paper',
        '$plastic',
        '$kitchen'
    )
    ";

    if($conn->query($query) === TRUE){
        $status = 1; //Success
    }
    else{
        $status = 0;
    }

}
else{
    header("Location: index.html");
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="https://img.icons8.com/plasticine/100/000000/nature.png" type="image/png">
    <title>EVS Mini-Project Survey</title>
</head>
<body>
    <div class="jumbotron" style="text-align: center">
        <h1 class="display-3">Thank you!</h1>
    </div>
    
    <div class="container" style="width: 60%">
    <h1 class="display-4">
        <?php
        
        if($status == 1){
            echo "Your response has been recorded :)";
        }
        else{
            echo "We are sorry :(<br />An error came up from our side. Please try again.";
        }

        ?>
    </h1>
    </div>


    <link rel="stylesheet" href="bootstrap.min.css">
    <link rel="stylesheet" href="style.css">

    <script src="bootstrap.min.js"></script>
</body>
</html>