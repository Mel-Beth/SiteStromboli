<?php

// Define database connection parameters
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "stromboli";

// Créer une connexion à la base de données
$conn = new mysqli($servername, $username, $password, $dbname);

// Vérifier la connexion
if ($conn->connect_error) {
    die("Erreur de connexion : " . $conn->connect_error);
}

// Récupérer l'ID du produit à supprimer
$id = $_GET['id'];

// Afficher un message de confirmation avant de supprimer
echo '<script>
        if (confirm("Êtes-vous sûr de vouloir supprimer ce produit ?")) {
            window.location.href = "supprimer_produit.php?id=' . $id . '";
        } else {
            window.location.href = "produits.php";
        }
    </script>';
?>

<?php
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = 'DELETE FROM produits WHERE id = \'' . $id . '\'';
    $conn->query($sql);
    echo 'Produit supprimé avec succès !';
    header('Location: produits.php');
    exit;
}
?>