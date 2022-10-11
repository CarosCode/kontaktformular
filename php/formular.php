<!DOCTYPE html>
<html lang="de">
    <head>
        <meta charset="utf-8">
        <title>Kontaktformular</title>
        </head>



<!-- Eingegebene Daten an Mailadresse senden-->
<body>
    <h1>Das Kontaktformular wurde erfolgreich abgesendet!</h1>
<?php
if(isset($_POST["submit"])){
    mail("test.adresse@test.com", "Kontaktformular", 'Vorname: '.$_POST["vorname"].'Nachname: '.$_POST['nachname'].
        'E-Mail: '.$_POST['email'].'Telefonnummer: '.$_POST['telefonnummer'].'Nachricht: '.$_POST['text']);        
    echo "Hallo ".$_POST["vorname"].". Deine E-Mail wurde erfolgreich gesendet!"."<br>";
}else{
    echo "Hallo ".$_POST["vorname"].". Fehler beim Senden!";
}
?>


<!--Eingegebene Daten in txt-Datei speichern-->
<?php

    $schreibe_in_txt = '';    //Variable erstellen
    $txt_datei = "datenausgabe_kontaktformular.txt";

    if(isset($_POST['submit'])) {
        $schreibe_in_txt = 'Vorname: '.$_POST["vorname"].'| Nachname: '.$_POST['nachname'].'| E-Mail: '.$_POST['email'].
                            '| Telefonnummer: '.$_POST['telefonnummer'].'| Nachricht: '.$_POST['text'].PHP_EOL;

    }if($schreibe_in_txt) {
        $oeffne_datei = fopen($txt_datei, 'a') or die("can't open file"); //öffne die oben angegebene Datei (a= nur zum Schreiben geöffnet)
        fwrite($oeffne_datei, $schreibe_in_txt); //Schreibauftrag: führe die zwei $Variablen aus
        fclose($oeffne_datei); //schließe die geöffnete Datei
    }
?>


<!-- Verbindung zu Datenbank + Daten in Datenbank schreiben-->

<?php
// Verbindung zur Datenbank via PDO

    $username = 'root';
    $passwort = '';
    $server = 'mysql:host=localhost;dbname=kontaktformular'; //Server:Localhost & Datenbankname:kontaktdaten

    //Try-Catch-Block zum Fehler abfangen
    try{
        $verbindung = new PDO($server, $username, $passwort); //versuche Verbindungsaufbau
    }catch(PDOException $fehler) {   //fange PDO-Fehler ab & speichere ihn in Variable: $fehler...
        print $fehler->getMessage(); //...gib $fehler + Message aus
    }

    //Variablen erstellen für IDs der Eingabefelder des Kontaktformulars:
        $vorname        = $_POST['vorname'];
        $nachname       = $_POST['nachname'];
        $email          = $_POST['email'];
        $telefonnummer  = $_POST['telefonnummer'];
        $nachricht      = $_POST['text'];

    // Eingabedaten an DB übermitteln
    $sqlBefehl = "INSERT INTO `kontaktdaten` (`id`, `vorname`, `nachname`, `email`, `telefon`, `nachricht`) 
                    VALUES (NULL,'$vorname','$nachname','$email','$telefonnummer','$nachricht');"; //neuer String mit SQL-Befehl
    $abfrage = $verbindung->prepare($sqlBefehl);//Variable mit Verbindung + SQL-Befehl (prepare kommt aus Klasse PDO)
    $abfrage->execute(); //Abfrage ausführen
    
?>

    <button><a href='../index.html'>Zurück zur Startseite</button>
    
</body>
</html>