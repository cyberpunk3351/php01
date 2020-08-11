<?php

	function articlesAll() : array{
		$sql = "SELECT * FROM articles ORDER BY dt_add DESC";
		$query = dbQuery($sql);
		return $query->fetchAll();
	}

	function articlesOne(int $id) : ?array{
		$sql = "SELECT * FROM articles WHERE id_articles=:id";
		$query = dbQuery($sql, ['id' => $id]);
		$res = $query->fetch();
		return $res === false ? null: $res;
	}

	function articlesAdd(array $fields) : bool{
		$sql = "INSERT articles (title, content) VALUES (:title, :content)";
		dbQuery($sql, $fields);
		return true;
	}

	function articlesEdit(int $id, array $fields) : bool{
		$sql = "UPDATE articles SET title = :title, content = :content WHERE id_articles = :id";
		dbQuery($sql, $fields);
		return true;
	}

	function articlesDelete (int $id_articles) : bool {
		$sql = "DELETE FROM articles where id_articles=:id_articles";
		dbQuery($sql, ['id_articles' => $id_articles]);
		return true;
	}

	function articlesValidate (array &$fields) : array {
		$errors = [];
		$textLen = mb_strlen($fields['content'], 'UTF-8');

		if(mb_strlen($fields['title'], 'UTF-8') < 2){
			$errors[] = 'Имя не короче 2-ух символов!';
		}

		
		if($textLen < 10 || $textLen > 140){
			$errors[] = 'Текст от 10 до 140 символов!';
		}
		$fields['title'] = htmlspecialchars($fields['title']);
		$fields['content'] = htmlspecialchars($fields['content']);
		return $errors;
	}

	function correctId(string $id): bool {
		return (bool)preg_match('/^[1-9][0-9]*$/', $id);
	}