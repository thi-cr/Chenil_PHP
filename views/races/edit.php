<?php if ($race): ?>
    <section>
        <form action="/races/update" method="post">
            <input readonly type="hidden" name="id" value="<?= $race->__get('id'); ?>">
            <br><label>Nom race :</label>
            <input type="text" name="nom" value="<?= $race->__get('nom'); ?>">
            <select name="espece" id="espece">
                <?php foreach ($especes as $espece): ; ?>
                    <option type="text" name="espece"
                            value="<?= $espece->id; ?>"
                            } ?><?= $espece->nom ?></option>
                <?php endforeach; ?>
            </select>

            <input type="submit" value="Mettre à jour" name="modifrace">
        </form>

    </section>

<?php endif; ?>