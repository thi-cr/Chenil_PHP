<?php if (!empty($races)): ?>

    <section id="races-list">
        <table>
            <thead>
            <th>Nom race</th>
            <th>Nom espece</th>
            </thead>
            <tbody>
            <?php foreach ($races as $race): ?>
                <tr>
                    <td hidden><?= $race->__get('id'); ?></td>
                    <td><?= $race->__get('nom'); ?></td>
                    <td><?= $race->espece_id->__get('nom'); ?></td>
                    <td><a href="/races/edit/<?= $race->id; ?>">EDIT</a></td>

                    <td>
                        <form method="post" action="/races/delete">
                            <input type="hidden" name="id" value="<?= $race->id; ?>">
                            <input type="submit" value="Supprimer" name="delete">
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
        <td><a href="/races/add">AJOUTER</a></td>

    </section>


<?php endif; ?>