<?php 
include("util/config.php");
// Database configuration 
$dbHost     = $BDD_host; 
$dbUsername = $BDD_user; 
$dbPassword = $BDD_password; 
$dbName     = $BDD_base; 

// Create database connection 
$db = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName); 
 
// Check connection 
if ($db->connect_error) { 
    die("Connection failed: " . $db->connect_error); 
} 
 
// Get search term 
$searchTerm = $_GET['term']; 
 
// Fetch matched data from the database 
$query = $db->query("SELECT id_commerce , nom_commerce FROM commerce WHERE nom_commerce LIKE '%".$searchTerm."%' ORDER BY nom_commerce ASC"); 
 
// Generate array with noms data 
$nomData = array(); 
if($query->num_rows > 0){ 
    while($row = $query->fetch_assoc()){ 
        $data['id_commerce'] = $row['id_commerce']; 
        $data['value'] = $row['nom_commerce']; 
        array_push($nomData, $data); 
    } 
} 
 
// Return results as json encoded array 
echo json_encode($nomData); 



if(isset($_POST['submit'])){ 
    $nom = $_POST['nom_commerce']; 
    echo 'nom Input: '.$nom; 
}
?>
