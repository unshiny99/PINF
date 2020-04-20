<div id="blacklist">
<form method="POST" action="index.php?uc=gererConnexion&action=seconnecter">
   <fieldset>
     <legend>Blacklister une personne quelconque du site</legend>
		<p>
			<label for="login">Nom de l'utilisateur*</label>
			<input id="login" type="text" name="login" value="" size="30" maxlength="45">
		</p>
        <p>
         <input type="submit" value="Valider" name="valider">
         <input type="reset" value="Annuler" name="annuler"> 
      </p>
</form>
</div>
<div id="deblacklist">
<form method="POST" action="index.php?uc=gererConnexion&action=seconnecter">
   <fieldset>
     <legend>Déblacklister une personne quelconque du site</legend>
		<p>
			<label for="login">Nom de l'utilisateur*</label>
			<input id="login" type="text" name="login" value="" size="30" maxlength="45">
		</p>
        <p>
         <input type="submit" value="Valider" name="valider">
         <input type="reset" value="Annuler" name="annuler"> 
      </p>
</form>
</div>
<div id="privilege">
<form method="POST" action="index.php?uc=gererConnexion&action=seconnecter">
   <fieldset>
     <legend>Passer un client pro abonné ou le résilier</legend>
		<p>
			<label for="nom_commerce">Nom du commerce*</label>
			<input id="nom_commerce" type="text" name="nom_commerce" value="" size="30" maxlength="45">
		</p>
        <p>
            <select>
                <option>Mettre abonnement</option>
                <option>Enlever abonnement</option>
            </select>
        </p>
        <p>
         <input type="submit" value="Valider" name="valider">
         <input type="reset" value="Annuler" name="annuler"> 
      </p>
</form>
</div>