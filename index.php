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
            <nav class="navbar navbar-light ">
                <form class="form-inline d-flex gap-1" >
                    <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" >
                    <button class="btn btn-outline-primary my-2 my-sm-0" type="submit">Search</button>
                </form>
            </nav>
        </section>
        <!-- fin -->
        <!-- section 2 -->
        <section class="sec2">
            <div class="row row-cols-4 g-4 mt-5 gap-5 justify-content-center">
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
                                <img onclick="openPopup('<?php echo $team['NomEquipe']; ?>', '<?php echo $team['NbrJoueur']; ?>', '<?php echo $team['population']; ?>')" src="img/<?php echo $team['Logo']; ?>.png" alt="equipeX" />
                                <p><?php echo $team['NomEquipe']; ?></p>
                            </div>
                        <?php endforeach; ?>
                    </div>   
                <?php endforeach; ?>
            </div>
             <!-- popup -->
            <div class="overlay" id="overlay"></div>    
            <div class="popup" id="popup">
            <button class="close-btn" onclick="closePopup()">X</button>
            <h2 id="popup-nom">Ma Popup</h2>
            <p id="popup-joueurs"></p>
            <p id="popup-population"></p>
            </div>


        </section>
        <!-- fin -->
    </main>

    <script src="javascript.js"></script>
</body>
</html>
