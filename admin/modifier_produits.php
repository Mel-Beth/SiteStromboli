<?php

// Define database connection parameters
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "stromboli";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Récupérer l'ID du produit à modifier
$id = $_GET['id'];

// Récupérer les données du produit à modifier
$sql = "SELECT * FROM produits WHERE id = '$id'";
$result = $conn->query($sql);

// Vérifier si le résultat est valide
if ($result && $result->num_rows > 0) {
    $row = $result->fetch_assoc();

    // Afficher les données du produit à modifier
    echo "<form action='' method='post'>";
    echo "<label>Nom :</label>";
    echo "<input type='text' name='nom' value='" . $row['nom'] . "'>";
    echo "<br>";
    echo "<label>Description :</label>";
    echo "<textarea name='description'>" . $row['description'] . "</textarea>";
    echo "<br>";
    echo "<label>Prix :</label>";
    echo "<input type='number' name='prix' value='" . $row['prix'] . "'>";
    echo "<br>";
    echo "<input type='submit' value='Modifier'>";
    echo "</form>";
} else {
    echo "Produit non trouvé";
}

// Traitement des données du produit à modifier
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nom = $_POST['nom'];
    $description = $_POST['description'];
    $prix = $_POST['prix'];

    $sql = "UPDATE produits SET nom = ?, description = ?, prix = ? WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssi", $nom, $description, $prix, $id);
    $stmt->execute();

    // Afficher un message de succès
    echo "<p>Produit modifié avec succès !</p>";

    // Redirection vers la page produits.php
    header("Location: produits.php");
    exit;
}
?>