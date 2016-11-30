<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php echo validation_errors(); ?>
<?php echo form_open('User/connexion'); ?>

Login:
<label for='login'></label>
<input placeholder="Votre Login/Votre adresse E-mail" required id="loginclient"  name="loginclient"></input>
<br>
Mot de Passe:
<label for='Mot de Passe'></label>
<input  placeholder="Votre mot de passe" required id="mdpclient" type="password" name="mdpclient"></input>
<br/>
<button name="valider" value="Connexion">Connexion</button>
<br/>
<br/>
