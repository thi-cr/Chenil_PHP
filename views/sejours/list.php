<?php if (!empty($sejours)): ?>
    <section id="sejour-list">
        <table>
            <thead>
            <th>Date Debut</th>
            <th>Date Fin</th>
            <th>Animal</th>
            </thead>
            <tbody>
            <?php foreach ($sejours as $sejour): ?>
                <tr>
                    <td hidden><?= $sejour->__get('id'); ?></td>
                    <td><?= $sejour->__get('date_debut'); ?></td>
                    <td><?= $sejour->__get('date_fin'); ?></td>
                    <td><?= $sejour->animal_id->__get('nom'); ?></td>
                    <td><a href="/sejours/edit/<?= $sejour->id; ?>">EDIT</a></td>
                    <td>
                        <form method="post" action="/sejours/delete">
                            <input type="hidden" name="id" value="<?= $sejour->id; ?>">
                            <input type="submit" value="Supprimer" name="delete">
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </section>
<?php endif; ?>
<td><a href="/sejours/add">AJOUTER</a></td>
