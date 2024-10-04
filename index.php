<?php 
    // Configuration de la base de données
    $host = 'localhost'; // Adresse du serveur
    $dbname = 'stromboli'; // Nom de la base de données
    $username = 'root'; // Nom d'utilisateur
    $password = ''; // Mot de passe

  

        // Connexion à la base de données avec PDO
        $dsn = "mysql:host=$host;dbname=$dbname;charset=utf8"; // DSN
        $pdo = new PDO($dsn, $username, $password);
        
        // Configuration des attributs PDO
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
       

        $sql_plat = "INSERT INTO catg_produits (nom) VALUES ('Plat')";
        $sql_pizza = "INSERT INTO produits (nom, description, prix, id_catg) VALUES ('La Reine', 'C\'est une reine', 10, 1), ('Le Roi', 'C\'est un Roi', 10, 2), ('La Dame', 'C\'est une Dame', 10, 3), ('Le Valet', 'C\'est un Valet', 10, 4)";
        $sql_boissons = "INSERT INTO catg_produits (nom) VALUES ('Boisson')";
        $sql_boisson = "INSERT INTO produits (nom, description, prix, id_catg) VALUES ('Coca', 'C\'est un Coca', 3, 5), ('Fanta', 'C\'est un Fanta', 3, 6), ('Orangina', 'C\'est un Orangina', 3, 7), ('Eau', 'C\'est une Eau', 2, 8)";
        $sql_desserts = "INSERT INTO catg_produits (nom) VALUES ('Dessert')";
        $sql_dessert = "INSERT INTO produits (nom, description, prix, id_catg) VALUES ('Tiramisu', 'C\'est un Tiramisu', 3, 9), ('Tarte aux pommes', 'C\'est une Tarte aux pommes', 3, 10), ('Profiteroles', 'Ce sont des Profiteroles', 3, 11), ('Crêpes', 'Ces sont des Crêpes', 3, 12)";


       // Exécution de la requête avec la méthode query
        $stmt = $pdo->query($sql_plat);
        $stmt = $pdo->query($sql_pizza);
        $stmt = $pdo->query($sql_boissons);
        $stmt = $pdo->query($sql_boisson);
        $stmt = $pdo->query($sql_desserts);
        $stmt = $pdo->query($sql_dessert);
      
?>