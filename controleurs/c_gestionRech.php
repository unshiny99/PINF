<?php

$cherche = valider("debutNom");
if($cherche) {
	$resultat=array();
	$retour = array();
	$sql= "SELECT * FROM commerce WHERE nom_commerce LIKE \"$cherche\"";
	$resultat=parcoursRs(SQLSelect($sql));

	$retour["resultat"] = $resultat;
	$retour["recherche"] = $cherche;
	echo json_encode($retour);
	die("");
}

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
