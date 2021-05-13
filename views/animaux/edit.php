<?php if ($animal): ?>
    <section>
        <form action="/animaux/update" method="post">
            <input readonly type="hidden" name="id" value="<?= $animal->__get('id'); ?>">
            <br><label>Nom</label>
            <input type="text" name="nom" value="<?= $animal->__get('nom'); ?>">
            <br><label>Sexe</label>
            <input type="text" name="sexe" value="<?= $animal->__get('sexe'); ?>">
            <br><label>Strérilisé</label>
            <input type="text" name="sterilise" value="<?= $animal->__get('sterilise'); ?>">
            <br><label>Date de naissance</label>
            <input type="date" name="date_naissance" value="<?= $animal->__get('date_naissance'); ?>">
            <br><label>Numero de puce</label>
            <input type="number" name="numero_puce" value="<?= $animal->__get('numero_puce'); ?>">
            <br><label>Proprietaire</label>
            <select name="personne" id="personne">
                <?php foreach ($personnes as $personne): ; ?>
                    <option type="text" name="personne_id" value="<?= $personne->id; ?>" <?php if ($animal->proprietaire_id->id == $personne->id){ echo "selected";}?>><?= $personne->nom ?></option>
                <?php endforeach; ?>
            </select>
            <label>Race</label><br>
            <select name="race" id="race">
                <?php foreach ($races as $race): ; ?>
                    <option type="text" name="race_id" value="<?= $race->id; ?>" <?php if ($animal->race_id->id == $race->id){ echo "selected";}?>><?= $race->nom ?></option>
                <?php endforeach; ?>
            </select>
            <label>Vaccins</label><br>
            <select name="vaccins[]" id="vaccins" multiple>
                <?php foreach ($vaccins as $vaccin): ; ?>
                    <option type="text" name="vaccin_id"
                            value="<?= $vaccin->id; ?>" <?php if ($animal->vaccins && $animal->has_vaccin($vaccin->id)) {
                        echo "selected";
                    } ?>><?= $vaccin->nom ?></option>
                <?php endforeach; ?>
            </select>
            <input type="submit" value="Mettre à jour" name="modifanimal">
        </form>
    </section>
<?php endif; ?>