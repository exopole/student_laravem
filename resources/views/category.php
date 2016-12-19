<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<h1><?php echo $title;?></h1>
	<h2>Listes des postes : </h2>
	<ul>
	<?php foreach ($posts as $post) :?>
		<li><?php echo $post->title; ?></li>
	<?php endforeach; ?>
	
		
	
	</ul>
</body>
</html>