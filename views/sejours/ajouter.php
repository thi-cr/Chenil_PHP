<section>
    <form action="/sejours/store" method="post">
        <br><label>Date Debut</label>
        <input type="date" name="date_debut">
        <br><label>Date Fin</label>
        <input type="date" name="date_fin">
        <select name="animal" id="animal">
            <?php foreach ($animaux as $animal): ; ?>
                <option type="text" name="animal_id"
                        value="<?= $animal->id; ?>"
                ><?= $animal->nom ?></option>
            <?php endforeach; ?>
        </select>
        <input type="hidden" name="id" value="<?= $id = 0; ?>">
        <input type="submit" value="AJOUTER" name="addanimal">
    </form>
</section>