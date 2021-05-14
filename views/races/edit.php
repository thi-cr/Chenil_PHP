<?php if ($race): ?>
    <section>
        <form action="/races/update" method="post">
            <input readonly type="hidden" name="id" value="<?= $race->__get('id'); ?>">
            <br><label>Nom race :</label>
            <input type="text" name="nom" value="<?= $race->__get('nom'); ?>" required>
            <select name="espece" id="espece" required>
                <?php foreach ($especes as $espece): ; ?>
                    <option type="text" name="espece"
                            value="<?= $espece->id; ?>"
                            <?php if ($race->espece_id->id == $espece->id) {echo 'selected';}?>><?= $espece->nom ?></option>
                <?php endforeach; ?>
            </select>

            <input type="submit" value="Mettre à jour" name="modifrace">
        </form>

    </section>

<?php endif; ?>