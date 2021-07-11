<?php
header('Content-Type: application/json');
$success = false;
$data = array();
include('connect.php');

function reponse_json($success, $data, $messageErreur=NULL) {
	$array['success'] = $success;
	$array['msg'] = $messageErreur;
	$array['result'] = $data;

	echo json_encode($data);
}