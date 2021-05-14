<section>
    <form action="/animaux/store" method="post">
        <br><label>Nom</label>
        <input type="text" name="nom" required>
        <br><label>Sexe (M/F)</label>
        <select id="sexe" name="sexe" required>
            <option value="M">Male</option>
            <option value="F">Femelle</option>
        </select>
        <br><label>Strérilisé (O/N)</label>
        <select name="sterilise" id="sterilise" required>
            <option value="O">Oui</option>
            <option value="N">Non</option>
        </select>
        <br><label>Date de naissance</label>
        <input type="date" name="date_naissance" required>
        <br><label>Numero de puce</label>
        <input type="number" name="numero_puce" required>
        <br><label>Proprietaire</label>
        <select name="personne" id="personne" required>
            <?php foreach ($personnes as $personne): ; ?>
                <option type="text" name="personne_id"
                        value="<?= $personne->id; ?>"
                } ?><?= $personne->nom ?></option>
            <?php endforeach; ?>
        </select>
        <br><label>Race</label>
        <select name="race" id="race" required>
            <?php foreach ($races as $race): ; ?>
                <option type="text" name="race_id"
                        value="<?= $race->id; ?>"
                } ?><?= $race->nom ?></option>
            <?php endforeach; ?>
        </select>
        <br><label>Vaccins</label>
        <select name="vaccins[]" id="vaccins" multiple>
            <?php foreach ($vaccins as $vaccin): ; ?>
                <option type="text" name="vaccin_id"
                        value="<?= $vaccin->id; ?>"
                } ?><?= $vaccin->nom ?></option>
            <?php endforeach; ?>
        </select>
        <input type="hidden" name="id" value="<?= $id=0; ?>">
        <input type="submit" value="AJOUTER" name="addanimal">
    </form>
</section>

