<?php 

$conn = @mysqli_connect('localhost','root','','win');

if (!$conn){
    echo "Connection error: " . mysqli_connect_error();
}