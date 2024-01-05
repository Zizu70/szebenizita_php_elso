<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Módosítás2222222</title>

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
                <h1 class="text-center">Módosítás</h1> 
            </div>
        </div>
    </div>

    <main class="container">

        <form action="modositas.php" method="post"> 
            <div class="mb-2">
                <label for="name" class="form-label">name</label>
                <input type="text" name="name" id="name" class="form-control" > 
            </div>
            <button type="submit" class="btn btn-warning" name="action" value="lekerdezes">Lekérdezés</button>
            <br>
            <br>

            <?php
            require_once "Functions.php";

            if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['action']) && $_POST['action'] == 'lekerdezes') {
                $name = $_POST['name'];

                $database = new Functions();
                $allat = $database->selectByName($name);

                if ($allat) {
                    // Ellenőrzés 
                    echo '<div class="alert alert-success" role="alert">Az állat adatai az adatbázisban módosíthatók.</div><br>';

                   // A módosítási űrlap megjelenítése  
                    echo '<form action="modositas.php?name=' . $name . '" method="post">';
            
                    echo '<div class="mb-2">';
                    echo '<label for="name" class="form-label">name</label>';
                    echo '<input type="text" name="name" id="name" class="form-control" value="' . $allat['name'] . '" readonly>';
                    echo '</div>';
        
                    echo '<div class="mb-2">';
                    echo '<label for="kind_of" class="form-label">kind_of</label>';
                    echo '<input type="text" name="kind_of" id="kind_of" class="form-control" value="' . $allat['kind_of'] . '" required>';
                    echo '</div>';
            
                    echo '<div class="mb-2"> ';
                    echo '<label for="gender" class="form-label">gender</label>';
                    echo '<select name="gender" id="gender" class="form-select" required>';
                    echo '<option value="male" ' . ($allat['gender'] === 'male' ? 'selected' : '') . '>male</option>';
                    echo '<option value="famale" ' . ($allat['gender'] === 'famale' ? 'selected' : '') . '>famale</option>';
                    echo '<option value="neutered" ' . ($allat['gender'] === 'neutered' ? 'selected' : '') . '>neutered</option>';
                    echo '</select>';
                    echo '</div>';
            
                    echo '<div class="mb-2">';
                    echo '<label for="born" class="form-label">born</label>';
                    echo '<input type="date" name="born" id="born" class="form-control" value="' . $allat['born'] . '" required>';
                    echo '</div>';
            
                    echo '<div class="mb-2">';
                    echo '<label for="age" class="form-label">age</label>';
                    echo '<input type="text" name="age" id="age" class="form-control" value="' . $allat['age'] . '" required>';
                    echo '</div>';
            
                    echo '<div class="mb-2"> ';
                    echo '<label for="meat_eating" class="form-label">meat_eating</label>';
                    echo '<select name="meat_eating" id="meat_eating" class="form-select" required>';
                    echo '<option value="yes" ' . ($allat['meat_eating'] === 'yes' ? 'selected' : '') . '>yes</option>';
                    echo '<option value="no" ' . ($allat['meat_eating'] === 'no' ? 'selected' : '') . '>no</option>';
                    echo '</select>';
                    echo '</div>';
                 
                    echo '<button type="submit" class="btn btn-primary" name="action" value="modositas">Módosítás</button>';
                    echo '</form>';

                } elseif ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['action']) && $_POST['action'] == 'modositas') {
                    // Módosítás 
                    $name = $_POST['name'];

                    $userdata = [
                        'kind_of' => $_POST['kind_of'],
                        'gender' => $_POST['gender'],
                        'born' => $_POST['born'],
                        'age' => $_POST['age'],
                        'meat_eating' => $_POST['meat_eating'],
                    ];
        
                    $database = new Functions();
                     
                    $database->update($name, $userdata);

                } else {
                    // Az állat nincs az adatbázisban
                    echo '<div class="alert alert-danger" role="alert">Az állat még nem szerepel az adatbázisban!</div><br>'; // működik
                }
             
            } 
            
            ?>

        </form>
    </main>
</body>
</html>