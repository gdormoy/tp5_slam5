<? if (isset($_SESSION['idclient'])) {
    $_SESSION['idclient'] = $_SESSION['idclient'];
} ?>
<div class="deconnexion">
    <?php echo form_open('User/deconnexion');?>
    <input type="submit" name="Déconnexion" value="Déconnexion">
    <?php echo form_close();?>
</div>
<h1> <?php echo "$titre";?> </h1>
<p> Bonjour <?php echo $loginclient; ?> Voici vos réservations</p>

<?php echo validation_errors();?>

<?php echo form_open("reservations/afficher/$num");?>
<table class="table table-hover table_reservation">
    <tr>
    <th>num de réservation</th>
    <th>date d'arrivée</th>
    <th>date de fin</th>
    <th>nombres de personnes</th>
    <th>lieu</th>
    <th>ménage</th>
    <th>état de la réservation</th>
    <th>num client</th>
    <th>chambre</th>
    <th>tarif</th>
    <th>supprimer</th>
    </tr>
    
    <?php
        foreach($reservations as $row){
            echo "<tr>";
            
                echo "<td>". $row["idsejour"] ."</td>";
                echo "<td>". $row["datedebut"] ."</td>";
                echo "<td>". $row["datefin"] ."</td>";
                echo "<td>". $row["nbpersonnes"] ."</td>";
                echo "<td>". $row["lieusejour"] ."</td>";
                if($row["menage"] == 1){
                    echo "<td> oui </td>";
                } else {
                    echo "<td> non </td>";
                }
                if ($row["etatReserv"] == "f") {
                    echo "<td>En cours de validation</td>";
                } else {
                    echo "<td>Validé</td>";
                }
                echo "<td>". $row["idclient"] ."</td>";
                echo "<td>". $row["idheb"] . "</td>";
                echo "<td>". $row["tarifsejour"] . "</td>";
                if($row["etatReserv"] == 't'){
                echo "<td><button disabled>supprime</button></td>";
                }
                else{
                    
                   echo "<form method = 'post'>
                            <td>
                                <button type='submit' class='glyphicon glyphicon-remove'></button>
                                <input type='hidden' name='numsejour' value = '". $row["idsejour"] ."'/>
                            </td>
                        </form>";
                };

            echo "</tr>";
        }
        
    ?>
    
    
</table>
<br>

<p>Créer une nouvelle réservation en cliquant <a href="<?php echo base_url("index.php/Reservations/create/$num");?>">ici</a></p>