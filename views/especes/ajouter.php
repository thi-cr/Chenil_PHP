<section>
    <form action="/especes/store" method="post">
        <br><label>Nom</label>
        <input type="text" name="nom" required>

        <input type="hidden" name="id" value="<?= $id = 0; ?>">
        <input type="submit" value="AJOUTER" name="addespece">
</section>
