<!DOCTYPE html>
<html lang="de">
    <head>
        <meta charset="utf-8">
        <title>Kontaktformular</title>
        </head>

<body>
    <h1>Übersicht der eingegebenen Daten vom Datenserver</h1>

<!--Verbindung zur Datenbank via PDO-->
<?php
    $username = 'root';
    $passwort = '';
    $server = 'mysql:host=localhost;dbname=kontaktformular'; //Server:Localhost & Datenbankname:kontaktdaten

    //Try-Catch-Block zum Fehler abfangen
    try{
        $verbindung = new PDO($server, $username, $passwort); //versuche Verbindungsaufbau
    }catch(PDOException $fehler) {   //fange PDO-Fehler ab & speichere ihn in Variable: $fehler...
        print $fehler->getMessage(); //...gib $fehler + Message aus
    }

    $sqlBefehl = 'SELECT * FROM kontaktdaten'; //neuer String mit SQL-Befehl
    $abfrage = $verbindung->prepare($sqlBefehl);//Variable mit Verbindung + SQL-Befehl (prepare kommt aus Klasse PDO)
    $abfrage->execute(); //Abfrage ausführen
    $ergebnismenge = $abfrage->fetchAll(); //fetchAll ruft alle Zeilen eines Ergebissatzes auf.

    //Tabelle
    echo "<table style='border: 1px solid black;'>";
    echo "<thead><tr>"; //Kopfzeile Start
    echo "<td>Vorname</td><td>Nachname</td><td>E-Mail</td><td>Telefon</td><td>Nachricht</td>";
    echo "</tr></thead>"; //Kopfzeile Ende
    //Schleife

    foreach($ergebnismenge as $zeile){
        echo "<tr>";
            echo "<td>".$zeile["vorname"]."</td>";
            echo "<td>".$zeile["nachname"]."</td>";
            echo "<td>".$zeile["email"]."</td>";
            echo "<td>".$zeile["telefon"]."</td>";
            echo "<td>".$zeile["nachricht"]."</td>";
        echo "</tr>";
    }
    echo "</table>";
?>

</br><button><a href='../index.html'>Zurück zum Kontaktformular</button>
</body>
</html>