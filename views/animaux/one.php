<h1><?= $animal->nom ?></h1>
<img src="<?= $animal->image ?>">

<h2>vaccins</h2>
<?php if ($animal->vaccins) :
    foreach($animal->vaccins as $vaccin): ?>
        <h3><?= $vaccin->nom ?></h3>
    <?php endforeach; ?>
<?php else: ?>
    <h3><?= $animal->nom ?> n'a pas de vaccins</h3>
<?php endif; ?>
<h2>Propriétaire</h2>
    <h3><?= $animal->nom ?> appartient à <?= $animal->proprietaire_id->nom ?></h3>
<a href="/animaux/index">Liste</a>

