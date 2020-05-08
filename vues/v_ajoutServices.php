<div id="addService">
<form method="POST" action="index.php?uc=gererAdminPro&action=affectService">
   <fieldset>
      <legend> Agrandir mes services </legend>
      <p>
         <label>Ajouter un service</label>
         <?php
            $donnees=getToutServices();
            $nom="nom_service";
            mkSelect("ajout_nom_services",$donnees,"nom_service","nom_service");
         ?>
      </p>
      <p>
         <label for="description_service">Donner la description de votre service*</label>
			   <input id="description_service" type="text" name="description_service" value="" size="150" maxlength="200">
      </p>
      <p>
         <label for="cout_service">Donner le coût de votre service*</label>
			<input id="cout_service" type="text" name="cout_service" value="" size="10" maxlength="10">
      </p>
      </br>
      
      <p>
         <input type="submit" value="Valider" name="valider">
         <input type="reset" value="Annuler" name="annuler"> 
      </p>
</form>
</div>