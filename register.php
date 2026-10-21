<?php
//Feldolgozás
    require_once "includes/conn.php";

    if($_SERVER["REQUEST_METHOD"] === 'POST'){

        if(isset($_POST['nev'],$_POST['passwd'], $_POST['passwd2'])  ){
            $nev = $_POST['nev'];
            $jelsz = (string)$_POST['passwd'];
            $jelsz2 = (string)$_POST['passwd2'];

            if($jelsz === $jelsz2){
                $sql = "INSERT INTO `users` 
                (`name`, `password`) VALUES 
                ('$nev', '$jelsz');";
                

                mysqli_query($conn, $sql);
                echo "<p>Regisztráció Sikeres</p>";

            }else{
                echo "A jelszavak nem egyeznek";
            }


        }
    }

?>

<main>
<h1>regisztráció</h1>

<div>
    <form method="POST">
       <p>Név: <input type="text" name="nev"></p> 
        <p>Jelszó: <input type="password" name="passwd"></p>
        <p>Jelszó újra: <input type="password" name="passwd2"></p>
        

        <button type="submit">Regisztgrálok</button>
    </form>
</div>

</main>


