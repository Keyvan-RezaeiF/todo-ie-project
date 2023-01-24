<?php
$con = mysqli_connect("localhost","root","","finalProject","3306");
if (mysqli_connect_errno())
{
die('<br>Connect error no: '. mysqli_connect_errno() . 'Could not connect: ' . mysqli_connect_error()) ;
}

?>