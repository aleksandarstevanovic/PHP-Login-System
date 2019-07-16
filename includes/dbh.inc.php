<?php
$servername="localhost";
$dBUsername="root";
$dBPassword="";
$dBName="baza_podataka";

$conn=mysqli_connect($servername,$dBUsername,$dBPassword,$dBName);

if(!$conn){
    die("Konekcija nije uspela:".mysqli_connect_error());
}