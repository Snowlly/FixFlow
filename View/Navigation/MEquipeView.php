<html lang="fr">

<h1 class="TitleUser">Ajouter un GD</h1>

<form class="FormInscription" method="post" align="center">

    <label>Votre Prénom</label><br>
    <input name="prenom" type="text" required><br><br>
    <label>Votre Nom</label><br>
    <input name="nom" type="text" required><br><br>
    <label>Votre Email</label><br>
    <input name="mail" type="email" required><br><br>
    <label>Saisir un mot de passe</label><br>
    <input name="mdp" type="password" minlength="4" required><br><br>
    <label>Confirmer le mot de passe</label><br>
    <input name="confirmMdp" type="password" minlength="4" required><br><br>
    <label>Zone</label><br>
    <select name="zone" required>
        <option value="38">CG38</option>
        <option value="59">CG59</option>
        <option value="36">UT36</option>
        <option value="50">CG50</option>
        <option value="34">CG34</option>
        <option value="41">CG41</option>
        <option value="51">CG51</option>
        <option value="97">CG97</option>
        <option value="48">CG48</option>
        <option value="15">CG15</option>
        <option value="11">CG11</option>
        <option value="43">CG43</option>
        <option value="52">CG52</option>
        <option value="22">CG22</option>
        <option value="29">CG29</option>
        <option value="23">CG23</option>
        <option value="24">CG24</option>
    </select>

    <button name="BtnNewAccount">Ajouter un GD</button>
</form>

</html>

