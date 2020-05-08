<div id="suppService">
<form method="POST" action="index.php?uc=Service&action=suppService">
   <fieldset>
      <legend> Restreindre mes services </legend>
      <p>
         <label>supprimer un service</label>
         <?php
            $donnees=getMesServices();
            $nom="nom_service";
            mkSelect("enlever_nom_services",$donnees,"nom_service","nom_service");
         ?>
      </p>

      <p>
         <input type="submit" value="Valider" name="valider">
         <input type="reset" value="Annuler" name="annuler"> 
      </p>
</form>
</div>