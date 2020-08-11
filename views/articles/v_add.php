<div class="form">
	<form method="post">
		Name:<br>
		<input type="text" name="title" value="<?=$fields['title']?>"><br>
		Text:<br>
		<textarea name="content"><?=$fields['content']?></textarea><br>
		<button>Send</button>
		<div class="errors">
		<? foreach($validateErrors as $error): ?>
			<p><?=$error?></p>
		<? endforeach; ?> 
		</div>
		
	</form>
</div>