<?php


include('../../requestHttp.php');


if( !empty($_GET['title'])){

	$data = ['title'=>$_GET['title']];
	
	$request = $sql->prepare("INSERT INTO `topic` (id, title) VALUES (NULL, :title);");
	
	$request->execute($data) ;

	if( $request->execute() ){
		$success = true;
		$message = "Le titre a été ajouté";
	} else {
		$message = "Erreur !";
	}
} 

reponse_json($success, $data, $message);