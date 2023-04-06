<?php

$sql = 'SELECT * FROM users ORDER BY RAND() LIMIT 1';
// Execute the $sql query using the $conn variable 
$result = mysqli_query($conn,$sql);
// to fetch data from database and store them in var 'users'
$users = mysqli_fetch_all($result, MYSQLI_ASSOC);