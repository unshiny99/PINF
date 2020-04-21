<div id="inscription">
<form method="POST" action="index.php?uc=gererInscription&action=sinscrire">
   <fieldset>
     <legend>Inscription</legend>
		<p>
			<label for="nom_utilisateur">Nom d'utilisateur*</label>
			<input id="nom_utilisateur" type="text" name="nom_utilisateur" value="" size="30" maxlength="45">
		</p>
		<p>
			<label for="nom">Nom*</label>
			 <input id="nom" type="text" name="nom" value="" size="30" maxlength="45">
		</p>
        <p>
			<label for="prenom">Prénom*</label>
			 <input id="prenom" type="text" name="prenom" value="" size="30" maxlength="45">
		</p>
        <p>
			<label for="email">Email*</label>
			 <input id="email" type="text" name="email" value="" size="45" maxlength="45">
		</p>
        <p>
			<label for="passe">Mot De passe*</label>
			 <input id="passe" type="text" name="passe" value="" size="30" maxlength="45">
		</p>
		<p>
		<label>qualification*</label>
			<select name="choix">
                <option></option>
                <option value="Professionnel">Professionnel</option>
                <option value="Particulié">Particulié</option>
            </select>
		</p>
         <input type="submit" value="Valider" name="valider">
         <input type="reset" value="Annuler" name="annuler"> 
      </p>
</form>
</div>
<div>
		Vous êtes déjà incrit ? 	<li><a href="index.php?uc=connexion"> Se connecter </a></li>

	</div>
