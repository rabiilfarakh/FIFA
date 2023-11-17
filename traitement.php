 <?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "FIFA";

$conn = new mysqli($servername, $username, $password, $database);

// Vérifier la connexion
if ($conn->connect_error) {
    die("Échec de la connexion à la base de données : " . $conn->connect_error);
}

// requette
$sql = "SELECT groupe.NomGroupe, equipe.idEquipe, equipe.NomEquipe, equipe.Logo, equipe.NbrJoueur, equipe.population, equipe.Continent, stade.NomStade, stade.ville, stade.Capacite
FROM groupe
JOIN equipe ON groupe.idGroupe = equipe.idGroupe
JOIN stade ON groupe.idGroupe = stade.idGroupe
ORDER BY groupe.idGroupe, equipe.idEquipe";

//verifier le searche
$result = $conn->query($sql);
$i = 0;
$j = 0;
$groupedTeams = array(); 


if ($result) {
    while ($row = $result->fetch_assoc()) {
        $groupedTeams[$j % 8][$i] = $row;
        $i++;
        if ($i % 4 == 0) {
            $j++;
        }
    }
}


?>


