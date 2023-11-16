function openPopup(nomEquipe, nombreJoueurs, population) {
    document.getElementById("overlay").style.display = "block";
    document.getElementById("popup").style.display = "block";
    
    // Mettez à jour le contenu de la popup avec les détails
    document.getElementById("popup-nom").innerText = nomEquipe;
    document.getElementById("popup-joueurs").innerText = "Nombre de joueurs : " + nombreJoueurs;
    document.getElementById("popup-population").innerText = "Population : " + population;
}

    // Fonction pour fermer la popup
    function closePopup() {
        document.getElementById("overlay").style.display = "none";
        document.getElementById("popup").style.display = "none";
    }