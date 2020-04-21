<div id="blacklist">
<form method="POST" action="index.php?uc=gererBlacklistAdminAdmin&action=blacklisterAdminAdmin">
   <fieldset>
     <legend>Blacklister une personne quelconque du site</legend>
		<p>
			<label for="id">Id de l'utilisateur*</label>
			<input id="id" type="text" name="id" value="" size="30" maxlength="45">
		</p>
        <p>
         <input type="submit" value="Valider" name="valider">
         <input type="reset" value="Annuler" name="annuler"> 
      </p>
</form>
</div>
<div id="deblacklist">
<form method="POST" action="index.php?uc=gererBlacklistAdminAdmin&action=deblacklisterAdminAdmin">
   <fieldset>
     <legend>Déblacklister une personne quelconque du site</legend>
		<p>
			<label for="id">Id de l'utilisateur*</label>
			<input id="id" type="text" name="id" value="" size="30" maxlength="45">
		</p>
        <p>
         <input type="submit" value="Valider" name="valider">
         <input type="reset" value="Annuler" name="annuler"> 
      </p>
</form>
</div>
<div id="privilege">
<form method="POST" action="index.php?uc=gererAbonnementAdminAdmin&action=gererAbo">
   <fieldset>
     <legend>Passer un client pro abonné ou le résilier</legend>
		<p>
			<label for="id_commerce">Id du commerce*</label>
			<input id="id_commerce" type="text" name="id_commerce" value="" size="30" maxlength="45">
		</p>
        <p>
            <select name="choix">
                <option></option>
                <option value="Mettre abonnement">Mettre abonnement</option>
                <option value="Enlever abonnement">Enlever abonnement</option>
            </select>
        </p>
        <p>
         <input type="submit" value="Valider" name="valider">
         <input type="reset" value="Annuler" name="annuler"> 
      </p>
</form>
</div>