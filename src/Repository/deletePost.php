<?php


include('../../requestHttp.php');


if( !empty($_GET['id']) ){


	$request = $sql->prepare("DELETE FROM `post` WHERE `id` = :id");
	$request->bindParam(':id', $_GET['id']);

	if( $request->execute() ){
		$success = true;
		$message = 'Le post a été supprimé';
	} else {
		$message = "Erreur !";
	}
}

reponse_json($success, $data, $message);