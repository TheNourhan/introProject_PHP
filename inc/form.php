<?php

// just hide the error or warning but it is not fix them
//error_reporting(0);

if(isset($_POST['firstName']) || isset($_POST['lastName']) || isset($_POST['email'])){
    $firstName = $_POST['firstName'];
    $lastName =  $_POST['lastName'];
    $email =     $_POST['email'];
}

$errors = [
    'firstNameError' => '',
    'lastNameError' => '',
    'emailError' => '',
];

if(isset($_POST['submit'])){
    
    if(empty($firstName)){
        $errors['firstNameError'] = 'first name empty';
    }
    if(empty($lastName)){
        $errors['lastNameError'] = 'last name empty';
    }
    if(empty($email)){
        $errors['emailError'] = 'email is empty';
    }elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $errors['emailError'] = 'send right email';
    }
    
    if( ! array_filter($errors)){
        // It takes the data in the form of string, not script, to secure the database
        $firstName = mysqli_real_escape_string($conn, $_POST['firstName']);
        $lastName =  mysqli_real_escape_string($conn, $_POST['lastName']);
        $email =     mysqli_real_escape_string($conn, $_POST['email']);

        $sql = "INSERT INTO users(firstName, lastName, email) VALUES ('$firstName', '$lastName', '$email')";

        if(mysqli_query($conn, $sql)){
            header('Location: ' . $_SERVER['PHP_SELF']);
        }else{
            echo "Error: " . mysqli_error($conn);
        }

    }
       
}