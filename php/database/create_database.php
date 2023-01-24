<?php
$con = mysqli_connect("localhost","root","");
if (mysqli_connect_errno())
{
die('Could not connect: ' . mysqli_connect_error()) ;
}

if (mysqli_query($con,"CREATE DATABASE finalProject"))
{

}
else
{

}
mysqli_close($con);
?>