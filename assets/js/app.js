const CheminComplet = document.location.href;
const CheminRepertoire = CheminComplet.substring(0, CheminComplet.lastIndexOf("/"));
//Si nous somme bien sur la page Films

if (CheminRepertoire === "http://localhost/allo_jati/Films") {
   let tabInputs = [];
   let conteneur = document.getElementById('containerstar');

   //Récupère tous les éléments input
   let inputs = conteneur.getElementsByTagName("input");

   //Boucle sur éléments
   for (let inp, i = 0, iMax = inputs.length; i < iMax; ++i) {
      inp = inputs[i];
      console.log(inp);
      //Récupère l'ID de tous les élèments dans un tableau
      tabInputs[i] = inp.id;
   }
   //Check l'action sur les élèents de type RADIO ETOILE
   for (let star, i = 0; i < tabInputs.length; i++) {
      document.getElementById(tabInputs[i]).addEventListener("change", function () {
         element = document.getElementById(tabInputs[i]);
         star = element.value;
         el = document.getElementById('containerstar');
         console.log(star);
         //Switch sur les étoile et colorie les étoiles en fonction de la note
         switch (star) {
            case "0":
               el.setAttribute('class', 'star-complet');
               break;
            case "1":
               el.setAttribute('class', 'star-complet1');
               break;
            case "2":
               el.setAttribute('class', 'star-complet2');
               break;
            case "3":
               el.setAttribute('class', 'star-complet3');
               break;
            case "4":
               el.setAttribute('class', 'star-complet4');
               break;
            case "5":
               el.setAttribute('class', 'star-complet5');
               break;
         }
      });
   }
}

/*
let NomDuFichier     = CheminComplet.substring(CheminComplet.lastIndexOf( "/" )+1 );
alert ('NomDuFichier : \n'+NomDuFichier+ ' \n\n CheminRepertoire : \n' +CheminRepertoire+ ' \n\n CheminComplet :\n ' +CheminComplet);*/
