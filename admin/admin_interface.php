<!-- index.html -->

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Interface Admin</title>
    <link rel="stylesheet" href="admin_interface.css">
</head>
<body>
    <header>
        <nav>
            <ul>
                <li><a href="#">Accueil</a></li>
                <li><a href="produits.php">Produits</a></li>
                <li><a href="commande.php">Commande</a></li>
                <li><a href="administrateur.php">Administrateur</a></li>
            </ul>
        </nav>
    </header>
    <main>
        <section>
            <h1>Bienvenue sur l'interface d'administration</h1>
            
        </section>
<div>
<?php
            // Connexion à la base de données
            // Définition des informations de connexion à la base de données
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "stromboli";

            // Création de la connexion à la base de données avec PDO
            try {
                $db = new PDO('mysql:host=localhost;dbname=stromboli', 'root', '');
                // Définition du mode d'erreur pour afficher les erreurs de connexion
                $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                // Affichage d'un message d'erreur en cas de problème de connexion
                echo 'Erreur de connexion : ' . $e->getMessage();
                exit();
            }

            // Vérification si la connexion à la base de données a réussi
            if ($db->errorCode() !== '00000') {
                // Affichage d'un message d'erreur en cas de problème de connexion
                echo 'Erreur de connexion : ' . $db->errorInfo()[2];
                exit();
            }
            ?>
</div>
    </main>
    <footer>
        <p>&copy; 2023 - Tous droits réservés</p>
    </footer>
</body>
</html>
