<?php
class Functions
{
    private $connection;

    public function __construct()
    {
        $this->connection = new mysqli("localhost", "root", "", "php_elso_dolgozat");
    }

    function select()
    {
        $sql = "SELECT * FROM allatok";
        $result = $this->connection->query($sql);
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    function selectByName($name)
    {
        $sql = "SELECT * FROM allatok WHERE name = ?";
        $stmt = $this->connection->prepare($sql);
        $stmt->bind_param("s", $name);
        $stmt->execute();

        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            return $result->fetch_assoc();
        } else {
            return null;
        }   
    }

    function insert($userdata)
    {
        $name = $userdata['name'];
        $kind_of = $userdata['kind_of'];
        $gender = $userdata['gender']; 
        $born = $userdata['born'];
        $age = $userdata['age'];
        $meat_eating = $userdata['meat_eating'];

        if (!$this->checkNameExist($name)) {
            $sql = "INSERT INTO allatok (name, kind_of, gender, born, age, meat_eating) VALUES (?,?,?,?,?,?)";
            $stmt = $this->connection->prepare($sql);
    
            $stmt->bind_param("ssssis", $name, $kind_of, $gender, $born, $age, $meat_eating);
            $stmt->execute();
    
            if ($stmt->affected_rows > 0) {
                echo '<div class="container">';
                echo '<div class="alert alert-success" role="alert">Sikeres felvétel!</div>';
                echo '</div>';
            } else {
                echo '<div class="container">';
                echo '<div class="alert alert-danger" role="alert">Sikertelen felvétel! Kérjük, ellenőrizze az adatokat!</div>';
                echo '</div>';
            } 
        } 
    }

    function delete($name) {
        $sql = "DELETE FROM allatok WHERE name = ?";
        $stmt = $this->connection->prepare($sql);
        $stmt->bind_param("s", $name);
        $stmt->execute();

        if ($stmt->affected_rows > 0) {
            echo '<div class="container">';
            echo '<div class="alert alert-success" role="alert">Sikeres törlés!</div>';
            echo '</div>';    
        } else {
            echo '<div class="container">';
            echo '<div class="alert alert-danger" role="alert">Sikertelen törlés! Kérjük, ellenőrizze az adatokat!</div>';
            echo '</div>'; 
        } 
    } 

    function update($name, $userdata) {    
        $sql = "UPDATE allatok SET kind_of=?, gender=?, born=?, age=?, meat_eating=? WHERE name = ?";
             
        $stmt = $this->connection->prepare($sql);

        if (!$stmt) {
            die('Hiba a lekérdezés előkészítésekor: ' . $this->connection->error);
        } 
    
        $stmt->bind_param("sssiss", $kind_of, $gender, $born, $age, $meat_eating, $name);
        $stmt->execute(); //succes

        if (!$stmt) {  //s
            die('Hiba a lekérdezés végrehajtásakor: ' . $stmt->error);
        } 

        if ($stmt->affected_rows > 0) {
            echo '<div class="container">';
            echo '<div class="alert alert-success" role="alert">Sikeres módosítás!</div>';
            echo '</div>';
            return true;  //
        } else {
            echo '<div class="container">';
            echo '<div class="alert alert-danger" role="alert">Sikertelen módosítás! Ellenőrizze az adatokat!</div>';
            echo '</div>';
            return false; //
        }
    }

    function checkNameExist($name)
    {
        $sql = "SELECT * FROM allatok WHERE name = ?";
        $stmt = $this->connection->prepare($sql);
        $stmt->bind_param("s", $name);

        $stmt->execute();
       
        $result = $stmt->get_result();
        return $result->num_rows > 0;
    }
}
?>
