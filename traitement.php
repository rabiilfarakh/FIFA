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
$sql = "SELECT groupe.NomGroupe, equipe.idEquipe, equipe.NomEquipe, equipe.Logo, equipe.NbrJoueur, equipe.population
FROM groupe
JOIN equipe ON groupe.idGroupe = equipe.idGroupe
ORDER BY groupe.idGroupe, equipe.idEquipe";


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

// Ajoutez une nouvelle requête pour récupérer les informations supplémentaires
$additionalInfoQuery = "SELECT NomEquipe, NbrJoueur, population FROM equipe WHERE idEquipe = ?";

foreach ($groupedTeams as &$group) {
    foreach ($group as &$team) {
        $stmt = $conn->prepare($additionalInfoQuery);
        $stmt->bind_param("i", $team['idEquipe']);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $additionalInfo = $result->fetch_assoc();
            $team = array_merge($team, $additionalInfo);
        }

        $stmt->close();
    }
}



$conn->close();
?>