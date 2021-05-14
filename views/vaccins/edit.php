<?php if ($vaccin): ?>
    <section>
        <form action="/vaccins/update" method="post">
            <input readonly type="hidden" name="id" value="<?= $vaccin->__get('id'); ?>">
            <br><label>Nom vaccin :</label>
            <input type="text" name="nom" value="<?= $vaccin->__get('nom'); ?>" required>
            <input type="text" name="description" value="<?= $vaccin->__get('description'); ?>">
            <select name="espece" id="espece" required>
                <?php foreach ($especes as $espece): ; ?>
                    <option type="text" name="espece_id"
                            value="<?= $espece->id; ?>"
                        <?php if ($vaccin->espece_id->id == $espece->id) {echo 'selected';}?>><?= $espece->nom ?></option>
                <?php endforeach; ?>
            </select>
            <input type="submit" value="Mettre à jour" name="modifvaccin">
        </form>

    </section>

<?php endif; ?>