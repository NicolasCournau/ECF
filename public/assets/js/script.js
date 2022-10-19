const theme = document.querySelectorAll('.theme') //permet de sélectionner tous les éléments avec la class theme

theme.forEach((item) => { //pour chaque theme, on va effectuer cette fonction. item peut être remplacé par n'importe quoi, comme une class
    item.addEventListener('click', (event) => { //au clic, fais la fonction qui suit
        document.body.classList.remove("darkTheme", "whiteTheme") //permet de retirer le theme actuel en cas de relance du switch et donc de nouveau clic
        switch (event.target.id) { //faire un switch permet de rendre plus lisible que d'enchainer les if else
            case "dark": //si clic sur dark
                document.body.classList.add("darkTheme"); //sélectionne la class darkTheme du CSS
                break; //afin qu'il stoppe d'étudier les autres cas, c'est celui la qu'on veux
            case "white":
                document.body.classList.add("whiteTheme");
                break;
            default: 
            null;
        }
    })
})