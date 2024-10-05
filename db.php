<?php
$db_host = 'localhost';
$db_username = 'root';
$db_password = '';
$db_name = 'stromboli';

// Créer une connexion
$conn = new mysqli($db_host, $db_username, $db_password, $db_name);

// Vérifier la connexion
if ($conn->connect_error) {
    die("Erreur de connexion : " . $conn->connect_error);
}

$result = $conn->query("SELECT * FROM produits");

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo $row["nom"]." - Description : ".$row["description"]." - Prix : ".$row["prix"]."<br>";
    }
} else {
    echo "Aucun résultat";
} 

// close the connection
mysqli_close($conn);
?>