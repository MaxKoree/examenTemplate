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

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit']) && !empty($_POST['submit'])) {
    $product = trim(strtolower($_POST['product']));
    $typ = trim(strtolower($_POST['typ']));
    $leverancier2 = trim(strtolower($_POST['leverancier']));
    $inkoopprijs = trim(strtolower($_POST['inkoopprijs']));
    $verkoopprijs = trim(strtolower($_POST['verkoopprijs']));

    $db = new database('localhost', 'root', '', 'hengelsport', 'utf8');

    $sql2 = "SELECT lev_code FROM leverancier WHERE leverancier = :leverancier";

    $named_placeholder2 = [
        'leverancier'=>$leverancier2,
    ];

    $lev_code = $db->select($sql2, $named_placeholder2);

    print_r($lev_code);

    $result= mb_substr(uniqid(), 8, 13);

    $sql = "INSERT INTO artikel VALUES (:productcode, :product, :typ, :lev_code, :inkoopprijs, :verkoopprijs)";

        $named_placeholder = [
            'productcode'=>$result, 
            'product'=>$product,
            'typ'=>$typ,
            'lev_code'=>$lev_code[0]['lev_code'],
            'inkoopprijs'=>$inkoopprijs,
            'verkoopprijs'=>$verkoopprijs,
        ];

        $db->insert($sql, $named_placeholder, 'ptoevoegen.php');
}
?>

<html lang="en">
<head>

    <title>Reserveren</title>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="../style.css">
    <script src="../script.js"></script>
</head>

<body>
<div class="outer">
    <div class="middle">
        <div class="innerNew">
            <form action="ptoevoegen.php" method="post" id="">
                <h1 id="">toevoegen</h1><br>

                <label for="product">product</label><br>
                <input id="product" type="text" name="product" required /><br>
                <label for="typ">typ</label><br>
                <input id="typ" type="text" name="typ" required /><br>

                <label for="lev_code">Kies leverancier</label> <br>
                <select id="lev_code" name="leverancier">
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