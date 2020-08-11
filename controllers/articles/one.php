<?php 
    $id = (int)URL_PARAMS['id'];
    

    if(correctId($id)) {
        $article = articlesOne($id);
        $hasPost = $article !== null;

    } else {
        $hasPost = false;
	}

	if($hasPost) {
        $content = template('articles/v_article', [
            'article' => $article
        ]);

        $pageTitle = $article['title'];
        $left = template('articles/v_article_menu', ['id' => $article['id_articles']]);

        $pageContent = template('base/v_con2col', [
            'left' => $left,
            'content' => $content,
            'title' => $pageTitle
        ]);
		
	} else {
		// header("{$_SERVER['SERVER_PROTOCOL']} 404 Not Founf"); 
		$pageContent = template('erorrs/v_404');
	}


