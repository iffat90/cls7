<?php
session_start();
if (isset($_POST['submit'])) {
    //* ERRORS ARRAY
    $errors = [];

    //* REQUEST
    $request = $_POST;
    $title = $request['title'];
    $detail = $request['detail'];
    $author = $request['author'];

    // print_r($request);
    // exit();



    if (empty($title)) {
        $msg =  "No title";
        $errors['title'] = $msg;
    } elseif (strlen($title) > 10) {
        $msg =  "ar koto?";
        $errors['title'] = $msg;
    }
    if (empty($detail)) {
        $msg =  "No detail";
        $errors['detail'] = $msg;
    }

    if (count($errors) > 0) {

        //*HEADER REDIRECTION
        $_SESSION['errors'] = $errors;
        $_SESSION['old_data'] = $request;
        header("Location: ../index.php");
    } else {
        echo "No errors found!";
    }
} else {
    echo "submit btn a click kren";
}