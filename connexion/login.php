<?php
// config.php

// Informations de connexion à la base de données
$db_host = 'localhost';
$db_username = 'root';
$db_password = '';
$db_name = 'stromboli';

// Connexion à la base de données avec PDO
// $dsn : la chaîne de connexion à la base de données
$dsn = "mysql:host=$db_host;dbname=$db_name";

// $username et $password : les informations de connexion à la base de données
$username = $db_username;
$password = $db_password;

// Tentative de connexion à la base de données avec PDO
try {
  // Création d'une instance de PDO avec les informations de connexion
  $pdo = new PDO($dsn, $username, $password);
  
  // Définition du mode d'erreur pour afficher les erreurs de connexion
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
  // Affichage d'un message d'erreur si la connexion échoue
  echo 'Erreur de connexion à la base de données : ' . $e->getMessage();
  exit();
}

// login.php

session_start();

// Vérification si le formulaire a été soumis
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Récupération des informations du formulaire
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Requête pour récupérer les informations de l'utilisateur
    $stmt = $pdo->prepare('SELECT * FROM utilisateurs WHERE username = :username');
    $stmt->bindParam(':username', $username);
    $stmt->execute();
    $user = $stmt->fetch();

    // Vérification du mot de passe
    if ($user && password_verify($password, $user['password'])) {
      // Authentification réussie, redirection vers la page d'administration
      $_SESSION['username'] = $username;
      var_dump($_SESSION); // Check the session variables
      header('Location: SiteStromboli/connexion/dashboard.html');
      die('Redirecting to dashboard.html'); // Ensure the script terminates
      exit();
  } else {
      // Erreur d'authentification
      $error = 'Nom d\'utilisateur ou mot de passe incorrect';
      header('Location: login.html?error=' . urlencode($error));
      die('Redirecting to login.html with error'); // Ensure the script terminates
      exit();
    }
}

?>