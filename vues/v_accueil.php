<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<!-- jQuery UI library -->
<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>



<script>
$(function() {
    $("#nom_commerce").autocomplete({
        source: "search.php",
    });
});

$(function() {
    $("#nom_commerce").autocomplete({
        source: "search.php",
        select: function( event, ui ) {
            event.preventDefault();
            $("#nom_commerce").val(ui.item.value);
        }
    });
});

$( ".selector" ).autocomplete({
    source: [ "PHP", "Python", "Ruby", "JavaScript", "MySQL", "Oracle" ]
});

$( ".selector" ).autocomplete({
    source: "http://example.com"
});

$( ".selector" ).autocomplete({
    minLength: 5
});

$( ".selector" ).autocomplete({
    select: function( event, ui ) {}
});

</script>

<div id="accueil">
    <p> Réservation'2i, votre site de recherche de commerces !</p>
    </br></br></br>
    <form method="post" action="index.php?uc=gererRecherche&action=recherche">
    <label>Rechercher le nom du commerce :</label>
    <input type="text" name="nom_commerce" id="nom_commerce"/>
    <input type="submit" name="submit" value="SUBMIT"/>
</form>


</div>


