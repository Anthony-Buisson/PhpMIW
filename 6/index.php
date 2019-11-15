<?php
error_reporting(E_ALL);

include 'fonctions.php';
include 'iVehicule.php';
include 'Vehicule.php';
include 'Bmw.php';
include 'Renault.php';

$voiture = new Vehicule();
$voiture1 = new Renault();
$voiture2 = new Bmw();

$voiture->faireLePlein();
$voiture1->faireLePlein();
$voiture2->faireLePlein();

echo
'<table>
    <thead>
        <th>Véhicule</th>
        <th>'.$voiture1->getMarque().'</th>
        <th>'.$voiture2->getMarque().'</th>
    </thead>';
for($i=0; $i<100; $i++){
    echo '<tr style="text-align: center;">';
    if(strlen($voiture->getErreur()) > 0){
        echo '<td><img height="100" src="https://i0.wp.com/www.ifpst.fr/wp-content/uploads/2015/04/triangle-accident-voiture-panne-route.jpg" alt=""></td>';
    }
	else if($voiture->avancer()){
		echo '<td>J\'avance !</td>';
	}else{
		echo '<td>'.$voiture->getErreur().'</td>';
	}
	if(strlen($voiture1->getErreur()) > 0){
        echo '<td><img height="100" src="https://images.caradisiac.com/logos/2/1/7/0/192170/S0-record-du-nombre-de-voitures-en-panne-depuis-le-debut-de-l-ete-109240.jpg" alt=""></td>';
    }
	else if($voiture1->avancer()){
		echo '<td>J\'avance !</td>';
	}else{
		echo '<td>'.$voiture1->getErreur().'</td>';
	}
    if(strlen($voiture2->getErreur()) > 0){
        echo '<td><img height="100" src="https://i0.wp.com/www.specialist-auto.fr/wp-content/files_uploads/2011/01/Accident-une-BMW-M3-d%C3%A9capit%C3%A9e-...-%C3%A7a-fait-peur-1.jpg?ssl=1" alt=""></td>';
    }
    else if($voiture2->avancer()){
        echo '<td>J\'avance !</td>';
    }else{
        echo '<td><img height="100" src="https://media.giphy.com/media/qYnvnqOPN7rQ4/giphy.gif" alt=""></td>';
    }
    echo'</tr>';
}
echo '<thead><th>'.$voiture->getKmParcouru().'kms</th><th>'.$voiture1->getKmParcouru().'kms</th><th>'.$voiture2->getKmParcouru().'kms</th></thead>';
echo '</table>';
/*
 * TP : Créer 2 classes :
 * - Renault : consomme deux fois moins que Véhicule, a 3% de chance de tomber en panne mécanique en avançant
 * - Bmw : consomme deux fois plus et roule trois fois plus vite que Véhicule, a 5% de chance d'avoir un accident de la route ( http://s2.quickmeme.com/img/cb/cbb19102f4ada827be3c87b54b169e1eb8b50e69631e456600fc8fd2959c3766.jpg )
 */