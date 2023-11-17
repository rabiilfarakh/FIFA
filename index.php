<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="css/bootstrap.css">
    <title>Document</title>
</head>
<body>
    <?php include 'traitement.php'; ?>
    <main>

        <!-- section 1 -->
        <section class="sec1 d-flex justify-content-center mt-5 w-100">
            <nav class="navbar navbar-light gap-3">
            <a href="index.php" class="btn btn-outline-primary btn-light my-2 my-sm-0" style="width: 100px;">ALL</a>
            <form class="form-inline d-flex gap-1" method="POST" action="index.php">
             <input class="form-control mr-sm-2" type="search" name="search" placeholder="Search" aria-label="Search">
             <button class="btn btn-outline-primary my-2 my-sm-0"  name="submit" type="submit">Search</button>
            </form>

            </nav>
        </section>
        <!-- fin -->
        <!-- section 2 -->
        <section class="sec2 d-flex justify-content-center mt-5">
        <?php if(!isset($_POST['submit'])) : ?>
    <div class="row row-cols-4 g-4 mt-5 gap-5 justify-content-center roww">
                <?php foreach ($groupedTeams as $group) : ?>
                    <div class="card d-flex justify-content-center" style="width: 300px; height: 250PX" >
                        <?php $currentGroup = null; ?>
                        <?php foreach ($group as $team) : ?>
                            <?php if ($currentGroup !== $team['NomGroupe']) : ?>
                                <div class="group-name d-flex justify-content-center text-primary fs-4">
                                    <?php echo $team['NomGroupe']; ?>
                                </div>
                                <?php $currentGroup = $team['NomGroupe']; ?>
                            <?php endif; ?>
                            <div class="image d-flex align-items-center gap-5">
                                <img onclick="openPopup('<?php echo $team['NomEquipe']; ?>', '<?php echo $team['Continent']; ?>','<?php echo $team['NomStade']; ?>','<?php echo $team['ville']; ?>','<?php echo $team['NbrJoueur']; ?>','<?php echo $team['population']; ?>', '<?php echo $team['Capacite']; ?>')" src="img/<?php echo $team['Logo']; ?>.png" alt="equipeX" />
                                <p><?php echo $team['NomEquipe']; ?></p>
                            </div>
                        <?php endforeach; ?>
                    </div>   
                <?php endforeach; ?>
    </div>

<?php else : 
    $search = $_POST['search'];
    $sql2 = "SELECT groupe.NomGroupe, equipe.idEquipe, equipe.NomEquipe, equipe.Logo, equipe.NbrJoueur, equipe.population, equipe.Continent, stade.NomStade, stade.ville, stade.Capacite
    FROM groupe
    JOIN equipe ON groupe.idGroupe = equipe.idGroupe
    JOIN stade ON groupe.idGroupe = stade.idGroupe
    WHERE groupe.NomGroupe = '$search'
    ORDER BY groupe.idGroupe, equipe.idEquipe";

    $result2 = $conn->query($sql2);
    $row3 = mysqli_fetch_assoc($result2);
    
    echo '<div class="card d-flex justify-content-center" style="width: 300px; height: fit" >';
    echo '<div class="group-name d-flex justify-content-center text-primary fs-4">';
    echo $row3['NomGroupe'];
    $nom=$row3['NomEquipe'];
    $cont=$row3['Continent'];
    $stad=$row3['NomStade'];
    $city=$row3['ville'];
    $player=$row3['NbrJoueur'];
    $pop=$row3['population'];
    $cap=$row3['Capacite'];
    $lg=$row3['Logo'];

echo '</div>';
    echo"<div class=\"image d-flex align-items-center gap-5\">
    <img onclick=\"openPopup('$nom', '$cont','$stad','$city',$player,$pop,$cap);\" src=\"img/$lg.png\" alt=\"equipeX\" />
    <p>$nom</p>
</div>";
        while($row2 = mysqli_fetch_assoc($result2)) :?>
                    

                            <div class="image d-flex align-items-center gap-5">
                                <img onclick="openPopup('<?php echo $row2['NomEquipe']; ?>', '<?php echo $row2['Continent']; ?>','<?php echo $row2['NomStade']; ?>','<?php echo $row2['ville']; ?>','<?php echo $row2['NbrJoueur']; ?>','<?php echo $row2['population']; ?>', '<?php echo $row2['Capacite']; ?>')" src="img/<?php echo $row2['Logo']; ?>.png" alt="equipeX" />
                                <p><?php echo $row2['NomEquipe']; ?></p>
                            </div>
    
        <?php endwhile ?>
        </div>



<?php endif ?>
             <!-- popup -->
            <div class="overlay" id="overlay"></div>    
            <div class="popup text-center" style="border-radius: 16px; width: 25vw;" id="popup">
            <button class="close-btn" onclick="closePopup()">X</button>
            <h2 id="popup-nom">Ma Popup</h2>
            <span class="d-flex gap-2 justify-content-center"><span style="color: blue;">Continent:</span><p id="popup-continent"></p></span>
            <span class="d-flex gap-2 justify-content-center"><span style="color: blue;">Stade:</span><p id="popup-NomStade"></p></span>
            <span class="d-flex gap-2 justify-content-center"><span style="color: blue;">Ville:</span><p id="popup-ville"></p></span>
            <span class="d-flex gap-2 justify-content-center"><span style="color: blue;">Nombre Joueurs:</span><p id="popup-joueurs"></p></span>
            <span class="d-flex gap-2 justify-content-center"><span style="color: blue;">Population:</span><p id="popup-population"></p></span>
            <span class="d-flex gap-2 justify-content-center"><span style="color: blue;">Capasité:</span><p id="popup-capasite"></p></span>
            </div>
        </section>
        <!-- fin -->
    </main>

    <script src="javascript.js"></script>
</body>
</html>
