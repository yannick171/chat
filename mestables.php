<?php

function db_connect() {
	// définition des variables de connexion à la base de données
	try {
		$pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
		// INFORMATIONS DE CONNEXION
		$host = 	'localhost';
		$dbname = 	'minichat';
		$user = 	'root';
		$password = 	'';
		// FIN DES DONNEES

		$db = new PDO('mysql:host='.$host.';dbname='.$dbname.'', $user, $password, $pdo_options);
		return $db;
	} catch (Exception $e) {
		die('Erreur de connexion : ' . $e->getMessage());
	}
}
$db = db_connect();
            $query = $db->query('CREATE TABLE IF NOT EXISTS chat_online (online_id int(11) NOT NULL auto_increment,
              online_ip varchar(100) collate latin1_german1_ci NOT NULL,
              online_user int(11) NOT NULL,
              online_status enum('0';'1';'2') collate latin1_german1_ci NOT NULL,
              online_time bigint(21) NOT NULL,
              PRIMARY KEY  (online_id)
            )');

?>