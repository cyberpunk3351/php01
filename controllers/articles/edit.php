<?php

    $strId = URL_PARAMS[1] ?? '';
    $id = (int)$strId;

    $IsCorrectId = correctId($strId);
    $article = articlesOne($id);
    $hasPost = $article !== null;

    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        $fields['id'] = $id;
        $fields = extractFields($_POST, ['title', 'content']);	
        $validateErrors = articlesValidate($fields);
    
    
        if(empty($validateErrors)) {
            $article = articlesEdit($id, $fields);
            header("Location: index.php?c=article&$id");
            exit();
        }
    } else {
        $fields = ['title' => $article['title'], 'content' => $article['content']];
        $validateErrors = [];
    }

    if($hasPost && $IsCorrectId){
        $pageTitle = 'Edit article';
        $pageContent = template('articles/v_add', [
            'fields' => $fields,
            'validateErrors' => $validateErrors
        ]);
    } else {
		header("{$_SERVER['SERVER_PROTOCOL']} 404 Not Founf"); 
		$pageContent = template('erorrs/v_404');
	}
