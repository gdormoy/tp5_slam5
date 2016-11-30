<h2> Créer un nouveau compte utilisateur </h2>

<?php echo validation_errors();?>

<?php echo form_open('User/inscription');?>
<div class="container">
<div class="form-horizontal">
    <fieldset>
        <legend>Informations personnelles</legend>
        <div class="form-group">
        	<label class="control-label col-sm-2" for="nomclient">Nom : </label>
            <div class="col-sm-2">
            	<input type="input" name="nomclient" id="nomclient" class="form-control" placeholder="Votre Nom" />
            </div>
        </div>
        <div class="form-group">
        	<label class="control-label col-sm-2" for="prenomclient">Prenom : </label>
            <div class="col-sm-2">
            	<input type="input" name="prenomclient" id="prenomclient" class="form-control" placeholder="Votre Prénom" />
            </div>
        </div>
        <div class="form-group">
        	<label class="control-label col-sm-2" for="adresseclient">Adresse : </label>
            <div class="col-sm-2">
            	<input type="input" name="adresseclient" id="adresseclient" class="form-control" placeholder="Votre Adresse" />
            </div>
        </div>
        <div class="form-group">
        	<label class="control-label col-sm-2" for="codepostal">Code Postal : </label>
            <div class="col-sm-2">
            	<input type="input" name="codepostal" id="codepostal" class="form-control" placeholder="77860" />
            </div>
        </div>
        <div class="form-group">
        	<label class="control-label col-sm-2" for="telclient">Téléphone : </label>
            <div class="col-sm-2">
            	<input type="input" name="telclient" id="telclient" class="form-control" placeholder="01 64 33 65 44" max="10"/>
            </div>
        </div>
    </fieldset>

    <fieldset>
    	<legend>Informations de connexion</legend>
    	<div class="form-group">
        	<label class="control-label col-sm-2" for="loginclient">Login : </label>
            <div class="col-sm-2">
            	<input type="input" name="loginclient" id="loginclient" class="form-control" placeholder="Votre Nom" />
            </div>
        </div>
        <div class="form-group">
        	<label class="control-label col-sm-2" for="mdpclient">Mot de Passe : </label>
            <div class="col-sm-2">
            	<input type="password" name="mdpclient" id="mdpclient" class="form-control" />
            </div>
        </div>
    </fieldset>
    <div class="form-group"> 
            <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-default">Valider</button>
            </div>
        </div>
    

<?php
        echo form_close();


?>
