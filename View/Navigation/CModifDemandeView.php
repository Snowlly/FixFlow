<html lang="fr">

<?php
while ($row = $Demande->fetch()) {

    echo "<form class='FormGC' method='post'>
    <div class='column div2'>
        <label>Nom du client :</label>
        <input name='nomclient' type='text' value='{$row['Client']}'>
    </div>
    <div class='row divFieldSet'>
        <fieldset>
            <legend>Type de demande</legend>

            <select name='type'>
                <option value='{$row['Type']}'>{$row['Type']}</option>
                <option value='Création MoulineTT'>Création de MoulineTT</option>
                <option value='Dépannage MoulineTT'>Dépannage de MoulineTT</option>
                <option value='Pixid'>Pixid</option>
                <option value='Rubrique Central'>Rubrique Central</option>
                <option value='Autre'>Autre</option>
            </select>
            
        </fieldset>
        
        <fieldset>
            <legend>Niveau d'urgence</legend>
            <select name='niveau'>
                    <option value='{$row['Niveau']}'>{$row['Niveau']}</option>
                    <option value='Élevé'>Élevé</option>
                    <option value='Peut attendre 24/48h'>Peut attendre 24/48h</option>
                    <option value='Semaine prochaine'>Semaine prochaine</option>
                    <option value='Après Clôture'>Après Clôture</option>
            </select>
        </fieldset>
        
        </div>
            
        <div class='column'>
            <div class='column div1'>
                <label>Code Agence :</label>
                <input name='agence' type='text' value='{$row['NumAgence']}'>
            </div>

            <div class='column div3'>
                <label>Code client Déclic :</label>
                <input name='client' type='text' value='{$row['NumClient']}'>
            </div>
        </div>
            
        <div class='row divParent'>

            <div class='column div4'>
                <label>Commentaire :</label>
                <textarea name='commentaire'>{$row['Commentaire']}</textarea>
            </div>
        </div>

        <button name='button_Demande'>Envoyer la demande</button>    

           

</form>";
}
?>



</html>
