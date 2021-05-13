<?php if ($personne): ?>
    <section>
        <form action="/personnes/update" method="post">
            <input readonly type="hidden" name="id" value="<?= $personne->__get('id'); ?>">
            <br><label>Nom</label>
            <input type="text" name="nom" value="<?= $personne->__get('nom'); ?>">
            <br><label>Prenom</label>
            <input type="text" name="prenom" value="<?= $personne->__get('prenom'); ?>">
            <br><label>Date de Naissance</label>
            <input type="date" name="date_naissance" value="<?= $personne->__get('date_naissance'); ?>">
            <br><label>Email</label>
            <input type="text" name="email" value="<?= $personne->__get('email'); ?>">
            <br><label>Telephone</label>
            <input type="number" name="tel" value="<?= $personne->__get('tel'); ?>">
            <input type="submit" value="Mettre à jour" name="modifpersonne">
        </form>
    </section>
<?php endif; ?>