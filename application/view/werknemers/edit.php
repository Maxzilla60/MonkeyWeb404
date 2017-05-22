<div class="container">
    <div>
        <h3>Wijzig een werknemer</h3>
        <form action="<?php echo URL; ?>werknemers/updateWerknemer" method="POST">
            <label>Naam</label>
            <input autofocus type="text" name="naam" value="<?php echo htmlspecialchars($werknemer->naam, ENT_QUOTES, 'UTF-8'); ?>" required />
            <label>Uren gewerkt</label>
            <input type="number" name="uren" value="<?php echo htmlspecialchars($werknemer->uren, ENT_QUOTES, 'UTF-8'); ?>" required />
            <label>Evenementen</label>
            <input type="text" name="evenementen" value="<?php echo htmlspecialchars($werknemer->evenementen, ENT_QUOTES, 'UTF-8'); ?>" />
            <input type="hidden" name="werknemer_id" value="<?php echo htmlspecialchars($werknemer->id, ENT_QUOTES, 'UTF-8'); ?>" />
            <input type="submit" name="submit_update_werknemer" value="Wijziggen" />
        </form>
    </div>
</div>