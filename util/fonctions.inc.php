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
		if($choix=='gererAbo')
		{
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

	

	



	function inscrireCommerce($nom_commerce,$email,$tel)
	{
		mkCommerce($nom_commerce,$email,$tel);
	}

?>