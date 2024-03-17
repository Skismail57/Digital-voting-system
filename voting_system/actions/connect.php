<?php
//domain name,username,password,database_name
$domain_name="localhost";
$username="root";
$password="";
$database_name="totest";
$connect=mysqli_connect($domain_name,$username,$password,"$database_name");
if(!$connect){
    die(mysqli_error($connect));
}
?>