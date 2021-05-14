<?php if (!empty($especes)): ?>

    <section id="espece-list">
        <table>
            <thead>
            <th>Espèce</th>
            </thead>

        <tbody>
        <?php foreach ($especes as $espece): ?>
            <tr>
                <td hidden<?= $espece->__get('id'); ?></td>
                <td><?= $espece->__get('nom'); ?></td>

                <td><a href="/especes/show/<?= $espece->id; ?>">VOIR</a></td>
                <td><a href="/especes/edit/<?= $espece->id; ?>">EDIT</a></td>
                <td>
                    <form method="post" action="/especes/delete">
                        <input type="hidden" name="id" value="<?= $espece->id; ?>">
                        <input type="submit" value="Supprimer" name="delete">
                    </form>
                </td>

            </tr>
        <?php endforeach; ?>
        </tbody>
        </table>
        <td><a href="/especes/add">AJOUTER</a></td>
    </section>


<?php endif; ?>
