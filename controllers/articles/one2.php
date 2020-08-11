<?php

  $id = (int)URL_PARAMS['id'];

  $message = articlesOne($id);
  $hasPost = $article !== null;

  if($hasPost){
    $menu = template('articles/v_message_menu');
    $content = template('articles/v_article', [
      'article' => $article
    ]);

    $pageTitle = $article['title'];
    $pageContent = template('base/v_con2col', [
      'left' => $menu,
      'content' => $content,
      'title' => $pageTitle
    ]);
  }
  else{
    header('HTTP/1.1 404 Not Found');
    $pageContent = template('errors/v_404');
  }
