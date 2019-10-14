<?php
//---------Exercice 1---------
const AGE = 20;
$nom = 'buisson';
$prenom = 'anthony';

//---------Exercice 2---------
/*
echo "je m'appelle $prenom $nom<br>";
echo 'J\'ai '. AGE . 'ans<br>';
*/

//---------Exercice 3---------
/*
$rand = rand(0,100);
echo $rand.'<br>';
echo  $rand < AGE ? $rand.' < '.AGE : $rand.' > '.AGE;
*/

//---------Exercice 4---------
/*
$rand = rand(0,100);
while ($rand >= AGE){
    echo $rand.' : ';
    echo $rand < AGE ? $rand.' < '.AGE : $rand.' > '.AGE.'<br>';
    $rand = rand(0,100);
}
echo $rand.' < '.AGE;
*/

//---------Exercice 5---------
/*
function randR($age){
    $rand = rand(0,100);
    return ($rand > $age) ? randR($age) : $rand;
}
echo 'Nombre inférieur à l\'âge de '.AGE.' ans : ' . randR(AGE) . '<br>';
*/
//---------Exercice 6---------
/*
$tab = [
    -123 =>60,
    1 =>5,
    555 =>-99,
    0 =>99,
    50 =>1,
];
echo 'Les chiffres alétoires sont : ['. implode($tab, ",") . ']<br>';

function somme(array $tableau) : int{
    $somme = 0;
    foreach ($tableau as $val){
        $somme += $val;
    }
    return $somme;
}

function minValue(array $tableau) : int{
    $min = $tableau[0];
    foreach ($tableau as $value){
        $min = $min > $value ? $value : $min;
    }
    return $min;
}

function maxValue(array $tableau) : int{
    $max = $tableau[0];
    foreach ($tableau as $value){
        $max = $max < $value ? $value : $max;
    }
    return $max;
}

function minKey(array $tableau) : int{
    $min = [0, $tableau[0]];
    foreach ($tableau as $key => $value){
        if ($min[1] > $value){
            $min = [$key, $value];
        }
    }
    return $min[0];
}

function maxKey(array $tableau) : int{
    $max = [0, $tableau[0]];
    foreach ($tableau as $key => $value){
        if ($max[1] < $value){
            $max = [$key, $value];
        }
    }
    return $max[0];
}
echo 'Le minimum est '.minValue($tab).' à l\'index ' . minKey($tab).'<br>';
echo 'Le maximum est '.maxValue($tab).' à l\'index ' . maxKey($tab).'<br>';
echo 'La somme des nombres est '.somme($tab).'<br>';
*/