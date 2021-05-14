<?php if ($espece): ?>
    <section>
        <form action="/especes/update" method="post">
            <input readonly type="hidden" name="id" value="<?= $espece->__get('id'); ?>">
            <br><label>Nom :</label>
            <input type="text" name="nom" value="<?= $espece->__get('nom'); ?>">

            <input type="submit" value="Mettre à jour" name="modifespece">
        </form>

    </section>


<?php endif; ?>