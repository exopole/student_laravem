<h1> Student : 
<?php if (!empty($student)) :?>

<?php echo $student['name'];?>
</h1>
email :  <?php echo $student['email'];?>
adresse : <?php echo $student['address'];?>
<?php else : ?>
Unknow

<?php endif;?>

<article>
	Ici est le premier article. Tonnerre de Brest !!!
</article>