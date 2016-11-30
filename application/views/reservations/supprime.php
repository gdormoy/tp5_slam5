<div class="deconnexion">
    <?php echo form_open('User/deconnexion');?>
    <input type="submit" name="Déconnexion" value="Déconnexion">
    <?php echo form_close();?>
</div>
<h1> <?php echo "$titre";?> </h1>
<p>réservation a supprimé</p>

<?php echo validation_errors(); ?>

<?php echo form_open("reservations/supprime/$num"); ?>

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
                }
                else{
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
                echo "<td>
                            <form method ='post'>
                                <input type='hidden' name='numsejour' value = '". $row["idsejour"] ."' />
                                <input type='hidden' name='numclient' value = '". $row["idclient"] ."' />
                                <button type='submit' class='glyphicon glyphicon-remove'></button>
                            </form>
                        </td>";
            echo "</tr>";
        }
    ?>
    
    
</table>
<br>