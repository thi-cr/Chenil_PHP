<section>
    <form action="/vaccins/store" method="post">
        <br><label>Nom :</label>
        <input type="text" name="nom" required>
        <br><label>Description :</label>
        <input type="text" name="description">
        <select name="espece" id="espece" required>
            <?php foreach ($especes as $espece): ; ?>
                <option type="text" name="espece"
                        value="<?= $espece->id; ?>"
                        } ?><?= $espece->nom ?></option>
            <?php endforeach; ?>
        </select>


        <input type="hidden" name="id" value="<?= $id=0; ?>">
        <input type="submit" value="AJOUTER" name="addvaccin">
    </form>
</section>