<?php if (!empty($animaux)): ?>
    <section id="animal-list">
        <table>
            <?php foreach ($animaux as $animal): ?>
                <tr>
                    <?php var_dump($animal) ?>
                    <td><?= $animal->__get('id'); ?></td>
                    <td><?= $animal->__get('nom'); ?></td>
                    <td><?= $animal->__get('sexe'); ?></td>
                    <td><?= $animal->__get('sterilise'); ?></td>
                    <td><?= $animal->__get('date_naissance'); ?></td>
                    <td><?= $animal->__get('numero_puce'); ?></td>
                    <td><?= $animal->race_id->__get('nom'); ?></td>
                    <td><?= $animal->proprietaire_id->__get('nom'); ?></td>
                    <td><?= $animal->proprietaire_id->__get('prenom'); ?></td>
                    <td><a href="/animaux/show/<?= $animal->id; ?>">VOIR</a></td>
                    <td><a href="/animaux/delete/<?= json_encode($animal, JSON_FORCE_OBJECT);?>">SUPPRIMER</a></td>
                </tr>
            <?php endforeach; ?>
        </table>
    </section>
<?php endif; ?>
