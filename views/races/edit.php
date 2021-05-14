<?php if ($race): ?>
    <section>
        <form action="/races/update" method="post">
            <input readonly type="hidden" name="id" value="<?= $race->__get('id'); ?>">
            <br><label>Nom race :</label>
            <input type="text" name="nom" value="<?= $race->__get('nom'); ?>">


            <input type="submit" value="Mettre à jour" name="modifrace">
        </form>

    </section>

<?php endif; ?>