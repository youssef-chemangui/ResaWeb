
<?= session()->getFlashdata('error') ?>
<h2><?php echo $titre; ?></h2>
<?php
//...
// Création d’un formulaire qui pointe vers l’URL de base + /compte/creer
echo form_open_multipart('/compte/creer'); ?>
 <?= csrf_field() ?>
 <label for="pseudo">Pseudo : </label>
 <input type="input" name="pseudo">
 <?= validation_show_error('pseudo') ?>
 <label for="mdp">Mot de passe : </label>
 <input type="password" name="mdp">
 <?= validation_show_error('mdp') ?>
 <label for="fichier">Image pour le profil : </label>
 <input type="file" name="fichier">
 <input type="submit" name="submit" value="Créer un nouveau compte">
</form>

