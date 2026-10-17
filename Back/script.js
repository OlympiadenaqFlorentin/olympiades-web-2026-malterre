 function ouvrirAjout() {
        document.getElementById("titreFormulaire").textContent =
            "Ajouter une animation";

        document.getElementById("action").value = "ajouter";

        document.getElementById("Nom").value = "";
        document.getElementById("Nom").readOnly = false;
        document.getElementById("taille_min").value = "";
        document.getElementById("statue").value = "";
        document.getElementById("id_univers").value = "";

        document.getElementById("modalAnimation").style.display = "flex";
    }

    function ouvrirModification(nom, taille, statue, univers) {
        document.getElementById("titreFormulaire").textContent =
            "Modifier une animation";

        document.getElementById("action").value = "modifier";

        document.getElementById("Nom").value = nom;

        // Nom est la clé primaire : on ne le modifie pas ici.
        document.getElementById("Nom").readOnly = true;

        document.getElementById("taille_min").value = taille;
        document.getElementById("statue").value = statue;
        document.getElementById("id_univers").value = univers;

        document.getElementById("modalAnimation").style.display = "flex";
    }

    function ouvrirSuppression(nom) {
        document.getElementById("nomSuppression").value = nom;
        document.getElementById("modalSuppression").style.display = "flex";
    }

    function fermerModales() {
        document.getElementById("modalAnimation").style.display = "none";
        document.getElementById("modalSuppression").style.display = "none";
    }