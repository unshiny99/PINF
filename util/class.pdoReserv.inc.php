<?php

include_once "config.php";


	/////////// fonction qui va update sur phpmyadmin
	function SQLUpdate($sql)
	{
		global $BDD_host;
		global $BDD_base;
		global $BDD_user;
		global $BDD_password;

		try {
			$dbh = new PDO("mysql:host=$BDD_host;dbname=$BDD_base", $BDD_user, $BDD_password);
		} catch (PDOException $e) {
			die("<font color=\"red\">SQLUpdate/Delete: Erreur de connexion : " . $e->getMessage() . "</font>");
		}

		$dbh->exec("SET CHARACTER SET utf8");
		$res = $dbh->query($sql);
		if ($res === false) {
			$e = $dbh->errorInfo(); 
			die("<font color=\"red\">SQLUpdate/Delete: Erreur de requete : " . $e[2] . "</font>");
		}

		$dbh = null;
		$nb = $res->rowCount();
		if ($nb != 0) return $nb;
		else return false;
		
	}




	/////////// fonction qui permet d'inserer dans phpmyadmin
	function SQLInsert($sql)
	{
		global $BDD_host;
		global $BDD_base;
		global $BDD_user;
		global $BDD_password;
		
		try {
			$dbh = new PDO("mysql:host=$BDD_host;dbname=$BDD_base", $BDD_user, $BDD_password);
		} catch (PDOException $e) {
			die("<font color=\"red\">SQLInsert: Erreur de connexion : " . $e->getMessage() . "</font>");
		}

		$dbh->exec("SET CHARACTER SET utf8");
		$res = $dbh->query($sql);
		if ($res === false) {
			$e = $dbh->errorInfo(); 
			die("<font color=\"red\">SQLInsert: Erreur de requete : " . $e[2] . "</font>");
		}

		$lastInsertId = $dbh->lastInsertId();
		$dbh = null; 
		return $lastInsertId;
	}



	//////// fonction qui permet de sélectionner un champs sur phpmyadmin
	function SQLGetChamp($sql)
	{
		global $BDD_host;
		global $BDD_base;
		global $BDD_user;
		global $BDD_password;

		try {
			$dbh = new PDO("mysql:host=$BDD_host;dbname=$BDD_base", $BDD_user, $BDD_password);
		} catch (PDOException $e) {
			die("<font color=\"red\">SQLGetChamp: Erreur de connexion : " . $e->getMessage() . "</font>");
		}

		$dbh->exec("SET CHARACTER SET utf8");
		$res = $dbh->query($sql);
		if ($res === false) {
			$e = $dbh->errorInfo(); 
			die("<font color=\"red\">SQLGetChamp: Erreur de requete : " . $e[2] . "</font>");
		}

		$num = $res->rowCount();
		$dbh = null;

		if ($num==0) return false;
		
		$res->setFetchMode(PDO::FETCH_NUM);

		$ligne = $res->fetch();
		if ($ligne == false) return false;
		else return $ligne[0];

	}

	////////// fonction pour selectionner plusieurs donné dans la bdd
	function SQLSelect($sql)
	{	
		global $BDD_host;
		global $BDD_base;
		global $BDD_user;
		global $BDD_password;

		try {
			$dbh = new PDO("mysql:host=$BDD_host;dbname=$BDD_base", $BDD_user, $BDD_password);
		} catch (PDOException $e) {
			die("<font color=\"red\">SQLSelect: Erreur de connexion : " . $e->getMessage() . "</font>");
		}

		$dbh->exec("SET CHARACTER SET utf8");
		$res = $dbh->query($sql);
		if ($res === false) {
			$e = $dbh->errorInfo(); 
			die("<font color=\"red\">SQLSelect: Erreur de requete : " . $e[2] . "</font>");
		}
		
		$num = $res->rowCount();
		$dbh = null;

		if ($num==0) return false;
		else return $res;
	}


	///////// fonction qui permet de supprimer dans la bdd
	function SQLDelete($sql) 
	{
		return SQLUpdate($sql);
	}

	/////////// fonction qui met un utilisateur connecté un utilisateur quand il se connect
	function connecterUtilisateur($id_utilisateur)
	{
		// cette fonction affecte le booléen "connecte" à vrai pour l'utilisateur concerné 
		$SQL="UPDATE utilisateur SET connecte=1 WHERE id_utilisateur='$id_utilisateur'"; 
		SQLUpdate($SQL);
		echo '<meta http-equiv="refresh" content="0;URL=http://localhost/pinfmoi/index.php">';
	}


	/////////// fonction qui permet de déconnecté un utilisateur dès qu'il se déconnecte
	function deconnecterUtilisateur()
	{
		// cette fonction affecte le booléen "connecte" à faux pour l'utilisateur concerné 
		$SQL="UPDATE utilisateur SET connecte=0 WHERE id_utilisateur='".$_SESSION["id"]."'"; 
		SQLUpdate($SQL);
		echo '<meta http-equiv="refresh" content="0;URL=http://localhost/pinfmoi/index.php">';
	}


	/////// fonction qui trouve l'id_utilisateur d'un user avec son nom_utilisateur et return l'id
	function getId($login)
	{

		$SQL="SELECT id_utilisateur FROM utilisateur WHERE nom_utilisateur='$login'";
		return SQLGetChamp($SQL);
	}


	////// function qui vérifie que l'utilisateur avec ce mot de passe et ce login existe et return l'id
	function verifUserBdd($login,$passe)
	{
		$SQL="SELECT id_utilisateur FROM utilisateur WHERE nom_utilisateur='$login' AND passe='$passe'";
		return SQLGetChamp($SQL);
	}


	///////: fonction qui va connecté un user a la page et va appeler la connection
	function verifUser($login,$passe)
	{	
		$id = verifUserBdd($login,$passe);
		if (!$id) return false; 
		$_SESSION["pseudo"] = $login;
		$_SESSION["connecte"] = true;
		//$_SESSION["heureConnexion"] = date("H:i:s");
		$ma_date=time("H:i:s");
		$ma_new_date=$ma_date+7200;
		$_SESSION["heureConnexion"]=date("H:i:s",$ma_new_date);
		//$_SESSION["heureConnexion"]=$_SESSION["heureConnexion"]+2;
		//$_SESSION["heureConnexion"]=date("H:i:s",$_SESSION["heureConnexion"]);
		$_SESSION["dateActuelle"]=date("Y-m-d");
		$_SESSION["id"]=$id;
		connecterUtilisateur($id);
		return true;	
	}


	/////// fonction utile pour les SQLSelect multiple
	function parcoursRs($result)
	{
		if  ($result == false) return array();
	
		$result->setFetchMode(PDO::FETCH_ASSOC);
		while ($ligne = $result->fetch()) 
			$tab[]= $ligne;
	
		return $tab;
	}


	/////// fonction qui récupère les services présents sur notre site  
	/////// -> va être utilisé pour les mettre dans un select
	/////// -> surement utile aussi pour la recherche (a voir)
	function getToutServices()
	{
		$SQL ="SELECT DISTINCT nom_service FROM services";
		return parcoursRs(SQLSelect($SQL));
	}

	
	////// fonction qui va selection mes services quand j'ai un commerce
	////// -> va être utilisé pour l'espace pro, pour supprimer un service
	function getMesServices()
	{
		$id=monCommerceExiste();
		$SQL ="SELECT DISTINCT nom_service FROM services WHERE id_commerce='$id'";
		return parcoursRs(SQLSelect($SQL));
	}


	////// fonction qui va ajouter un service a un commerce
	function mkService($ajout,$descr,$cout)
	{
		$id=monCommerceExiste();
		$nom_commerce=getNomCommerce($id);
		$nom_commerce=addslashes($nom_commerce);
		$descr=addslashes($descr);
		$SQL ="INSERT INTO services (id_commerce,nom_commerce,nom_service,services,couts,duree_rdv) VALUES('$id','$nom_commerce','$ajout','$descr','$cout',0)";
		return SQLInsert($SQL);
	}

	///// fonction qui retourne le nom d'un commerce en fonction du l'id_commerce
	function getNomCommerce($id_commerce)
	{
		$SQL="SELECT nom_commerce FROM commerce WHERE id_commerce='$id_commerce'";
		return SQLGetChamp($SQL);
	}

	////// fonction qui vérifie qu'un commerce n'a pas déjà le service qu"il veut ajouter
	function verifServiceUnique($id_commerce,$nom_service)
	{
		$SQL="SELECT nom_service FROM services WHERE id_commerce='$id_commerce' AND nom_service='$nom_service'";
		return SQLGetChamp($SQL);
	}


	/////////// fonction qui supprime un service pour un commerce
	function suppServiceCommerce($supp)
	{
		$SQL=$_SESSION['id'];
		$SQL="SELECT id_commerce FROM commerce WHERE id_utilisateur='$SQL'";
		$SQL=SQLGetChamp($SQL);
		$SQL="DELETE FROM services WHERE nom_service='$supp' AND id_commerce='$SQL'";
		return SQLDelete($SQL);
		echo '<meta http-equiv="refresh" content="0;URL=http://localhost/pinfmoi/index.php">';
	}

	////////// fonction qui va dire si un commerce a déja dit qu'il était ouvert un certain jour ou non en renvoyant true ou false
	function jourExiste($jour)
	{
		$id_commerce=monCommerceExiste();
		$SQL="SELECT jour FROM journees WHERE jour=$jour AND id_commerce=$id_commerce";
		$idtp=SQLGetChamp($SQL);
		if(!$idtp) return false;
		else return true;
	}


	function joursExiste()
	{
		$id_commerce=monCommerceExiste();
		$SQL="SELECT jour FROM journees WHERE id_commerce=$id_commerce";
		$idtp=SQLGetChamp($SQL);
		if(!$idtp) return false;
		else return true;
	}
	/*
	///////// fonction qui renvoie si le commerce a au moins un jour d'ouverture
	function existeJourOuvertureCommerce()
	{
		$id_commerce=monCommerceExiste();
		$var=array();
		$var=getIdJourneeDansHoraires($id_commerce);
		if(empty($var))
		return true;
		else
		return false;
	}
	*/

	//// fonction qui recupère le jour dans la table journees
	function getJourneeDansJournees($id_commerce,$jour)
	{
		$SQL="SELECT DISTINCT jour FROM journees WHERE id_commerce=$id_commerce AND jour='".$jour."'";
		return SQLGetChamp($SQL);
	}

	//////// fonction qui inser jour dans bdd
	function insererJour($jour,$date,$id_commerce)
	{
		$SLQ="INSERT INTO journees VALUES('".$jour."','".$date."',$id_commerce)  "; 
		return SQLInsert($SLQ);
	}
		//$SQL = "IF NOT EXISTS (SELECT DISTINCT FROM journees WHERE jour=$jour AND id_commerce=$id_commerce) BEGIN INSERT INTO journees(jour,date_jour,id_commerce) VALUES('$jour','$date','$id_commerce') END ";
		//$SQL="INSERT INTO journees VALUES(".$jour.",".$date.",".$id_commerce.") ";
		//$SQL.="WHEN MATCHED THEN jour=$jour,id_commerce=$id_commerce";
		
	


	/////// fonction qui vérifie si un jour n'est pas présent dans la bdd
	function nestpaspresentjour($jour,$id_commerce)
	{
		$SQL="SELECT DISTINCT jour FROM journees WHERE jour='".$jour."' AND id_commerce='$id_commerce'";
		return SQLGetChamp($SQL);
	}

	////////// fonction qui supprime les jours où le commerce ne travail plus, de la bdd si travaillait
	function supprimerJoursBdd($jour,$id_commerce)
	{
		$SQL="DELETE FROM journees WHERE jour='".$jour."' AND id_commerce='".$id_commerce."'";
		return SQLDelete($SQL);
	}

	////// fonction qui passe pro un utilisateur
	function passerPro($id)
	{
		$SQL="UPDATE utilisateur SET qualification='pro' WHERE id_utilisateur=$id";
		return SQLUpdate($SQL);
	}

	function aService()
	{
		$id_commerce=monCommerceExiste();
		$SQL="SELECT nom_service FROM services WHERE id_commerce='".$id_commerce."'";
		$SQL=parcoursRs(SQLSelect($SQL));
		if($SQL!="")
		{
			return false;
		}
		return true;
	}



	function valider($nom,$type="REQUEST")
	{	
		switch($type)
		{
			case 'REQUEST': 
			if(isset($_REQUEST[$nom]) && !($_REQUEST[$nom] == "")) 	
				return proteger($_REQUEST[$nom]); 	
			break;
			case 'GET': 	
			if(isset($_GET[$nom]) && !($_GET[$nom] == "")) 			
				return proteger($_GET[$nom]); 
			break;
			case 'POST': 	
			if(isset($_POST[$nom]) && !($_POST[$nom] == "")) 	
				return proteger($_POST[$nom]); 		
			break;
			case 'COOKIE': 	
			if(isset($_COOKIE[$nom]) && !($_COOKIE[$nom] == "")) 	
				return proteger($_COOKIE[$nom]);	
			break;
			case 'SESSION': 
			if(isset($_SESSION[$nom]) && !($_SESSION[$nom] == "")) 	
				return $_SESSION[$nom]; 		
			break;
			case 'SERVER': 
			if(isset($_SERVER[$nom]) && !($_SERVER[$nom] == "")) 	
				return $_SERVER[$nom]; 		
			break;
		}
		return false; // Si pb pour récupérer la valeur 
	}


	function proteger($str)
	{
		// attention au cas des select multiples !
		// On pourrait passer le tableau par référence et éviter la création d'un tableau auxiliaire
		if (is_array($str))
		{
			$nextTab = array();
			foreach($str as $cle => $val)
			{
				$nextTab[$cle] = addslashes($val);
			}
			return $nextTab;
		}
		else 	
			return addslashes ($str);
		//return str_replace("'","''",$str); 	//utile pour les serveurs de bdd Crosoft
	}
	




	function estAdminAdmin()
	{
		if (isset($_SESSION["id"])) {
			$SQL="SELECT qualification FROM utilisateur WHERE id_utilisateur='".$_SESSION["id"]."'";
			return SQLGetChamp($SQL);
		}
		return "";
	}



	function estconnecte()
	{
		if (isset($_SESSION["pseudo"])) {
			$SQL="SELECT connecte FROM utilisateur WHERE nom_utilisateur='".$_SESSION["pseudo"]."'";
			return SQLGetChamp($SQL);
		}
		return ""; // on retourne une chaîne vide si pas connecté
	}
	

	// fonction qui ajoute un utilisateur dans la bdd //
	function mkUser($login,$nom,$prenom,$email,$passe,$action)
	{
		if($action=='Professionnel')
		{
			$act='pro';
		}
		else
		{
			$act='part';
		}
		$maxi="SELECT MAX(id_utilisateur) FROM utilisateur";
		$max=SQLGetChamp($maxi);
		$max++;
		$qualification=$act;
		// Cette fonction crée un nouvel utilisateur et renvoie l'identifiant de l'utilisateur créé
		$SQL="INSERT INTO utilisateur(id_utilisateur,nom_utilisateur,email,passe,qualification,nom,prenom,blacklist,chemin_photo,connecte) VALUES('$max','$login','$email','$passe','$qualification','$nom','$prenom',0,'',0)";
		return SQLInsert($SQL);
	}


	function verifUtilisateur($id)
	{
		$SQL="SELECT id_utilisateur FROM utilisateur WHERE id_utilisateur='$id'";
		$idtp=SQLGetChamp($SQL);
		if(!$idtp) return false;
		else return true;
	}

	function blacklistWithId($id)
	{
		$SQL="UPDATE utilisateur SET blacklist=1 where id_utilisateur=$id";
		return SQLUpdate($SQL);
	}


	function deblacklistWithId($id)
	{
		$SQL="UPDATE utilisateur SET blacklist=0 where id_utilisateur=$id";
		return SQLUpdate($SQL);
	}


	function verifCommerce($id)
	{
		$SQL="SELECT id_commerce FROM commerce WHERE id_commerce='$id'";
		$idtp=SQLGetChamp($SQL);
		if(!$idtp) return false;
		else return $idtp;
	}

	function affectAction($id,$action)
	{
		if($action=='Mettre abonnement') 
		{
			$act=1;
		}
		else 
		{
			$act=0;
		}
		$SQL="UPDATE commerce SET abonne='$act' where id_commerce='$id'";
		return SQLUpdate($SQL);
	}


	function estProAdmin()
	{
		if (isset($_SESSION["id"])) {
			$SQL="SELECT qualification FROM utilisateur WHERE id_utilisateur='".$_SESSION["id"]."'";
			return SQLGetChamp($SQL);
		}
		return "";
	}

	function loginUnique($login)
	{
		$SQL="SELECT nom_utilisateur FROM utilisateur WHERE nom_utilisateur='$login'";
		return SQLGetChamp($SQL);
	}


	function estBlacklist()
	{
		if (isset($_SESSION["id"])) {
			$SQL="SELECT blacklist FROM utilisateur WHERE id_utilisateur='".$_SESSION["id"]."'";
			return SQLGetChamp($SQL);
		}
	}

	function monCommerceExiste()
	{
		$id=$_SESSION['id'];
		$SQL="SELECT id_commerce FROM commerce WHERE id_utilisateur='$id'";
		return SQLGetChamp($SQL);
	}



	function mkCommerce($nom_commerce,$email,$tel)
	{
		$nom_commerce=addslashes($nom_commerce);
		$maxi="SELECT MAX(id_commerce) FROM commerce";
		$max=SQLGetChamp($maxi);
		$max++;
		$id_utilisateur=$_SESSION['id'];
		$nom=getNom();
		$nom=addslashes($nom);
		$prenom=getPrenom();
		$var="SELECT DISTINCT id_utilisateur FROM commerce WHERE id_utilisateur=$id_utilisateur";
		$var=SQLGetChamp($var);
		if($var==$id_utilisateur) return;
		$SQL="INSERT INTO commerce(id_commerce,id_utilisateur,nom_commerce,email,nom,prenom,tel,blacklist,abonne,chemin_photo) VALUES('$max','$id_utilisateur','$nom_commerce','$email','$nom','$prenom','$tel',0,0,'')";
		return SQLInsert($SQL);
		echo '<meta http-equiv="refresh" content="0;URL=http://localhost/pinfmoi/index.php">';
	}

	function getNom()
	{
		$id=$_SESSION['id'];
		$SQL="SELECT nom FROM utilisateur WHERE id_utilisateur='$id'";
		return SQLGetChamp($SQL);
	}

	function getPrenom()
	{
		$id=$_SESSION['id'];
		$SQL="SELECT prenom FROM utilisateur WHERE id_utilisateur='$id'";
		return SQLGetChamp($SQL);
	}


?>