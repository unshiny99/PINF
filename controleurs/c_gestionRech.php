<?php
$action = $_REQUEST['action'];
switch($action)
{
	case 'rechercheClic' :
	{
		$contenu = $_REQUEST['barre'];
		if ($contenu != "") {
			include("vues/v_recherche.php");
		}
		else {
			include("vues/v_accueil.php");
		}
	}
	break;
}
?>