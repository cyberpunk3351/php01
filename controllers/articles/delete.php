<?php 

    $strId = URL_PARAMS[1] ?? '';
    $id = (int)$strId;

    $IsCorrectId = correctId($id);
    $article = articlesOne($id);
    $hasPost = $article !== null;

    if($hasPost && $IsCorrectId){
        articlesDelete($id);
        $pageTitle = 'Delted!';        
        $pageContent = template('articles/v_delete');
    } else {
		header("{$_SERVER['SERVER_PROTOCOL']} 404 Not Founf"); 
		$pageContent = template('erorrs/v_404');
	}

