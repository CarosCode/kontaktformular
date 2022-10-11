<?php

$benutzer = $_POST["benutzer"];
$passwort = $_POST["passwort"];

if($benutzer == "Test")	{		
    if($passwort == "1234"){ 
	    header('Location: datenausgabe.php');
    }
    }else{
	    header('Location: ../pages/adminlogin.html');
    }
?>