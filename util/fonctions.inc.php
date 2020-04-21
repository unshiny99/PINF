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

	function creerUser($login,$nom,$prenom,$email,$passe,$action)
	{
		$lastId = mkUser($login,$nom,$prenom,$email,$passe,$action);
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
			$lesErreurs[]="Il faut saisir le champ login";
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
?>