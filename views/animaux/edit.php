<?php if ($animal): ?>
    <section>
        <form action="/animaux/update" method="post">
            <input readonly type="hidden" name="id" value="<?= $animal->__get('id'); ?>">
            <br><label>Nom</label>
            <input type="text" name="nom" value="<?= $animal->__get('nom'); ?>" required>
            <br><label>Sexe</label>
            <select id="sexe" name="sexe" required>
                <option value="M" <?php if ($animal->__get('sexe') == 'M') {echo  'selected';} ?>>Male</option>
                <option value="F" <?php if ($animal->__get('sexe') == 'F') {echo  'selected';} ?>>Femelle</option>
            </select>
            <br><label>Strérilisé</label>
            <select name="sterilise" id="sterilise" required>
                <option value="O" <?php if ($animal->__get('sterilise') == 'O') {echo  'selected';} ?>>Oui</option>
                <option value="N" <?php if ($animal->__get('sterilise') == 'N') {echo  'selected';} ?>>Non</option>
            </select>
            <br><label>Date de naissance</label>
            <input type="date" name="date_naissance" value="<?= $animal->__get('date_naissance'); ?>" required>
            <br><label>Numero de puce</label>
            <input type="number" name="numero_puce" value="<?= $animal->__get('numero_puce'); ?>" required>
            <br><label>Proprietaire</label>
            <select name="personne" id="personne" required>
                <?php foreach ($personnes as $personne): ; ?>
                    <option type="number" name="personne_id" value="<?= $personne->id; ?>" <?php if ($animal->proprietaire_id->id == $personne->id){ echo "selected";}?>><?= $personne->nom ?></option>
                <?php endforeach; ?>
            </select>
            <label>Race</label><br>
            <select name="race" id="race" required>
                <?php foreach ($races as $race): ; ?>
                    <option type="number" name="race_id" value="<?= $race->id; ?>" <?php if ($animal->race_id->id == $race->id){ echo "selected";}?>><?= $race->nom ?></option>
                <?php endforeach; ?>
            </select>
            <label>Vaccins</label><br>
            <select name="vaccins[]" id="vaccins" multiple>
                <?php foreach ($vaccins as $vaccin): ; ?>
                    <option type="number" name="vaccin_id"
                            value="<?= $vaccin->id; ?>" <?php if ($animal->vaccins && $animal->has_vaccin($vaccin->id)) {
                        echo "selected";
                    } ?>><?= $vaccin->nom ?></option>
                <?php endforeach; ?>
            </select>
            <input type="submit" value="Mettre à jour" name="modifanimal">
        </form>
    </section>
<?php endif; ?>