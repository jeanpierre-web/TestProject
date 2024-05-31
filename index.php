<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>carnet d'adresse</title>
</head>
<body>
    <h1>carnet d'adresse - Accueil</h1>
    <nav>
        <a href="index.php">Accueil</a>
        <a href="add_contact.php"> Ajouter un contact</a>
    </nav>
    <?php
    // Connexion à la base de données
    $mysqli = new mysqli("localhost", "root", "", "db_essai");
    
    // Vérifier la connexion
    if ($mysqli->connect_error) {
        die("Connection failed: " . $mysqli->connect_error);
    }

    // Définir l'encodage des caractères
    $mysqli->set_charset("utf8");

    // Requête SQL
    $requete = "SELECT * FROM carnet";

    // Exécuter la requête
    if ($resultat = $mysqli->query($requete)) {
        // Parcourir les résultats
        while ($ligne = $resultat->fetch_assoc()) {
            echo $ligne['civilite'] . ' ' . $ligne['prenom'] . ' ' . $ligne['nom']
                . ' ' . $ligne['email'] . ' ' . $ligne['date_naissance'] . '<br>';
        }

        // Libérer les résultats
        $resultat->free();
    } else {
        echo "Erreur de requête : " . $mysqli->error;
    }

    // Fermer la connexion
    $mysqli->close();
    ?>
</body>
</html>
