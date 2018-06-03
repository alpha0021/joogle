<?php

    session_start();
    $db = mysqli_connect("localhost","root","","crud");

    //initializing the variables

    $name = "";
    $address="";
    $id=0;
    $update=false;

    //saving the  records

    if (isset($_POST['save'])) {
        $name = $_POST['name'];
        $address=$_POST['address'];

        mysqli_query($db , "INSERT INTO info(name , address)VALUES('$name','$address')");
        $_SESSION['message']="Information  saved";
        header("location:index.php");

    }

//updating the  records

    if (isset($_POST['update'])) {
        $id=$_POST['id'];
        $name=$_POST['name'];
        $address =$_POST['address'];

        mysqli_query($db, "UPDATE info  SET name='$name' , address='$address' WHERE id='$id'");
        $_SESSION['message'] = "information updated";
        header('location:index.php');
    }

//deleting the record


    if (isset($_GET['del'])) {
        $id = $_GET['del'];
        mysqli_query($db , "DELETE FROM info WHERE id=$id");

        $_SESSION['message'] = "information  deleted";
        header('location:index.php');
    }

 ?>
