<div id="addService">
<form method="POST" action="index.php?uc=affectService&action=affectService">
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




<div id="blacklist">
<form method="POST" action="index.php?uc=gererAdminPro&action=blacklisterPro">
   <fieldset>
     <legend>Blacklister un Client du site</legend>
		<p>
			<label for="login">Nom d'utilisateur du client*</label>
			<input id="login" type="text" name="login" value="" size="30" maxlength="45">
		</p>
        <p>
         <input type="submit" value="Valider" name="valider">
         <input type="reset" value="Annuler" name="annuler"> 
      </p>
</form>
</div>

<div id="deblacklist">
<form method="POST" action="index.php?uc=gererAdminPro&action=deblacklisterPro">
   <fieldset>
     <legend>Déblacklister un Client du site</legend>
		<p>
			<label for="login">Nom d'utilisateur du client*</label>
			<input id="login" type="text" name="login" value="" size="30" maxlength="45">
		</p>
        <p>
         <input type="submit" value="Valider" name="valider">
         <input type="reset" value="Annuler" name="annuler"> 
      </p>
</form>
</div>

<div id="MesHoraires">
<form method="POST" action="index.php?uc=gererAdminPro&action=modifHoraires">
   <fieldset>
     <legend>Modifier mes horaires</legend>

</form>
</div>