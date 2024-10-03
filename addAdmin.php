<?php 
    // Configuration de la base de données
    $host = 'localhost'; // Adresse du serveur
    $dbname = 'test_profil'; // Nom de la base de données
    $username = 'root'; // Nom d'utilisateur
    $password = ''; // Mot de passe

  

        // Connexion à la base de données avec PDO
        $dsn = "mysql:host=$host;dbname=$dbname;charset=utf8"; // DSN
        $pdo = new PDO($dsn, $username, $password);
        
        // Configuration des attributs PDO
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
       

        $sql = "INSERT INTO catg ('name') VALUES ('plats')"
        $sql_pizza = "INSERT INTO produits (nom, description, prix, id_catg) VALUES ('La Reine',  'C\'est une reine', 10, 1), ()";

        // Exécution de la requête avec la méthode query
        $stmt = $pdo->query($sql);

        
?>
