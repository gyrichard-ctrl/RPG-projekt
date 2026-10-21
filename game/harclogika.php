<?php

$karakterMaxHP = $_SESSION["actualHp"];
$karakterAktHP = $_SESSION["maxHp"];
$karakterDMG = $_SESSION["atkDmg"];
$karakterDEF =  $_SESSION["ac"];

$monsterHP = $monster['hp'];
$monsterDMG = $monster['dmg'];
$monsterDEF = 1;

$harcos1 = "";
$harcos2 = "";

/*
if (rand(1, 100) > 50){
    $harcos1 = "karakter";
    $harcos2 = "monster";
}else{
    $harcos1 = "monster";
    $harcos2 = "karakter";
}
*/

$gyozott = false;
$csata = true;
$kor = 1;

while($csata){
    $karKorSeb = $karakterDMG + rand(0, 5);
    if($karakterAktHP > 0){
        
        /*
        elfut opció
            $csata = false;

        elfut opció
            $csata = false;

        elfut opció
            $csata = false;
        
        */


        $monsterHP -= $karKorSeb;
    }
    $monstKorSeb = $monsterDMG + rand(0, 5);
    if($monsterHP > 0){
        
        $karakterAktHP -= $monstKorSeb;
    }

    if($karakterAktHP < 1){

        $gyozott = false;
        $csata = false;
        $karakterAktHP = 0;
        
    }
    if($monsterHP < 1){
        $gyozott = true;
        $csata = false;
        $monsterHP = 0;
    }

    echo "
        <h3>$kor. kör</h3>
        <p>A harcos sebzése: $karKorSeb</p>
        <p>Szöröny élete : $monsterHP </p>
        
        <p>A szörny sebzése: $monstKorSeb</p>
        <p>A harcos élete: $karakterAktHP</p>
        
        <hr>
        
    ";
    $kor++;
}
if($gyozott){
    echo "<h1>Győztél</h1>";
}else{
    echo "<h1>Bukta</h1>";
}

