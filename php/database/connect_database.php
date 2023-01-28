<?php
  $con = mysqli_connect("localhost","root","Keyvan*1380","finalProject","5501");
  if (mysqli_connect_errno()) {
    die('<br>Connect error no: '. mysqli_connect_errno() . 'Could not connect: ' . mysqli_connect_error()) ;
  }
?>