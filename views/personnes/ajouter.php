<section>
    <form action="/personnes/store" method="post">
        <br><label>Nom</label>
        <input type="text" name="nom" required>
        <br><label>Prenom</label>
        <input type="text" name="prenom" required>
        <br><label>Date de naissance</label>
        <input type="Date" name="date_naissance" required>
        <br><label>Email</label>
        <input type="text" name="email" required>
        <br><label>Telephone</label>
        <input type="number" name="tel" required>
        <input type="hidden" name="id" value="<?= $id=0; ?>">
        <input type="submit" value="AJOUTER" name="addpersonne">
    </form>
</section>
