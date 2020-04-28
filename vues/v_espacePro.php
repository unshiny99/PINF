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


<div id="mesJours">
<form method="POST" action="index.php?uc=gererAdminPro&action=modifJourOuverture">
   <fieldset>
      <legend>Modifier mes jours d'ouverture</legend>
      <p>
         <label for="lundi">lundi</label>
         <input type="checkbox" name="lundi" value="Monday"/>
      </p>
      <p>
         <label for="mardi">mardi</label>
         <input type="checkbox" name="mardi" value="Tuesday" />
      </p>
      <p>
         <label for="mercredi">mercredi</label>
         <input type="checkbox" name="mercredi" value="Wednesday" />
      </p>
      <p>
         <label for="jeudi">jeudi</label>
         <input type="checkbox" name="jeudi" value="Thursday" />
      </p>
      <p>
         <label for="vendredi">vendredi</label>
         <input type="checkbox" name="vendredi" value="Friday" />
      </p>
      <p>
         <label for="samedi">samedi</label>
         <input type="checkbox" name="samedi" value="Saturday" />
      </p>
      <p>
         <label for="dimanche">dimanche</label>
         <input type="checkbox" name="dimanche" value="Sunday" />
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