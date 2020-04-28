<?php
session_start();

$file = fopen("felhasznalos.txt", "r");
$content = [];

while(($line = fgets($file)) !== false) {
    $content[] = unserialize($line);
}
fclose($file);

$X = 0;

if (isset($_GET["kuld"])){
    $nev = $_GET["nevL"];
    $jelszo = $_GET["jelszoL"];

    foreach($content as $c){
        if($c["felhasznalo"] == $nev && $c["jelszo"] == $jelszo){
            $_SESSION["user"] = $nev;
            $X = 1;
            header("Location: YESlogin.php");
            break;
        }
    }
}
if($X == 0) { //Ha nem sikerült a bejelentkezés, akkor marad X = 0
    header("Location: NOlogin.php");
}


?>