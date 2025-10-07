<html lang="fr">

    <form class="FormGC" method="post">
        <div class="column div2">
            <label>Nom du client :</label>
            <input name="nomclient" type="text">
        </div>
        <div class="row divFieldSet">
            <fieldset>
                <legend>Type de demande</legend>

                <div>
                    <input type="radio" id="creationMTT" name="type" value="Création MoulineTT" checked />
                    <label for="creationMTT">Création MoulineTT</label>
                </div>

                <div>
                    <input type="radio" id="depannageMTT" name="type" value="Dépannage MoulineTT" />
                    <label for="depannageMTT">Dépannage MoulineTT</label>
                </div>

                <div>
                    <input type="radio" id="pixid" name="type" value="Pixid" />
                    <label for="pixid">Pixid</label>
                </div>

                <div>
                    <input type="radio" id="rubCentral" name="type" value="Rubrique Centrale" />
                    <label for="rubCentral">Rubrique Centrale</label>
                </div>

                <div>
                    <input type="radio" id="autre" name="type" value="Autre" />
                    <label for="autre">Autre</label>
                </div>
            </fieldset>

            <fieldset>
                <legend>Niveau d'urgence</legend>

                <div>
                    <input type="radio" id="elevee" name="niveau" value="Élevé" checked />
                    <label class="labelElevee" for="elevee">Élevé</label>
                </div>

                <div>
                    <input type="radio" id="attendre" name="niveau" value="Peut attendre 24/48h" />
                    <label class="labelAttendre" for="attendre">Peut attendre 24/48h</label>
                </div>

                <div>
                    <input type="radio" id="semainepro" name="niveau" value="Semaine prochaine" />
                    <label class="labelSemainePro" for="semainepro">Semaine prochaine</label>
                </div>

                <div>
                    <input type="radio" id="cloture" name="niveau" value="Après Clôture" />
                    <label class="labelCloture" for="cloture">Après Clôture</label>
                </div>
            </fieldset>

            <div class="column">
                <div class="column div1">
                    <label>Code Agence :</label>
                    <input name="agence" type="text">
                </div>

                <div class="column div3">
                    <label>Code client Déclic :</label>
                    <input name="client" type="text">
                </div>
            </div>
        </div>


        <div class="row divParent">

            <div class="column div4">
                <label>Commentaire :</label>
                <textarea name="commentaire" placeholder="Merci de détailler votre demande en précisant le numéro du relevé d'heure concerné..." required></textarea>
            </div>
        </div>

        <button name="BtnEnvoyerDemande">Envoyer la demande</button>

    </form>

</html>
