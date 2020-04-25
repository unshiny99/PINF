<?php
$action = $_REQUEST['action'];
switch($action)
{
    case 'blacklisterPro':
        $login=$_REQUEST['login'];
		$id=estUser($login);
		$login=addslashes($login);
		$msgErreurs = getErreursBlacklistPro($login);
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
	
	case 'deblacklisterPro':
        $login=$_REQUEST['login'];
		$id=estUser($login);
		$login=addslashes($login);
		$msgErreurs = getErreursBlacklistPro($login);
		if (count($msgErreurs)!=0)
		{
			include ("vues/v_erreurs.php");
			include ("vues/v_espacePro.php");
		}
		else
		{
			echo 'L\'utilisateur a été deblacklisté';
			deblacklistAvecId($id);
			include ("vues/v_espacePro.php");
		}
	break;


	case 'sinscrire' :
		{
			$nom_commerce=$_REQUEST['nom_commerce'];
			$email=$_REQUEST['email'];
			$tel=$_REQUEST['tel'];
			$msgErreurs = getErreurs('gererinscriptionAbo',"","","","",$email,"",$tel,$nom_commerce,"");
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

	case 'affectService':
		{
			if(isset($_POST['ajout_nom_services']))
			{
				$ajout=$_POST['ajout_nom_services'];	
			}
			else 
			{
				$ajout="";
			}
			$descr=$_REQUEST['description_service'];
			$cout=$_REQUEST['cout_service'];
			$msgErreurs = getErreursAffectServices($ajout,$descr,$cout);
			if (count($msgErreurs)!=0)
			{
				include ("vues/v_erreurs.php");
				include ("vues/v_espacePro.php");
			}
			else
			{
				echo 'Votre service a été ajouté à votre commerce';
				ajoutService($ajout,$descr,$cout);
				include ("vues/v_espacePro.php");
			}
		}
	
		case 'suppService':
			{
				if(isset($_POST['enlever_nom_services']))
				{
					$supp=$_POST['enlever_nom_services'];	
				}
				else 
				{
					$supp="";
				}
				$msgErreurs = getErreursSuppServices($supp);
				if (count($msgErreurs)!=0)
				{
					include ("vues/v_erreurs.php");
					include ("vues/v_espacePro.php");
				}
				else
				{
					echo 'Le service : '.$supp.' a été supprimer de votre activité';
					suppServiceCommerce($supp);
					include ("vues/v_espacePro.php");
				}

			}
			

}
?>