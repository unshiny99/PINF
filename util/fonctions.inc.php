<?php





	/**
	 * Retourne un tableau d'erreurs de saisie pour une commande
	 *
	 * @param $login : chaîne
	 * @param $passe : chaîne
	 * @return : un tableau de chaînes d'erreurs
	*/
	function getErreursSaisieConnexion($login,$passe)
	{
		$lesErreurs = array();
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


	function estUnMail($mail)
	{
	return  preg_match ('#^[\w.-]+@[\w.-]+\.[a-zA-Z]{2,6}$#', $mail);
	}




	function getErreursSaisieInscription($login,$nom,$prenom,$email,$passe,$action)
	{
		$lesErreurs = array();
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


	function getErreursSaisieBlackAdminAdmin($id)
	{
		$lesErreurs = array();
		if($id=="")
		{
			$lesErreurs[]="Il faut saisir le champ et qu'il soit valide";
		}
		elseif(verifUtilisateur($id)==false)
		{
			$lesErreurs[]="L'information est éronée";
		}
		return $lesErreurs;
		
	}

	
	function affectActionSuperAdmin($id,$action)
	{
		affectAction($id,$action);
	}


	function getErreursSaisieAboAdmin($id,$action)
	{
		$lesErreurs = array();
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

	function estUser($login)
	{
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
		if (monCommerceExiste()!="")
			return true;
		else
			return false;
	}

	function estUnTel($tel)
	{
		return strlen($tel)== 10 && estEntier($tel);
	}

	function estEntier($tel) 
	{
		return preg_match("/[^0-9]/", $tel) == 0;
	}

	function getErreursSaisieInscriptionCommerce($nom,$email,$tel)
	{
		$lesErreurs = array();
		if($nom=="")
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

	function inscrireCommerce($nom_commerce,$email,$tel)
	{
		mkCommerce($nom_commerce,$email,$tel);
	}

?>