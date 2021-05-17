<section class="big-container">
    <section id="erreur">
        <?php if (isset($error)) {
            echo $error;
        }; ?>
    </section>
    <section id="races-list">
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
                                <form method="post" class="deleteForm" action="/races/delete">
                                    <input type="hidden" class="deleteId" name="id" value="<?= $race->id; ?>">
                                    <input type="submit" value="Supprimer" name="delete">
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
            </section>
        <?php endif; ?>
        <td><a href="/races/add">AJOUTER</a></td>
    </section>
</section>
