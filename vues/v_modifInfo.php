<?php
    $id=monCommerceExiste(); 
    $infos=getInfoCommerce($id);
    foreach($infos as $info)
    {
      ?> <fieldset> 
         <h1> Vos Informations Commerce </h1> <?php
         echo 'Votre ville : '.$info['ville'];
         ?></br><?php
         echo 'Votre Conde Postal : '.$info['code_postal'];
         ?></br><?php
         echo 'Votre adresse : '.$info['adresse'];
         ?></br><?php
         ?> </fieldset> <?php
    }
?>

<div id="ModifInfoCommerce">
<form method="POST" action="index.php?uc=gererAdminPro&action=modifInfo">
   <fieldset>
      <legend> Modifier vos informations commerce </legend>
      <p>
         <label for="ville">Modifier le nom de votre ville</label>
         <input id="ville" type="text" name="ville" value="" size="15" maxlenght="45">
      </p>
      </br>
      <p>
         <label for="cp"> Modifier le code postal du commerce</label>
         <input id="cp" type="text" name="cp" value="" size="5" maxlenght="5">
      </p>
      </br>
      <p>
         <label for="adresse">Modifier l'adresse du commerce</label>
         <input id="adresse" type="texte" name="adresse" value="" size="25" maxlenght="450">
      </p>
      </br>
      <p>
         <input type="submit" value="Valider" name="valider">
         <input type="reset" value="Annuler" name="annuler"> 
      </p>
</form>
</div>