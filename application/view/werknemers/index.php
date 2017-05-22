<div class="container">
    <div class="box">
        <h3>Voeg een werknemer toe</h3>
        <form action="<?php echo URL; ?>werknemers/addWerknemer" method="POST">
            <label>Id</label>
            <input type="number" name="id" value="" required />
            <label>Naam</label>
            <input type="text" name="naam" value="" required />
            <label>Uren</label>
            <input type="number" name="uren" value="" required />
            <label>Evenementen</label>
            <input type="text" name="evenementen" value="" />
            <input type="submit" name="submit_add_werknemer" value="Toevoegen" />
        </form>
    </div>

    <div class="box">
        <h3>Werknemers</h3>
        <table style="width: 100%;">
            <thead style="background-color: #ddd; font-weight: bold;">
            <tr>
                <td>Id</td>
                <td>Naam</td>
                <td>Uren gewerkt</td>
                <td>Gekoppelde evenementen</td>
                <td>VERWIJDEREN</td>
                <td>WIJZIGGEN</td>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($werknemers as $werknemer) { ?>
                <tr>
                    <td><?php if (isset($werknemer->id)) echo htmlspecialchars($werknemer->id, ENT_QUOTES, 'UTF-8'); ?></td>
                    <td><?php if (isset($werknemer->naam)) echo htmlspecialchars($werknemer->naam, ENT_QUOTES, 'UTF-8'); ?></td>
                    <td><?php if (isset($werknemer->uren)) echo htmlspecialchars($werknemer->uren, ENT_QUOTES, 'UTF-8'); ?></td>
                    <td><?php if (isset($werknemer->evenementen)) echo htmlspecialchars($werknemer->evenementen, ENT_QUOTES, 'UTF-8'); ?></td>
                    <td><a href="<?php echo URL . 'werknemers/deleteWerknemer/' . htmlspecialchars($werknemer->id, ENT_QUOTES, 'UTF-8'); ?>">verwijderen</a></td>
                    <td><a href="<?php echo URL . 'werknemers/editWerknemer/' . htmlspecialchars($werknemer->id, ENT_QUOTES, 'UTF-8'); ?>">wijziggen</a></td>
                </tr>
            <?php } ?>
            </tbody>
        </table>
    </div>
</div>