<div class="container">
<div>
    <h3>Wijzig een evenement</h3>
    <form action="<?php echo URL; ?>evenementenbeheer/updateEvenement" method="POST">
        <label>Naam</label>
        <input autofocus type="text" name="naam" value="<?php echo htmlspecialchars($evenement->naam, ENT_QUOTES, 'UTF-8'); ?>" required />
        <label>Datum</label>
        <input type="date" name="datum" value="<?php echo htmlspecialchars($evenement->datum, ENT_QUOTES, 'UTF-8'); ?>" required />
        <label>Werknemers</label>
        <input type="text" name="werknemers" value="<?php echo htmlspecialchars($evenement->werknemers, ENT_QUOTES, 'UTF-8'); ?>" />
        <label>Beschrijving</label>
        <input type="text" name="beschrijving" value="<?php echo htmlspecialchars($evenement->beschrijving, ENT_QUOTES, 'UTF-8'); ?>" />
        <input type="hidden" name="evenement_id" value="<?php echo htmlspecialchars($evenement->id, ENT_QUOTES, 'UTF-8'); ?>" />
        <input type="submit" name="submit_update_evenement" value="Wijziggen" />
    </form>
</div>
</div>