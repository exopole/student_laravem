<h1> Title : 
<?php 

if (!empty($post)) : 
	?>

	<?php echo $post['title'] ; ?> </h1>
	<img src="<?php echo url('images', $post->thumbnail) ?>" ; >


<?php else : ?>
Unknow

<?php endif;?>

<article>
	Ici est le premier article. Tonnerre de Brest !!!
</article>