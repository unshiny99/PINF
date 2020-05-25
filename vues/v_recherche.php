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
			?></br><?php $src = "https://maps.google.com/maps?width=50%&amp;height=300&amp;hl=en&amp;q=France%2C". $commerce['adresse']."+(mon%20site)&amp;ie=UTF8&amp;t=&amp;z=14&amp;iwloc=B&amp;output=embed";
			//echo $src;
			?> </br>
			<div style="width: 50%"><iframe width="50%" height="300" src="<?php echo $src; ?>" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"><a href="https://www.maps.ie/draw-radius-circle-map/">Create radius map</a></iframe></div><br /><?php
			?>
		</fieldset> <?php
		}
	?>
</div>
