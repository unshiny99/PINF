<div id="bandeau">
<!-- Images En-t�te -->
<!--<img src="images/menuGauche.gif"	alt="Choisir" title="Choisir"/>-->
<h3>Réservation'2i</h3><div>
</div>

<!--  Menu haut-->
<ul id="menu">
	<li><a href="index.php?uc=accueil"> Accueil </a></li>



	<?php
	if(estconnect()==false)
	{
		$mavariable='<li><a href="index.php?uc=connexion"> Se connecter </a></li>'; 
		echo $mavariable;
	}
	?>
	<?php
	if(estconnect()==true)
	{
		if(estSuperAdmin())
		{
		$mavariable='<li><a href="index.php?uc=adminAdmin"> Privilège d\'admin suprème </a></li>';
		echo $mavariable;
		}
		$mavariable='<li><a href="index.php?uc=deconnexion"> Se déconnecter </a></li>'; 
		echo $mavariable;
	}
	?>
	
<!--	
	<li><a href="index.php?uc=voirProduits&action=voirCategories"> Voir le catalogue de fleurs </a></li>
	<li><a href="index.php?uc=gererPanier&action=voirPanier"> Voir son panier </a></li>
	<li><a href="index.php?uc=administrer"> Administrer </a></li>	
-->
</ul>
