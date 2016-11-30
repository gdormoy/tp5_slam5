<?php 
if (isset($_SESSION['idclient'])) {
	// echo $_SESSION['idclient'];
	// echo $_SESSION['loginclient'];
	// $printr;
	// redirect('Reservations/afficher/'.$_SESSION['idclient'], 'refresh');
	?> <a href="Reservations/afficher/'<?php echo"$sessIdClient";?>>clique</a><?php 
} else {
	show_404();
}