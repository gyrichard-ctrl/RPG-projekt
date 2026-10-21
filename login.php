<?php
//Session elindítása
session_start();
// adatbázis kapcsolat
require_once "includes/conn.php";


// Vizsgáljuk, hogy megtörtént e az ürlap elküldése
if($_SERVER["REQUEST_METHOD"] === "POST"){
    if($_POST["felhasznNev"] != "" && $_POST["jelszo"] != "")
        {
        //Ürlapban elküldött értékek változóba mentése (OPCIONÁLIS)
        $username = $_POST["felhasznNev"] ;
        $password = $_POST["jelszo"] ;

    // Változó amibe egy szöveget írunk, a szöveg egy SQL utasítás lesz majd
        $sql = "SELECT * FROM users WHERE 
        name = '$username' 
        AND password = '$password'";

    // Az Megérkezett adathalmazt elmentjük (adatbázis kapcsolat, Sql utasítás) 
    $lekerdezes = mysqli_query($conn, $sql);
    //Asszociatív tömbbé alakítjuk az adathalmazt
    $user = mysqli_fetch_assoc($lekerdezes);


/*Jelenleg ha rossz felhasználót ad, hiba lesz. Vizygálni kell:
    if(isset($user['name'])) { 
        }else {echo "<p>Nincs ilyen felhasználó</p>"; }

        */
     //Vizsgálat a POST-ban elküldött adatok egyeznek e az adatbázisban lévőkkel 
        if($username === $user['name'] && $password === $user['password']){
            $_SESSION["nev"] = $_POST["felhasznNev"];
            $_SESSION["maxHp"] = $user['maxHp'];
            $_SESSION["actualHp"] = $user['actualHp'];
            $_SESSION["atkDmg"] = $user['atkDmg'];
            $_SESSION["ac"] = $user['ac'];

            $_SESSION["level"] = $user['ac'];
            $_SESSION["exp"] = $user['ac'];
            $_SESSION["money"] = $user['ac'];

            //Átirányítjuk a belső oldalra 
            header("Location: game/belso.php");

        }else{

        echo "<p>Ez nem nyert öcsi!</p>";
        }
    }
    

}

?>

<form method="POST">
    <p>Név: <input type="text" name="felhasznNev"></p>
    <p>Jelszó: <input type="text" name="jelszo"></p>
    <button type="submit">Belépés</button>
</form>