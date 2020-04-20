<?php

include_once "config.php";

/** 
 * Classe d'accès aux données. 
 
 * Utilise les services de la classe PDO
 * pour l'application lafleur
 * Les attributs sont tous statiques,
 * les 4 premiers pour la connexion
 * $monPdo de type PDO 
 * $monPdoGsb qui contiendra l'unique instance de la classe
 *
 * @package default
 * @author Patrice Grand
 * @version    1.0
 * @link       http://www.php.net/manual/fr/book.pdo.php
 */

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

	function connecterUtilisateur($id_utilisateur)
	{
		// cette fonction affecte le booléen "connecte" à vrai pour l'utilisateur concerné 
		$SQL="UPDATE utilisateur SET connecte=1 WHERE id_utilisateur='$id_utilisateur'"; 
		SQLUpdate($SQL);
		echo '<meta http-equiv="refresh" content="0;URL=http://localhost/pinfmoi/index.php">';
	}

	function deconnecterUtilisateur()
	{
		// cette fonction affecte le booléen "connecte" à faux pour l'utilisateur concerné 
		$SQL="UPDATE utilisateur SET connecte=0 WHERE id_utilisateur='".$_SESSION["id"]."'"; 
		SQLUpdate($SQL);
		echo '<meta http-equiv="refresh" content="0;URL=http://localhost/pinfmoi/index.php">';
	}


	function verifUserBdd($login,$passe)
	{
		// Vérifie l'identité d'un utilisateur 
		// dont les identifiants sont passs en paramètre
		// renvoie faux si user inconnu
		// renvoie l'id de l'utilisateur si succès
		//echo "coucou";
		$SQL="SELECT id_utilisateur FROM utilisateur WHERE nom_utilisateur='$login' AND passe='$passe'";

		return SQLGetChamp($SQL);
		// si on avait besoin de plus d'un champ
		// on aurait du utiliser SQLSelect
	}

	function verifUser($login,$passe)
	{
		
		$id = verifUserBdd($login,$passe);

		if (!$id) return false; 

		// Cas succès : on enregistre pseudo, idUser dans les variables de session 
		// il faut appeler session_start ! 
		// Le controleur le fait déjà !!
		$_SESSION["pseudo"] = $login;
		$_SESSION["connecte"] = true;
		$_SESSION["heureConnexion"] = date("H:i:s");
		$_SESSION["id"]=$id;
		connecterUtilisateur($id);
		return true;	
	}

	function estconnecte()
	{
		$SQL="SELECT connecte FROM utilisateur WHERE nom_utilisateur='".$_SESSION["pseudo"]."'";
		return SQLGetChamp($SQL);
	}
	

	// fonction qui ajoute un utilisateur dans la bdd //
	function mkUser($login,$nom,$prenom,$email,$passe)
	{
		$maxi="SELECT MAX(id_utilisateur) FROM utilisateur";
		$max=SQLGetChamp($maxi);
		$max++;
		$qualification='client';
		// Cette fonction crée un nouvel utilisateur et renvoie l'identifiant de l'utilisateur créé
		$SQL="INSERT INTO utilisateur(id_utilisateur,nom_utilisateur,email,passe,qualification,nom,prenom,blacklist,chemin_photo,connecte) VALUES('$max','$login','$email','$passe','$qualification','$nom','$prenom',0,'',0)";
		return SQLInsert($SQL);
	}


?>