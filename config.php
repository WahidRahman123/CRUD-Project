<?php
$db_server = "localhost";
$db_username  = "root";
$db_password = "";
$db_name = "pData";

$link = mysqli_connect($db_server,$db_username,$db_password,$db_name);

if($link == false)
{
    die("ERROR: Could not connect. " . mysqli_connect_error());
}