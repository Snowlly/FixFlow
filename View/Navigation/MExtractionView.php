<h1 class="titleManageur">Récapitulatif des demandes par gestionnaire</h1>

<form class="fromExcel" method="post" style="margin-bottom: 20px;">
    <button name="btnExcel"><img src="./View/assets/img/export.png">Exporter Excel</button>
</form>

<table border="1" cellpadding="10" cellspacing="0">
    <thead>
    <tr>
        <th>Gestionnaire</th>
        <?php foreach ($types as $type): ?>
            <th><?= htmlspecialchars($type) ?></th>
        <?php endforeach; ?>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($tableau as $gestionnaire => $colonnes): ?>
        <tr>
            <td><strong><?= htmlspecialchars($gestionnaire) ?></strong></td>
            <?php foreach ($types as $type): ?>
                <td><?= $colonnes[$type] ?></td>
            <?php endforeach; ?>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>
