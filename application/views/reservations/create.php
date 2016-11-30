<h1> <?php echo "$titre";?> </h1>


<?php echo validation_errors(); ?>

<?php echo form_open("reservations/create"); ?>
<div class="container">
<div class="form-horizontal">
    <fieldset>
        <legend>Séjour</legend>
        <div class="form-group">
            <label class="control-label col-sm-2" for="dateArrivee">Date d'arrivée : </label>
            <div class="col-sm-2">
                <input type="date" name="arrive" id="dateArrivee" class="form-control"/>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-2" for="dateDepart">Date de départ : </label>
            <div class="col-sm-2">
                <input type="date" name="depart" id="dateDepart" class="form-control"/>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-2" for="nbPersonne"> Nombres de personnes : </label>
            <div class="col-sm-2">
                <input type="number" name="nb" id="nbPersonne" class="form-control" />
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-2" for="">Lieu : </label>
            <div class="col-sm-2">
                <select name="lieu" class="form-control">
                    <option value="Essonne">Essonne</option>
                    <option value="Isère">Isère</option>
                    <option value="Paris">Paris</option>
                    <option value="Seine et marne">Seine et marne</option>
                    <option value="Seine saint denis">Seine saint denis</option>
                    <option value="Val de marne">Val de marne</option>
                    <option value="Val d'oise">Val d'oise</option>
                    <option value="Yveline">Yveline</option>
                </select>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-2">Menage : </label>
            <div class="col-sm-2">
                <label class="radio-inline"><input type="radio" name="men" value="1">Oui</label>
                <label class="radio-inline"><input type="radio" name="men" value="0">Non</label>                
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-2" for="">Type de chambre : </label>
            <div class="col-sm-10">
                <label class="radio-inline"><input type="radio" name="chambre" value="1">Logement</label>
                <label class="radio-inline"><input type="radio" name="chambre" value="2">Chambre double</label>
                <label class="radio-inline"><input type="radio" name="chambre" value="3">Chambre 3 lits</label>
                <label class="radio-inline"><input type="radio" name="chambre" value="4">Chambre 4 lits</label>
                <label class="radio-inline"><input type="radio" name="chambre" value="5">Chambre hadicapé</label>
            </div>
        </div>
        <input type="hidden" name="idclient" value="<?php echo $idclient;?>">
        <div class="form-group"> 
            <div class="col-sm-offset-3 col-sm-9">
                <button type="submit" class="btn btn-default">Réserver</button>
            </div>
        </div>
    </div>
    </fieldset>
</form> 
</div>
