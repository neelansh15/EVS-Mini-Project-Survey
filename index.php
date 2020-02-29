<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EVS Mini-Project Survey</title>
    <script src="jquery.min.js"></script>
</head>
<body>
    <div class="jumbotron" style="text-align: center">
        <h1 class="display-3">EVS Survey</h1>
        <p class="lead">Survey on the daily amount of garbage disposal in households</p>
    </div>
    
    <div class="container" style="width: 60%">
        <p>Please fill in the form below. Use estimated/average amounts where needed</p>
        <form action="" method="POST">

            <div class="form-row">
                <div class="form-group col">
                    <label for="name">Name:</label>
                    <input type="text" name="name" id="name" class="form-control">
                </div>

                <div class="form-group col">
                    <label for="email">Email:</label>
                    <input type="email" name="email" id="email" class="form-control">
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col">
                    <label for="dustbin_num">No. of dustbins used per day:</label>
                    <input type="number" name="dustbin_num" id="dustbin_num" class="form-control">
                </div>

                <div class="form-group col">
                    <label for="dustbin_size">What is the size of your dustbin?</label>
                    <select name="dustbin_size" id="dustbin_size" class="form-control" aria-describedby="sizeHelp">
                        <option value="normal">Normal</option>
                        <option value="small">Small</option>
                        <option value="normalsmall">One Normal One Small</option>
                    </select>
                    <small class="form-text text-muted" id="sizeHelp">
                        Small is the really small handheld sort of dustbin
                    </small>
                </div>
            </div>

            <div class="form-group">
                <label for="percentBio">What is the approximate percentage of Biodegradable/Recyclable waste?</label>
                <p class="percentage">50</p>
                <input type="range" name="percentBio" id="percentBio" class="slider form-control-range" min="0" max="100">
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
    
    <link rel="stylesheet" href="bootstrap.min.css">
    <link rel="stylesheet" href="style.css">

    <script src="bootstrap.min.js"></script>
    <script>
        $('input[type=range]').mousemove(function(){
            $('.percentage').html(this.value)
        })
    </script>
</body>
</html>