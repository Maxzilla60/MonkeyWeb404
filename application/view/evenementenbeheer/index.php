<div class="container">
<div class="box">
    <h3>Voeg een evenement toe</h3>
    <form action="<?php echo URL; ?>evenementenbeheer/addEvenement" method="POST">
        <label>Id</label>
        <input type="number" name="id" value="" required />
        <label>Naam</label>
        <input type="text" name="naam" value="" required />
        <label>Datum</label>
        <input type="date" name="datum" value="" required />
        <label>Werknemers</label>
        <input type="text" name="werknemers" value="" />
        <label>Beschrijving</label>
        <input type="text" class="beschrijving" name="beschrijving" value="" />
        <input type="submit" name="submit_add_evenement" value="Toevoegen" />
    </form>
</div>

<div class="box">
    <h3>Evenementen</h3>
    <table style="width: 100%;">
        <thead style="background-color: #ddd; font-weight: bold;">
        <tr>
            <td>Id</td>
            <td>Naam</td>
            <td>Datum</td>
            <td>Werknemers</td>
            <td>Beschrijving</td>
            <td>VERWIJDEREN</td>
            <td>WIJZIGGEN</td>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($evenementen as $evenement) { ?>
            <tr>
                <td><?php if (isset($evenement->id)) echo htmlspecialchars($evenement->id, ENT_QUOTES, 'UTF-8'); ?></td>
                <td><?php if (isset($evenement->naam)) echo htmlspecialchars($evenement->naam, ENT_QUOTES, 'UTF-8'); ?></td>
                <td><?php if (isset($evenement->datum)) echo htmlspecialchars($evenement->datum, ENT_QUOTES, 'UTF-8'); ?></td>
                <td><?php if (isset($evenement->werknemers)) echo htmlspecialchars($evenement->werknemers, ENT_QUOTES, 'UTF-8'); ?></td>
                <td><?php if (isset($evenement->beschrijving)) echo htmlspecialchars($evenement->beschrijving, ENT_QUOTES, 'UTF-8'); ?></td>
                <td><a href="<?php echo URL . 'evenementenbeheer/deleteEvenement/' . htmlspecialchars($evenement->id, ENT_QUOTES, 'UTF-8'); ?>">verwijderen</a></td>
                <td><a href="<?php echo URL . 'evenementenbeheer/editEvenement/' . htmlspecialchars($evenement->id, ENT_QUOTES, 'UTF-8'); ?>">wijziggen</a></td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
</div>
</div>