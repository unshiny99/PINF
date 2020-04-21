<?php
$action = $_REQUEST['action'];
switch($action)
{
    case 'blacklisterPro':
        $login=$_REQUEST['login'];
        $id=estUser($login);
		$msgErreurs = getErreursSaisieBlackAdminAdmin($id);
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

}
?>