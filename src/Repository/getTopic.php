<?php


include('../../requestHttp.php');


if( !empty($_GET['title'])){


	$request = $sql->prepare("SELECT * FROM `topic`");
}


if( $request->execute() ){
	$result = $request->fetchAll();

	
	$success = true;
	$data['resultat'] = count($result);
	$data['topic'] = $result;
} else {
	$message = "Erreur !";
}

reponse_json($success, $data);