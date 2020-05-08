<div id="pied">
    <?php
    if (isset($_SESSION['id'])) {
        echo '<hr>';
    	echo 'Utilisateur '.$_SESSION['pseudo']; 
        echo ' connecte depuis '.$_SESSION['heureConnexion']; 
        
    }
    ?>


</div>