<div id="accueil">
    <script src="js/jquery-3.5.0.js"></script>
    <script src="js/ajax_refacto.js"></script>
    <script type="text/javascript">
	//ici le futur code pour la barre de recherche
	/*
		1) recupérer la valeur dans le champ de texte à chaque touche relachée
		2) générer une liste comportant les résultats
		3) afficher cette liste dynamiquement
	*/

    var suggestions_actuelles = {};
    var suggestions_cache = {};

    function completer_recherche(mot) {
        var champRecherche= document.getElementById('barre');
        var sugg_id = parseInt(me.id);
        var sugg = suggestions_actuelles.resultat[sugg_id];
        champRecherche.value = sugg.nom;
    }

	function resultat_html(reponse) {
        var cur_sugg; //suggestion courante
        var res_html = ''; //le resultat html
        var recherche = reponse.recherche;
        for (cur_sugg in reponse.resultat) {
            nom = reponse.resultat[cur_sugg].nom_commerce;
            if (nom.startsWith(recherche)) {
                nom = '<strong>' + recherche + '</strong>' + nom.substring(recherche.length);
            }
            res_html += '<li id="sugg' + cur_sugg + '" onclick="completer_recherche(this);">'
              + nom + '</li>';
        }
        return '<ul>' + res_html + '</ul>';
	}

    function affiche_suggestions(reponse) {
        reponse_json = reponse;
        var divSuggest = document.getElementById('suggest'); //zone des suggestions
        console.log(divSuggest);
        if (typeof reponse === 'string' && reponse === '') {
            divSuggest.innerHTML = '';
        } else {
            if (typeof reponse === 'string') {
                reponse_json = JSON.parse(reponse);
            }
            suggestions_actuelles= reponse_json; //on stocke les reponses actuelles
        }
        if (!(reponse_json.recherche in suggestions_cache)) {
            suggestions_cache[reponse_json.recherche] = reponse_json.resultat;
        }
        divSuggest.innerHTML = resultat_html(reponse_json);
    }

    function requete_suggestions(refTexte) {
        var recherche = refTexte.value; //ce qui est saisi dans le champ
        if (recherche === '') {
        affiche_suggestions('');
        } else {
            if (recherche in suggestions_cache) {
                affiche_suggestions({
                'recherche': recherche,
                'resultat': suggestions_cache[recherche]
                });
            } else {
                console.log('Appel AJAX (' + recherche + ')');
                // Envoie une requête ajax pour récupérer des infos
                ajax({
                    type : 'GET',
                    url : 'controleurs/c_gestionRech.php',
                    data : {debutNom : recherche},
                    callback : affiche_suggestions
                });
            }
        }
    }
    </script>
    <p> Réservation'2i, votre site de recherche de commerces !</p>
    <form method="POST" action="index.php?uc=gererRecherche&action=rechercheClic">
        <input type="text" name="barre" id="barre" onkeyup="requete_suggestions(this);" />
        <input type="submit" name="rechercher" value="Rechercher" />
    </form>
    <div id="suggest"> </div>
</div>
