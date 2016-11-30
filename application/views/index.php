<div class="container">
  <div class="container test">
    <?php echo validation_errors(); ?>
    <?php echo form_open('User/connexion'); ?>
      <div class="form-group row">
        <div class="col-xs-12">
          <label for="loginclient">Nom d'utilisateur :</label>
          <input placeholder="Votre Login" required id="loginclient"  name="loginclient" class="form-control input-sm"></input>
          <?php echo form_error('loginclient'); ?>
        </div>
      </div>
      <div class="form-group row">
        <div class="col-xs-12">
          <label for="pwd">Mot de Passe:</label>
          <input required id="pwd" type="password" name="mdpclient" class="form-control input-sm"></input>
          <?php echo form_error('mdpclient'); ?>
        </div>
      </div>
      <div class="form-group row">
        <div class="col-xs-10"> 
          <button type="submit" class="btn btn-default">Connexion</button>
        </div>
      </div>
    </form>
  </div>
</div>
<?php echo form_close(); ?> 
<p>Pas encore inscrit ? C'est par <a href="<?php echo base_url("index.php/User/inscription/");?>">ici</a></p>