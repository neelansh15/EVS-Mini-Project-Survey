<?php

require_once(__DIR__.'\..\config.php');

$conn = new mysqli($host, $username, $password, $db);

if($conn->connect_error){
    die("Database Connection Error: " . $conn->connect_error);
}

$query = "SELECT * FROM submissions";
$result = $conn->query($query);

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

        <div class="row">
            <div class="col-sm">
                <div class="card">
                    
                    <div class="row">
                        <div class="col-sm-4">
                            <img src="paper.png"  class="img-fluid" alt="Paper Waste">
                        </div>

                        <div class="col-sm-8">
                            <div class="card-body">
                                <h5 class="card-title">Average Paper Waste</h5>
                                <p class="card-text">Hmm this is my body</p>
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
                                <p class="card-text">Hmm this is my body</p>
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
                                <p class="card-text">Hmm this is my body</p>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <br>
        <h2 class="display-4">Submissions: <span class="badge badge-dark">
            <?php echo $result->num_rows ?>
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
                            }

                        }
                        else{
                            echo "<tr><td>No Data</td></tr>";
                        }
                    ?>
                </tbody>
        </table>
    </div>

    <link rel="stylesheet" href="../bootstrap.min.css">
    <script src="../bootstrap.min.js"></script>
</body>
</html>