<?php
function OpenCon()
{
    $servername = "localhost";
    $dbuser = "id19998625_tophealthproj";
    $dbpass = "W+J{pT5DFn/{Do_M";
    $db = "id19998625_tophealthwebsite";

    $conn = new mysqli($servername, $dbuser, $dbpass, $db) or die("Connect failed: %s\n". $conn -> error);
    
    return $conn;
}
?>