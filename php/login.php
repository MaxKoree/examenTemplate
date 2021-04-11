<?php
include 'database.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit']) && !empty($_POST['submit'])) {
    $userName = trim($_POST['Voornaam']);
    $passWord = trim($_POST['Wachtwoord']);

    $db = new database('localhost', 'root', '', 'hengelsport', 'utf8');

    $db->login($userName, $passWord);
}

?>

<!DOCTYPE html>
<html lang="">
<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css%22%3E">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
          integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <title>Login</title>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="../style.css">
    <script src="../script.js"></script>
</head>
<nav class="navbarContainer" id="navbar">
    <ul id="navbarList">
    </ul>
</nav>
<body id="body">
            <form method="post" id="loginForm" Style="margin: 15px;">
                <h1 id="formTitle">Login</h1>

                <label for="">Voornaam</label><br>
                <input id="" type="text" name="Voornaam" placeholder="Voornaam" pattern="[a-zA-Z0-9-]+"
                       required/><br><br>

                <label for="">Wachtwoord</label><br>
                <input type="password" id="" name="Wachtwoord" placeholder="Wachtwoord " required/><br><br>

                <input type="submit" name='submit' id="" value="submit"/>

                <a href="index.php">Terug</a>

            </form>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
        integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"
        integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV"
        crossorigin="anonymous"></script>
</body>
</html>