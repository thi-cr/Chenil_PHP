<section class="big-container">
    <section id="erreur">
        <?php if (isset($error)) {
            echo $error;
        }; ?>
    </section>
    <section id="animaux-list">
        <?php if (!empty($animaux)): ?>
            <section id="animaux-list">
                <table>
                    <thead>
                    <th>Nom</th>
                    <th>Sexe</th>
                    <th>Sterilise</th>
                    <th>Date de naissance</th>
                    <th>Numero Puce</th>
                    <th>Nom Proprietaire</th>
                    <th>Prenom Proprietaire</th>
                    </thead>
                    <tbody>
                    <?php foreach ($animaux as $animal): ?>
                        <tr>
                            <td hidden><?= $animal->__get('id'); ?></td>
                            <td><?= $animal->__get('nom'); ?></td>
                            <td><?= $animal->__get('sexe'); ?></td>
                            <td><?= $animal->__get('sterilise'); ?></td>
                            <td><?= $animal->__get('date_naissance'); ?></td>
                            <td><?= $animal->__get('numero_puce'); ?></td>
                            <td><?= $animal->race_id->__get('nom'); ?></td>
                            <td><?= $animal->proprietaire_id->__get('nom'); ?></td>
                            <td><?= $animal->proprietaire_id->__get('prenom'); ?></td>
                            <td><a href="/animaux/show/<?= $animal->id; ?>">VOIR</a></td>
                            <td><a href="/animaux/edit/<?= $animal->id; ?>">EDIT</a></td>
                            <td>
                                <form method="post" class="deleteForm" action="/animaux/delete">
                                    <input type="hidden" name="id" class="deleteId" value="<?= $animal->id; ?>">
                                    <input type="submit" value="Supprimer" name="delete">
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
                <td><a href="/animaux/add">AJOUTER</a></td>
            </section>
        <?php endif; ?>
    </section>
</section>
