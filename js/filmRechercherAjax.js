const btnRechercher = document.getElementById('btnRecherche');
const inputRechercher = document.getElementById("termeRecherche");
const divFilm = document.querySelector('.contain-card');

inputRechercher.addEventListener('keyup', function(){
    let formData = new FormData();
    formData.append('termeRecherche', inputRechercher.value);

    let xhr = new XMLHttpRequest();

    xhr.onreadystatechange = function(){
        if(xhr.readyState === 4 && xhr.status === 200){
            let arrayFilms = JSON.parse(xhr.responseText);

            // Efface le contenu précédent avant d'afficher les nouveaux résultats
            divFilm.innerHTML = '';

            // Boucle à travers les films et crée le HTML à afficher
            arrayFilms.forEach(element => {
                divFilm.innerHTML += `
                    <div class="card">
                        <a href="./detailFilm.php?idFilm=${element.id}">
                        <img src="uploads/${element.image}" alt="Image" style="width:100%">
                        <div class="container">
                            <h4><b>${element.titre}</b></h4>
                        </div>
                    </div>
                `;
            });
        }
    };

    xhr.open("POST", "./filmRechercherTraitementAjax.php");
    xhr.send(formData);
});
