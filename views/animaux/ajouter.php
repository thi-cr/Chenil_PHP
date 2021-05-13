<section>
    <form action="/animaux/store" method="post">
        <br><label>Nom</label>
        <input type="text" name="nom" >
        <br><label>Sexe</label>
        <input type="text" name="sexe" >
        <br><label>Strérilisé</label>
        <input type="text" name="sterilise" ">
        <br><label>Date de naissance</label>
        <input type="date" name="date_naissance" ">
        <br><label>Numero de puce</label>
        <input type="number" name="numero_puce" ">
        <br><label>Proprietaire</label>
        <select name="personne" id="personne">
            <?php foreach ($personnes as $personne): ; ?>
                <option type="text" name="personne_id"
                        value="<?= $personne->id; ?>"
                } ?><?= $personne->nom ?></option>
            <?php endforeach; ?>
        </select>
        <br><label>Race</label>
        <select name="race" id="race">
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

