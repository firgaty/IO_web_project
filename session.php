<?php
	session_start();
        $connect = isset($_SESSION['pseudo']);//variable permettant de savoir si un utilisateur est connecté

	if($connect){
		$id = $_SESSION['id'];
		$fistname = $_SESSION['fistname'];
		$lastname = $_SESSION['lastname'];
		$mail = $_SESSION['mail'];
		$pseudo = $_SESSION['pseudo'];
	}// initialise toutes les variables de l'utilisateur
?>
