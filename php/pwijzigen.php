<?php

include 'database.php';

$conn = mysqli_connect("localhost", "root", "", "hengelsport");

$sql = "SELECT leverancier FROM leverancier";

$result = mysqli_query($conn, $sql);
$resultCheck = mysqli_num_rows($result);
$leverancier = [];

if ($resultCheck > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        array_push($leverancier, $row['leverancier']);
    }
}

$sql2 = "SELECT product FROM artikel";

$conn2 = mysqli_connect("localhost", "root", "", "hengelsport");

$result2 = mysqli_query($conn2, $sql2);
$resultCheck2 = mysqli_num_rows($result2);
$product = [];

if ($resultCheck2 > 0) {
    while ($row = mysqli_fetch_assoc($result2)) {
        array_push($product, $row['product']);
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit']) && !empty($_POST['submit'])) {
    $product = trim(strtolower($_POST['product']));
    $typ = trim(strtolower($_POST['typ']));
    $leverancier2 = trim(strtolower($_POST['leverancier']));
    $inkoopprijs = trim(strtolower($_POST['inkoopprijs']));
    $verkoopprijs = trim(strtolower($_POST['verkoopprijs']));
    $product2 = trim(strtolower($_POST['product2']));

    $result= mb_substr(uniqid(), 8, 13);

    $db = new database('localhost', 'root', '', 'hengelsport', 'utf8');

    
    $sql3 = "SELECT lev_code FROM leverancier WHERE leverancier = :leverancier";

    $named_placeholder2 = [
        'leverancier'=>$leverancier2,
    ];

    $lev_code = $db->select($sql3, $named_placeholder2);


    $sql = "UPDATE artikel SET productcode=:productcode, product=:product, typ=:typ, lev_code=:lev_code, inkoopprijs=:inkoopprijs, verkooprijs=:verkooprijs WHERE product =:product2;";

        $named_placeholder = [
            'productcode'=>$result, 
            'product'=>$product,
            'typ'=>$typ,
            'lev_code'=>$lev_code,
            'inkoopprijs'=>$inkoopprijs,
            'verkooprijs'=>$verkoopprijs,
            'product2'=>$product2,
        ];

        $db->edit_or_delete($sql, $named_placeholder, 'pwijzigen.php');
    
}
?>

<html lang="en">
<head>

    <title>wijzigen</title>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="../style.css">
    <script src="../script.js"></script>
</head>

<body>
<div class="outer">
    <div class="middle">
        <div class="innerNew">
            <form action="pwijzigen.php" method="post" id="">           
                <h1 id="">wijzigen</h1><br>

                <label for=" ">Kies product</label> <br>
                <select id=" " name="product2">
                    <?php
                    foreach ($product as $item) {
                        echo "<option value='$item'>$item</option>";
                    } ?>
                </select> <br><br>

                <label for="product">product</label><br>
                <input id="product" type="text" name="product" required /><br>
                <label for="typ">typ</label><br>
                <input id="typ" type="text" name="typ" required /><br><br>

                <label for=" ">Kies leverancier</label> <br>
                <select id=" " name="leverancier">
                    <?php
                    foreach ($leverancier as $item) {
                        echo "<option value='$item'>$item</option>";
                    } ?>
                </select> <br><br>

                <label for="inkoopprijs">inkoopprijs</label><br>
                <input id="inkoopprijs" type="text" name="inkoopprijs" required /><br>
                <label for="verkoopprijs">verkoopprijs</label><br>
                <input id="verkoopprijs" type="text" name="verkoopprijs" required /><br><br>
                <input id="button" type="submit" name="submit" value="toevoegen"/>
                <a style="margin: 30px 0 0 30px" id="" value="submit" href="welcome.php">terug</a><br>
            </form>
        </div>
    </div>
</div>


</body>
</html>