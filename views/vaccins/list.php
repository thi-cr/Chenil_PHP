<?php if (!empty($vaccins)): ?>

    <section id="vaccins-list">
        <table>
            <thead>
            <th>Nom vaccin</th>
            <th>Description</th>
            <th>Nom espece</th>
            </thead>
            <tbody>
            <?php foreach ($vaccins as $vaccin): ?>
                <tr>
                    <td hidden><?= $vaccin->__get('id'); ?></td>
                    <td><?= $vaccin->__get('nom'); ?></td>
                    <td><?= $vaccin->__get('description'); ?></td>
                    <td><?= $vaccin->espece_id->__get('nom'); ?></td>
                    <td><a href="/vaccins/edit/<?= $vaccin->id; ?>">EDIT</a></td>

                    <td>
                        <form method="post" action="/vaccins/delete">
                            <input type="hidden" name="id" value="<?= $vaccin->id; ?>">
                            <input type="submit" value="Supprimer" name="delete">
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
        <td><a href="/vaccins/add">AJOUTER</a></td>

    </section>


<?php endif; ?>