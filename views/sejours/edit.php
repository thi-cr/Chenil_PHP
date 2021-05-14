<?php if ($sejour): ?>
<section>
    <form action="/sejours/update" method="post">
        <input readonly type="hidden" name="id" value="<?= $sejour->__get('id'); ?>">
        <br><label>Date Debut</label>
        <input type="date" name="date_debut" value="<?= $sejour->__get('date_debut'); ?>" required>
        <br><label>Date Fin</label>
        <input type="date" name="date_fin" value="<?= $sejour->__get('date_fin'); ?>" required>
        <select name="animal" id="animal" required>
            <?php foreach ($animaux as $animal): ; ?>
                <option type="text" name="animal_id"
                        value="<?= $animal->id; ?>" <?php if ($sejour->animal_id->__get('id') == $animal->id){ echo 'selected'; } ?>
                ><?= $animal->nom ?></option>
            <?php endforeach; ?>
        </select>
        <input type="submit" value="mettre a jour" name="updatesejour">
    </form>
</section>
<?php endif?>