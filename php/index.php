<?php
include 'database.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit']) && !empty($_POST['submit'])) {
    $voornaam = trim($_POST['Voornaam']);
    $wachtwoord = trim($_POST['Wachtwoord']);

    $db = new database('localhost', 'root', '', 'hengelsport', 'utf8');

    $db->logIn($voornaam, $wachtwoord);
}

?>

<!DOCTYPE html>
<!DOCTYPE html>
<html lang="">
<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
          integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <title>Title</title>
    <meta charset="utf-8">
    <script src="../script.js"></script>
    <link rel="stylesheet" type="text/css" href="../style.css">
</head>
<button onclick="log()" style="font-size: 28px; float: right; margin-right: 150px; ">login</button>
<h1 style= "margin-left: 35%; border: solid black 1px; width: 600px; padding-left: 150px; margin-top: 25px">De Hengelsport<h1>
<div className="sideBarClass" id="sideBarID" style="margin-top: 100px">

    <ul id="linkList" style="width: 20%; border: solid black 1px; margin-left: 25px; padding-right: 50px;">
        <ul>
            <button onclick="showOverzicht()" style="font-size: 24px"> Overzichten voorraad </button>

        </ul>
        <br>
        <ul>
            <button onclick="showContact()" style="font-size: 28px; margin-bottom: 15px"> Contact</button>

        </ul>
        <ul>

        </ul>
        </ul>

        </ul>
            </div>
<body id="body">
    <section id="but2">
        Hotel Ter Duin <br>
        Kon. Astrid Boulevard 5<br>
        2202 BK Noordwijk<br>
        071 361 9220<br>
        info@HotelTerDuin.nl<br>
        KvK-nummer: 65374479<br>
        BTW-nummer: NL856086344B01<br>
    </section>
    <section id="but">
       hallo iedereen
    </section>
<script type="text/javascript" src="../script.js"></script>
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