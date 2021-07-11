<?php


include('../../requestHttp.php');


if( !empty($_GET['content']) && !empty($_GET['author']) && !empty($_GET['date'])){

	$data = ['content'=>$_GET['content'],':author', $_GET['author'],':date', $_GET['date']];
	
	$request = $sql->prepare("INSERT INTO `post` (id, content, author, date) VALUES (NULL, :content, :author, :date);");
	
	$request->execute($data) ;

	if( $request->execute() ){
		$success = true;
		$message = "Le post a été ajouté";
	} else {
		$message = "Erreur !";
	}
} 

reponse_json($success, $data, $message);