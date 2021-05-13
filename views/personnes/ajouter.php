<section>
    <form action="/personnes/store" method="post">
        <br><label>Nom</label>
        <input type="text" name="nom" >
        <br><label>Prenom</label>
        <input type="text" name="prenom" >
        <br><label>Date de naissance</label>
        <input type="Date" name="date_naissance">
        <br><label>Email</label>
        <input type="text" name="email">
        <br><label>Telephone</label>
        <input type="number" name="tel">
        <input type="hidden" name="id" value="<?= $id=0; ?>">
        <input type="submit" value="AJOUTER" name="addpersonne">
    </form>
</section>
