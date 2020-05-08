<div id="addInfoCommerce">
<form method="POST" action="index.php?uc=gererAdminPro&action=affectInfo">
   <fieldset>
      <legend> Ajouter vos informations commerce </legend>
      <p>
         <label for="ville">Donner le nom de votre ville</label>
         <input id="ville" type="text" name="ville" value="" size="15" maxlenght="45">
      </p>
      </br>
      <p>
         <label for="cp"> Donner le code postal du commerce</label>
         <input id="cp" type="text" name="cp" value="" size="5" maxlenght="5">
      </p>
      </br>
      <p>
         <label for="adresse">Donner l'adresse du commerce</label>
         <input id="adresse" type="texte" name="adresse" value="" size="25" maxlenght="450">
      </p>
      </br>
      <p>
         <input type="submit" value="Valider" name="valider">
         <input type="reset" value="Annuler" name="annuler"> 
      </p>
</form>
</div>