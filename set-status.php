<?php
session_start();
include('mesfunctionsphp/connectionamabasededonnees.php');
// Appel de la fonction de connexion à la base de données
$db = db_connect();
include('mesfunctionsphp/verifiersilutilisateuresconnecte.php');
if(user_verified()) {
    $insert = $db->prepare('
		UPDATE chat_online SET online_status = :status WHERE online_user = :user
	');
    $insert->execute(array(
        'status' => $_POST['status'],
        'user' => $_SESSION['id']
    ));
}
?>