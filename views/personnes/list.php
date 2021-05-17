<section class="big-container">
    <section id="erreur">
        <?php if (isset($error)) {
            echo $error;
        }; ?>
    </section>
    <section id="personnes-list">
        <?php if (!empty($personnes)): ?>
            <section id="personne-list">
                <table>
                    <thead>
                    <th>Nom</th>
                    <th>Prenom</th>
                    <th>Date de naissance</th>
                    <th>Email</th>
                    <th>Telephone</th>
                    </thead>
                    <tbody>
                    <?php foreach ($personnes as $personne): ?>
                        <tr>
                            <td hidden><?= $personne->__get('id'); ?></td>
                            <td><?= $personne->__get('nom'); ?></td>
                            <td><?= $personne->__get('prenom'); ?></td>
                            <td><?= $personne->__get('date_naissance'); ?></td>
                            <td><?= $personne->__get('email'); ?></td>
                            <td><?= $personne->__get('tel'); ?></td>
                            <td><a href="/personnes/show/<?= $personne->id; ?>">VOIR</a></td>
                            <td><a href="/personnes/edit/<?= $personne->id; ?>">EDIT</a></td>
                            <td>
                                <form method="post" class="deleteForm" action="/personnes/delete">
                                    <input type="hidden" name="id" class="deleteId" value="<?= $personne->id; ?>">
                                    <input type="submit" value="Supprimer" name="delete">
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
                <td><a href="/personnes/add">AJOUTER</a></td>
            </section>
        <?php endif; ?>
    </section>
</section>
