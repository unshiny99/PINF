<?php

	////// fonction qui trouve les erreurs dans tout les formulaires ///////
	///// a la fois pratique et non pratique car si une nouvelle variable apparait, on devrait rajouter une variable partout où la fonctions est appelée
	function getErreurs($choix,$login,$passe,$nom,$prenom,$email,$action,$tel,$nom_commerce,$id)
	{
		$lesErreurs = array();
		//////////////    get erreurs pour la connexion
		if($choix=='seconnecter')
		{
			if($login=="")
			{
				$lesErreurs[]="Il faut saisir le champ login";
			}
			if($passe=="")
			{
				$lesErreurs[]="Il faut saisir le champ Mot de Passe";
			}
			elseif(verifUser($login,$passe)==false)
			{
				$lesErreurs[]="Les informations sont éronées";
			}
			return $lesErreurs;
		}

		//////////////    get erreurs pour l'inscripttion
		if($choix=='sinscrire')
		{
			if($login=="")
			{
				$lesErreurs[]="Il faut saisir le champ Nom d'utilisateur";
			}
			elseif(loginUnique($login)==$login)
			{
				$lesErreurs[]="Le nom d'utilisateur est déjà utilisé";
			}
			if($nom=="")
			{
				$lesErreurs[]="Il faut saisir le champ Nom";
			}
			if($prenom=="")
			{
			$lesErreurs[]="Il faut saisir le champ Prénom";
			}
			if($email=="")
			{
				$lesErreurs[]="Il faut saisir le champ Email";
			}
			elseif(!estUnMail($email))
			{
				$lesErreurs[]= "Il faut mettre un mail valide";
			}
			if($passe=="")
			{
				$lesErreurs[]="Il faut saisir le champ Mot De passe";
			}
			if($action=="")
			{
				$lesErreurs[]="Il faut sélectionner une qualification";
			}
			return $lesErreurs;
		}
		
		//////////////    get erreurs pour (de)blacklister en vue admin admin
		if($choix=='blacklisterAdminAdmin'||$choix=='deblacklisterAdminAdmin')
		{
			if($id=="")
			{
				$lesErreurs[]="Il faut saisir le champ et qu'il soit valide";
			}
			elseif(!verifUtilisateur($id))
			{
				$lesErreurs[]="L'information est éronée";
			}
			return $lesErreurs;
		}

		//////////////    get erreurs pour la gestion des abonnements
		if($choix=='gererAbo')
		{
			if($id=="")
			{
				$lesErreurs[]="Il faut saisir le champ login";
			}
			elseif(verifCommerce($id)==false)
			{
				$lesErreurs[]="L'information est éronée";
			}
			if($action=="")
			{
				$lesErreurs[]="Il faut sélectionner une action";
			}
			return $lesErreurs;
		}


		//////////// get erreurs pour l'inscription d'un commerce
		if($choix=='gererinscriptionAbo')
		{
			if($nom_commerce=="")
			{
				$lesErreurs[]="Il faut saisir le nom de votre commerce";
			}
			if($email=="")
			{
				$lesErreurs[]="Il faut saisir une adresse mail professionnelle ";
			}
			elseif(!estUnMail($email))
			{
				$lesErreurs[]="Il faut saisir une adresse Email valide";
			}
			if($tel=="")
			{
				$lesErreurs[]="Il faut saisir un numéro de téléphone";
			}
			elseif(!estUnTel($tel))
			{
				$lesErreurs[]="Il faut saisir un numéro de téléphone valide";
			}
			return $lesErreurs;
		}
	}

	///// autre fonction pour les erreurs saisie car trop long de modifier l'option d'avant (pas pratique)
	function getErreursAffectServices($ajout,$descr,$cout)
	{
		$lesErreurs = array();
		if($ajout=="")
		{
			$lesErreurs[]="Il faut sélectionner un service";
		}
		if($descr=="")
		{
			$lesErreurs[]="Il faut ajouter une description du service";
		}
		elseif(verifServiceUnique(monCommerceExiste(),$ajout)==$ajout)
		{
			$lesErreurs[]="Vous avez déjà ce service";
		}
		if($cout=="")
		{
			$lesErreurs[]="Il faut ajouter un cout du service";
		}
		elseif(!estEntier($cout))
		{
			$lesErreurs[]="Il faut ajouter un prix valide";
		}
		return $lesErreurs;
	}


	//////// fonction qui renvoi les erreurs pour la suppression d'un service
	function getErreursSuppServices($supp)
	{
		$lesErreurs = array();
		if($supp=="")
		{
			$lesErreurs[]="Il faut sélectionner un service à supprimer";
		}
		return $lesErreurs;
	}

	//////// fonction qui renvoie les erreurs pour blacklister client avce login
	function getErreursBlacklistPro($login)
	{
		$lesErreurs= array();
		if($login=="")
		{
			$lesErreurs[]="Il faut saisir un nom d'utilisateur";
		}
		elseif(getId($login)=="")
		{
			$lesErreurs[]="L'utilisateur que vous avez demandé de blacklister n'existe pas";
		}
		return $lesErreurs;
	}




	////////// fonction qui vérifie si la variable mail est un email
	function estUnMail($mail)
	{
	return  preg_match ('#^[\w.-]+@[\w.-]+\.[a-zA-Z]{2,6}$#', $mail);
	}


	/////// fonction qui vérifie que la variable est bien uniquement composé de chiffres
	function estEntier($tel) 
	{
		return preg_match("/[^0-9]/", $tel) == 0;
	}

	///////// fonction qui vérifie que la variable est bien un numéro de téléphone
	function estUnTel($tel)
	{
		return strlen($tel)== 10 && estEntier($tel);
	}

	//fonction qui permet la déconnection de l'utilisateur
	function deconnect()
	{
		deconnecterUtilisateur();
	}

	// fonction qui regarde si l'utilisateur est connecté
	function estconnect()
	{
		if(estconnecte()==1)
			return true;
		else return false;
	}


	////////// fonction qui créer un select
	function mkSelect($nomChampSelect, $tabData,$champValue, $champLabel,$selected=false,$champLabel2=false)
	{

		$multiple=""; 
		if (preg_match('/.*\[\]$/',$nomChampSelect)) $multiple =" multiple =\"multiple\" ";

		echo "<select $multiple name=\"$nomChampSelect\">\n";
		echo "<option></option>";
		foreach ($tabData as $data)
		{
			$sel = "";	// par défaut, aucune option n'est préselectionnée 
			// MAIS SI le champ selected est fourni
			// on teste s'il est égal à l'identifiant de l'élément en cours d'affichage
			// cet identifiant est celui qui est affiché dans le champ value des options
			// i.e. $data[$champValue]
			if ( ($selected) && ($selected == $data[$champValue]) )
				$sel = "selected=\"selected\"";

			echo "<option $sel value=\"$data[$champValue]\">\n";
			echo  $data[$champLabel] . "\n";
			if ($champLabel2) 	// SI on demande d'afficher un second label
				echo  " ($data[$champLabel2])\n";
			echo "</option>\n";
		}
		echo "</select>\n";
	}

	/////// fonction qui va ajouter un service a un commerce
	function ajoutService($ajout,$descr,$cout)
	{
		mkService($ajout,$descr,$cout);
	}


	function estSuperAdmin()
	{
		if(estAdminAdmin()=="adminAdmin")
			return true;
		else return false;
	}

	function estPro()
	{
		if(estProAdmin()=='pro')
			return true;
		elseif(estProAdmin()=='adminAdmin')
			return true;
		else return false;
	}

	function creerUser($login,$nom,$prenom,$email,$passe,$action)
	{
		mkUser($login,$nom,$prenom,$email,$passe,$action);
	}


	function blacklistAvecId($id)
	{
		blacklistWithId($id);
	}

	function deblacklistAvecId($id)
	{
		deblacklistWithId($id);
	}

	
	function affectActionSuperAdmin($id,$action)
	{
		affectAction($id,$action);
	}




	function estUser($login)
	{
		$login=addslashes($login);
		return getId($login);
	}


	function UtilisateurBlackliste()
	{
		if(estBlacklist()==1)
			return true;
		else false;
	}

	function estInscritCommerce()
	{
		$var=monCommerceExiste();
		if ($var!="")
		{
			return true;
		}
		else
			return false;
	}

	

	



	function inscrireCommerce($nom_commerce,$email,$tel)
	{
		mkCommerce($nom_commerce,$email,$tel);
	}

?>