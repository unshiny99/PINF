<?php


$action = $_REQUEST['action'];
switch($action)
{
	case 'recherche' :
	{
		$contenu = $_REQUEST['nom_commerce'];
		if ($contenu =="") {
			include("vues/v_accueil.php");
		}
		else
		{
			if(!rechercherNomCommerce($contenu))
			{
				echo "Ce nom de commerce n'existe pas !";
				include("vues/v_accueil.php");
			}
			else 
			{
				$nom_commerce=rechercherNomCommerce($contenu);
				include("vues/v_recherche.php");
			}
		}
		
	}
	break;
}
?>