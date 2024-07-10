        // Création des étoiles dans le div (Valoration moyenne de tous les utilisateurs)
        let divNote = document.getElementById("divNote");
 
        let menuEtoiles = jSuites.rating(divNote, {
            value: divNote.dataset.moyenne,
            tooltip: ['Horrible', 'Moyen', 'Plutôt bien', 'Très bon', 'Génial'],
        });
 
        // Création des étoiles dans le div (Valoration de cet Utilisateur pour ce Film)
        let divNoteUtilisateur = document.getElementById("divNoteUtilisateur");
 
        let menuEtoilesUtilisateur = jSuites.rating(divNoteUtilisateur, {
            value: divNoteUtilisateur.dataset.valeur,
            tooltip: ['Horrible', 'Moyen', 'Plutôt bien', 'Très bon', 'Génial'],
            onchange: stockerNote
        });
 
        // faire appel AJAX pour insérer / mettre à jour
        // la note de cet utilisateur pour ce film
        function stockerNote() {
            // Vérifier s'il s'agit d'une nouvelle note
            let nouvelleNote = true;
            if (divNoteUtilisateur.dataset.valeur !== "") {
                nouvelleNote = false; // ce film est déjà noté par cet utilisateur
            };
 
            console.log("new note :" + nouvelleNote);
 
            let xhr = new XMLHttpRequest();
 
            xhr.onreadystatechange = function() {
                if (xhr.readyState == 4) {
 
                    console.log("fini");
                }
            }
            // on doit envoyer:
            // - s'il s'agit d'une nouvelle note
            // - la note
            let formData = new FormData();
            formData.append("idFilm", divNoteUtilisateur.dataset.idfilm);
            formData.append("valeur", menuEtoilesUtilisateur.getValue());
            formData.append("nouvelleNote", nouvelleNote);
 
            xhr.open("POST", "./noteUpdate.php");
            xhr.send(formData);
        }