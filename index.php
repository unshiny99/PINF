<?php
session_start();
if(empty($_SESSION['reload'])){
    $_SESSION['reload'] = 1;}


/* ici les includes */

require_once("util/fonctions.inc.php");
require_once("util/class.pdoReserv.inc.php");
include("vues/v_entete.php") ;
include("vues/v_bandeau.php") ;







// mets l'accueil si aucune vue n'est sélectionné
// sinon mets la valeur de la requete de vue souhaité par l'utilsateur dans la variable $uc

if(!isset($_REQUEST['uc']))
     $uc = 'accueil';
else
	$uc = $_REQUEST['uc'];

   // $pdo = PdoLafleur::getPdoLafleur();	 



// switch qui choisit la vue mise sur l'écran en fonction de la variable $uc
switch($uc)
{
	case 'accueil':
		{include("vues/v_accueil.php");break;}
    case 'connexion':
        {include("vues/v_connexion.php");break;}
    case 'gererConnexion' :
        {include("controleurs/c_gestionConInsc.php");break;}
    case 'inscription' :
        {include("vues/v_inscription.php");break;}
    case 'gererInscription':
        {include("controleurs/c_gestionConInsc.php");break;}
    case 'deconnexion' :
        {include("vues/v_deconnexion.php");break;}
    case 'gererDeconnexion':
        {include("controleurs/c_gestionConInsc.php");break;}
    case 'membres' :
        {include("vues/v_membres.php");break;}
    case 'adminAdmin':
        {include("vues/v_adminAdmin.php");break;}
}


//mets la vue qui est au pieds de la page


?>