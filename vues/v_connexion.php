<div id="connexion">
<form method="POST" action="index.php?uc=gererConnexion&action=seconnecter">
   <fieldset>
     <legend>Se connecter</legend>
		<p>
			<label for="login">Login*</label>
			<input id="login" type="text" name="login" value="" size="30" maxlength="45">
		</p>
		<p>
			<label for="passe">Mot De Passe*</label>
			 <input id="passe" type="text" name="passe" value="" size="30" maxlength="45">
		</p>
         <input type="submit" value="Valider" name="valider">
         <input type="reset" value="Annuler" name="annuler"> 
      </p>
</form>
</div>
<div>
		Vous n'êtes pas inscrit ? 	<li><a href="index.php?uc=inscription"> S'inscrire maintenant </a></li>

	</div>

