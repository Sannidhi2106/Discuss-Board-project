<?php 
error_reporting(0);
$host="localhost";
$username="root";
$password="";
$database="discuss";

$conn=new mysqli($host,$username,$password,$database);// conn is variaable name

if ($conn->connect_error) {
    die("not connected with DB ". $conn->connect_error); 
    
}

?>