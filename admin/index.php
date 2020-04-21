<?php

// require_once(__DIR__.'\..\config.php'); Works locally but gives an error on the server
require_once('config.php');

$conn = new mysqli($host, $username, $password, $db);

if($conn->connect_error){
    die("Database Connection Error: " . $conn->connect_error);
}

$query = "SELECT * FROM submissions";
$result = $conn->query($query);

$numRows = $result->num_rows;

//Declare variables
$totalPaper = 0;
$totalPlastic = 0;
$totalKitchen = 0;

$totalNormal = 0;
$totalSmall = 0;

$avgPaper = 0;
$avgPlastic = 0;
$avgKitchen = 0;

$avgNormal = 0;
$avgSmall = 0;

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" href="https://img.icons8.com/plasticine/100/000000/nature.png" type="image/png">
    <title>EVS Admin</title>
    <script src="../jquery.min.js"></script>

    <style>
        .jumbotron{
            background-image: url('mdbackground.png');
            background-position: center center;
            background-repeat: no-repeat;
            background-size: cover;

            color: white;
        }
    </style>
</head>
<body>
    <div class="jumbotron jumbotron-fluid">
        <div class="container">
            <h1 class="display-1">Admin</h1>
        </div>
    </div>

    <div class="container">


        <br>
        <h2 class="display-4">Submissions: <span class="badge badge-dark">
            <?php echo $numRows ?>
        </span></h2>
        <table class="table table-striped table-inverse table-responsive">
            <thead class="thead-inverse">
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>No. of Normal Dustbins</th>
                    <th>No. of Small Dustbins</th>
                    <th>Paper Waste %</th>
                    <th>Plastic Waste %</th>
                    <th>Kitchen Waste %</th>
                </tr>
                </thead>
                <tbody>
                    <?php
                        if ($result->num_rows > 0){
                            
                            while($row = $result->fetch_assoc()){
                                echo "<tr>";
                                echo "<td>" . $row['name'] . "</td>";
                                echo "<td>" . $row['email'] . "</td>";
                                echo "<td>" . $row['normal_dustbins'] . "</td>";
                                echo "<td>" . $row['small_dustbins'] . "</td>";
                                echo "<td>" . $row['paper'] . "</td>";
                                echo "<td>" . $row['plastic'] . "</td>";
                                echo "<td>" . $row['kitchen'] . "</td>";
                                echo "</tr>";
                                
                                $totalPaper += $row['paper'];
                                $totalPlastic += $row['plastic'];
                                $totalKitchen += $row['kitchen'];
                                
                                $totalNormal += $row['normal_dustbins'];
                                $totalSmall += $row['small_dustbins'];
                            }

                            $avgPaper = $totalPaper / $numRows;
                            $avgPlastic = $totalPlastic / $numRows;
                            $avgKitchen = $totalKitchen / $numRows;

                            $avgNormal = $totalNormal / $numRows;
                            $avgSmall = $totalSmall / $numRows;
                            
                        }
                        else{
                            echo "<tr><td>No Data</td></tr>";
                        }
                    ?>
                </tbody>
        </table>
        <div class="row mt-4 mb-4">
            <div class="col-sm">
                <div class="card">
                    
                    <div class="row">
                        <div class="col-sm-4">
                            <img src="paper.png"  class="img-fluid" alt="Paper Waste">
                        </div>

                        <div class="col-sm-8">
                            <div class="card-body">
                                <h5 class="card-title">Average Paper Waste</h5>
                                <p class="card-text"><?php echo $avgPaper ?></p>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            <div class="col-sm">
                <div class="card">
                    
                    <div class="row">
                        <div class="col-sm-4">
                            <img src="plastic.png"  class="img-fluid" alt="Paper Waste">
                        </div>

                        <div class="col-sm-8">
                            <div class="card-body">
                                <h5 class="card-title">Average Plastic Waste</h5>
                                <p class="card-text"><?php echo $avgPlastic ?></p>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            <div class="col-sm">
                <div class="card">
                    
                    <div class="row">
                        <div class="col-sm-4">
                            <img src="kitchen.png"  class="img-fluid" alt="Paper Waste">
                        </div>

                        <div class="col-sm-8">
                            <div class="card-body">
                                <h5 class="card-title">Average Kitchen Waste</h5>
                                <p class="card-text"><?php echo $avgKitchen ?></p>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <!--Computation-->
        

        <div class="jumbotron">
            <h1>Total Energy saved: <?php echo $avgSmall ?></h1> <!--Test-->
        </div>

    </div>

    <link rel="stylesheet" href="../bootstrap.min.css">
    <script src="../bootstrap.min.js"></script>
</body>
</html>