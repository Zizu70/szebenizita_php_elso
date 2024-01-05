<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listázás</title>

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

    <?php 
    include "navigacio.php"
    ?>

    <?php 
    require_once "Functions.php";
    $database = new Functions();
    $allatok = $database->select();
    ?>

    <div class="container">
        <div class="row align-items-center">    
            <div class="col-sm-12 align-self-center">
                <br>
                <img src="./images/allatok.jpg" class="mx-auto d-block mb-3" alt="rajzállatok">
            </div>
        </div>
        <div class="row">         
            <div class="col-sm-12">
                <h1 class="text-center">Listázás</h1>  
            </div>
        </div>

        <div class="table-responsive">
            <div class="col-xl-3">
                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>id</th>
                            <th>name</th>
                            <th>kind_of</th>
                            <th>gender</th>
                            <th>born</th>
                            <th>age</th>
                            <th>meat_eating</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($allatok as $allat): ?>
                            <tr>
                                <td><?php echo $allat['id'] ?></td>
                                <td><?php echo $allat['name'] ?></td>
                                <td><?php echo $allat['kind_of'] ?></td>
                                <td><?php echo $allat['gender'] ?></td>
                                <td><?php echo $allat['born'] ?></td>
                                <td><?php echo $allat['age'] ?></td>
                                <td><?php echo $allat['meat_eating'] ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div> 
        </div>
    </div>  
</body>
</html>