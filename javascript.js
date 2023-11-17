function openPopup(nomEquipe, continant, NomStade, ville, nombreJoueurs, population, capasite) {
    document.getElementById("overlay").style.display = "block";
    document.getElementById("popup").style.display = "block";

    // Mettez à jour le contenu de la popup avec les détails
    document.getElementById("popup-nom").innerText = nomEquipe;
    document.getElementById("popup-continent").innerText = continant;
    document.getElementById("popup-NomStade").innerText =  NomStade;
    document.getElementById("popup-ville").innerText =  ville;
    document.getElementById("popup-joueurs").innerText =  nombreJoueurs;
    document.getElementById("popup-population").innerText =  population;
    document.getElementById("popup-capasite").innerText =  capasite;
}

// Fonction pour fermer la popup
function closePopup() {
    document.getElementById("overlay").style.display = "none";
    document.getElementById("popup").style.display = "none";
}




    

