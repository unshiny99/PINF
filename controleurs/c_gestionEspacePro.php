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
				passerPro($_SESSION['id']);
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
		break;
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
		break;
		}
			


	case 'modifJourOuverture':
		{
			$jours=array();
			$jourmanquant=array();
			if(isset($_POST['lundi']))
			{
				$jours[]=$_POST['lundi'];
			}
			else
			{
				$jourmanquant[]='Monday';
			}
			if(isset($_POST['mardi']))
			{
				$jours[]=$_POST['mardi'];
			}
			else
			{
				$jourmanquant[]='Tuesday';
			}
			if(isset($_POST['mercredi']))
			{
				$jours[]=$_POST['mercredi'];
			}
			else
			{
				$jourmanquant[]='Wednesday';
			}
			if(isset($_POST['jeudi']))
			{
				$jours[]=$_POST['jeudi'];
			}
			else
			{
				$jourmanquant[]='Thursday';
			}
			if(isset($_POST['vendredi']))
			{
				$jours[]=$_POST['vendredi'];
			}
			else
			{
				$jourmanquant[]='Friday';
			}
			if(isset($_POST['samedi']))
			{
				$jours[]=$_POST['samedi'];
			}
			else
			{
				$jourmanquant[]='Saturday';
			}
			if(isset($_POST['dimanche']))
			{
				$jours[]=$_POST['dimanche'];
			}
			else
			{
				$jourmanquant[]='Sunday';
			}


			/*
			$date_2_month=date('Y-m-d',strtotime('+2 month',strtotime($_SESSION['dateActuelle'])));
			$jour='Monday';
			for($date = $_SESSION['dateActuelle'] ;   $date<$date_2_month   ;   date_create($date.'Next'.$jour))
			{
				echo 'coucou'. $date.'      ';
			}*/


			/*
			$date_2_month=date('Y-m-d',strtotime('+2 month',strtotime($_SESSION['dateActuelle'])));
			//$date=$_SESSION['dateActuelle'];
			$id_commerce=monCommerceExiste();
			*/
			foreach($jours as $jour)
			{
				creerJour($jour);
			}
			foreach($jourmanquant as $jr)
			{
				suppJour($jr);
			}
			/*
			foreach($jours as $jour)
			{
				insererJour($jour,$date_2_month,$id_commerce);
			}
			
			*/



			/*
			$vare=date('l');
			$var = date('2020-05-04');
			echo $var;
			$var = date_create($var.'Next '.$vare);
			echo $var->format('Y-m-d');
			*/
/*
			$var=date("Y-m-d");
			echo $var;
			$var=date("Y-m-d",strtotime($var. '+ 2 days'));
			echo $var;
			*/
			echo 'Vos jours de travail ont été modifié';
			include ("vues/v_espacePro.php");

		break;	
		}

	case 'affectInfo':
		{
		$nV=$_POST['ville'];
		$cp=$_POST['cp'];
		$adr=$_POST['adresse'];
		$msgErreurs = getErreursAddInfo($nV,$cp,$adr);
			if (count($msgErreurs)!=0)
			{
				include ("vues/v_erreurs.php");
				include ("vues/v_espacePro.php");
			}
			else
			{
				echo 'Vos informations ont été enregistré';
				insererInfoCommerce($nV,$cp,$adr);
				include("vues/v_espacePro.php");
			}
		break;
		}

	case 'modifInfo':
		{
			$ville=$_POST['ville'];
			$ville=addslashes($ville);
			$cp=$_POST['cp'];
			$adresse=$_POST['adresse'];
			$adresse=addslashes($adresse);
			$msgErreurs = getErreursModifInfo($ville,$cp,$adresse);
			if (count($msgErreurs)!=0)
			{
				include("vues/v_espacePro.php");
				include("vues/v_erreurs.php");
				include("vues/v_modifInfo.php");
			}
			else
			{
				echo 'Vos informations commerces ont été mis à jour ';
				updateInfoCommerce($ville,$cp,$adresse);
				include("vues/v_espacePro.php");
			}
		}
}
?>