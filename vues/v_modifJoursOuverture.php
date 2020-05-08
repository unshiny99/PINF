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