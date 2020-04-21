<?php
$action = $_REQUEST['action'];
switch($action)
{
    case 'blacklisterPro':
        $login=$_REQUEST['login'];
        $id=estUser($login);
		$msgErreurs = getErreursSaisieBlackAdminAdmin($id);
		if (count($msgErreurs)!=0)
		{
			include ("vues/v_erreurs.php");
			include ("vues/v_espacePro.php");
		}
		else
		{
			echo 'L\'utilisateur a été blacklisté';
			blacklistAvecId($id);
			include ("vues/v_espacePro.php");
		}
	break;
	
	case 'sinscrire' :
		{
			$nom_commerce=$_REQUEST['nom_commerce'];
			$email=$_REQUEST['email'];
			$tel=$_REQUEST['tel'];
			$msgErreurs = getErreursSaisieInscriptionCommerce($nom_commerce,$email,$tel);
			if (count($msgErreurs)!=0)
			{
				include ("vues/v_erreurs.php");
				include ("vues/v_inscriptionCommerce.php");
			}
			else
			{
				echo 'Votre commerce a été inscrit !';
				inscrireCommerce($nom_commerce,$email,$tel);
				include ("vues/v_espacePro.php");
			}
			break;
		}

}
?>