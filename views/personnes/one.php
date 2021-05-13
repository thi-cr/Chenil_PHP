<h1><?= $personne->nom ?></h1>
<img src="<?= $personne->image ?>">

<h2>Animaux</h2>
<?php if ($personne->animaux) :
    foreach($personne->animaux as $animal): ?>
        <h3><?= $animal->nom ?></h3>
    <?php endforeach; ?>
<?php else: ?>
    <h3><?= $personne->nom ?> n'a pas d'animaux</h3>
<?php endif; ?>
<a href="/personnes/index">Liste</a>
