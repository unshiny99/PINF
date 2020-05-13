<div id="recherche">
	<p>Voici les commerces correspondants :</p>
	<?php
		foreach($nom_commerce as $commerce)
		{
			?> <fieldset> 
			<h1> Les Informations Commerce </h1> <?php
			echo 'Nom commerce : '.$commerce['nom_commerce'];
			?></br><?php
			echo 'email : '.$commerce['email'];
			?></br><?php
			echo 'tel : +33 '.$commerce['tel'];
			?></br><?php
			echo 'ville : '.$commerce['ville'];
			?></br><?php
			echo 'code postal : '.$commerce['code_postal'];
			?></br><?php
			echo 'adresse : '.$commerce['adresse'];
			?></br><?php
			?> </fieldset> <?php
		}
	?>
</div>