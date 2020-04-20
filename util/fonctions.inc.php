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




	function getErreursSaisieInscription($login,$nom,$prenom,$email,$passe)
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

	function creerUser($login,$nom,$prenom,$email,$passe)
	{
		$lastId = mkUser($login,$nom,$prenom,$email,$passe);
	}



?>