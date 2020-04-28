<?php
$action = $_REQUEST['action'];
switch($action)
{
	
	case 'seconnecter'	:
	{
		$login =$_REQUEST['login'];
		$passe=$_REQUEST['passe'];
		$msgErreurs = getErreurs("seconnecter",$login,$passe,"","","","","","","");
		if (count($msgErreurs)!=0)
		{
			include ("vues/v_erreurs.php");
			include ("vues/v_connexion.php");
		}
		else
		{
			include ("vues/v_accueil.php");
		}
		break;
	}
	break;

	case 'sinscrire' :
	{
		$login=$_REQUEST['nom_utilisateur'];
		$nom=$_REQUEST['nom'];
		$prenom=$_REQUEST['prenom'];
		$email=$_REQUEST['email'];
		$passe=$_REQUEST['passe'];
		if(isset($_POST['choix']))
		{
			$action=$_POST['choix'];	
		}
		else {$action="";}
		$msgErreurs = getErreurs("sinscrire",$login,$passe,$nom,$prenom,$email,$action,"","","");
		if (count($msgErreurs)!=0)
		{
			include ("vues/v_erreurs.php");
			include ("vues/v_inscription.php");
		}
		else
		{
			creerUser($login,$nom,$prenom,$email,$passe,$action);
			include ("vues/v_connexion.php");
		}
		break;
	}
break;



	case 'sedeconnecter' :
		deconnect();
		session_destroy();
		include ("vues/v_accueil.php");
	break;



	case 'blacklisterAdminAdmin':
		$id=$_REQUEST['id'];
		$msgErreurs = getErreurs("blacklisterAdminAdmin","","","","","","","","",$id);
		if (count($msgErreurs)!=0)
		{
			include ("vues/v_erreurs.php");
			include ("vues/v_adminAdmin.php");
		}
		else
		{
			echo 'L\'utilisateur a été blacklisté';
			blacklistAvecId($id);
			include ("vues/v_adminAdmin.php");
		}

	break;

	case 'deblacklisterAdminAdmin':
		$id=$_REQUEST['id'];
		$msgErreurs = getErreurs("deblacklisterAdminAdmin","","","","","","","","",$id);
		if (count($msgErreurs)!=0)
		{
			include ("vues/v_erreurs.php");
			include ("vues/v_adminAdmin.php");
		}
		else
		{
			echo 'L\'utilisateur a été déblacklisté';
			deblacklistAvecId($id);
			include ("vues/v_adminAdmin.php");
		}

	break;


	case 'gererAbo':
		$id=$_REQUEST['id_commerce'];
		if(isset($_POST['choix']))
		{
			$action=$_POST['choix'];	
		}
		else {$action="";}
		$msgErreurs = getErreurs("gererAbo","","","","","",$action,"","",$id);
		if (count($msgErreurs)!=0)
		{
			include ("vues/v_erreurs.php");
			include ("vues/v_adminAdmin.php");
		}
		else
		{
			echo 'L\'action : '. $action.' a été effectuée ';
			affectActionSuperAdmin($id,$action);
			include ("vues/v_adminAdmin.php");
		}
	break;
}


?>

