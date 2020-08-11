<?php

if($user === null){
	header('Location: ' . BASE_URL . 'auth/login');
	exit();
}

if($_SERVER['REQUEST_METHOD'] === 'POST'){
	$fields = extractFields($_POST, ['title', 'content']);	
	$validateErrors = articlesValidate($fields);


	if(empty($validateErrors)) {
		articlesAdd($fields);
		header('Location: index.php');
		exit();
	}
} else {
	$fields = ['title' => '', 'content' => ''];
	$validateErrors = [];
}

$pageTitle = 'Add article';

$pageContent = template('articles/v_add', [
	'fields' => $fields,
	'validateErrors' => $validateErrors
]);