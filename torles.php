<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Törlés</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

    <style >
    .container{
        background-color: rgba(200,200,200,0.6); 
    }      
    </style>
    
</head>
<body class="bg-success">

    <div class="container">
        <br>
    </div>

    <?php include "navigacio.php"; ?>

    <div class="container">
        <div class="row align-items-center">    
            <div class="col-sm-12 align-self-center">
                <br>
                <img src="./images/allatok.jpg" class="mx-auto d-block mb-3" alt="rajzállatok">
            </div>
        </div>
        <div class="row">         
            <div class="col-sm-12">
                <h1 class="text-center">Törlés</h1> 
            </div>
        </div>
    </div>

    <?php
        require_once "Functions.php";

        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['action']) && $_POST['action'] == 'torles') {
            $name = $_POST['name'];

            $database = new Functions();
            $database->delete($name);

        }
    ?>

    <main class="container">

        <form action="torles.php" method="post"> 
            <div class="mb-2">
                <label for="name" class="form-label">name</label>
                <input type="text" name="name" id="name" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-danger" name="action" value="torles">Törlés</button>
        </form>
    </main>
</body>
</html>