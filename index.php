<html>
  <head>
    <title>PHP Test</title>
  </head>
  <body>
    


<?php
// Connexion à la base de données
$conn = new mysqli('localhost', 'nom_utilisateur', 'mot_de_passe');

// Vérifier la connexion
if ($conn->connect_error) {
    die("La connexion a échoué : " . $conn->connect_error);
}

// Création de la base de données "mainteney"
$sql_create_db = "CREATE DATABASE IF NOT EXISTS mainteney";
if ($conn->query($sql_create_db) === TRUE) {
    echo "Base de données 'mainteney' créée avec succès.<br>";
} else {
    echo "Erreur lors de la création de la base de données : " . $conn->error;
}

// Sélectionner la base de données "mainteney"
$conn->select_db("mainteney");

// Création de la table "Articles"
$sql_create_table = "CREATE TABLE IF NOT EXISTS Articles (
    id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    titre VARCHAR(255) NOT NULL,
    description TEXT NOT NULL,
    photo1 VARCHAR(255) NOT NULL,
    photo2 VARCHAR(255) NOT NULL,
    photo3 VARCHAR(255) NOT NULL
)";
if ($conn->query($sql_create_table) === TRUE) {
    echo "Table 'Articles' créée avec succès.<br>";
} else {
    echo "Erreur lors de la création de la table : " . $conn->error;
}

// Fermer la connexion à la base de données
$conn->close();


// Connexion à la base de données
$conn = new mysqli('localhost', 'nom_utilisateur', 'mot_de_passe', 'nom_base_de_données');

// Vérifier la connexion
if ($conn->connect_error) {
    die("La connexion a échoué : " . $conn->connect_error);
}

// Récupérer tous les articles
$sql = "SELECT * FROM Articles";
$result = $conn->query($sql);

// Afficher les articles
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "Titre : " . $row['titre'] . "<br>";
        echo "Description : " . $row['description'] . "<br>";
        echo "Photos : " . $row['photo1'] . ", " . $row['photo2'] . ", " . $row['photo3'] . "<br>";
        echo "<br>";
    }
} else {
    echo "Aucun article trouvé.";
}

// Fermer la connexion à la base de données
$conn->close();
?>


    

  <script src="https://replit.com/public/js/replit-badge-v2.js" theme="dark" position="bottom-right"></script>
  </body>
</html>