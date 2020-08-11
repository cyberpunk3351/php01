<?php
$articles = articlesAll();

$pageTitle = 'All Articles';
$pageContent = template('articles/v_index', [
  'articles' => $articles
]);