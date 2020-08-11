<?php 

  return (function(){
    $intGT0 = '[1-9]+\d*';
    $normUrl = '[0-9aA-zZ_-]+';

    return [
      [
        'test' => '/^$/',
        'controller' => 'articles/all'
      ],
      [
        'test' => '/^add\/?$/',
        'controller' => 'articles/add'
      ],
      [
        'test' => '/^contacts\/?$/',
        'controller' => 'contacts'
      ],
      [
        'test' => "/^article\/($intGT0)\/?$/",
        'controller' => 'articles/one',
        'params' => ['id' => 1]
      ],
      [
        'test' => "/^auth\/login\/?$/",
        'controller' => 'auth/login'
      ]
    ];
  })();