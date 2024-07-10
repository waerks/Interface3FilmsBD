const btnAjout = document.getElementById("ajouterPanier");
const divPanier = document.querySelector("#divPanier span");

btnAjout.addEventListener("click", function(){
    let selectQuantite = document.getElementById("quantite");
    let valueQuantite = selectQuantite.value;
    let idFilm  = selectQuantite.dataset.idfilm;
    console.log("Value: " + valueQuantite);
    console.log("idFilm: " + idFilm);

    let xhr = new XMLHttpRequest();

    xhr.onreadystatechange = function(){
        if(xhr.readyState === 4){
            if(xhr.status === 200 || xhr.status === 304){
                console.log("RESPONSE: ");
                console.log(xhr.responseText);

                let response = JSON.parse(xhr.responseText);
                console.log(response);

                divPanier.innerHTML = response.quantiteTotale;

            } else if (xhr.status === 404){
                console.log("Not found"); 
            }
        }
    }

    let formData = new FormData();
    formData.append("idFilm", idFilm);
    formData.append("quantite", valueQuantite);

    xhr.open("POST", "./ajoutPanier.php");
    xhr.send(formData);
})