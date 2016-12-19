<!DOCTYPE html>
<html>
<head>
	<title>Laravel</title>
</head>
<body>

<header>
<?php 
if (!empty($categories)):?>
	<ul>
	<?php foreach ($categories as $category) :?>
		<li><a href="<?php echo url('category',$category['id']);?>"><?php echo $category->title;?></a></li>
	<?php endforeach;?>
	</ul>
<?php endif;?>
</header>
<h1>Postes</h1>
<?php 
if (!empty($posts)) : 
	?>
	<ul>
	<?php foreach ($posts as $key ): ?>
    	<li>
    	<a href="<?php echo url('post',$key['id']);?>"><?php echo $key->title ;?></a>
    		<img src="<?php echo url('images', $key->thumbnail) ?>" ; >
    		<p> <?php echo ($key->category) ? $key->category->title: 'non categorisé';?> </p>
    	</li>
    	<?php endforeach; ?> 
    </ul>
<?php else : ?>
<p>Désolé pas d'article</p>

<?php endif;

if (!empty($students)) :
	?>
	<ul>
	<?php foreach ($students as $key ) : ?>
    	<li>
    	<a href="<?php echo url('students',$key['id'])?>"><?php echo $key->name ?></a>
    	</li>
    	<?php endforeach;	?> 
    </ul>
<?php else : ?>
<p>Désolé pas d'étudiants</p>

<?php endif;?>
</body>
</html>