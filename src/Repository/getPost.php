<?php


include('../../requestHttp.php');


if( !empty($_GET['content']) && !empty($_GET['author']) && !empty($_GET['date'])){


	$request = $sql->prepare("SELECT * FROM `post`");
}


if( $request->execute() ){
	$result = $request->fetchAll();

	
	$success = true;
	$data['resultat'] = count($result);
	$data['post'] = $result;
} else {
	$message = "Erreur !";
}

reponse_json($success, $data);