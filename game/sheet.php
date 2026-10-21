<?php

require_once '../includes/auth.php';

require_once '../includes/layout_start.php';
?>

    
        <div id="sheet_character">
            <div id="sheet_ckep"> 
                <img src="Spyro.png" alt="Hős">
            </div>
            <div id="sheet_adatok">
                <p id="info">Név: <p id="nev"></p></p>
                <p id="info">Szint: <p id="szint"> </p></p>
                <p> </p>
                <p id="info">Hp: <p id="hp"> </p></p>
                <p id="info">Sebzés: <p id="sebzes"> </p></p>
                <p id="info">Páncél: <p id="pancel"> </p></p>
                <p> </p>
                <p id="info">Képességpont: <p id="kepessegp"> </p></p>
                <p id="info">Ex: <p id="Exp"> </p></p>
            </div>
        </div>
    </div>    

    
<?php
require_once '../includes/layout_end.php';
?>