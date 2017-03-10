<?php

$errorMSG = "";

// FIRST NAME
if (empty($_POST["firstname"])) {
    $errorMSG = "Name is required ";
} else {
    $firstname = $_POST["firstname"];
}

//LAST NAME
if (empty($_POST["lastname"])) {
    $lastname = $_POST[""];
} else {
    $lastname = $_POST["lastname"];
}

// TITLE
if (empty($_POST["title"])) {
    $title = $_POST[""];
} else {
    $title = $_POST["title"];
}

// COMPANY
if (empty($_POST["company"])) {
    $company = $_POST[""];
} else {
    $company = $_POST["company"];
}

// EMAIL
if (empty($_POST["email"])) {
    $errorMSG .= "Email is required ";
} else {
    $email = $_POST["email"];
}

// INTERESTED PROJECT
if (empty($_POST["interestedproject"])) {
    $interestedproject = $_POST[""];
} else {
    $interestedproject = $_POST["interestedproject"];
}

// IDEA
if (empty($_POST["idea"])) {
    $idea = $_POST[""];
} else {
    $idea = $_POST["idea"];
}


$EmailTo = "3queensdesign@gmail.com";
$Subject = "New Message Received | Stand With Refuguees";

// prepare email body text
$Body = "";
$Body .= "First Name: ";
$Body .= $firstname;
$Body .= "\n";
$Body .= "Last Name: ";
$Body .= $lastname;
$Body .= "\n";
$Body .= "Email: ";
$Body .= $email;
$Body .= "\n";
$Body .= "Title: ";
$Body .= $title;
$Body .= "\n";
$Body .= "Company: ";
$Body .= $company;
$Body .= "\n";
$Body .= "Interested Project: ";
$Body .= $interestedproject;
$Body .= "\n";
$Body .= "Idea: ";
$Body .= $idea;
$Body .= "\n";



// send email
$success = mail($EmailTo, $Subject, $Body, "From:".$email);


// redirect to success page
if ($success && $errorMSG == ""){
   echo "success";
}else{
    if($errorMSG == ""){
        echo "Something went wrong :(";
    } else {
        echo $errorMSG;
    }
}

?>